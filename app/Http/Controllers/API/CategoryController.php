<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function fetchAllCategories(){
        $categories = Category::with('children')->orderByDesc('id')->get();

        return response()->json([
            'success' => 200,
            'data' =>  $categories
        ]);
    }
}
