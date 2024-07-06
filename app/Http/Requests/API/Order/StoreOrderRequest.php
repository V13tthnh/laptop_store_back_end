<?php

namespace App\Http\Requests\API\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' =>  ['required', 'string', 'max:255'],
            'phone' => 'required|string|max:15|regex:/^\+?[0-9]{10,15}$/',

            'total' => 'required',

            'formality' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string' => 'Tên phải là chuỗi ký tự.',
            'name.max' => 'Tên không được dài quá 255 ký tự.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được dài quá 15 ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',





            'subtotal.required' => 'Không có hàng trong giỏ.',
            'subtotal.number' => 'Tổng tạm tính không hợp lệ.',

            'formality.required' => 'Vui lòng chọn hình thức thanh toán.',
        ];
    }
}