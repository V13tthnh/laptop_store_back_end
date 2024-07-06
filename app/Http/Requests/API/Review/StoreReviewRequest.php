<?php

namespace App\Http\Requests\API\Review;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Người dùng ko hợp lệ.',
            'user_id.exists' => 'Người dùng ko tồn tại.',

            'product_id.required' => 'Sản phẩm không hợp lệ.',
            'product_id.exists' => 'Sản phẩm không tồn tại.',

            'comment.required' => 'Nội dung là bắt buộc.',
            'comment.string' => 'Nội dung là chuỗi ký tự.',
            'comment.max' => 'Độ dài tôi đa của nội dung là :max ký tự.',

            'rating.required' => 'Đánh giá là bắt buộc',
            'rating.integer' => 'Dữ liệu đánh giá không hợp lệ.',
            'rating.min' => 'Đánh giá tối thiểu :min sao',
            'rating.max' => 'Đánh giá tối đa max: sao',
        ];
    }
}
