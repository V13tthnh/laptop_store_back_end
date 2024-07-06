<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\File;

class ImportAddressData extends Command
{
    protected $signature = 'import:address-data';
    protected $description = 'Import address data from JSON file in node_modules';

    public function handle()
    {
        $path = base_path('app\node_modules\hanhchinhvn\dist\tinh_tp.json');
        if (!File::exists($path)) {
            $this->error("File not found: $path");
            return;
        }

        $json = File::get($path);
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

        $this->info('Address data imported successfully.');
    }
}
