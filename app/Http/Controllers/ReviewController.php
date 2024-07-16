<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    public function index()
    {   
        return view('review.index');
    }

    public function dataTable()
    {
        $categories = Review::with(['product', 'user', 'product.images'])->orderByDesc('id')->get();

        return Datatables::of($categories)->addColumn('product_name', function ($row) {
            return $row->product->name;
        })->addColumn('user_name', function ($row) {
            return $row->user->full_name;
        })->addColumn('product_image', function ($row) {
            $image = $row->product->images->first();
            return $image ? '<img src="/' . $image->url . '" alt="' . $row->product->name . '" width="50">' : 'Không có hình ảnh';
        })->rawColumns(['product_image'])->make(true);
    }

    public function update($id)
    {
        $review = Review::find($id);
        if (empty($review)) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy dữ liệu đánh giá!'
            ]);
        }
        $review->status = $review->status === 1 ? 0 : 1;
        $review->save();

        $totalStars = Review::where('product_id', $review->product_id)->where('status', 1)->sum('rating');
        $totalReviews = Review::where('product_id', $review->product_id)->count();
        $averageRating = ($totalReviews > 0) ? ($totalStars / $totalReviews) : 0;

        $setOverrate = Product::find($review->product_id);
        $setOverrate->overrate = number_format($averageRating, 1);
        $setOverrate->save();

        return response()->json([
            'status' => true,
            'message' => "Đã cập nhật trạng thái đánh giá."
        ]);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $productId = $review->product_id;

        $review->delete();

        $product = Product::findOrFail($productId);
        $averageRating = $product->reviews()->where('status', 1)->avg('rating') ?? 0;
        $product->overrate = $averageRating;
        $product->save();

        return response()->json([
            'status' => true,
            'message' => "Đã cập nhật trạng thái đánh giá."
        ]);
    }
}
