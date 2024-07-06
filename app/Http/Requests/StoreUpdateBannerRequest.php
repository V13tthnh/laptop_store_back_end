<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:8|max:150',
            'link' => 'required|min:8|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.min' => 'Tiêu đề ít nhất :min ký tự.',
            'name.max' => 'Tiêu đề tối đa :max ký tự.',

            'link.required' => 'Đường dẫn là bắt buộc.',
            'link.min' => 'Đường ít nhất :min ký tự.',
            'link.max' => 'Đường dẫn tối đa :max ký tự.',
        ];
    }
}
