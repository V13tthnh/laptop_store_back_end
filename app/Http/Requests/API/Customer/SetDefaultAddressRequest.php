<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class SetDefaultAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'is_default' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'is_default.required' => 'Đã có lỗi xảy ra.',
        ];
    }
}
