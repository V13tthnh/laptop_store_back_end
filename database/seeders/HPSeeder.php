<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;

class HPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //15
        Product::create([
            'name' => 'Laptop HP 245 G10 R5 7530U/8GB/512GB/Win11 (A20TDPT)',
            'SKU' => '3401826597',
            'slug' => 'hp-245-g10-r5-a20tdpt',
            'description' => 'Nếu bạn tìm kiếm cho mình chiếc laptop học tập - văn phòng, xử lý mượt mà đa dạng tác vụ trong học tập và công việc hằng ngày, laptop HP 245 G10 R5 7530U (A20TDPT) sẽ là lựa chọn hợp lý dành cho bạn nhờ sở hữu chip AMD Ryzen 5 7000, RAM hay bộ nhớ ổn định cùng thiết kế tinh giản, hiện đại vô cùng.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 7,
            'category_id' => 11,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '15',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7530U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '15',
            'product_specification_id' => '2',
            'value' => '6',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '15',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '15',
            'product_specification_id' => '4',
            'value' => '2.00 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '15',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.5 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '15',
            'product_specification_id' => '6',
            'value' => '16 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '15',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '15',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB onboard + 1 khe trống)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '15',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '15',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '15',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '15',
            'product_specification_id' => '12',
            'value' => '14 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '15',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '15',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '15',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '15',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '15',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - AMD Radeon Graphics',
        ]);

        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '15',
            'product_specification_id' => '18',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '15',
            'product_specification_id' => '19',
            'value' => 'USB Type-C, 2 x USB 3.2, HDMI, 1 x Headphone/microphone combo',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '15',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '15',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '15',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '15',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '15',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '15',
            'product_specification_id' => '25',
            'value' => 'Dài 324 mm - Rộng 215 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '15',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '15',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 41 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '15',
            'product_specification_id' => '28',
            'value' => '45 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '15',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '15',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '15',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '15',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);

        $products15 = Product::find(15);

        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/1.jpg',
        ]);

        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/2.jpg',
        ]);
        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/3.jpg',
        ]);

        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/4.jpg',
        ]);
        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/5.jpg',
        ]);

        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/6.jpg',
        ]);
        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/7.jpg',
        ]);

        Image::create([
            'product_id' => $products15->id,
            'url' => 'uploads/products/HP/Laptop HP 245 G10/8.jpg',
        ]);


        //16
        Product::create([
            'name' => 'Laptop HP Gaming VICTUS 15 fb1022AX R5 7535HS/16GB/512GB/4GB RTX2050/144Hz/Win11 (94F19PA)',
            'SKU' => '1596327480',
            'slug' => 'hp-victus-15-fb1022ax-r5-94f19pa',
            'description' => 'Phong cách thiết kế tối giản nhưng vẫn toát lên rõ nét khí thế mạnh mẽ của một mẫu máy chiến game thời thượng, laptop HP Gaming VICTUS 15 fb1022AX R5 7535HS (94F19PA) với những sự trang bị về cấu hình vượt trội sẽ cùng bạn chinh chiến trên mọi đấu trường ảo.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 7,
            'category_id' => 11,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '16',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7535HS',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '16',
            'product_specification_id' => '3',
            'value' => '6',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '16',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '16',
            'product_specification_id' => '4',
            'value' => '3.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '16',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.55 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '16',
            'product_specification_id' => '6',
            'value' => '16 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '16',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '16',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '16',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '16',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '16',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '16',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '16',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '16',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '16',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '16',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '16',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 2050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '16',
            'product_specification_id' => '18',
            'value' => 'Audio by B&O, HP Audio Boost',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '16',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 2 x USB Type-A, HDMI, 1 x USB Type-C (hỗ trợ DisplayPort 1.4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '16',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax), Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '16',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '16',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '16',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '16',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '16',
            'product_specification_id' => '25',
            'value' => 'Dài 357.9 mm - Rộng 255 mm - Dày 23.5 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '16',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '16',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 52.5 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '16',
            'product_specification_id' => '28',
            'value' => '150 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '16',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '16',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '16',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '16',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products16 = Product::find(16);

        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/1.jpg',
        ]);

        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/2.jpg',
        ]);
        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/3.jpg',
        ]);

        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/4.jpg',
        ]);
        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/5.jpg',
        ]);

        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/6.jpg',
        ]);
        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/7.jpg',
        ]);

        Image::create([
            'product_id' => $products16->id,
            'url' => 'uploads/products/HP/Laptop HP Gaming VICTUS 15 fb1022AX/8.jpg',
        ]);

        //17
        Product::create([
            'name' => 'Laptop HP OMEN 16 xf0070AX R9 7940HS/32GB/1TB/8GB RTX4070/240Hz/Win11 (8W945PA)',
            'SKU' => '2784051369',
            'slug' => 'hp-omen-16-xf0070ax-r9-8w945pa',
            'description' => 'Đón chào sự trở lại của siêu phẩm laptop gaming OMEN đến từ nhà HP sau khoảng thời gian dài vắng bóng trên đường đua công nghệ, laptop HP OMEN 16 xf0070AX R9 7940HS (8W945PA) với bộ cấu hình vượt trội, màn hình 2K sắc nét có tốc độ quét cao,... đảm bảo cung cấp đầy đủ những yếu tố cần thiết nhất cho hành trình chiến game chuyên nghiệp của bạn. ',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 7,
            'category_id' => 11,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '17',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 9 - 7940HS',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '17',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '17',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '17',
            'product_specification_id' => '4',
            'value' => '4.0 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '17',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 5.20 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '17',
            'product_specification_id' => '6',
            'value' => '16 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '17',
            'product_specification_id' => '7',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '17',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 16 GB + 1 khe 16 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '17',
            'product_specification_id' => '9',
            'value' => '5600 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '17',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '17',
            'product_specification_id' => '11',
            'value' => '1 TB SSD M.2 PCIe Gen 4 (Có thể tháo ra, lắp thanh khác tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '17',
            'product_specification_id' => '12',
            'value' => '16.1 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '17',
            'product_specification_id' => '13',
            'value' => 'QHD (2560 x 1440)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '17',
            'product_specification_id' => '14',
            'value' => '240 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '17',
            'product_specification_id' => '15',
            'value' => '100% sRGB',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '17',
            'product_specification_id' => '16',
            'value' => 'Low Blue Light, Thời gian phản hồi: 3 ms, Tấm nền IPS, Chống chói Anti Glare, Độ sáng 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '17',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 4070, 8 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '17',
            'product_specification_id' => '18',
            'value' => 'Audio by B&O, Realtek High Definition Audio, HP Audio Boost, DTS:X ULTRA',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '17',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 2 x USB Type-C (hỗ trợ USB Power Delivery, DisplayPort 1.4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '17',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax), Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '17',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '17',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '17',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '17',
            'product_specification_id' => '24',
            'value' => 'Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '17',
            'product_specification_id' => '25',
            'value' => 'Dài 369 mm - Rộng 259.4 mm - Dày 23.5 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '17',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '17',
            'product_specification_id' => '27',
            'value' => '6-cell Li-ion, 83 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '17',
            'product_specification_id' => '28',
            'value' => '280 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '17',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '17',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '17',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '17',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);

        $products17 = Product::find(17);

        Image::create([
            'product_id' => $products17->id,
            'url' => 'uploads/products/HP/Laptop HP OMEN 16 xf0070AX/1.jpg',
        ]);

        Image::create([
            'product_id' => $products17->id,
            'url' => 'uploads/products/HP/Laptop HP OMEN 16 xf0070AX/2.jpg',
        ]);
        Image::create([
            'product_id' => $products17->id,
            'url' => 'uploads/products/HP/Laptop HP OMEN 16 xf0070AX/3.jpg',
        ]);

        Image::create([
            'product_id' => $products17->id,
            'url' => 'uploads/products/HP/Laptop HP OMEN 16 xf0070AX/4.jpg',
        ]);
        Image::create([
            'product_id' => $products17->id,
            'url' => 'uploads/products/HP/Laptop HP OMEN 16 xf0070AX/5.jpg',
        ]);

        //18
        Product::create([
            'name' => 'Laptop HP Pavilion 15 eg2081TU i5 1240P/16GB/512GB/Win11 (7C0Q4PA)',
            'SKU' => '4956178320',
            'slug' => 'hp-pavilion-15-eg2081tu-i5-7c0q4pa',
            'description' => 'Khả năng đáp ứng hiệu quả và mượt mà mọi tác vụ làm việc và giải trí nhờ sức mạnh của chip Intel Gen 12 cùng RAM 16 GB, laptop HP Pavilion 15 eg2081TU i5 1240P (7C0Q4PA) chắc chắn sẽ rất phù hợp với những bạn sinh viên, học sinh cũng như người đi làm.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 7,
            'category_id' => 11,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '18',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 1240P',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '18',
            'product_specification_id' => '2',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '18',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '18',
            'product_specification_id' => '4',
            'value' => '1.70 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '18',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '18',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '18',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '18',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '18',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '18',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '18',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2 TB (Gen 3) / 1 TB (Gen 4))',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '18',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '18',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '18',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '18',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '18',
            'product_specification_id' => '16',
            'value' => 'BrightView, Tấm nền IPS',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '18',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '18',
            'product_specification_id' => '18',
            'value' => 'Audio by B&O, Realtek High Definition Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '18',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C 3.2 (hỗ trợ Power Delivery và DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '18',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2, Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '18',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '18',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '18',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '18',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '18',
            'product_specification_id' => '25',
            'value' => 'Dài 360.2 mm - Rộng 234 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '18',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa - chiếu nghỉ tay bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '18',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 41 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '18',
            'product_specification_id' => '28',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '18',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '18',
            'product_specification_id' => '30',
            'value' => 'Vàng',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '18',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '18',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);

        $products18 = Product::find(18);

        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/1.jpg',
        ]);

        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/2.jpg',
        ]);
        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/3.jpg',
        ]);

        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/4.jpg',
        ]);
        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/5.jpg',
        ]);
        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/6.jpg',
        ]);
        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/7.jpg',
        ]);
        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/8.jpg',
        ]);
        Image::create([
            'product_id' => $products18->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion 15 eg2081TU/9.jpg',
        ]);

        //19
        Product::create([
            'name' => 'Laptop HP Pavilion X360 14 ek1049TU i5 1335U/16GB/512GB/Touch/Pen/Win11 (80R27PA)',
            'SKU' => '7062831945',
            'slug' => 'hp-pavilion-x360-14-ek1049tu-i5-80r27pa',
            'description' => 'Với sức mạnh hiệu năng vượt trội đến từ con chip Intel Gen 13 tân tiến, vẻ ngoài đơn giản mà hiện đại cùng lối thiết kế độc đáo, laptop HP Pavilion X360 14 ek1049TU i5 1335U (80R27PA) sẽ là sự lựa chọn hoàn hảo đáp ứng tốt các tác vụ học tập, làm việc cũng như xem phim, chơi game giải trí.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 7,
            'category_id' => 11,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '19',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Raptor Lake - 1335U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '19',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '19',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '19',
            'product_specification_id' => '4',
            'value' => '1.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '19',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.6 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '19',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '19',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '19',
            'product_specification_id' => '8',
            'value' => 'DDR4 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '19',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '19',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '19',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '19',
            'product_specification_id' => '12',
            'value' => '14 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '19',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '19',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '19',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '19',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '19',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '19',
            'product_specification_id' => '18',
            'value' => 'Audio by B&O, Realtek High Definition Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '19',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C 3.2 (hỗ trợ Power Delivery và DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '19',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2, Wi-Fi 6E (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '19',
            'product_specification_id' => '21',
            'value' => 'Micro SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '19',
            'product_specification_id' => '22',
            'value' => 'Camera 5.0 MP',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '19',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '19',
            'product_specification_id' => '24',
            'value' => 'Màn hình gập 360 độ, Bảo mật vân tay, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '19',
            'product_specification_id' => '25',
            'value' => 'Dài 322 mm - Rộng 210 mm - Dày 19.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '19',
            'product_specification_id' => '26',
            'value' => 'Vỏ kim loại - Nắp lưng bằng nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '19',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 43 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '19',
            'product_specification_id' => '28',
            'value' => '45 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '19',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '19',
            'product_specification_id' => '30',
            'value' => 'Vàng',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '19',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '19',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products19 = Product::find(19);

        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/1.jpg',
        ]);

        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/2.jpg',
        ]);
        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/3.jpg',
        ]);

        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/4.jpg',
        ]);
        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/5.jpg',
        ]);
        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/6.jpg',
        ]);
        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/7.jpg',
        ]);
        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/8.jpg',
        ]);
        Image::create([
            'product_id' => $products19->id,
            'url' => 'uploads/products/HP/Laptop HP Pavilion X360 14 ek1049TU/9.jpg',
        ]);
    }
}
