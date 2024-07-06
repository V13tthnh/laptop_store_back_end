<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAddressRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|regex:/^\+?[0-9]{10,15}$/',
            'district' => 'required|string|not_in:0',
            'ward' => 'required|string|not_in:0',
            'provinces' => 'required|string|not_in:0',
            'address_detail' => 'required|string',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Tên là bắt buộc',
            'full_name.string' => 'Tên phải là chuỗi ký tự',
            'full_name.max' => 'Tên không được dài quá 255 ký tự',

            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone.string' => 'Số điện thoại là một chuỗi ký tự',
            'phone.max' => 'Số điện thoại không được dài quá 15 ký tự',
            'phone.regex' => 'Số điện thoại không hợp lệ',

            'district.required' => 'Vui lòng chọn Quận, Huyện.',
            'district.not_in' => 'Vui lòng chọn Quận, Huyện.',
            'district.string' => 'Huyện là một chuỗi ký tự.',

            'ward.required' => 'Vui lòng chọn Xã, Phường.',
            'ward.not_in' => 'Vui lòng chọn Xã, Phường.',
            'ward.string' => 'Phường là một chuỗi ký tự.',

            'provinces.required' => 'Vui lòng chọn Tỉnh, Thành Phố.',
            'provinces.not_in' => 'Vui lòng chọn Tỉnh, Thành Phố.',
            'provinces.string' => 'Tỉnh là một chuỗi ký tự.',

            'address_detail.required' => 'Vui lòng ghi địa chỉ chiết (số nhà, tên đường...).',
            'address_detail.string' => 'Địa chỉ là một chuỗi ký tự.',

            'user_id.required' => 'Người dùng không hợp lệ.',
        ];
    }
}
