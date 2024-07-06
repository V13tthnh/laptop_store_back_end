<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\AddAddressRequest;
use App\Http\Requests\API\Customer\SetDefaultAddressRequest;
use App\Models\Address;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Ward;

class AddressController extends Controller
{
    public function getAllAddress($id)
    {
        try {
            $addresses =  $addresses = Address::orderBy('is_default', 'desc')->get();
            return response()->json([
                'status' => true,
                'data' => $addresses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getAllAddressNotDefault($id)
    {
        try {
            $addresses = Address::where('user_id', $id)->where('is_default', 0)->orderByDesc('id')->get();
            return response()->json([
                'status' => true,
                'data' => $addresses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }



    public function getProvinces()
    {
        try {
            $provinces = Province::get();
            return response()->json([
                'status' => true,
                'data' => $provinces
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getDistrictsByProvinceId($id)
    {
        try {
            $provinces = Province::find($id);
            $districts = $provinces->districts;
            return response()->json([
                'status' => true,
                'data' => $districts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getWardsByDistrictsId($id)
    {
        try {
            $districts = District::find($id);
            $wards = $districts->wards;
            return response()->json([
                'status' => true,
                'data' => $wards
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function getDistricts()
    {
        try {
            $addresses = Address::all();
            return response()->json([
                'status' => true,
                'data' => $addresses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getWards()
    {
        try {
            $addresses = Address::all();
            return response()->json([
                'status' => true,
                'data' => $addresses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function store(AddAddressRequest $request)
    {
        try {
            $province = Province::find($request->provinces);
            $district = District::find($request->district);
            $ward = Ward::find($request->ward);
            Address::create(
                [
                    'full_name' => $request->full_name,
                    'phone' => $request->phone,
                    'district' => $district->name,
                    'ward' => $ward->name,
                    'provinces' => $province->name,
                    'address_detail' => $request->address_detail,
                    'user_id' => $request->user_id,
                    'is_default' => 0,
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Thêm thành công.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(AddAddressRequest $request)
    {
        $province = Province::find($request->provinces);
        $district = District::find($request->district);
        $ward = Ward::find($request->ward);
        try {
            $address = Address::find($request->id);
            $address->full_name = $request->full_name;
            $address->phone = $request->phone;
            $address->district = $district->name;
            $address->ward = $ward->name;
            $address->provinces =  $province->name;
            $address->address_detail = $request->address_detail;
            $address->user_id = $request->user_id;
            $address->save();

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function setDefault(Request $request, $id)
    {
        try {
            Address::where('user_id',  $id)->update(['is_default' => 0]);

            $address = Address::find($request->id);
            $address->is_default = 1;
            $address->save();

            return response()->json([
                'status' => true,
                'message' => 'Đã đặt làm mặc định.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            Address::find($id)->delete();
            return response()->json([
                'status' => false,
                'message' => "Đã xóa địa chỉ."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getDefaultAddress($id){
        try {
            $defaultAddress = Address::where('user_id', $id)->where('is_default', 1)->first();
            return response()->json([
                'status' => false,
                'data' => $defaultAddress
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
