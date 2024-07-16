<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u'],
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Vui lòng nhập tên.',
            'full_name.string' => 'Tên là chuỗi ký tự',
            'full_name.min' => 'Độ dài tối thiểu :min ký tự',
            'full_name.max' => 'Độ dài tối đa :max ký tự',

            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'email.rfc' => 'Email không hợp lệ',
            'email.dns' => 'Email không hợp lệ',

            'password.required' => 'Vui lòng nhập mât khẩu',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự',
            'password.min' => 'Mật khẩu ít nhất :min ký tự',
            'password.regex' => "Mật khẩu bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt",

            'password_confirmation.required' => "Vui lòng nhập xác nhận lại mật khẩu",
            'password_confirmation.same' => "Xác nhận mật khẩu mới không trùng khớp.",
        ];
    }
}
