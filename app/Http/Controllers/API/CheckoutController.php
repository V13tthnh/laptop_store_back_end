<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\OrderShippedMail;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCouponUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function onlineCheckout(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:3000/vnp/callback";
        // $vnp_TmnCode = "S6RMUB02";
        // $vnp_HashSecret = "3R1YUK6L2EVEHT36KDR7S5K25OTXI7M9";
        $vnp_TmnCode = "QERWMOSW";
        $vnp_HashSecret = "DVJDFKGRXPFYANWAXWPFIXJCIVQXPSEX";

        $addressId = $this->getAddressId($request->user_id);
        if ($addressId == null) {
            return response()->json([
                'status' => false,
                'message' => "Bạn chưa có địa chỉ, vui lòng thêm địa chỉ mới"
            ], 402);
        }

        $vnp_TxnRef = rand(0, 9999);
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // $vnp_ExpireDate = date('YmdHis', strtotime('+15 minutes'));

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
            //"vnp_ExpireDate" => $vnp_ExpireDate
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
                $today = Carbon::today();
                $orderData = json_decode($pendingOrder->order_data, true);

                if (!empty($orderData['coupon_code'])) {
                    $coupon = Coupon::where('code', $orderData['coupon_code'])
                        ->where('status', 1)
                        ->whereDate('start_date', '<=', $today)
                        ->whereDate('end_date', '>=', $today)
                        ->first();


                    if ($coupon) {
                        $usageCount = UserCouponUsage::where('user_id', $orderData['user_id'])
                            ->where('coupon_id', $coupon->id)
                            ->count();

                        if ($usageCount < $coupon->usage_limit) {
                            $userUsage = new UserCouponUsage;
                            $userUsage->user_id = $orderData['user_id'];
                            ;
                            $userUsage->coupon_id = $coupon->id;
                            $userUsage->save();
                        }
                    }
                }

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
                'order_id' => $order->id,
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

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        echo ($result);
        $jsonResult = json_decode($result, true);
        if ($jsonResult['payUrl'] != null)
            header('Location: ' . $jsonResult['payUrl']);
        return $result;
    }

    public function momoCheckout(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "http://localhost:3000/momo/callback";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";

        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there

        return response()->json($jsonResult);
    }

}
