<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCouponRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|max:36|min:6',
            'value' => 'required|numeric|min:0',
            'minimum_spend' => 'required|numeric',
            'start_date' => 'required',
            'type' => 'required|integer|in:1,2,3',
            'end_date' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => "Đây là trường bắt buộc.",
            'code.max' => "Mã giảm giá tối đa :max ký tự.",
            'code.min' => "Mã giảm giá tối thiểu :min ký tự.",

            'value.required' => "Đây là trường bắt buộc.",
            'value.numeric' => "Mã giảm là kiểu số.",

            'minimum_spend.required' => "Đây là trường bắt buộc.",
            'minimum_spend.numeric' => "Giá trị tối thiểu là kiểu số.",

            'start_date.required' => "Vui lòng nhập ngày bắt đầu!",

            'end_date.required' => "Vui lòng nhập ngày bắt đầu!",

            'type.required' => 'Vui lòng chọn loại giảm giá.',
            'type.integer' => 'Loại giảm giá phải là một số nguyên.',
            'type.in' => 'Loại giảm giá không hợp lệ.',

            'value.min' => 'Giá trị giảm giá không được nhỏ hơn 0.',
            'value.max' => 'Giá trị giảm giá theo phần trăm không được vượt quá 100.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('value', 'max:100', function ($input) {
            return $input->type == 1;
        });
    }
}
