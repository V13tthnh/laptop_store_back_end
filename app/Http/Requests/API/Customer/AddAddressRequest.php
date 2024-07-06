<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddAddressRequest extends FormRequest
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
            'district' => 'required',
            'ward' => 'required',
            'provinces' => 'required',
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

            'district.required' => 'Vui lòng chọn huyện.',
            'district.string' => 'Huyện là một chuỗi ký tự.',

            'ward.required' => 'Vui lòng chọn phường.',
            'ward.string' => 'Phường là một chuỗi ký tự.',

            'provinces.required' => 'Vui lòng chọn tỉnh.',
            'provinces.string' => 'Tỉnh là một chuỗi ký tự.',

            'address_detail.required' => 'Vui lòng ghi địa chỉ chiết (số nhà, tên đường...).',
            'address_detail.string' => 'Địa chỉ là một chuỗi ký tự.',

            'user_id.required' => 'Người dùng không hợp lệ.',
        ];
    }
}
