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
            'password' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u'],
            'new_password' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])/u', 'different:password'],
            'new_password_confirmation' => 'required|same:new_password',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Vui lòng nhập mât khẩu.',
            'password.regex' => "Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.",
            'password.min' => "Độ dài tối thiểu :min ký tự.",

            'new_password.required' => "Vui lòng nhập mât khẩu mới.",
            'new_password.min' => "Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.",
            'new_password.regex' => "Độ dài tối thiểu :min ký tự.",
            'new_password.different' => "Mật khẩu mới không được trùng với mật khẩu cũ.",

            'new_password_confirmation.required' => "Vui lòng nhập xác nhận mât khẩu.",
            'new_password_confirmation.same' => "Xác nhận mật khẩu mới không trùng khớp.",
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!Hash::check($this->password, auth()->user()->password)) {
                $validator->errors()->add('password', 'Mật khẩu hiện tại không đúng.');
            }
        });
    }
}
