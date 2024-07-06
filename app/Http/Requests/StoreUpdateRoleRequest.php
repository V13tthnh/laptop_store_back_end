<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRoleRequest extends FormRequest
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
                'max:50',
                'unique:roles,name,' . $this->id . ',id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vui lòng nhập tên",
            'name.min' => "Tên phải chứa ít nhất :min ký tự",
            'name.max' => "Tên phải chứa tối đa :max ký tự",
            'name.unique' => "Tên đã tồn tại",
        ];
    }
}
