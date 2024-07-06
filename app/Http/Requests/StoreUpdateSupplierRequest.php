<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:users,email,'.$this->id.',id'
            ],
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|regex:/^\+?[0-9]{10,15}$/',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên là bắt buộc',
            'name.string' => 'Tên phải là chuỗi ký tự',
            'name.max' => 'Tên không được dài quá 255 ký tự',

            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',

            'address.required' => 'Địa chỉ là bắt buộc',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự',
            'address.max' => 'Địa chỉ không được dài quá 255 ký tự',

            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự',
            'phone.max' => 'Số điện thoại không được dài quá 15 ký tự',
            'phone.regex' => 'Số điện thoại không hợp lệ',

            'logo.image' => 'Ảnh đại diện phải là một file ảnh',
            'logo.mimes' => 'Ảnh đại diện phải có định dạng jpeg, png, jpg, gif',
            'logo.max' => 'Ảnh đại diện không được lớn hơn 2048 KB'
        ];
    }
}
