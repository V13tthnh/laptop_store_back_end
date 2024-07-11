<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create(['name' => 'Thế giới di động', 'email'=> 'cskh@thegioididong.com',  'address' => 'Tòa nhà MWG - Lô T2-1.2, Đường D1, Khu Công nghệ Cao, P. Tân Phú, Quận 9', 'phone' => ' 1900 232 460']);
        Supplier::create(['name' => 'FPTShop', 'email' => 'fptshop@fpt.com', 'address' => '261 - 263 Khánh Hội, Phường 5, Quận 4, Thành phố Hồ Chí Minh', 'phone' => ' 1800 6601']);
        Supplier::create(['name' => 'GearVN','email' => ' cskh@gearvn.com',  'address' => '78-80 Hoàng Hoa Thám, Phường 12, Quận Tân Bình', 'phone' => ' 1800 6601']);
        Supplier::create(['name' => 'Phong vũ','email' => 'hoptac@phongvu.vn',  'address' => '677/2A Điện Biên Phủ, Phường 25, Quận Bình Thạnh, TP. Hồ Chí Minh', 'phone' => '1800 68 65 ']);


    }
}
