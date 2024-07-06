<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u'],

        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không hợp lệ',

            'password.required' => 'Mât khẩu không được bỏ trống',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.regex' => "Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt",
        ];
    }
}
