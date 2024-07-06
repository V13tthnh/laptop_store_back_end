<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileCustomerRequest extends FormRequest
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
                'unique:users,email,' . $this->id . ',id'
            ],
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => 'required|string|max:15|regex:/^\+?[0-9]{10,15}$/',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Vui lòng nhập tên.',
            'full_name.string' => 'Tên phải là chuỗi ký tự.',
            'full_name.max' => 'Tên không được dài quá 255 ký tự.',

            'email.required' => 'Vui lòng nhập Email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',

            'gender.required' => 'Vui lòng chọn giới tính .',

            'birthday.required' => 'Vui lòng chọn Ngày sinh.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được dài quá 15 ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
        ];
    }
}
