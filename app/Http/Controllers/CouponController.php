<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCouponRequest;
use App\Models\Coupon;
use App\Models\Discount;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{

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
        $coupon = new Coupon;
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->minimum_spend = $request->minimum_spend;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->description = $request->description;
        $coupon->type = $request->type;
        $coupon->status = 1;
        $coupon->save();

        return response()->json([
            'status' => 200,
            'message' => "Thêm thành công."
        ]);
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
        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->minimum_spend = $request->minimum_spend;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->description = $request->description;
        $coupon->type = $request->type;
        $coupon->status = 1;
        $coupon->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
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
}
