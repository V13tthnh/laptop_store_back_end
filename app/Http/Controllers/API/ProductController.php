<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function fetchAllProductData()
    {
        try {
            $products = Product::with(['firstImage', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])->get();

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

    public function search($key)
    {
        try {
            $products = Product::with(['firstImage', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])
                ->where('name', 'like', "%$key%")->get();

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

            $relatedProducts = Product::with(['firstImage', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])->where('brand_id', $product->brand_id)
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

    public function getFeaturedProducts(Request $request)
    {
        try {
            $product = Product::with(['firstImage', 'productSpecificationDetails', 'productSpecificationDetails.productSpecification'])->where('featured', 1)->take(10)->get();

            return response()->json([
                'status' => true,
                'data' => $product
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
        //     $query = Product::query();

        //     // Lọc theo RAM
        //     if ($request->filled('ram')) {
        //         $ramValues = $request->ram;
        //         $query->whereHas('productSpecificationDetails', function ($q) use ($ramValues) {
        //             $q->whereHas('productSpecification', function ($q) {
        //                 $q->where('name', 'RAM');
        //             })->where(function ($q) use ($ramValues) {
        //                 foreach ($ramValues as $value) {
        //                     $q->orWhere('value', 'like', '%' . $value . '%');
        //                 }
        //             });
        //         });
        //     }

        //     // Lọc theo CPU
        //     if ($request->filled('cpu')) {
        //         $cpuValues = $request->cpu;
        //         $query->whereHas('productSpecificationDetails', function ($q) use ($cpuValues) {
        //             $q->whereHas('productSpecification', function ($q) {
        //                 $q->where('name', 'Công nghệ CPU');
        //             })->where(function ($q) use ($cpuValues) {
        //                 foreach ($cpuValues as $value) {
        //                     $q->orWhere('value', 'like', '%' . $value . '%');
        //                 }
        //             });
        //         });
        //     }

        //     // Lọc theo thương hiệu
        //     if ($request->filled('brand_id')) {
        //         $query->whereIn('brand_id', $request->brand_id);
        //     }

        //     // Lọc theo ổ cứng
        //     if ($request->filled('hardware')) {
        //         $storageValues = $request->hardware;
        //         $query->whereHas('productSpecificationDetails', function ($q) use ($storageValues) {
        //             $q->whereHas('productSpecification', function ($q) {
        //                 $q->where('name', 'Ổ cứng');
        //             })->where(function ($q) use ($storageValues) {
        //                 foreach ($storageValues as $value) {
        //                     $q->orWhere('value', 'like', '%' . $value . '%');
        //                 }
        //             });
        //         });
        //     }

        //     // Lọc theo màn hình
        //     if ($request->filled('screen')) {
        //         $screenSizeValues = $request->screen;
        //         $query->whereHas('productSpecificationDetails', function ($q) use ($screenSizeValues) {
        //             $q->whereHas('productSpecification', function ($q) {
        //                 $q->where('name', 'Màn hình');
        //             })->where(function ($q) use ($screenSizeValues) {
        //                 foreach ($screenSizeValues as $value) {
        //                     $q->orWhere('value', 'like', '%' . $value . '%');
        //                 }
        //             });
        //         });
        //     }

        //     // Lọc theo khoảng giá
        //     if ($request->filled('min_price') && $request->filled('max_price')) {
        //         $query->whereBetween('unit_price', [$request->min_price, $request->max_price]);
        //     }

        //     // Lọc theo danh mục
        //     if ($request->filled('categoryId')) {
        //         $query->where('category_id', $request->category);
        //     }

        //     if ($request->filled('searchTerm')) {
        //         $searchTerm = $request->searchTerm;
        //         $query->where('name', 'like', '%' . $searchTerm . '%');
        //     }

        //     // Sắp xếp
        //     if ($request->filled('sort_by')) {
        //         switch ($request->sort_by) {
        //             case 'price_asc':
        //                 $query->orderBy('unit_price', 'asc');
        //                 break;
        //             case 'price_desc':
        //                 $query->orderBy('unit_price', 'desc');
        //                 break;
        //             case 'best_selling':
        //                 $query->orderBy('overrate', 'desc');
        //                 break;
        //             case 'featured':
        //                 $query->orderBy('featured', 'desc');
        //                 break;
        //         }
        //     }

        //     // Lấy sản phẩm với thông tin chi tiết và hình ảnh đầu tiên
        //     $products = $query->with([
        //         'firstImage',
        //         'productSpecificationDetails.productSpecification',
        //     ])->paginate(9);

        //     return response()->json($products);


        $query = Product::query();

        // Lọc theo RAM
        if ($request->filled('ram')) {
            $ramValues = $request->ram;
            $query->whereHas('productSpecificationDetails', function ($q) use ($ramValues) {
                $q->whereHas('productSpecification', function ($q) {
                    $q->where('name', 'RAM');
                })->where(function ($q) use ($ramValues) {
                    foreach ($ramValues as $value) {
                        $q->orWhere('value', 'like', '%' . $value . '%');
                    }
                });
            });
        }

        // Lọc theo CPU
        if ($request->filled('cpu')) {
            $cpuValues = $request->cpu;
            $query->whereHas('productSpecificationDetails', function ($q) use ($cpuValues) {
                $q->whereHas('productSpecification', function ($q) {
                    $q->where('name', 'Công nghệ CPU');
                })->where(function ($q) use ($cpuValues) {
                    foreach ($cpuValues as $value) {
                        $q->orWhere('value', 'like', '%' . $value . '%');
                    }
                });
            });
        }

        // Lọc theo thương hiệu
        if ($request->filled('brand_id')) {
            $query->whereIn('brand_id', $request->brand_id);
        }

        // Lọc theo ổ cứng
        if ($request->filled('hardware')) {
            $storageValues = $request->hardware;
            $query->whereHas('productSpecificationDetails', function ($q) use ($storageValues) {
                $q->whereHas('productSpecification', function ($q) {
                    $q->where('name', 'Ổ cứng');
                })->where(function ($q) use ($storageValues) {
                    foreach ($storageValues as $value) {
                        $q->orWhere('value', 'like', '%' . $value . '%');
                    }
                });
            });
        }

        // Lọc theo màn hình
        if ($request->filled('screen')) {
            $screenSizeValues = $request->screen;
            $query->whereHas('productSpecificationDetails', function ($q) use ($screenSizeValues) {
                $q->whereHas('productSpecification', function ($q) {
                    $q->where('name', 'Màn hình');
                })->where(function ($q) use ($screenSizeValues) {
                    foreach ($screenSizeValues as $value) {
                        $q->orWhere('value', 'like', '%' . $value . '%');
                    }
                });
            });
        }

        // Lọc theo khoảng giá
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('unit_price', [$request->min_price, $request->max_price]);
        }

        // Lọc theo danh mục
        if ($request->filled('categoryId')) {
            $query->where('category_id', $request->category);
        }

        // Lọc theo từ khóa tìm kiếm
        if ($request->filled('searchTerm')) {
            $searchTerm = $request->searchTerm;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Lọc sản phẩm bán chạy từ hóa đơn có trạng thái là 5


        // Sắp xếp
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'price_asc':
                    $query->orderBy('unit_price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('unit_price', 'desc');
                    break;
                case 'best_selling':
                    $query->withCount(['orders as total_sales' => function ($q) {
                        $q->where('status', 5)
                          ->select(DB::raw('SUM(order.quantity)'));
                    }])->orderBy('total_sales', 'desc');
                    break;
                case 'featured':
                    $query->orderBy('featured', 'desc');
                    break;
            }
        }

        // Lấy sản phẩm với thông tin chi tiết và hình ảnh đầu tiên
        $products = $query->with([
            'firstImage',
            'productSpecificationDetails.productSpecification',
        ])->paginate(9);

        return response()->json($products);
    }
}
