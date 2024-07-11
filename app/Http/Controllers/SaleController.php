<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SaleController extends Controller
{
    public function index(){
        return view('discount.index');
    }
    public function dataTable()
    {
        $discounts = Discount::orderByDesc('id')->get();
        return Datatables::of($discounts)->make(true);
    }

    public function create(){
        return view('discount.create');
    }

    public function store(Request $request)
    {
        $Discount = new Discount();
        $Discount->code = $request->code;
        $Discount->value = $request->value;
        $Discount->minimum_spend = $request->minimum_spend;
        $Discount->start_date = $request->start_date;
        $Discount->end_date = $request->end_date;
        $Discount->description = $request->description;
        $Discount->type = $request->type;
        $Discount->status = 1;
        $Discount->save();

        return response()->json([
            'status' => 200,
            'message' => "Thêm thành công."
        ]);
    }

    public function edit(string $id)
    {
        $Discount = Discount::findOrFail($id);

        if ($Discount == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        return response()->json([
            'success' => 200,
            'data' => $Discount
        ]);
    }

    public function update(StoreUpdateDiscountRequest $request, string $id)
    {
        $Discount = Discount::find($id);
        $Discount->code = $request->code;
        $Discount->value = $request->value;
        $Discount->minimum_spend = $request->minimum_spend;
        $Discount->start_date = $request->start_date;
        $Discount->end_date = $request->end_date;
        $Discount->description = $request->description;
        $Discount->type = $request->type;
        $Discount->status = 1;
        $Discount->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function destroy(string $id)
    {
        $brand = Discount::find($id);
        $brand->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }
}
