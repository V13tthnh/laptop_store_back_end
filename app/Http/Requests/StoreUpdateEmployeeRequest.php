<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmployeeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:users,email,'.$this->id.',id'
            ],
            'gender' => 'required',
            'password' => 'nullable|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u',
            'birthday' => 'required',
            'phone' => 'required|string|max:15|regex:/^\+?[0-9]{10,15}$/',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(){
        return [
            'full_name.required' => 'Tên là bắt buộc',
            'full_name.string' => 'Tên phải là chuỗi ký tự',
            'full_name.max' => 'Tên không được dài quá 255 ký tự',

            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',

            'gender.required' => 'Giới tính là bắt buộc',

            'password.required' => 'Mật khẩu là bắt buộc',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.regex' => "Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt",

            'birthday.required' => 'Ngày sinh là bắt buộc',

            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự',
            'phone.max' => 'Số điện thoại không được dài quá 15 ký tự',
            'phone.regex' => 'Số điện thoại không hợp lệ',

            'avatar.image' => 'Ảnh đại diện phải là một file ảnh',
            'avatar.mimes' => 'Ảnh đại diện phải có định dạng jpeg, png, jpg, gif',
            'avatar.max' => 'Ảnh đại diện không được lớn hơn 2048 KB'
        ];
    }
}
