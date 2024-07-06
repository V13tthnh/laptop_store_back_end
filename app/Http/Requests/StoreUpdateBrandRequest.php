<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBrandRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên là bắt buộc',
            'name.string' => 'Tên phải là chuỗi ký tự',
            'name.max' => 'Tên không được dài quá 255 ký tự',

            'logo.image' => 'Ảnh đại diện phải là một file ảnh',
            'logo.mimes' => 'Ảnh đại diện phải có định dạng jpeg, png, jpg, gif',
            'logo.max' => 'Ảnh đại diện không được lớn hơn 2048 KB'
        ];
    }
}
