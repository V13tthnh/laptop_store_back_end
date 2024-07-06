<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoryRequest extends FormRequest
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
                'unique:categories,name,' . $this->id . ',id',
            ],

            'slug' =>  [
                'required',
                'min:2',
                'max:50',
                'unique:categories,name,' . $this->id . ',id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vui lòng nhập tên!",
            'name.min' => "Tên danh mục ít nhất :min ký tự!",
            'name.max' => "Tên danh mục tối đa :max ký tự!",
            'name.unique' => "Tên danh mục đã tồn tại!",

            'slug.required' => "Vui lòng nhập slug!",
            'slug.min' => "Slug chứa ít nhất :min ký tự!",
            'slug.max' => "Slug chứa tối đa :max ký tự!",
            'slug.unique' => "Slug danh mục đã tồn tại!",
        ];
    }
}
