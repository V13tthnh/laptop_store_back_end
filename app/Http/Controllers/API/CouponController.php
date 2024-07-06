<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function getAllCoupons()
    {
        $coupons = Coupon::all();

        return response()->json([
            'status' => true,
            'data' => $coupons
        ]);
    }

    public function applyCoupon(Request $request)
    {
        try {
            $coupon = Coupon::where('code', $request->code)->get();

            if (!$coupon) {
                return response()->json(['status' => false, 'message' => 'Mã giảm giá không hợp lệ.']);
            }

            return response()->json(['status' => true, 'message' => 'Áp dụng mã giảm giá thành công.', 'data' => $coupon], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'message' => 'Có lỗi xảy ra vui lòng thử lại sau.'
            ], 500);
        }

    }

    public function getAvailableCoupons(Request $request)
    {
        try {
            $coupons = Coupon::where('minimum_spend', '<=', $request->total)->get();

            return response()->json(['success' => true, 'data' => $coupons], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'message' => 'Có lỗi xảy ra vui lòng thử lại sau.'
            ], 500);
        }

    }
}
