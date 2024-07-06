<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Review\StoreReviewRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class ReviewController extends Controller
{

    public function getTotalReviewOfProduct(Request $request)
    {
        try {
            $totalReviews = Review::where('product_id', $request->product_id)->where('status', 1)->count();

            return response()->json([
                'status' => true,
                'data' => $totalReviews
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function fetchPreviewOfProduct(Request $request)
    {
        try {
            $reviews = Review::with('user', 'product')->where('product_id', $request->product_id)->where('status', 1)->orderByDesc('id')->get();
            $ratingsCount = Review::select('rating', DB::raw('COUNT(*) as count'))
                ->where('product_id', $request->product_id)
                ->where('status', 1)
                ->groupBy('rating')
                ->pluck('count', 'rating')
                ->toArray();
            return response()->json([
                'status' => true,
                'data' => $reviews,
                'rating_counter' => $ratingsCount,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function store(StoreReviewRequest $request)
    {
        try {
            $review = new Review;
            $review->user_id = $request->user_id;
            $review->product_id = $request->product_id;
            $review->comment = $request->comment;
            $review->rating = $request->rating;
            $review->status = 0;
            $review->save();

            return response()->json([
                'status' => true,
                'message' => "Đánh giá sản phẩm thành công."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
