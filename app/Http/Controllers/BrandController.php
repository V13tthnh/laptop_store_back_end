<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreUpdateBrandRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
class BrandController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:thêm thương hiệu|sửa thương hiệu|xóa thương hiệu', only: ['index', 'store']),
            new Middleware(middleware: 'permission:thêm thương hiệu', only: ['create', 'store']),
            new Middleware(middleware: 'permission:sửa thương hiệu', only: ['edit', 'update']),
            new Middleware(middleware: 'permission:xóa thương hiệu', only: ['destroy']),
        ];
    }
    public function index()
    {
        return view('brand.index');
    }

    public function dataTable()
    {
        $brands = Brand::orderByDesc('id')->get();
        return Datatables::of($brands)->make(true);
    }

    public function import()
    {

    }

    public function store(StoreUpdateBrandRequest $request)
    {
        $brand = new Brand();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file->hashName();
            $path = $file->store('uploads/brands');
            $brand->logo = $path;
        }
        $brand->name = $request->name;
        $brand->status = $request->status || 1;
        $brand->save();

        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công!"
        ]);
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        return response()->json([
            'success' => 200,
            'data' => $brand
        ]);
    }

    public function update(StoreUpdateBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::delete($brand->logo);
            }
            $file = $request->file('logo');
            $file->hashName();
            $path = $file->store('uploads/brands');
            $brand->logo = $path;
        }

        $brand->name = $request->name;
        $brand->status = $request->status || 1;
        $brand->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }
}

