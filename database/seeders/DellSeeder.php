<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //10
        Product::create([
            'name' => 'Laptop Dell Gaming G15 5530 i7 13650HX/16GB/512GB/8GB RTX4060/165Hz/OfficeHS/Win11 (i7H165W11GR4060) ',
            'SKU' => '7261845930',
            'slug' => 'dell-gaming-g15-5530-i7-i7h165w11gr4060',
            'description' => 'Laptop Dell Gaming G15 5530 i7 13650HX (i7H165W11GR4060) là cỗ máy gaming siêu việt đến từ Dell với vẻ bề ngoài độc đáo mang trong mình sức mạnh của Intel Gen 13 thế hệ mới cùng card rời RTX 40 series sẽ mang đến một trải nghiệm gaming đỉnh cao và đáp ứng mọi yêu cầu thường ngày, giải trí hay đồ họa của người dùng.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 2,
            'category_id' => 6,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '10',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Raptor Lake - 13650HX',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '10',
            'product_specification_id' => '2',
            'value' => '14',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '10',
            'product_specification_id' => '3',
            'value' => '20',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '10',
            'product_specification_id' => '4',
            'value' => '2.60 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '10',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.9 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '10',
            'product_specification_id' => '6',
            'value' => '24 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '10',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '10',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '10',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '10',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '10',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIeHỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '10',
            'product_specification_id' => '12',
	    'value' => '15.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '10',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '10',
            'product_specification_id' => '14',
            'value' => '165 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '10',
            'product_specification_id' => '15',
            'value' => '100% sRGB',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '10',
            'product_specification_id' => '16',
            'value' => 'Thời gian phản hồi: 3 ms, G-Sync, WVA, ComfortView Plus',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '10',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 4060, 8 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '10',
            'product_specification_id' => '18',
            'value' => 'Realtek Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '10',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '10',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '10',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '10',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '10',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '10',
            'product_specification_id' => '24',
            'value' => 'MUX Switch',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '10',
            'product_specification_id' => '25',
            'value' => 'Dài 357.26 mm - Rộng 274.52 mm - Dày 21.28 ~ 26.15 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '10',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '10',
            'product_specification_id' => '27',
            'value' => '6-cell Li-ion, 86 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '10',
            'product_specification_id' => '28',
            'value' => '330 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '10',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL + Office Home & Student vĩnh viễn',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '10',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '10',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '10',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products10 = Product::find(10);

        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/1.jpg',
        ]);

        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/2.jpg',
        ]);
        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/3.jpg',
        ]);

        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/4.jpg',
        ]);
        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/5.jpg',
        ]);

        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/6.jpg',
        ]);
        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/7.jpg',
        ]);

        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/8.jpg',
        ]);
        Image::create([
            'product_id' => $products10->id,
            'url' => 'uploads/products/Dell/Laptop Dell Gaming G15/9.jpg',
        ]);

        //11
        Product::create([
            'name' => 'Laptop Dell Inspiron 14 T7430 i5 1335U/8GB/512GB/Touch/Pen/OfficeHS/Win11 (N7430I58W1)',
            'SKU' => '1948237560',
            'slug' => 'dell-inspiron-14-7430-i5-n7430i58w1',
            'description' => 'Laptop Dell Inspiron 14 7430 i5 1335U (N7430I58W1) sở hữu hiệu năng vượt trội từ con chip Intel gen 13 hiện đại, tính năng gập mở 360 độ độc đáo, đây sẽ là trợ thủ đắc lực sẵn sàng cùng bạn xử lý mọi tác vụ học tập, văn phòng, giải trí khó nhằn.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 2,
            'category_id' => 6,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '11',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Raptor Lake - 1335U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '11',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '11',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '11',
            'product_specification_id' => '4',
            'value' => '1.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '11',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.6 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '11',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '11',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '11',
            'product_specification_id' => '8',
            'value' => 'LPDDR5 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '11',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '11',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '11',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '11',
            'product_specification_id' => '12',
	    'value' => '14 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '11',
            'product_specification_id' => '13',
            'value' => 'Full HD+ (1920 x 1200)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '11',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '11',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '11',
            'product_specification_id' => '16',
            'value' => '250 nits, WVA, ComfortView Plus',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '11',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '11',
            'product_specification_id' => '18',
            'value' => 'Waves MaxxAudio ProDolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '11',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 3.2, HDMI, 2 x Thunderbolt 4 (hỗ trợ Power Delivery)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '11',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '11',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '11',
            'product_specification_id' => '22',
            'value' => 'Full HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '11',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '11',
            'product_specification_id' => '24',
            'value' => 'Màn hình gập 360 độ, Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '11',
            'product_specification_id' => '25',
            'value' => 'Dài 314 mm - Rộng 226.56 mm - Dày 18.55 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '11',
	    'product_specification_id' => '26',
            'value' => 'Vỏ kim loại - Nhôm',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '11',
            'product_specification_id' => '27',
            'value' => '4-cell Li-ion, 54 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '11',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '11',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL + Office Home & Student vĩnh viễn',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '11',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '11',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '11',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products11 = Product::find(11);

        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/1.jpg',
        ]);

        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/2.jpg',
        ]);
        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/3.jpg',
        ]);

        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/4.jpg',
        ]);
        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/5.jpg',
        ]);

        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/6.jpg',
        ]);
        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/7.jpg',
        ]);

        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/8.jpg',
        ]);
        Image::create([
            'product_id' => $products11->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 14/9.jpg',
        ]);

        //12
        Product::create([
            'name' => 'Laptop Dell Inspiron 15 3520 i5 1235U/16GB/512GB/120Hz/OfficeHS/KYHD/Win11',
            'SKU' => '5372049186',
            'slug' => 'dell-inspiron-15-3520-i5-25p231',
            'description' => 'Laptop Dell Inspiron 15 3520 i5 1235U (25P231) hoàn toàn sở hữu mọi yếu tố mà một người dùng cá nhân cơ bản cần, hiệu năng ổn định từ con chip Intel i5, RAM 16 GB, màn hình 15.6 inch thoải mái cũng như sở hữu một mức giá lý tưởng tại Thế Giới Di Động.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 2,
            'category_id' => 6,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '12',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 1235U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '12',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '12',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '12',
            'product_specification_id' => '4',
            'value' => '1.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '12',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '12',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '12',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '12',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '12',
            'product_specification_id' => '9',
            'value' => '2666 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '12',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '12',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIeHỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '12',
            'product_specification_id' => '12',
	    'value' => '15.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '12',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '12',
            'product_specification_id' => '14',
            'value' => '120 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '12',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '12',
            'product_specification_id' => '16',
            'value' => 'Chống chói Anti Glare, 250 nits, WVA',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '12',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '12',
            'product_specification_id' => '18',
            'value' => 'Realtek Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '12',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 2.0, 2 x USB 3.2, HDMI',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '12',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '12',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '12',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '12',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '12',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '12',
            'product_specification_id' => '25',
            'value' => 'Dài 358.5 mm - Rộng 235.56 mm - Dày 18.99 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '12',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '12',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 41 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '12',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '12',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL + Office Home & Student vĩnh viễn',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '12',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '12',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '12',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);

        $products12 = Product::find(12);

        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/1.jpg',
        ]);

        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/2.jpg',
        ]);
        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/3.jpg',
        ]);

        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/4.jpg',
        ]);
        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/5.jpg',
        ]);

        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/6.jpg',
        ]);
        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/7.jpg',
        ]);

        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/8.jpg',
        ]);
        Image::create([
            'product_id' => $products12->id,
            'url' => 'uploads/products/Dell/Laptop Dell Inspiron 15/9.jpg',
        ]);

        //13
        Product::create([
            'name' => 'Laptop Dell Precision 16 7680 i7 13850HX/32GB/1TB/8GB RTXA2000/Win11 Pro (71024681)',
            'SKU' => '6801234759',
            'slug' => 'dell-precision-16-7680-i7-71024681',
            'description' => 'Laptop Dell Precision 16 7680 i7 13850HX (71024681) sở hữu hàng loạt những thông số khủng như chip Intel dòng HX hiệu năng cao, RAM 32 GB, card rời RTX,... đáp ứng hiệu quả mọi yêu cầu sáng tạo đồ hoạ, phát triển ứng dụng hay kiến trúc. Nay sản phẩm đã được lên kệ với mức giá vô cùng lý tưởng tại Thế Giới Di Động.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 2,
            'category_id' => 6,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '13',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Raptor Lake - 13850HX',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '13',
            'product_specification_id' => '2',
            'value' => '20',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '13',
            'product_specification_id' => '3',
            'value' => '28',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '13',
            'product_specification_id' => '4',
            'value' => '2.10 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '13',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 5.30 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '13',
            'product_specification_id' => '6',
            'value' => '30 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '13',
            'product_specification_id' => '7',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '13',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 16 GB + 1 khe 16 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '13',
            'product_specification_id' => '9',
            'value' => '5600 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '13',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '13',
            'product_specification_id' => '11',
            'value' => '1 TB SSD NVMe PCIe Gen 4',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '13',
            'product_specification_id' => '12',
	    'value' => '16 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '13',
            'product_specification_id' => '13',
            'value' => 'Full HD+ (1920 x 1200) 16:10',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '13',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '13',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '13',
            'product_specification_id' => '16',
            'value' => 'Chống chói Anti Glare, 250 nits, WVA',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '13',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX A2000, 8 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '13',
            'product_specification_id' => '18',
            'value' => 'Realtek High Definition Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '13',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 2 x Thunderbolt 4 USB-C, 1 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ DisplayPort), 1 x USB 3.2 (hỗ trợ PowerShare)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '13',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '13',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '13',
            'product_specification_id' => '22',
            'value' => 'Full HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '13',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '13',
            'product_specification_id' => '24',
            'value' => 'Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '13',
            'product_specification_id' => '25',
            'value' => 'Dài 356 mm - Rộng 258.34 mm - Dày 22.3 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '13',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa - nắp lưng bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '13',
            'product_specification_id' => '27',
            'value' => '6-cell Li-ion, 83 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '13',
            'product_specification_id' => '28',
            'value' => '180 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '13',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Pro',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '13',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '13',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '13',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);
        $products13 = Product::find(13);

        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/1.jpg',
        ]);

        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/2.jpg',
        ]);
        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/3.jpg',
        ]);

        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/4.jpg',
        ]);
        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/5.jpg',
        ]);

        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/6.jpg',
        ]);
        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/7.jpg',
        ]);

        Image::create([
            'product_id' => $products13->id,
            'url' => 'uploads/products/Dell/Laptop Dell Precision 16/8.jpg',
        ]);

         //14
         Product::create([
            'name' => 'Laptop Dell Vostro 15 3520 i5 1235U/16GB/512GB/120Hz/OfficeHS/KYHD/Win11 (i5U165W11GRU) ',
            'SKU' => '8239456170',
            'slug' => 'dell-vostro-15-3520-i5-i5u165w11gru',
            'description' => 'Laptop Dell Vostro 15 3520 i5 1235U (i5U165W11GRU) mang vẻ ngoài sang trọng, bền bỉ, hiệu năng xử lý trơn tru mọi yêu cầu thường ngày trong doanh nghiệp hay giải trí đa phương tiện. Mẫu laptop học tập - văn phòng tuyệt vời mà chắc chắn các bạn học sinh, sinh viên và người đi làm không thể bỏ qua.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 2,
            'category_id' => 6,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '14',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 1235U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '14',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '14',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '14',
            'product_specification_id' => '4',
            'value' => '1.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '14',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '14',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '14',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '14',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '14',
            'product_specification_id' => '9',
            'value' => '2666 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '14',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '14',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '14',
            'product_specification_id' => '12',
	    'value' => '15.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '14',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '14',
            'product_specification_id' => '14',
            'value' => '120 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '14',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '14',
            'product_specification_id' => '16',
            'value' => 'Chống chói Anti Glare, LED Backlit, 250 nits, WVA',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '14',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '14',
            'product_specification_id' => '18',
            'value' => 'Realtek Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '14',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), 1 x USB 2.0, Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '14',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 802.11 a/b/g/n/acBluetooth 5.1',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '14',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '14',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '14',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '14',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '14',
            'product_specification_id' => '25',
            'value' => 'Dài 358.5 mm - Rộng 235.56 mm - Dày 18.99 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '14',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '14',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 41 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '14',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '14',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL + Office Home & Student vĩnh viễn',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '14',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '14',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '14',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);
        $products14 = Product::find(14);

        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/1.jpg',
        ]);

        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/2.jpg',
        ]);
        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/3.jpg',
        ]);

        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/4.jpg',
        ]);
        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/5.jpg',
        ]);

        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/6.jpg',
        ]);
        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/7.jpg',
        ]);

        Image::create([
            'product_id' => $products14->id,
            'url' => 'uploads/products/Dell/Laptop Dell Vostro 15/8.jpg',
        ]);
    }
}
