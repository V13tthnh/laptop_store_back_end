<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\File;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("D:\Code\datn\website-ban-laptop\server\node_modules\hanhchinhvn/tinh_tp.json");
        $provinces = json_decode($json, true);

        foreach ($provinces as $provinceData) {
            $province = Province::create(['name' => $provinceData['name']]);

            foreach ($provinceData['districts'] as $districtData) {
                $district = $province->districts()->create(['name' => $districtData['name']]);

                foreach ($districtData['wards'] as $wardData) {
                    $district->wards()->create(['name' => $wardData['name']]);
                }
            }
        }
    }
}
