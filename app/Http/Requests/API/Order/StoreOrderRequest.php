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

            'subtotal.required' => 'Không có hàng trong giỏ.',
            'subtotal.number' => 'Tổng tạm tính không hợp lệ.',

            'formality.required' => 'Vui lòng chọn hình thức thanh toán.',
        ];
    }
}
