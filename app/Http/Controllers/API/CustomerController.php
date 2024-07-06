<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\ChangePasswordRequest;
use App\Http\Requests\API\Customer\UpdateProfileCustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class CustomerController extends Controller
{
    public function updateProfile(UpdateProfileCustomerRequest $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->full_name = $request->full_name;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->birthday = $request->birthday;
            $user->save();

            return response()->json([
                'sucesss' => true,
                'message' => "Cập nhật thành công"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'sucesss' => false,
                'message' => "Có lỗi xảy ra: " . $e
            ], 500);
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json([
                'sucesss' => true,
                'message' => "Đổi mật khẩu thành công."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'sucesss' => false,
                'message' => "Có lỗi xảy ra: " . $e
            ], 500);
        }

    }

}
