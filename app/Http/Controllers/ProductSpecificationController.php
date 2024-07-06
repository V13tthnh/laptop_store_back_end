<?php

namespace App\Http\Controllers;

use App\Models\ProductSpecificationDetail;
use App\Models\Supplier;
use App\Http\Requests\StoreUpdateProductSpecificaionRequest;
use App\Models\ProductSpecification;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductSpecificationController extends Controller
{
    public function index()
    {
        return view('product_specification.index');
    }

    public function dataTable()
    {
        $productSpecifications = ProductSpecification::orderByDesc('id')->get();
        return Datatables::of($productSpecifications)->make(true);
    }

    public function import()
    {

    }

    public function store(StoreUpdateProductSpecificaionRequest $request)
    {

        $productSpecification = new ProductSpecification;
        $productSpecification->name = $request->name;
        $productSpecification->save();

        if($request->has('sp_values')){
            $specification_values = explode(',', $request->sp_values); // Chuyển đổi chuỗi thành mảng
            $specification_values = array_map('strval', $specification_values);

            foreach ($specification_values as $value) {
                ProductSpecificationDetail::create([
                    'product_id' => null,
                    'product_specification_id' => $productSpecification->id,
                    'value' =>  $value,
                ]);
            }
        }
        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công!"
        ]);
    }

    public function edit(string $id)
    {
        $productSpecification = ProductSpecification::with('productSpecificationDetails')->findOrFail($id);

        if ($productSpecification == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $productSpecification
        ]);
    }

    public function update(StoreUpdateProductSpecificaionRequest $request, string $id)
    {
        $productSpecification = ProductSpecification::find($id);

        if ($productSpecification == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        $productSpecification->name = $request->name;
        $productSpecification->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function destroy(string $id)
    {
        $productSpecification = ProductSpecification::find($id);
        $productSpecification->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }
}
