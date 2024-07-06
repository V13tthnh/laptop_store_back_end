<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getAllBrand()
    {
        try {
            $brands = Brand::all();

            return response()->json([
                'status' => true,
                'data' => $brands
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
