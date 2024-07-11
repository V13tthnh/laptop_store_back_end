<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'new_password' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u', 'different:password'],
            'new_password_confirmation' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u', 'same:new_password'],
        ];
    }

    public function messages(): array
    {
        return [
            'new_password.required' => 'Vui lòng nhập mât khẩu.',
            'new_password.regex' => "Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.",
            'new_password.min' => "Độ dài tối thiểu 6 ký tự.",

            'new_password_confirmation.required' => "Vui lòng nhập mât khẩu mới.",
            'new_password_confirmation.min' => "Độ dài tối thiểu 6 ký tự.",
            'new_password_confirmation.regex' => "Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.",
            'new_password_confirmation.same' => "Mật khẩu xác nhận không đúng.",
        ];
    }
}
