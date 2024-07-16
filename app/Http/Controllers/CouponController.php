<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCouponRequest;
use App\Models\Coupon;
use App\Models\Discount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\DataTables;

class CouponController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:thêm khuyến mãi|sửa khuyến mãi|xóa khuyến mãi', only: ['index', 'store']),
            new Middleware(middleware: 'permission:thêm khuyến mãi', only: ['create', 'store']),
            new Middleware(middleware: 'permission:sửa khuyến mãi', only: ['edit', 'update']),
            new Middleware(middleware: 'permission:xóa khuyến mãi', only: ['destroy']),
        ];
    }

    public function index()
    {
        return view('discount.index');
    }

    public function dataTable()
    {
        $coupons = Coupon::orderByDesc('id')->get();
        return Datatables::of($coupons)->make(true);
    }

    public function store(StoreUpdateCouponRequest $request)
    {
        try {
            $startDate = $this->formatDate($request->start_date);
            $endDate = $this->formatDate($request->end_date);

            $coupon = new Coupon;
            $coupon->code = $request->code;
            $coupon->value = $request->value;
            $coupon->minimum_spend = $request->minimum_spend;
            $coupon->start_date = $startDate;
            $coupon->end_date = $endDate;
            $coupon->description = $request->description;
            $coupon->type = $request->type;
            $coupon->usage_limit = $request->usage_limit;
            $coupon->status = 1;
            $coupon->save();

            return response()->json([
                'success' => 200,
                'message' => "Thêm thành công."
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Có lỗi xảy ra, vui lòng thử lại sau.',
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);

        if ($coupon == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        return response()->json([
            'success' => 200,
            'data' => $coupon
        ]);
    }

    public function update(StoreUpdateCouponRequest $request, string $id)
    {
        try {
            $startDate = $this->formatDate($request->start_date);
            $endDate = $this->formatDate($request->end_date);

            $coupon = Coupon::find($request->id);
            $coupon->code = $request->code;
            $coupon->value = $request->value;
            $coupon->minimum_spend = $request->minimum_spend;
            $coupon->start_date = $startDate;
            $coupon->end_date = $endDate;
            $coupon->description = $request->description;
            $coupon->type = $request->type;
            $coupon->usage_limit = $request->usage_limit;
            $coupon->status = 1;
            $coupon->save();

            return response()->json([
                'success' => 200,
                'message' => "Cập nhật thành công!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Invalid date format.',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $brand = Coupon::find($id);
        $brand->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }

    private function formatDate($dateString)
    {
        $formats = ['d/m/Y', 'Y-m-d', 'd-m-Y'];
        foreach ($formats as $format) {
            try {
                $date = Carbon::createFromFormat($format, $dateString);

                if ($date && $date->format($format) === $dateString) {
                    return $date->format('Y-m-d');
                }
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
