<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\OrderShippedMail;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function onlineCheckout(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:3000/vnp/callback";
        $vnp_TmnCode = "QERWMOSW"; //Mã website tại VNPAY
        $vnp_HashSecret = "DVJDFKGRXPFYANWAXWPFIXJCIVQXPSEX";

        $addressId = $this->getAddressId($request->user_id);
        if ($addressId == null) {
            return response()->json([
                'status' => false,
                'message' => "Bạn chưa có địa chỉ, vui lòng thêm địa chỉ mới"
            ], 402);
        }
        // $order = new Order();
        // $order->user_id = $request->user_id;
        // $order->name = $request->name;
        // $order->address_id = $addressId->id;
        // $order->phone = $request->phone;
        // $order->total = $request->total;
        // $order->discount = $request->discount;
        // $order->subtotal = $request->subtotal;
        // $order->formality = $request->formality;
        // $order->note = $request->note;
        // $order->status = 1;
        // $order->save();

        // for ($i = 0; $i < count($request->product_id); $i++) {
        //     if ($request->product_id[$i] != null && $request->product_quantity[$i] != null && $request->product_price[$i] != null) {
        //         $orderDetail = new OrderProduct();
        //         $orderDetail->order_id = $order->id;
        //         $orderDetail->product_id = $request->product_id[$i];
        //         $orderDetail->quantity = $request->product_quantity[$i];
        //         $orderDetail->price = $request->product_price[$i];
        //         $orderDetail->save();

        //         $productQuantity = Product::find($request->product_id[$i]);
        //         $productQuantity->quantity -= $request->product_quantity[$i];
        //         $productQuantity->save();
        //     }
        // }

        $vnp_TxnRef = rand(0, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        DB::table('pending_orders')->where('user_id', $request->user_id)->delete();

        DB::table('pending_orders')->insert([
            'user_id' => $request->user_id,
            'order_data' => json_encode($request->all()),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $returnData = array(
            'success' => true,
            'code' => '00',
            'message' => 'Cảm ơn bạn đã mua hàng!',
            'data' => $vnp_Url,
            'total' => $request->total
        );

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function vnPayCallBack(Request $request)
    {
        $url = '/account/orders';
        if ($request->vnp_ResponseCode == "00") {
            $pendingOrder = DB::table('pending_orders')
                ->where('user_id', $request->user()->id)
                ->latest()
                ->first();

            if ($pendingOrder) {
                $orderData = json_decode($pendingOrder->order_data, true);

                $order = new Order();
                $order->user_id = $orderData['user_id'];
                $order->name = $orderData['name'];
                $order->address_id = $this->getAddressId($orderData['user_id'])->id;
                $order->phone = $orderData['phone'];
                $order->total = $orderData['total'];
                $order->discount = $orderData['discount'];
                $order->subtotal = $orderData['subtotal'];
                $order->formality = $orderData['formality'];
                $order->note = $orderData['note'];
                $order->status = 1;
                $order->save();

                for ($i = 0; $i < count($orderData['product_id']); $i++) {
                    if ($orderData['product_id'][$i] != null && $orderData['product_quantity'][$i] != null && $orderData['product_price'][$i] != null) {
                        $orderDetail = new OrderProduct();
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $orderData['product_id'][$i];
                        $orderDetail->quantity = $orderData['product_quantity'][$i];
                        $orderDetail->price = $orderData['product_price'][$i];
                        $orderDetail->save();

                        $productQuantity = Product::find($orderData['product_id'][$i]);
                        $productQuantity->quantity -= $orderData['product_quantity'][$i];
                        $productQuantity->save();
                    }
                }
            }

            // Xóa thông tin đơn hàng tạm thời
            DB::table('pending_orders')->where('id', $pendingOrder->id)->delete();

            $userEmail = User::find($orderData['user_id']);
            Mail::to($userEmail->email)->send(new OrderShippedMail($order));

            return response()->json([
                'success' => true,
                'message' => "Thanh toán thành công, cảm ơn bạn vì đã mua hàng.",
                'url' => $url
            ]);
        }
        $url = '/checkout';
        return response()->json([
            'success' => false,
            'message' => "Lỗi trong quá trình thanh toán dịch vụ",
            'url' => $url
        ]);
    }

    public function getAddressId($userId)
    {
        return Address::where('user_id', $userId)->where('is_default', 1)->first();
    }
}
