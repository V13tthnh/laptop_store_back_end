<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function onlineCheckout(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:3000/vnp/callback";
        $vnp_TmnCode = "QERWMOSW"; //Mã website tại VNPAY
        $vnp_HashSecret = "DVJDFKGRXPFYANWAXWPFIXJCIVQXPSEX";

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
        
        $vnp_TxnRef = rand(0, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State = $_POST['txt_bill_state'];
        //Invoice
        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
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

            //"vnp_ExpireDate" => $vnp_ExpireDate,
            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            // "vnp_Bill_Email" => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
            // "vnp_Bill_Address" => $vnp_Bill_Address,
            // "vnp_Bill_City" => $vnp_Bill_City,
            // "vnp_Bill_Country" => $vnp_Bill_Country,
            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
            // "vnp_Inv_Email" => $vnp_Inv_Email,
            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
            // "vnp_Inv_Address" => $vnp_Inv_Address,
            // "vnp_Inv_Company" => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            // "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'success' => true,
            'code' => '00',
            'message' => 'Cảm ơn bạn đã mua hàng!',
            'data' => $vnp_Url,
            'total' => $total
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
        $url = '/';
        if ($request->vnp_ResponseCode == "00") {
            $order_id = Order::max('id');
            $order = Order::find($order_id);
            $order->vnp_status = 1;
            $order->save();
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
