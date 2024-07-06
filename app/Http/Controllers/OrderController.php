<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        $PAID = 4; //đã thanh toán
        $user_has_orders_count = User::has('orders')->count();
        $order_count = Order::count();
        $order_paid_sum = Order::where('status', $PAID)->sum('total');
        $order_unpaid_sum = Order::where('status', '<>', $PAID )->sum('total');

        return view('order.index', compact('user_has_orders_count', 'order_count', 'order_paid_sum', 'order_unpaid_sum'));
    }

    public function create()
    {
        return view('order.create');
    }

    public function dataTable()
    {
        $Orders = Order::with('user')->get();
        return Datatables::of($Orders)->make(true);
    }

    public function store(Request $request)
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
            $detail = new OrderDetail();
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
        $order_details = OrderDetail::where('order_id', $id)
            ->with(['product.images'])
            ->get();
        $order = Order::with(['address', 'user', 'order_details'])->find($id);
        return view('order.detail', compact('order', 'order_details'));
    }

    public function edit(string $id)
    {

    }

    public function print(string $id)
    {
        $order_details = OrderDetail::where('order_id', $id)
            ->with(['product.images'])
            ->get();
        $order = Order::with(['address', 'user', 'order_details'])->find($id);
        return view('order.print', compact('order', 'order_details'));
    }

    public function update(Request $request, string $id)
    {
        $Order = Order::findOrFail($id);
        $Order->supplier_id = $request->supplier_id;
        $Order->formality = $request->formality;
        $Order->user_id = Auth::user()->id;
        $Order->total = 0;
        $Order->status = 1;
        $Order->formality = $request->formality;
        $Order->save();

        $total = 0;
        OrderDetail::where('Order_id', $id)->delete();

        for ($i = 0; $i < count($request->product_id); $i++) {
            $detail = new OrderDetail;
            $detail->Order_id = $Order->id;
            $detail->product_id = $request->product_id[$i];
            $detail->quantity = $request->quantity[$i];
            $detail->cost_price = $request->cost_price[$i];
            $detail->selling_price = $request->selling_price[$i];
            $detail->save();

            $total += $request->total[$i];

            $updateProduct = Product::find($request->product_id[$i]);
            $updateProduct->quantity += $request->quantity[$i];
            $updateProduct->unit_price = $request->selling_price[$i];
            $updateProduct->supplier_id = $request->supplier_id;
            $updateProduct->save();
        }

        $updateOrder = Order::findOrFail($id);
        $updateOrder->total = $total;
        $updateOrder->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công"
        ]);
    }


    public function updateStatus(Request $request)
    {
        $Order = Order::findOrFail($request->id);
        $Order->status = $request->status + 1;
        $Order->save();
        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công",
        ]);
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

    private function calculateFlashSaleDiscount($totalAmount)
    {
        // Logic tính giảm giá flash sale
        // Ví dụ: 10% giảm giá
        return $totalAmount * 0.10;
    }

    private function calculateCouponDiscount($couponCode)
    {
        // Logic tính giảm giá phiếu giảm giá
        // Giả sử có phiếu giảm giá $20
        return 20;
    }
}
