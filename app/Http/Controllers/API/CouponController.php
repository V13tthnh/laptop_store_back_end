<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\UserCouponUsage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $couponCode = strtolower($request->code);
        //$coupon = $this->canUserUseCoupon($request->user_id, $couponCode);
        $today = Carbon::today();
        try {
            // UserCouponUsage::create([
            //     'user_id' => $request->user_id,
            //     'coupon_id' => $request->coupon_id
            // ]);

            $coupon = Coupon::whereRaw('LOWER(code) = ?', [$couponCode])
                ->where('status', 1)
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->first();

            if (!$coupon) {
                return response()->json(['status' => false, 'message' => 'Mã giảm giá không hợp lệ.']);
            }

            $usageCount = UserCouponUsage::where('user_id', $request->user_id)
                ->where('coupon_id', $coupon->id)
                ->count();

            if ($usageCount >= $coupon->usage_limit) {
                return response()->json([
                    'status' => false,
                    'message' => 'Bạn đã sử dụng mã giảm giá này đủ số lần cho phép.',
                ]);
            }

            $subtotal = $request->total;
            if ($subtotal < $coupon->minimum_spend) {
                return response()->json(['status' => false, 'message' => 'Đơn hàng chưa đạt điều kiện tối thiểu để áp dụng mã giảm giá.']);
            }

            return response()->json(['status' => true, 'message' => 'Áp dụng mã giảm giá thành công.', 'data' => $coupon], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
    }

    function canUserUseCoupon($userId, $couponCode)
    {
        $today = Carbon::today();
        $coupon = Coupon::whereRaw('LOWER(code) = ?', [$couponCode])
            ->where('status', 1)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->first();

        if (!$coupon) {
            throw new Exception('Mã coupon không hợp lệ.');
        }

        $usage = UserCouponUsage::where('user_id', $userId)
            ->where('coupon_id', $coupon->id)
            ->first();

        if ($usage) {
            throw new Exception('Bạn đã sử dụng mã coupon này rồi.');
        }

        $usageCount = UserCouponUsage::where('coupon_id', $coupon->id)->count();
        if ($coupon->usage_limit && $usageCount >= $coupon->usage_limit) {
            throw new Exception('Mã coupon này đã đạt đến giới hạn sử dụng.');
        }

        return $coupon;
    }

    public function getAvailableCoupons(Request $request)
    {
        try {
            $today = Carbon::today();
            $userId = $request->user_id;

            $coupons = Coupon::where('minimum_spend', '<=', $request->total)
                ->where('status', 1)
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->get();


            $availableCoupons = $coupons->filter(function ($coupon) use ($userId) {
                $usageCount = UserCouponUsage::where('user_id', $userId)
                    ->where('coupon_id', $coupon->id)
                    ->count();

                return $usageCount < $coupon->usage_limit;
            });

            return response()->json(['success' => true, 'data' => $availableCoupons], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'
            ], 500);
        }
    }
}
