<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;

class MacbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //25
        Product::create([
            'name' => 'Laptop Apple MacBook Air 13 inch M1 8GB/256GB (MGN63SA/A)',
            'SKU' => '1849273650',
            'slug' => 'apple-macbook-air-2020-mgn63saa',
            'description' => 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 6,
            'category_id' => 10,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '25',
            'product_specification_id' => '1',
            'value' => 'Apple M1',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '25',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '25',
            'product_specification_id' => '3',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '25',
            'product_specification_id' => '4',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '25',
            'product_specification_id' => '5',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '25',
            'product_specification_id' => '6',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '25',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '25',
            'product_specification_id' => '8',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '25',
            'product_specification_id' => '9',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '25',
            'product_specification_id' => '10',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '25',
            'product_specification_id' => '11',
            'value' => '256 GB SSD',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '25',
            'product_specification_id' => '12',
            'value' => '13.3 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '25',
            'product_specification_id' => '13',
            'value' => 'Retina (2560 x 1600)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '25',
            'product_specification_id' => '14',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '25',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '25',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, LED Backlit, 400 nits, True Tone Technology',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '25',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - 7 nhân GPU',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '25',
            'product_specification_id' => '18',
            'value' => '3 microphones, Headphones, Loa kép (2 kênh)',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '25',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm2 x Thunderbolt 3 (USB-C)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '25',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.0Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '25',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '25',
            'product_specification_id' => '22',
            'value' => '720p FaceTime Camera',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '25',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '25',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '25',
            'product_specification_id' => '25',
            'value' => 'Dài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '25',
            'product_specification_id' => '26',
            'value' => 'Vỏ kim loại nguyên khối',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '25',
            'product_specification_id' => '27',
            'value' => 'Lên đến 18 giờ (Hãng công bố)',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '25',
            'product_specification_id' => '28',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '25',
            'product_specification_id' => '29',
            'value' => 'macOS',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '25',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '25',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '25',
            'product_specification_id' => '32',
            'value' => '2020',
        ]);

        $products25 = Product::find(25);

        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/1.jpg',
        ]);

        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/2.jpg',
        ]);
        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/3.jpg',
        ]);

        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/4.jpg',
        ]);
        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/5.jpg',
        ]);
        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/6.jpg',
        ]);
        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/7.jpg',
        ]);
        Image::create([
            'product_id' => $products25->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M1/8.jpg',
        ]);

        //26
        Product::create([
            'name' => 'Laptop Apple MacBook Air 13 inch M2 8GB/256GB (MLY33SA/A)',
            'SKU' => '7590438216',
            'slug' => 'apple-macbook-air-m2-2022',
            'description' => 'Sau 14 năm, ba lần sửa đổi và hai kiến trúc bộ vi xử lý khác nhau, kiểu dáng mỏng dần mang tính biểu tượng của MacBook Air đã đi vào lịch sử. Thay vào đó là một chiếc MacBook Air M2 với thiết kế hoàn toàn mới, độ dày không thay đổi tương tự như MacBook Pro, đánh bật mọi rào cản với con chip Apple M2 đầy mạnh mẽ.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 6,
            'category_id' => 10,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '26',
            'product_specification_id' => '1',
            'value' => 'Apple Mâ',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '26',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '26',
            'product_specification_id' => '3',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '26',
            'product_specification_id' => '4',
            'value' => '100 GB/s memory bandwidth',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '26',
            'product_specification_id' => '5',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '26',
            'product_specification_id' => '6',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '26',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '26',
            'product_specification_id' => '8',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '26',
            'product_specification_id' => '9',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '26',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '26',
            'product_specification_id' => '11',
            'value' => '256 GB SSD',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '26',
            'product_specification_id' => '12',
	    'value' => '13.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '26',
            'product_specification_id' => '13',
            'value' => 'Liquid Retina (2560 x 1664)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '26',
            'product_specification_id' => '14',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '26',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '26',
            'product_specification_id' => '16',
            'value' => 'Wide color (P3), 500 nits brightness, True Tone Technology, 1 tỷ màu',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '26',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - 8 nhân GPU',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '26',
            'product_specification_id' => '18',
            'value' => 'Spatial Audio, 3 microphones, 4 Loa, Dolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '26',
            'product_specification_id' => '19',
            'value' => 'MagSafe 3, Jack tai nghe 3.5 mm, 2 x Thunderbolt 3',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '26',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '26',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '26',
            'product_specification_id' => '22',
            'value' => '1080p FaceTime HD camera',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '26',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '26',
            'product_specification_id' => '24',
            'value' => 'Sạc MagSafeBảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '26',
            'product_specification_id' => '25',
            'value' => 'Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '26',
	    'product_specification_id' => '26',
            'value' => 'Vỏ kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '26',
            'product_specification_id' => '27',
            'value' => 'Lên đến 18 giờ (Hãng công bố)',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '26',
            'product_specification_id' => '28',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '26',
            'product_specification_id' => '29',
            'value' => 'macOS',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '26',
            'product_specification_id' => '30',
            'value' => 'Xanh đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '26',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '26',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);

        $products26 = Product::find(26);

        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/1.jpg',
        ]);

        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/2.jpg',
        ]);
        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/3.jpg',
        ]);

        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/4.jpg',
        ]);
        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/5.jpg',
        ]);
        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/6.jpg',
        ]);
        Image::create([
            'product_id' => $products26->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 13 inch M2/7.jpg',
        ]);

        //27
        Product::create([
            'name' => 'Laptop Apple MacBook Air 15 inch M3 16GB/512GB (MXD33SA/A)',
            'SKU' => '8320146957',
            'slug' => 'macbook-air-15-inch-m3-2024-16gb-512gb',
            'description' => 'Nếu bạn thấy hài lòng với tiện ích và độ linh hoạt của Macbook Air mang lại, nhưng chưa ấn tượng với kích cỡ màn hình có phần "nhỏ hẹp" thì hãy tham khảo ngay MacBook Air M3 15 inch 16GB 512GB với con chip M3 mới nhất, màn hình tối ưu hơn cho hiển thị.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 6,
            'category_id' => 10,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '27',
            'product_specification_id' => '1',
            'value' => 'Apple M3 - Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '27',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '27',
            'product_specification_id' => '3',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '27',
            'product_specification_id' => '4',
            'value' => '100 GB/s memory bandwidth',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '27',
            'product_specification_id' => '5',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '27',
            'product_specification_id' => '6',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '27',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '27',
            'product_specification_id' => '8',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '27',
            'product_specification_id' => '9',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '27',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '27',
            'product_specification_id' => '11',
            'value' => '512 GB SSD',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '27',
            'product_specification_id' => '12',
            'value' => '15.3 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '27',
            'product_specification_id' => '13',
            'value' => 'Liquid Retina (2880 x 1864)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '27',
            'product_specification_id' => '14',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '27',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '27',
            'product_specification_id' => '16',
            'value' => 'Wide color (P3), 500 nits brightness, True Tone Technology, 1 tỷ màu',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '27',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - 10 nhân GPU',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '27',
            'product_specification_id' => '18',
            'value' => 'Hệ thống âm thanh 6 loa, Spatial Audio, 3 microphones, Dolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '27',
            'product_specification_id' => '19',
            'value' => 'MagSafe 3, Jack tai nghe 3.5 mm, 2 x Thunderbolt 3 / USB 4 (lên đến 40 Gb/s)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '27',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '27',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '27',
            'product_specification_id' => '22',
            'value' => '1080p FaceTime HD camera',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '27',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '27',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '27',
            'product_specification_id' => '25',
            'value' => 'Dài 340.4 mm - Rộng 237.6 mm - Dày 11.5 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '27',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhôm tái chế 100%',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '27',
            'product_specification_id' => '27',
            'value' => 'Lên đến 18 giờ (Hãng công bố)',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '27',
            'product_specification_id' => '28',
            'value' => '35 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '27',
            'product_specification_id' => '29',
            'value' => 'macOS Sonoma',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '27',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '27',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '27',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);

        $products27 = Product::find(27);

        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/1.jpg',
        ]);

        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/2.jpg',
        ]);
        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/3.jpg',
        ]);

        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/4.jpg',
        ]);
        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/5.jpg',
        ]);
        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/6.jpg',
        ]);
        Image::create([
            'product_id' => $products27->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Air 15 inch M3/7.jpg',
        ]);

        //28
        Product::create([
            'name' => 'Laptop Apple MacBook Pro 14 inch M3 8GB/512GB (MTL73SA/A)',
            'SKU' => '9651203487',
            'slug' => 'macbook-pro-14-inch-m3-2023',
            'description' => 'MacBook Pro M3 8 GB là một bước tiến đáng kể trong dòng sản phẩm laptop của Apple, nổi bật với sự tập trung tối ưu hóa hiệu suất và đồ họa đỉnh cao. Với con chip M3 mạnh mẽ, sản phẩm này đặt ra một tiêu chuẩn mới cho hiệu năng và thiết kế thanh lịch. Điều này hứa hẹn mang đến trải nghiệm làm việc mượt mà và hiệu quả, đồng hành đỉnh cao cho tất cả tác vụ từ văn phòng, giải trí cho đến đồ họa chuyên nghiệp.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 6,
            'category_id' => 10,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '28',
            'product_specification_id' => '1',
            'value' => 'Apple M3 - Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '28',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '28',
            'product_specification_id' => '3',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '28',
            'product_specification_id' => '4',
            'value' => '100 GB/s memory bandwidth',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '28',
            'product_specification_id' => '5',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '28',
            'product_specification_id' => '6',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '28',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '28',
            'product_specification_id' => '8',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '28',
            'product_specification_id' => '9',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '28',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '28',
            'product_specification_id' => '11',
            'value' => '512 GB SSD',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '28',
            'product_specification_id' => '12',
	    'value' => '14.2 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '28',
            'product_specification_id' => '13',
            'value' => 'Liquid Retina XDR display (3024 x 1964)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '28',
            'product_specification_id' => '14',
            'value' => 'up to 120 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '28',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '28',
            'product_specification_id' => '16',
            'value' => 'ProMotion, Độ sáng XDR: toàn màn hình 1000 nits, cao nhất 1600 nits (chỉ nội dung HDR), Độ sáng SDR: 600 nits, Wide color (P3), True Tone Technology, 1 tỷ màu',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '28',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - 10 nhân GPU',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '28',
            'product_specification_id' => '18',
            'value' => 'Hệ thống âm thanh 6 loa ,Spatial Audio, 3 microphones, Dolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '28',
            'product_specification_id' => '19',
            'value' => 'MagSafe 3, Jack tai nghe 3.5 mm, HDMI, 2 x Thunderbolt / USB 4 (hỗ trợ DisplayPort, Thunderbolt 3 (up to 40Gb/s), USB 4 (up to 40Gb/s))',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '28',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '28',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '28',
            'product_specification_id' => '22',
            'value' => '1080p FaceTime HD camera',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '28',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '28',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '28',
            'product_specification_id' => '25',
            'value' => 'Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '28',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhôm tái chế 100%',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '28',
            'product_specification_id' => '27',
            'value' => 'Lên đến 22 giờ (Hãng công bố)',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '28',
            'product_specification_id' => '28',
            'value' => '70 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '28',
            'product_specification_id' => '29',
            'value' => 'macOS Sonoma',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '28',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '28',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '28',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products28 = Product::find(28);

        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/1.jpg',
        ]);

        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/1.jpg',
        ]);
        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/3.jpg',
        ]);

        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/4.jpg',
        ]);
        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/5.jpg',
        ]);
        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/6.jpg',
        ]);
        Image::create([
            'product_id' => $products28->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 14 inch M3/7.jpg',
        ]);

        //29
        Product::create([
            'name' => 'Laptop Apple MacBook Pro 16 inch M3 Max 96GB/1TB',
            'SKU' => '4175280936',
            'slug' => 'apple-macbook-pro-16-inch-m3-max-96gb-1tb',
            'description' => 'Sự kiện Apple vào tháng cuối năm 2023 đánh dấu bước đột phá của hãng với MacBook Pro 16 inch M3 Max 96 GB. Phiên bản này sở hữu hiệu năng vượt trội với chip Apple M3 Max, ngoại hình sang trọng cùng khả năng đa nhiệm cao với RAM 96 GB, hứa hẹn mang đến trải nghiệm đẳng cấp cho người dùng chuyên nghiệp, là sản phẩm đáng để bạn sở hữu.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 6,
            'category_id' => 10,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '29',
            'product_specification_id' => '1',
            'value' => 'Apple M3 Max - Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '29',
            'product_specification_id' => '2',
            'value' => '14',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '29',
            'product_specification_id' => '3',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '29',
            'product_specification_id' => '4',
            'value' => '400 GB/s memory bandwidth',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '29',
            'product_specification_id' => '5',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '29',
            'product_specification_id' => '6',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '29',
            'product_specification_id' => '7',
            'value' => '96 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '29',
            'product_specification_id' => '8',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '29',
            'product_specification_id' => '9',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '29',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '29',
            'product_specification_id' => '11',
            'value' => '1 TB SSD',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '29',
            'product_specification_id' => '12',
            'value' => '16.2 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '29',
            'product_specification_id' => '13',
            'value' => 'Liquid Retina XDR display (3456 x 2234)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '29',
            'product_specification_id' => '14',
            'value' => 'up to 120 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '29',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '29',
            'product_specification_id' => '16',
            'value' => 'ProMotion, Độ sáng XDR: toàn màn hình 1000 nits, cao nhất 1600 nits (chỉ nội dung HDR), Độ sáng SDR: 600 nits, Wide color (P3), True Tone Technology, 1 tỷ màu',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '29',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - 30 nhân GPU',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '29',
            'product_specification_id' => '18',
            'value' => 'Hệ thống âm thanh 6 loa, Spatial Audio, 3 microphones, Dolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '29',
            'product_specification_id' => '19',
            'value' => 'MagSafe 3, Jack tai nghe 3.5 mm, HDMI, 3 x Thunderbolt 4 (hỗ trợ DisplayPort, Thunderbolt 4 (up to 40Gb/s), USB 4 (up to 40Gb/s))',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '29',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '29',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '29',
            'product_specification_id' => '22',
            'value' => '1080p FaceTime HD camera',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '29',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '29',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '29',
            'product_specification_id' => '25',
            'value' => 'Dài 355.7 mm - Rộng 248.1 mm - Dày 16.8 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '29',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhôm tái chế 100%',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '29',
            'product_specification_id' => '27',
            'value' => 'Lên đến 22 giờ (Hãng công bố)',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '29',
            'product_specification_id' => '28',
            'value' => '140 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '29',
            'product_specification_id' => '29',
            'value' => 'macOS Sonoma',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '29',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '29',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '29',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);


        $products29 = Product::find(29);

        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/1.jpg',
        ]);

        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/1.jpg',
        ]);
        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/3.jpg',
        ]);

        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/4.jpg',
        ]);
        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/5.jpg',
        ]);
        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/6.jpg',
        ]);
        Image::create([
            'product_id' => $products29->id,
            'url' => 'uploads/products/MACBOOK/Laptop Apple MacBook Pro 16 inch M3 Max/7.jpg',
        ]);
    }
}
