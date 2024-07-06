<?php

namespace Database\Seeders;

use App\Models\ProductSpecification;
use App\Models\ProductSpecificationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSPDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //thông số cpu
        ProductSpecification::create(['name' => 'Công nghệ CPU']);
        ProductSpecification::create(['name' => 'Số nhân']);
        ProductSpecification::create(['name' => 'Số luồng']);
        ProductSpecification::create(['name' => 'Tốc độ CPU']);
        ProductSpecification::create(['name' => 'Tốc độ tối đa']);
        ProductSpecification::create(['name' => 'Bộ nhớ đệm']);
        //thông số ram/ổ cứng
        ProductSpecification::create(['name' => 'RAM']);
        ProductSpecification::create(['name' => 'Loại RAM']);
        ProductSpecification::create(['name' => 'Tốc độ bus RAM']);
        ProductSpecification::create(['name' => 'Hỗ trợ RAM tối đa']);
        ProductSpecification::create(['name' => 'Ổ cứng']);
        //thông số Màn hình
        ProductSpecification::create(['name' => 'Màn hình']);
        ProductSpecification::create(['name' => 'Độ phân giải']);
        ProductSpecification::create(['name' => 'Tần số quét']);
        ProductSpecification::create(['name' => 'Độ phủ màu']);
        ProductSpecification::create(['name' => 'Công nghệ màn hình']);
        //Thông số đồ họa/âm thanh
        ProductSpecification::create(['name' => 'Card màn hình']);
        ProductSpecification::create(['name' => 'Công nghệ âm thanh']);
        //Thông số cổng kết nối/tính năng mở rộng
        ProductSpecification::create(['name' => 'Cổng giao tiếp']);
        ProductSpecification::create(['name' => 'Kết nối không dây']);
        ProductSpecification::create(['name' => 'Khe đọc thẻ nhớ']);
        ProductSpecification::create(['name' => 'Webcam']);
        ProductSpecification::create(['name' => 'Đèn bàn phím']);
        ProductSpecification::create(['name' => 'Tính năng khác']);
        //Thông số kích thước/trọng lượng
        ProductSpecification::create(['name' => 'Kích thước, trọng lượng']);
        ProductSpecification::create(['name' => 'chất liệu']);
        //Thông số khác
        ProductSpecification::create(['name' => 'Thông tin pin']);
        ProductSpecification::create(['name' => 'Công suất bộ sạc']);
        ProductSpecification::create(['name' => 'Hệ điều hành']);
        ProductSpecification::create(['name' => 'Màu sắc']);
        ProductSpecification::create(['name' => 'Bảo hành']);
        ProductSpecification::create(['name' => 'Ngày ra mắt']);
    }
}
