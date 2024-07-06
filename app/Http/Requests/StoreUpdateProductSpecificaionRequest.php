<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductSpecificaionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2',
                'max:150',
                'unique:product_specifications,name,' . $this->id . ',id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vui lòng nhập tên!",
            'name.min' => "Tên ít nhất :min ký tự!",
            'name.max' => "Tên tối đa :max ký tự!",
            'name.unique' => "Tên đã tồn tại!",
        ];
    }
}
