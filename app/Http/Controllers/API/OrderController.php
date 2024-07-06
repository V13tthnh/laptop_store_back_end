<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreOrderRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAllOrders(Request $request)
    {
        try {
            $orders = OrderDetail::with('product')->get();

            return response()->json([
                'status' => true,
                'data' => $orders
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
            $orderDetails = OrderDetail::with('products')->where('order_id', $request->id)->get();

            return response()->json([
                'status' => true,
                'data' => $orderDetails,
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
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->name = $request->name;
            $order->address_id = $addressId->id;
            $order->phone = $request->phone;
            $order->total = $request->total;
            $order->discount = $request->discount;
            $order->subtotal = $request->subtotal;
            $order->formality = $request->formality;
            $order->note = $request->note;
            $order->status = 1;
            $order->save();

            for ($i = 0; $i < count($request->product_id); $i++) {
                if ($request->product_id[$i] != null && $request->product_quantity[$i] != null && $request->product_price[$i] != null) {
                    $orderDetail = new OrderDetail();
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

    public function getAddressId($userId)
    {
        return Address::where('user_id', $userId)->where('is_default', 1)->first();
    }

    public function calculatorDiscount()
    {

    }
}
