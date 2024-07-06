<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermissionRequest extends FormRequest
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
                'unique:permissions,name,' . $this->id . ',id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vui lòng nhập tên quyền!",
            'name.min' => "Tên quyền chứa ít nhất :min ký tự!",
            'name.max' => "Tên quyền chứa tối đa :max ký tự!",
            'name.unique' => "Tên quyền đã tồn tại!",
        ];
    }
}
