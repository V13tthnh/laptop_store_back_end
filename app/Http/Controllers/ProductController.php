<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Storage;
use Str;

class ProductController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:user-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        return view('product.index');
    }

    public function dataTable()
    {
        $products = Product::with('images')->with('category')->with('brand')->get();
        return Datatables::of($products)->addColumn('category_name', function ($products) {
            return $products->category->name;
        })->addColumn('brand_name', function ($products) {
            return $products->brand->name;
        })->make(true);
    }

    public function create()
    {
        $brands = Brand::all();
        $productSpecifications = ProductSpecification::all();
        $categories = $this->getCategories();
        return view('product.create', compact('categories', 'brands', 'productSpecifications'));
    }

    public function store(StoreUpdateProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->SKU = $request->SKU;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $images = new Image();
                $path = $file->store('uploads/products');
                $images->url = $path;
                $images->product_id = $product->id;
                $images->save();
            }
        }

        if ($request->has('product_sp_id')) {
            for ($i = 0; $i < count($request->product_sp_id); $i++) {
                ProductSpecificationDetail::create([
                    'product_id' => $product->id,
                    'product_specification_id' => $request->product_sp_id[$i],
                    'value' => $request->product_sp_value[$i],
                ]);
            }
        }

        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công"
        ]);
    }

    public function show(string $id)
    {
        return view('product.detail');
    }

    public function edit(string $id)
    {
        $brands = Brand::all();
        $productSpecifications = ProductSpecification::with('ProductSpecificationDetails')->get();
        $productSpecificationDetails = ProductSpecificationDetail::where('product_id', $id)->get();

        $categories = $this->getCategories();
        $product = Product::with('images')->with('category')->with('brand')->with('ProductSpecificationDetails')->findOrFail($id);
        return view('product.edit', compact('product', 'brands', 'productSpecificationDetails', 'categories', 'productSpecifications'));
    }

    public function update(StoreUpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->SKU = $request->SKU;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->save();

        if ($request->has('deleted_images')) {
            $deletedImages = $request->deleted_images;
            foreach ($deletedImages as $imageName) {
                $image = Image::where('url', 'uploads/products/' . $imageName)->firstOrFail();
                if ($image) {
                    Storage::delete($image->url);
                    $image->delete();
                }
            }
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $images = new Image();
                $path = $file->store('uploads/products');
                $images->url = $path;
                $images->product_id = $product->id;
                $images->save();
            }
        }

        if ($request->has('product_sp_id')) {
            for ($i = 0; $i < count($request->product_sp_id); $i++) {
                $product_sp = new ProductSpecificationDetail;
                $product_sp->product_id = $product->id;
                $product_sp->product_specification_id = $request->product_sp_id[$i];
                $product_sp->value = $request->product_sp_value[$i];
                $product_sp->value->save();
            }
        }

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công"
        ]);
    }

    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => "Xóa thành công!"
        ]);
    }

    public function trash()
    {
        return view('product.trash');
    }

    public function dataTableTrash()
    {
        $products = Product::with('images')->with('category')->with('brand')->onlyTrashed()->get();
        return Datatables::of($products)->addColumn('category_name', function ($products) {
            return $products->category->name;
        })->addColumn('brand_name', function ($products) {
            return $products->brand->name;
        })->make(true);
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return response()->json([
            'success' => 200,
            'message' => "Khôi phục thành công!"
        ]);
    }

    private function formatCategories($categories, $level = 0)
    {
        $formatted = [];

        foreach ($categories as $category) {
            $formatted[] = [
                'id' => $category->id,
                'name' => str_repeat('|---', $level) . $category->name,
                'description' => $category->description,
                'created_at' => $category->created_at,
            ];

            if ($category->children) {
                $formatted = array_merge($formatted, $this->formatCategories($category->children, $level + 1));
            }
        }
        return $formatted;
    }

    private function getCategories()
    {
        $categories = Category::with('children')->orderByDesc('id')->get();
        $listCategory = [];
        Category::recursive($categories, $parents = 0, $level = 1, $listCategory);
        return $listCategory;
    }

    public function checkSlug(Request $request)
    {
        return response()->json([
            'success' => 200,
            'slug' => Str::slug($request->name)
        ]);
    }
}
