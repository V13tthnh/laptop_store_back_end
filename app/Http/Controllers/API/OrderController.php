<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreOrderRequest;
use App\Mail\OrderShippedMail;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function getAllOrders(Request $request)
    {
        try {

            $user = User::with(['orders.products.firstImage'])->find($request->user_id);

            if (!$user) {
                return response()->json(['message' => 'Không tìm thấy người dùng.'], 404);
            }

            return response()->json([
                'status' => true,
                'data' => $user->orders
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra:' . $e
            ], 500);
        }
    }

    public function getOrderDetails(Request $request)
    {
        try {

            $order = Order::with(['products.firstImage', 'address'])->find($request->order_id);
            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }
            return response()->json([
                'status' => true,
                'data' => $order,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra:' . $e
            ], 500);
        }
    }
    public function store(StoreOrderRequest $request)
    {
        try {
            $addressId = $this->getAddressId($request->user_id);

            if ($addressId == null) {
                return response()->json([
                    'status' => false,
                    'message' => "Vui lòng chọn địa chỉ mặc định, nếu bạn chưa có địa chỉ xin vui lòng chọn thêm địa chỉ."
                ], 402);
            }
            
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->name = $request->name;
            $order->address_id = $addressId->id;
            if ($request->phone === null) {
                $order->phone = $addressId->phone;
            } else {
                $order->phone = $request->phone;
            }
            $order->total = $request->total;
            $order->discount = $request->discount;
            $order->subtotal = $request->subtotal;
            $order->formality = $request->formality;
            $order->note = $request->note;
            $order->status = 1;
            $order->save();

            for ($i = 0; $i < count($request->product_id); $i++) {
                if ($request->product_id[$i] != null && $request->product_quantity[$i] != null && $request->product_price[$i] != null) {
                    $orderDetail = new OrderProduct();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $request->product_id[$i];
                    $orderDetail->quantity = $request->product_quantity[$i];
                    $orderDetail->price = $request->product_price[$i];
                    $orderDetail->save();

                    $productQuantity = Product::find($request->product_id[$i]);
                    $productQuantity->quantity -= $request->product_quantity[$i];
                    $productQuantity->save();
                }
            }

            $userEmail = User::find($request->user_id);
            Mail::to($userEmail->email)->send(new OrderShippedMail($order));

            return response()->json([
                'status' => true,
                'message' => 'Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đang chờ duyệt.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra:' . $e
            ], 500);
        }
    }

    public function cancelOrder(Request $request)
    {
        try {
            $order = Order::find($request->order_id);

            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Đơn hàng không tồn tại.'
                ], 404);
            }

            if ($order->status == 4) {
                return response()->json([
                    'status' => false,
                    'message' => 'Đơn hàng đã bị hủy trước đó.'
                ], 400);
            }

            $order->status = 4;
            $order->save();

            foreach ($order->orderProduct as $item) {
                $product = Product::find($item->product_id);
                $product->quantity += $item->quantity;
                $product->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Đơn hàng đã được hủy thành công.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function reOrder(Request $request)
    {
        try {
            $order = Order::find($request->order_id);

            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Đơn hàng không tồn tại.'
                ], 404);
            }

            if ($order->status != 4) {
                return response()->json([
                    'status' => false,
                    'message' => 'Đơn hàng không ở trạng thái hủy.'
                ], 400);
            }

            $order->status = 1;
            $order->save();

            foreach ($order->orderProduct as $item) {
                $product = Product::find($item->product_id);
                $product->quantity -= $item->quantity;
                $product->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Bạn đã mua lại đơn hàng.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getAddressId($userId)
    {
        return Address::where('user_id', $userId)->where('is_default', 1)->first();
    }

    public function calculatorDiscount()
    {

    }
}
