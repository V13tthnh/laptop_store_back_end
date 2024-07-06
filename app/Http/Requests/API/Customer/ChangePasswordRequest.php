<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'new_password' => 'required|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u|min:8|different:password',
            'new_password_confirmation' => 'required|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u|same:new_password|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'new_password.required' => 'Vui lòng nhập mât khẩu mới',
            'new_password.string' => 'Mật khẩu phải là chuỗi ký tự',
            'new_password.min' => 'Mật khẩu ít nhất :min ký tự',
            'new_password.regex' => "Mật khẩu bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.",
            'new_password.different' => "Mật khẩu mới không được trùng với mật khẩu cũ.",

            'new_password_confirmation.required' => 'Vui lòng nhập xác nhận mât khẩu mới',
            'new_password_confirmation.string' => 'Mật khẩu phải là chuỗi ký tự',
            'new_password_confirmation.min' => 'Mật khẩu ít nhất :min ký tự',
            'new_password_confirmation.regex' => "Mật khẩu bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.",
            'new_password_confirmation.same' => "Mật khẩu xác nhận không trùng khớp.",
        ];
    }
}