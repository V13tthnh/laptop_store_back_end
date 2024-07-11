<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:thêm danh mục|sửa danh mục|xóa danh mục', only: ['index', 'store']),
            new Middleware(middleware: 'permission:thêm danh mục', only: ['create', 'store']),
            new Middleware(middleware: 'permission:sửa danh mục', only: ['edit', 'update']),
            new Middleware(middleware: 'permission:xóa danh mục', only: ['destroy']),
        ];
    }

    public function index()
    {
        $categories = $this->getCategories();
        $selectedId = 0;
        if (session()->has('selected_category_id')) {
            $selectedId = session()->get('selected_category_id');
        }
        return view('category.index', compact('categories', 'selectedId'));
    }

    public function dataTable()
    {
        $categories = Category::with('children')->whereNull('parent_id')->orderByDesc('id')->get();
        $formattedCategories = $this->formatCategories($categories);
        return Datatables::of($formattedCategories)->make(true);
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

    public function import()
    {

    }

    public function store(StoreUpdateCategoryRequest $request)
    {
        //dd($request);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_id = $request->parent_category_id == "null" ? null : $request->parent_category_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->hashName();
            $path = $file->store('uploads/categories');
            $category->image = $path;
        }
        $category->save();
        return response()->json([
            'success' => 200,
            'message' => "Thêm mới thành công!"
        ]);
    }

    public function edit(string $id)
    {
        $category = Category::with('parent')->find($id);

        if ($category == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $category
        ]);
    }

    public function update(StoreUpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_id = $request->parent_category_id == "null" ? null : $request->parent_category_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->hashName();
            $path = $file->store('uploads/categories');
            $category->image = $path;
        }
        $category->save();
        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }

    public function deleteSelectedCategories(Request $request)
    {
        $ids = $request->input('ids');
        dd($ids);
        if (!empty($ids)) {
            Category::whereIn('id', $ids)->delete();
            return response()->json([
                'success' => 200,
                'message' => "Xóa thành công!"
            ]);
        }

        return response()->json(['error' => 'Không có mục nào được chọn'], 400);
    }

    public function checkSlug(Request $request)
    {
        return response()->json([
            'success' => 200,
            'slug' => Str::slug($request->name)
        ]);
    }
}
