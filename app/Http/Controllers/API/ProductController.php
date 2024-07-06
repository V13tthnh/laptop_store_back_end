<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function fetchAllProductData()
    {
        try {
            $products = Product::with(['images', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])->get();

            return response()->json([
                'status' => true,
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function getProductBySlug($slug)
    {
        try {
            $product = Product::with(['images', 'category.parent', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])->where('slug', $slug)->first();

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            return response()->json([
                'status' => true,
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $query = Product::query();

            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            }

            $products = $query->get();

            return response()->json([
                'status' => true,
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getRelatedProducts(Request $request)
    {
        try {
            $product = Product::find($request->product_id);

            if (!$product) {
                return response()->json(['message' => 'Không tìm thấy sản phẩm.'], 404);
            }

            $relatedProducts = Product::with(['images', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])->where('brand_id', $product->brand_id)
                ->where('id', '!=', $request->product_id)
                ->get();


            return response()->json([
                'status' => true,
                'data' => $relatedProducts
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        if ($request->has('price_min')) {
            $query->where('unit_price', '>=', $request->input('price_min'));
        }

        if ($request->has('price_max')) {
            $query->where('unit_price', '<=', $request->input('price_max'));
        }

        if ($request->has('brand')) {
            $query->where('brand_id', $request->input('brand'));
        }

        if ($request->has('specifications')) {
            foreach ($request->input('specifications') as $specificationId => $value) {
                $query->whereHas('specifications', function ($q) use ($specificationId, $value) {
                    $q->where('product_specification_id', $specificationId)
                        ->where('value', $value);
                });
            }
        }

        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $query->orderBy('unit_price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('unit_price', 'desc');
                    break;
                default:
                    break;
            }
        }

        $products = $query->get();

        return response()->json($products);
    }
}
