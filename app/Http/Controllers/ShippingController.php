<?php

namespace App\Http\Controllers;


use Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShippingController extends Controller
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = env('GHTK_TOKEN'); // Đảm bảo bạn đã thêm GHTK_TOKEN vào file .env của bạn
    }

    public function calculateShippingFee(Request $request)
    {
        $pickProvince = $request->input('pick_province');
        $pickDistrict = $request->input('pick_district');
        $province = $request->input('province');
        $district = $request->input('district');
        $address = $request->input('address');
        $weight = 1000; // Giá trị mặc định

        $data = [
            'pick_province' => $pickProvince,
            'pick_district' => $pickDistrict,
            'province' => $province,
            'district' => $district,
            'address' => $address,
            'weight' => $weight,
        ];

        $response = Http::withHeaders([
            'Token' => 'd0f66f9fdbaa3d19bf23b20f42514405958fc08d',
        ])->get('https://services.giaohangtietkiem.vn/services/shipment/fee', $data);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'data' => $response->json()
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to calculate shipping fee',
            'data' => $response->json()
        ], $response->status());
    }
}
