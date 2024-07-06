<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
                'unique:products,name,' . $this->id . ',id',
            ],
            'SKU' => [
                'required',
                'string',
                'unique:products,name,' . $this->id . ',id',
            ],
            'slug' =>  [
                'required',
                'min:2',
                'max:150',
                'unique:products,name,' . $this->id . ',id',
            ],
            'description' => 'required|min:15',
            'brand_id' => 'required|integer|not_in:0',
            'category_id' => 'required|integer|not_in:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vui lòng nhập tên!",
            'name.min' => "Tên sản phẩm ít nhất :min ký tự!",
            'name.max' => "Tên sản phẩm tối đa :max ký tự!",
            'name.unique' => "Tên sản phẩm đã tồn tại!",

            'slug.required' => "Vui lòng nhập slug!",
            'slug.min' => "Slug chứa ít nhất :min ký tự!",
            'slug.max' => "Slug chứa tối đa :max ký tự!",
            'slug.unique' => "Slug danh mục đã tồn tại!",

            'SKU.required' => "Vui lòng nhập slug!",
            'SKU.max' => "SKU chứa tối đa :max ký tự!",
            'SKU.unique' => "SKU đã tồn tại!",

            'description.required' => "Vui lòng nhập mô tả!",
            'description.min' => "Mô tả ít nhất :min ký tự!",

            'category_id.required' => "Vui lòng chọn danh mục!",
            'category_id.integer' => "Vui lòng chọn danh mục hợp lệ!",

            'brand_id.required' => "Vui lòng chọn nhà cung cấp!",
            'brand_id.integer' => "Vui lòng chọn nhà cung cấp hợp lệ!",
        ];
    }
}
