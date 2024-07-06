<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Ward;

class AddressController extends Controller
{
    public function index()
    {
        $users = User::all();
        $provinces = Province::get();

        return view('address.index', compact('provinces', 'users'));
    }

    public function dataTable()
    {
        $addresses = Address::orderByDesc('id')->get();
        return DataTables::of($addresses)->make(true);
    }


    public function store(StoreUpdateAddressRequest $request)
    {
        //dd($request);
        $address = new Address();
        $address->full_name = $request->full_name;
        $address->phone = $request->phone;
        $address->district = $request->district;
        $address->ward = $request->ward;
        $address->provinces = $request->provinces;
        $address->is_default = $request->is_default;
        $address->address_detail = $request->address_detail;
        $address->user_id = $request->user_id;
        $address->save();

        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công!"
        ]);
    }

    public function edit(string $id)
    {
        $address = Address::findOrFail($id);

        if ($address == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        return response()->json([
            'success' => 200,
            'data' => $address
        ]);
    }

    public function update(StoreUpdateAddressRequest $request, string $id)
    {
        $address = Address::find($id);

        if ($address == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }

        $address->full_name = $request->full_name;
        $address->phone = $request->phone;
        $address->district = $request->district;
        $address->ward = $request->ward;
        $address->provinces = $request->provinces;
        $address->is_default = $request->is_default;
        $address->address_detail = $request->address_detail;
        $address->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function destroy(string $id)
    {
        $address = Address::find($id);
        $address->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }
}
