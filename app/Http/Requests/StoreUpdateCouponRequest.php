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
            'end_date' => 'required|after:start_date',
            'usage_limit' => 'nullable|integer|min:1|max:10',
            'type' => 'required|integer|in:1,2,3',
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

            'end_date.required' => "Vui lòng nhập ngày kết thúc!",
            'end_date.after' => "Ngày kết thúc phải sau ngày bắt đầu.",

            'type.required' => 'Vui lòng chọn loại giảm giá.',
            'type.integer' => 'Loại giảm giá phải là một số nguyên.',
            'type.in' => 'Loại giảm giá không hợp lệ.',

            'value.min' => 'Giá trị giảm giá không được nhỏ hơn 0.',
            'value.max' => 'Giá trị giảm giá theo phần trăm không được vượt quá 100.',

            'usage_limit.max' => "Số lần sử dụng tối đa là :max lần.",
            'usage_limit.min' => "Số lần sử dụng tối đa phải ít nhất là 1 lần.",
            'usage_limit.integer' => "Số lần sử dụng tối đa phải là số nguyên."
        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('value', 'max:100', function ($input) {
            return $input->type == 1;
        });
    }
}
