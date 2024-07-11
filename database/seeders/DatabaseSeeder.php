<?php

namespace Database\Seeders;

use App\Models\Brand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        //thương hiệu
        //1
        Brand::create(['name' => 'LENOVO', 'logo' => 'uploads/brands/1.png', 'status' => 1]);
        //2
        Brand::create(['name' => 'DELL', 'logo' => 'uploads/brands/2.png', 'status' => 1]);
        //3
        Brand::create(['name' => 'ASUS', 'logo' => 'uploads/brands/3.png', 'status' => 1]);
        //4
        Brand::create(['name' => 'ACER', 'logo' => 'uploads/brands/4.png', 'status' => 1]);
        //5
        Brand::create(['name' => 'MSI', 'logo' => 'uploads/brands/5.png', 'status' => 1]);
        //6
        Brand::create(['name' => 'MACBOOK', 'logo' => 'uploads/brands/6.png', 'status' => 1]);
        //7
        Brand::create(['name' => 'HP', 'logo' => 'uploads/brands/7.png', 'status' => 1]);
        //8
        Brand::create(['name' => 'MASSTEL', 'logo' => 'uploads/brands/8.png', 'status' => 1]);

        $this->call([
            ProductSPDetailSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SupplierSeeder::class,
            AcerSeeder::class,
            AsusSeeder::class,
            DellSeeder::class,
            HPSeeder::class,
            LenovoSeeder::class,
            MacbookSeeder::class,
            MSISeeder::class,
            //ProductSeeder::class,
            //ProductImagesSeeder::class
        ]);
    }
}
