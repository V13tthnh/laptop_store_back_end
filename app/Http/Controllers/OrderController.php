<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusUpdateMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    const STATUS_PENDING = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_SHIPPING = 3;
    const STATUS_CANCELLED = 4;
    const STATUS_COMPLETED = 5;
    public function index()
    {
        $PAID = 4;
        $user_has_orders_count = User::has('orders')->count();
        $order_count = Order::count();
        $order_paid_sum = Order::where('formality', 1)->sum('total');
        $order_unpaid_sum = Order::where('formality', 2)->sum('total');

        return view('order.index', compact('user_has_orders_count', 'order_count', 'order_paid_sum', 'order_unpaid_sum'));
    }

    public function create()
    {
        return view('order.create');
    }

    public function dataTable(Request $request)
    {
        $query = Order::query()
            ->select('orders.id', 'orders.user_id', 'orders.phone', 'orders.discount', 'orders.total', 'orders.formality', 'orders.status')
            ->orderByDesc('orders.id')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id');

        if ($request->status !== null && $request->status !== '') {
            $query->where('orders.status', $request->status);
        }

        if ($request->formality !== null && $request->formality !== '') {
            $query->where('orders.formality', $request->formality);
        }

        $orders = $query->with('user')->get();

        return Datatables::of($orders)->addColumn('user_name', function ($order) {
            return $order->user->full_name;
        })->make(true);
    }

    public function update(Request $request)
    {
        $Order = new Order();
        $Order->supplier_id = $request->supplier_id;
        $Order->formality = $request->formality;
        $Order->user_id = Auth::user()->id;
        $Order->total = 0;
        $Order->status = 1;
        $Order->formality = $request->formality;
        $Order->save();

        $total = 0;

        for ($i = 0; $i < count($request->product_id); $i++) {
            $detail = new OrderProduct();
            $detail->Order_id = $Order->id;
            $detail->product_id = $request->product_id[$i];
            $detail->quantity = $request->quantity[$i];
            $detail->cost_price = $request->cost_price[$i];
            $detail->selling_price = $request->selling_price[$i];
            $detail->save();

            $total += $request->total[$i];

            $updateProduct = Product::find($request->product_id[$i]);
            $updateProduct->quantity = $request->quantity[$i];
            $updateProduct->unit_price = $request->selling_price[$i];
            $updateProduct->supplier_id = $request->supplier_id;
            $updateProduct->save();
        }

        $updateOrder = Order::find($Order->id);
        $updateOrder->total = $total;
        $updateOrder->save();

        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công"
        ]);
    }

    public function show(string $id)
    {
        $order = Order::with(['products.firstImage', 'user'])->findOrFail($id);
        return view('order.detail', compact('order'));
    }

    public function updateStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy hóa đơn.'], 404);
        }

        $validated = $request->validate([
            'status' => 'required|integer|in:' . implode(',', [
                Order::STATUS_PENDING,
                Order::STATUS_CONFIRMED,
                Order::STATUS_SHIPPING,
                Order::STATUS_CANCELLED,
                Order::STATUS_COMPLETED,
            ]),
        ]);

        $order->status = $request->status + 1;
        $order->save();

        if ($order->status == Order::STATUS_CANCELLED) {
            $orderProducts = OrderProduct::where('order_id', $order->id)->get();

            foreach ($orderProducts as $orderProduct) {
                $product = Product::find($orderProduct->product_id);

                if ($product) {
                    $product->quantity += $orderProduct->quantity;
                    $product->save();
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => "Cập nhật trạng thái thành công",
        ]);
    }

    public function sendEmail(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::with('products')->findOrFail($orderId);

        $user = $order->user;

        $status = '';
        switch ($order->status) {
            case 2:
                $status = 'Xác nhận';
                break;
            case 3:
                $status = 'Đang giao hàng';
                break;
            case 5:
                $status = 'Đã nhận được hàng';
                break;
            default:
                return response()->json(['message' => 'Trạng thái đơn hàng không hợp lệ để gửi mail'], 400);
        }

        // Gửi mail
        Mail::to($user->email)->send(new OrderStatusUpdateMail($user, $order, $status));

        return response()->json(['message' => 'Email đã được gửi thành công']);

    }

    public function print(string $id)
    {

        $order = Order::with(['products.firstImage', 'products', 'address', 'user'])->find($id);
        return view('order.print', compact('order'));
    }

    public function addToOrder(Request $request)
    {
        $productIds = $request->product_ids;
        $products = Product::whereIn('id', $productIds)->get();

        return response()->json([
            'success' => 200,
            'data' => $products
        ]);
    }

    public function filter(Request $request)
    {
        $query = Order::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }

        $orders = $query->get();

        return response()->json($orders);
    }
}
