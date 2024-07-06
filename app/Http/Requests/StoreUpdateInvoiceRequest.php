<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateInvoiceRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id' => 'required|integer|not_in:0',
            'formality' => 'required|string',
            'quantity' => 'required|array',
            'quantity.*' => 'numeric|min:1',
            'product_id' => 'required|array',
            'product_id.*' => 'numeric|min:1',
            'cost_price' => 'required|array',
            'cost_price.*' => 'numeric|min:10000',
            'profit' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_id.required' => "Vui lòng nhập nhà cung cấp.",
            'supplier_id.integer' => "Vui lòng chọn nhà cung cấp hợp lệ.",
            'supplier_id.not_in' => "Vui lòng chọn nhà cung cấp hợp lệ.",

            'formality.required' => "Vui lòng chọn hình thức thanh toán.",
            'formality.string' => "Vui lòng chọn hình thức thanh toán hợp lệ.",

            'product_id.required' => "Vui lòng chọn sản phẩm hợp lệ.",
            'product_id.*.numeric' => "Vui lòng chọn sản phẩm hợp lệ.",
            'product_id.*.min' => "Vui lòng chọn sản phẩm hợp lệ.",

            'quantity.required' => "Vui lòng chọn số lượng nhập.",
            'quantity.*.numeric'=> "Số lượng phải là kiểu số nguyên.",
            'quantity.*.min' => "Số lượng nhập tối thiểu là :min.",

            'cost_price.required' => "Vui lòng chọn giá nhập.",
            'cost_price.*.numeric' => "Giá trị nhập phải là kiểu số.",
            'cost_price.*.min' => "Giá trị nhập tối thiểu :min.",

            'profit.required' => "Vui lòng nhập mức lợi nhuận.",
            
        ];
    }
}
