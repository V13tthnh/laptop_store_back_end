<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSpecificationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        //ASUS
        // 1
        Product::create([
            'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
            'SKU' => '1234567891',
            'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
            'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 3,
            'category_id' => 4,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '1',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7520U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '1',
            'product_specification_id' => '2',
            'value' => '4',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '1',
            'product_specification_id' => '3',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '1',
            'product_specification_id' => '4',
            'value' => '2.80 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '1',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.3 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '1',
            'product_specification_id' => '6',
            'value' => '4 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '1',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '1',
            'product_specification_id' => '8',
            'value' => 'LPDDR5 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '1',
            'product_specification_id' => '9',
            'value' => '5500 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '1',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '1',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '1',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '1',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '1',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '1',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '1',
            'product_specification_id' => '16',
            'value' => 'Tấm nền TN, Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '1',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - AMD Radeon Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '1',
            'product_specification_id' => '18',
            'value' => 'SonicMaster audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '1',
            'product_specification_id' => '19',
            'value' => 'USB Type-C, 1 x USB 2.0, Jack tai nghe 3.5 mm, 1 x USB 3.2, HDMI',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '1',
            'product_specification_id' => '19',
            'value' => 'Wi-Fi 6E (802.11ax), Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '1',
            'product_specification_id' => '21',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '1',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '1',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '1',
            'product_specification_id' => '24',
            'value' => 'Độ bền chuẩn quân đội MIL STD 810H, Bản lề mở 180 độ, Bảo mật vân tay, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '1',
            'product_specification_id' => '25',
            'value' => 'Dài 360.3 mm - Rộng 232.5 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '1',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '1',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 42 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '1',
            'product_specification_id' => '28',
            'value' => '45 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '1',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '1',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '1',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '1',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        // 8
        // Product::create([
        //     'name' => 'Laptop Asus TUF Gaming F15 FX506HF i5 11400H/8GB/512GB/4GB RTX2050/144Hz/Win11 (HN014W) ',
        //     'SKU' => '1234227891',
        //     'slug' => 'asus-tuf-gaming-f15-fx506hf-i5-hn014w',
        //     'description' => 'Với bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce RTX 2050 4 GB, laptop Asus TUF Gaming F15 FX506HF là một trong những lựa chọn tuyệt vời cho các game thủ và những người dùng làm việc đa tác vụ hoặc liên quan đến đồ họa, kỹ thuật.',
        //     'featured' => 0,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);

        // ProductSpecificationDetail::create([//công nghệ cpu
        //     'product_id' => '8',
        //     'product_specification_id' => '1',
        //     'value' => 'Intel Core i5 Tiger Lake - 11400H',
        // ]);
        // ProductSpecificationDetail::create([//số nhân
        //     'product_id' => '8',
        //     'product_specification_id' => '2',
        //     'value' => '6',
        // ]);
        // ProductSpecificationDetail::create([//số luồng
        //     'product_id' => '8',
        //     'product_specification_id' => '3',
        //     'value' => '12',
        // ]);
        // ProductSpecificationDetail::create([//tốc độ cpu
        //    'product_id' => '8',
        //     'product_specification_id' => '4',
        //     'value' => '2.70 GHz',
        // ]);
        // ProductSpecificationDetail::create([//tốc độ tối đa
        //     'product_id' => '8',
        //     'product_specification_id' => '5',
        //     'value' => 'Turbo Boost 4.5 GHz',
        // ]);
        // ProductSpecificationDetail::create([//bộ nhớ đệm
        //     'product_id' => '8',
        //     'product_specification_id' => '6',
        //     'value' => '12 MB',
        // ]);
        // ProductSpecificationDetail::create([//ram
        //    'product_id' => '8',
        //     'product_specification_id' => '7',
        //     'value' => '8 GB',
        // ]);
        // ProductSpecificationDetail::create([//loại ram
        //    'product_id' => '8',
        //     'product_specification_id' => '8',
        //     'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe rời)',
        // ]);
        // ProductSpecificationDetail::create([//tốc độ bus ram
        //    'product_id' => '8',
        //     'product_specification_id' => '9',
        //     'value' => '3200 MHz',
        // ]);
        // ProductSpecificationDetail::create([//hỗ trợ ram tối đa
        //    'product_id' => '8',
        //     'product_specification_id' => '10',
        //     'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)',
        // ]);
        // ProductSpecificationDetail::create([//ổ cứng
        //    'product_id' => '8',
        //     'product_specification_id' => '11',
        //     'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        // ]);
        // ProductSpecificationDetail::create([//màn hình
        //     'product_id' => '8',
        //     'product_specification_id' => '12',
        //     'value' => '15.6 inch',
        // ]);
        // ProductSpecificationDetail::create([//độ phân giải
        //     'product_id' => '8',
        //     'product_specification_id' => '13',
        //     'value' => 'Full HD (1920 x 1080)',
        // ]);
        // ProductSpecificationDetail::create([//tần số quét
        //     'product_id' => '8',
        //     'product_specification_id' => '14',
        //     'value' => '144 Hz',
        // ]);
        // ProductSpecificationDetail::create([//độ phủ màu
        //     'product_id' => '8',
        //     'product_specification_id' => '15',
        //     'value' => '45% NTSC',
        // ]);
        // ProductSpecificationDetail::create([//công nghệ màn hình
        //    'product_id' => '8',
        //     'product_specification_id' => '16',
        //     'value' => 'Tấm nền IPS, Chống chói Anti Glare, Adaptive-Sync',
        // ]);
        // ProductSpecificationDetail::create([//card màn hình
        //    'product_id' => '8',
        //     'product_specification_id' => '17',
        //     'value' => 'Card rời - NVIDIA GeForce RTX 2050, 4 GB',
        // ]);
        // ProductSpecificationDetail::create([//công nghệ âm thanh
        //     'product_id' => '8',
        //     'product_specification_id' => '18',
        //     'value' => 'DTS software',
        // ]);
        // ProductSpecificationDetail::create([//cổng giao tiếp
        //    'product_id' => '8',
        //     'product_specification_id' => '19',
        //     'value' => 'LAN (RJ45),Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 1 x Thunderbolt 4 (hỗ trợ DisplayPort)',
        // ]);
        // ProductSpecificationDetail::create([//kết nối không dây
        //     'product_id' => '8',
        //     'product_specification_id' => '19',
        //     'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        // ]);
        // ProductSpecificationDetail::create([//khe đọc thẻ nhớ
        //     'product_id' => '8',
        //     'product_specification_id' => '21',
        //     'value' => 'Không có',
        // ]);
        // ProductSpecificationDetail::create([//webcam
        //     'product_id' => '8',
        //     'product_specification_id' => '22',
        //     'value' => 'HD webcam',
        // ]);
        // ProductSpecificationDetail::create([//đèn pin
        //     'product_id' => '8',
        //     'product_specification_id' => '23',
        //     'value' => 'Đèn chuyển màu RGB',
        // ]);
        // ProductSpecificationDetail::create([//tính năng khác
        //     'product_id' => '8',
        //     'product_specification_id' => '24',
        //     'value' => 'Độ bền chuẩn quân đội MIL STD 810H',
        // ]);
        // ProductSpecificationDetail::create([//kích thước, trọng lượng
        //   'product_id' => '8',
        //     'product_specification_id' => '25',
        //     'value' => 'Dài 359 mm - Rộng 256 mm - Dày 22.8 ~ 24.5 mm',
        // ]);
        // ProductSpecificationDetail::create([//chất liệu
        //     'product_id' => '8',
        //     'product_specification_id' => '26',
        //     'value' => 'Vỏ nhựa - nắp lưng bằng kim loại',
        // ]);
        // ProductSpecificationDetail::create([//thông tin pin
        //     'product_id' => '8',
        //     'product_specification_id' => '27',
        //     'value' => '3-cell Li-ion, 48 Wh',
        // ]);
        // ProductSpecificationDetail::create([//công suất bộ sạc
        //     'product_id' => '8',
        //     'product_specification_id' => '28',
        //     'value' => '45 W',
        // ]);
        // ProductSpecificationDetail::create([ //hệ điều hành
        //     'product_id' => '8',
        //     'product_specification_id' => '29',
        //     'value' => 'Windows 11 Home SL',
        // ]);
        // ProductSpecificationDetail::create([ //màu sắc
        //     'product_id' => '8',
        //     'product_specification_id' => '30',
        //     'value' => 'Đen',
        // ]);
        // ProductSpecificationDetail::create([ //bảo hành
        //    'product_id' => '8',
        //     'product_specification_id' => '31',
        //     'value' => '12 tháng',
        // ]);
        // ProductSpecificationDetail::create([ //ngày ra mắt
        //     'product_id' => '8',
        //     'product_specification_id' => '32',
        //     'value' => '2023',
        // ]);

        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);

        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);

        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 3,
        //     'category_id' => 4,
        // ]);
        //HP
        Product::create([
            'name' => 'Laptop HP 15s fq5229TU i3 1215U/8GB/512GB/Win11 (8U237PA)',
            'SKU' => '1234567811',
            'slug' => 'hp-15s-fq5229tu-i3-8u237pa',
            'description' => 'Với một mức giá thành lý tưởng, bạn đã có thể sở hữu cho mình một mẫu laptop học tập - văn phòng có hiệu năng ổn định, ngoại hình thanh lịch cùng các tính năng hiện đại. Laptop HP 15s fq5229TU i3 1215U (8U237PA) chắc chắn sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí thường ngày của sinh viên cũng như người đi làm.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 7,
            'category_id' => 8,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '2',
            'product_specification_id' => '1',
            'value' => 'Intel Core i3 Alder Lake - 1215U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '2',
            'product_specification_id' => '2',
            'value' => '6',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '2',
            'product_specification_id' => '3',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '2',
            'product_specification_id' => '4',
            'value' => '1.20 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '2',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '2',
            'product_specification_id' => '6',
            'value' => '10 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '2',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '2',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe rời)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '2',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '2',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '2',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '2',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '2',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '2',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '2',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '2',
            'product_specification_id' => '16',
            'value' => 'Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '2',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel UHD Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '2',
            'product_specification_id' => '18',
            'value' => 'Loa kép (2 kênh)',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '2',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm,2 x USB Type-A,HDMI,1 x USB Type-C (chỉ hỗ trợ truyền dữ liệu)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '2',
            'product_specification_id' => '19',
            'value' => 'Wi-Fi 802.11 a/b/g/n/ac, Bluetooth 5',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '2',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '2',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '2',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '2',
            'product_specification_id' => '24',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '2',
            'product_specification_id' => '25',
            'value' => 'Dài 358.5 mm - Rộng 242 mm - Dày 17.9 mm, 1.69 kg',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '2',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '2',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 41 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '2',
            'product_specification_id' => '28',
            'value' => '45 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '2',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '2',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '2',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '2',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        // Product::create([
        //     'name' => 'Laptop HP 245 G10 R5 7530U/8GB/512GB/Win11 (A20TDPT)',
        //     'SKU' => '1234561111',
        //     'slug' => 'hp-245-g10-r5-a20tdpt',
        //     'description' => 'Với một mức giá thành lý tưởng, bạn đã có thể sở hữu cho mình một mẫu laptop học tập - văn phòng có hiệu năng ổn định, ngoại hình thanh lịch cùng các tính năng hiện đại. Laptop HP 15s fq5229TU i3 1215U (8U237PA) chắc chắn sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí thường ngày của sinh viên cũng như người đi làm.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 7,
        //     'category_id' => 8,
        // ]);

        // Product::create([
        //     'name' => 'Laptop HP 15s fq5229TU i3 1215U/8GB/512GB/Win11 (8U237PA)',
        //     'SKU' => '1234567811',
        //     'slug' => 'hp-15s-fq5229tu-i3-8u237pa',
        //     'description' => 'Với một mức giá thành lý tưởng, bạn đã có thể sở hữu cho mình một mẫu laptop học tập - văn phòng có hiệu năng ổn định, ngoại hình thanh lịch cùng các tính năng hiện đại. Laptop HP 15s fq5229TU i3 1215U (8U237PA) chắc chắn sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí thường ngày của sinh viên cũng như người đi làm.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        // ]);


        // Product::create([
        //     'name' => 'Laptop HP 15s fq5229TU i3 1215U/8GB/512GB/Win11 (8U237PA)',
        //     'SKU' => '1234567811',
        //     'slug' => 'hp-15s-fq5229tu-i3-8u237pa',
        //     'description' => 'Với một mức giá thành lý tưởng, bạn đã có thể sở hữu cho mình một mẫu laptop học tập - văn phòng có hiệu năng ổn định, ngoại hình thanh lịch cùng các tính năng hiện đại. Laptop HP 15s fq5229TU i3 1215U (8U237PA) chắc chắn sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí thường ngày của sinh viên cũng như người đi làm.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        // ]);

        // Product::create([
        //     'name' => 'Laptop HP 15s fq5229TU i3 1215U/8GB/512GB/Win11 (8U237PA)',
        //     'SKU' => '1234567811',
        //     'slug' => 'hp-15s-fq5229tu-i3-8u237pa',
        //     'description' => 'Với một mức giá thành lý tưởng, bạn đã có thể sở hữu cho mình một mẫu laptop học tập - văn phòng có hiệu năng ổn định, ngoại hình thanh lịch cùng các tính năng hiện đại. Laptop HP 15s fq5229TU i3 1215U (8U237PA) chắc chắn sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí thường ngày của sinh viên cũng như người đi làm.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        // ]);

        //LENOVO
        Product::create([
            'name' => 'Laptop Lenovo LOQ Gaming 15IAX9 i5 12450HX/16GB/512GB/6GB RTX3050/144Hz/Win11 (83GS000JVN)',
            'SKU' => '1234567891',
            'slug' => 'lenovo-loq-gaming-15iax9-i5-83gs000jvn',
            'description' => 'Laptop Lenovo LOQ Gaming 15IAX9 i5 12450HX (83GS000JVN) mang dáng dấp kiểu mẫu từ những chiếc laptop gaming nhà Lenovo, đưa đến một phiên bản hoàn toàn mới, đầy thời thượng. Laptop gaming còn được tích hợp với cấu hình mạnh mẽ, khung hình mượt mà cho phép bạn trải nghiệm sâu mọi tựa game.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 1,
            'category_id' => 2,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '3',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 12450HX',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '3',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '3',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '3',
            'product_specification_id' => '4',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '3',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '3',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '3',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '3',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '3',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '3',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '3',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '3',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '3',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '3',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '3',
            'product_specification_id' => '15',
            'value' => '100% sRGB',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '3',
            'product_specification_id' => '16',
            'value' => 'Low Blue Light,G-Sync,Tấm nền IPS,Chống chói Anti Glare,Độ sáng 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '3',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 3050, 6 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '3',
            'product_specification_id' => '18',
            'value' => 'Nahimic Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '3',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45),Jack tai nghe 3.5 mm,3 x USB 3.2,HDMI,1 x USB-C 3.2 (hỗ trợ truyền dữ liệu, Power Delivery 140W và DisplayPort 1.4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '3',
            'product_specification_id' => '19',
            'value' => 'Bluetooth 5.2,Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '3',
            'product_specification_id' => '21',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '3',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '3',
            'product_specification_id' => '23',
            'value' => 'Đơn sắc - Màu trắng',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '3',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0,AI Chip LA1,Bản lề mở 180 độ,Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '3',
            'product_specification_id' => '25',
            'value' => 'Dài 359.86 mm - Rộng 258.7 mm - Dày 23.9 mm, 2.38 kg',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '3',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '3',
            'product_specification_id' => '27',
            'value' => '60 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '3',
            'product_specification_id' => '28',
            'value' => '170 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '3',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '3',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '3',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '3',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);


        //DELL
        Product::create([
            'name' => 'Laptop Dell Inspiron 15 3520 i5 1235U/16GB/512GB/120Hz/OfficeHS/KYHD/Win11 (25P231) ',
            'SKU' => '240404255',
            'slug' => 'dell-inspiron-15-3520-i5-25p231',
            'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 2,
            'category_id' => 3,
        ]);
        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '4',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 1235U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '4',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '4',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '4',
            'product_specification_id' => '4',
            'value' => '1.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '4',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '4',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '4',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '4',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '4',
            'product_specification_id' => '9',
            'value' => '2666 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '4',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '4',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe,Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '4',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '4',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '4',
            'product_specification_id' => '14',
            'value' => '120 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '4',
            'product_specification_id' => '15',
            'value' => 'Đang cập nhật',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '4',
            'product_specification_id' => '16',
            'value' => 'Chống chói Anti Glare,250 nits,WVA',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '4',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '4',
            'product_specification_id' => '18',
            'value' => 'Realtek Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '4',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm,1 x USB 2.0,2 x USB 3.2,HDMI',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '4',
            'product_specification_id' => '19',
            'value' => 'Bluetooth 5.2,Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '4',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '4',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '4',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '4',
            'product_specification_id' => '24',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '4',
            'product_specification_id' => '25',
            'value' => 'Dài 358.5 mm - Rộng 235.56 mm - Dày 18.99 mm, 1.9 kg',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '4',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '4',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 41 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '4',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '4',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL + Office Home & Student vĩnh viễn',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '4',
            'product_specification_id' => '30',
            'value' => 'Bạc, Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '4',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '4',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);


        //ACER
        Product::create([
            'name' => 'Laptop Acer Swift 3 SF314 512 56QN i5 1240P/16GB/512GB/Win11 (NX.K0FSV.002)',
            'SKU' => '240404251',
            'slug' => 'acer-swift-3-sf314-512-56qn-i5-nxk0fsv002',
            'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 4,
            'category_id' => 5,
        ]);
        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '5',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 1240P',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '5',
            'product_specification_id' => '2',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '5',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '5',
            'product_specification_id' => '4',
            'value' => '1.70 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '5',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '5',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '5',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '5',
            'product_specification_id' => '8',
            'value' => 'LPDDR4X (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '5',
            'product_specification_id' => '9',
            'value' => '4267 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '5',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '5',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '5',
            'product_specification_id' => '12',
            'value' => '14 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '5',
            'product_specification_id' => '13',
            'value' => 'QHD (2160 x 1440)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '5',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '5',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '5',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS,LED Backlit,Acer ComfyView',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '5',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '5',
            'product_specification_id' => '18',
            'value' => 'Acer TrueHarmony,DTS Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '5',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm,2 x Thunderbolt 4,2 x USB 3.2,HDMI',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '5',
            'product_specification_id' => '19',
            'value' => 'Bluetooth 5.2,Wi-Fi 6E (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '5',
            'product_specification_id' => '21',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '5',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '5',
            'product_specification_id' => '23',
            'value' => 'Đơn sắc - Màu trắng',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '5',
            'product_specification_id' => '24',
            'value' => 'Tiêu chuẩn Nền Intel Evo, Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '5',
            'product_specification_id' => '25',
            'value' => 'Dài 321 mm - Rộng 210.8 mm - Dày 15.9 mm, 1.2 kg',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '5',
            'product_specification_id' => '26',
            'value' => 'Vỏ kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '5',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 56 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '5',
            'product_specification_id' => '28',
            'value' => '45 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '5',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '5',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '5',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '5',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);


        //MSI
        Product::create([
            'name' => 'Laptop MSI Gaming GF63 Thin 11UC i7 11800H/8GB/512GB/4GB RTX3050/144Hz/Win11 (1228VN)',
            'SKU' => '2225678391',
            'slug' => 'msi-gaming-gf63-thin-11uc-i7-1228vn',
            'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 5,
            'category_id' => 6,
        ]);
        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '6',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Tiger Lake - 11800H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '6',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '6',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '6',
            'product_specification_id' => '4',
            'value' => '2.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '6',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.6 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '6',
            'product_specification_id' => '6',
            'value' => '24 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '6',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '6',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe rời)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '6',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '6',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '6',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe,Hỗ trợ khe cắm SATA 2.5 inch mở rộng (nâng cấp SSD hoặc HDD đều được)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '6',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '6',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '6',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '6',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '6',
            'product_specification_id' => '16',
            'value' => 'Wled-backlit,Tấm nền IPS,Chống chói Anti Glare',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '6',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 3050 Max-Q Design, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '6',
            'product_specification_id' => '18',
            'value' => 'Realtek High Definition Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '6',
            'product_specification_id' => '19',
            'value' => 'USB Type-C,Jack tai nghe 3.5 mm,1x Mic-in,3 x USB 3.2,HDMI,LAN (RJ45)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '6',
            'product_specification_id' => '19',
            'value' => 'Wi-Fi 802.11 a/b/g/n/ac, Bluetooth 5',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '6',
            'product_specification_id' => '21',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '6',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '6',
            'product_specification_id' => '23',
            'value' => 'Đơn sắc - Màu đỏ',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '6',
            'product_specification_id' => '24',
            'value' => 'Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '6',
            'product_specification_id' => '25',
            'value' => 'Dài 359 mm - Rộng 254 mm - Dày 21.7 mm, 1.86 kg',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '6',
            'product_specification_id' => '26',
            'value' => 'Vỏ kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '6',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 52.4 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '6',
            'product_specification_id' => '28',
            'value' => '120 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '6',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '6',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '6',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '6',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);


        //MACBOOK
        Product::create([
            'name' => 'Laptop Apple MacBook Air 13 inch M1 8GB/256GB (MGN63SA/A)',
            'SKU' => '3334567121',
            'slug' => 'apple-macbook-air-2020-mgn63saa',
            'description' => 'Laptop Apple MacBook Air 13 inch M1 8GB/256GB (MGN63SA/A) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 6,
            'category_id' => 7,
        ]);
        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '7',
            'product_specification_id' => '1',
            'value' => 'Apple M1',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '7',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '7',
            'product_specification_id' => '3',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '7',
            'product_specification_id' => '4',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '7',
            'product_specification_id' => '5',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '7',
            'product_specification_id' => '6',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '7',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '7',
            'product_specification_id' => '8',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '7',
            'product_specification_id' => '9',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '7',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '7',
            'product_specification_id' => '11',
            'value' => '256 GB SSD',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '7',
            'product_specification_id' => '12',
            'value' => '13.3 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '7',
            'product_specification_id' => '13',
            'value' => 'Retina (2560 x 1600)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '7',
            'product_specification_id' => '14',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '7',
            'product_specification_id' => '15',
            'value' => 'Tấm nền IPS,LED Backlit,400 nits,True Tone Technology',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '7',
            'product_specification_id' => '16',
            'value' => 'Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '7',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - 7 nhân GPU',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '7',
            'product_specification_id' => '18',
            'value' => '3 microphones,Headphones,Loa kép (2 kênh)',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '7',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm,2 x Thunderbolt 3 (USB-C)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '7',
            'product_specification_id' => '19',
            'value' => 'Bluetooth 5.0,Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '7',
            'product_specification_id' => '21',
            'value' => 'Đang cập nhật',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '7',
            'product_specification_id' => '22',
            'value' => '720p FaceTime Camera',
        ]);
        ProductSpecificationDetail::create([//đèn led
            'product_id' => '7',
            'product_specification_id' => '23',
            'value' => 'Đơn sắc - Màu trắng',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '7',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '7',
            'product_specification_id' => '25',
            'value' => 'Dài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm, 1.29 kg',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '7',
            'product_specification_id' => '26',
            'value' => 'Vỏ kim loại nguyên khối',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '7',
            'product_specification_id' => '27',
            'value' => 'Lên đến 18 giờ (Hãng công bố)',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '7',
            'product_specification_id' => '28',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '7',
            'product_specification_id' => '29',
            'value' => 'macOS',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '7',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '7',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '7',
            'product_specification_id' => '32',
            'value' => '2020',
        ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        // ]);


        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        // ]);

        // Product::create([
        //     'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
        //     'SKU' => '1234567891',
        //     'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
        //     'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
        //     'featured' => 1,
        //     'status' => 1,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        // ]);
    }
}
