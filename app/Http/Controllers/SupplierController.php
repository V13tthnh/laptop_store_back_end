<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreUpdateSupplierRequest;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index');
    }

    public function dataTable()
    {
        $suppliers = Supplier::orderByDesc('id')->get();
        return Datatables::of($suppliers)->make(true);
    }

    public function import()
    {

    }

    public function store(StoreUpdateSupplierRequest $request)
    {
        $supplier = new Supplier();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file->hashName();
            $path = $file->store('uploads/suppliers');
            $supplier->logo = $path;
        }
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công!"
        ]);
    }

    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        if ($supplier == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $supplier
        ]);
    }

    public function update(StoreUpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::find($id);

        if ($supplier == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        if ($request->hasFile('logo')) {
            if ($supplier->logo) {
                Storage::delete($supplier->logo);
            }
            $file = $request->file('logo');
            $file->hashName();
            $path = $file->store('uploads/suppliers');
            $supplier->logo = $path;
        }

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }
}
