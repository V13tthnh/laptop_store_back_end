<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LenovoSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop Lenovo Ideapad 1 15ALC7 R7 5700U/16GB/512GB/Win11 (82R400C1VN)',
            'SKU' => '8623750194',
            'slug' => 'lenovo-ideapad-1-15alc7-r7-82r400c1vn',
            'description' => 'Laptop Lenovo Ideapad 1 15ALC7 R7 5700U (82R400C1VN) không chỉ là một sản phẩm phù hợp cho sinh viên mà còn dành cho những người đi làm. Hội tụ từ cấu hình ổn định, thiết kế thanh lịch cùng vô vàn tính năng nổi bật. Với tất cả những ưu điểm trên, thiết bị này thực sự là một sự lựa chọn lý tưởng cho mọi người trong việc đáp ứng nhu cầu làm việc, giải trí hàng ngày.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 1,
            'category_id' => 5,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '20',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 7 - 5700U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '20',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '20',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '20',
            'product_specification_id' => '4',
            'value' => '1.80 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '20',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.3 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '20',
            'product_specification_id' => '6',
            'value' => '8 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '20',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '20',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (8 GB onboard + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '20',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '20',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '20',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB (2280) / 512 GB (2242))',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '20',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '20',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '20',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '20',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '20',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '20',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - AMD Radeon Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '20',
            'product_specification_id' => '18',
            'value' => 'Dolby Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '20',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 2.0, 1 x USB 3.2, HDMI, 1 x USB Type-C (chỉ hỗ trợ truyền dữ liệu)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '20',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.0Wi-Fi 802.11 a/b/g/n/ac',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '20',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '20',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '20',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '20',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0, Bản lề mở 180 độ, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '20',
            'product_specification_id' => '25',
            'value' => 'Dài 360.2 mm - Rộng 236 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '20',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '20',
            'product_specification_id' => '27',
            'value' => '42 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '20',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '20',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '20',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '20',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '20',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products20 = Product::find(20);

        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/1.jpg',
        ]);

        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/2.jpg',
        ]);
        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/3.jpg',
        ]);

        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/4.jpg',
        ]);
        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/5.jpg',
        ]);
        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/6.jpg',
        ]);
        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/7.jpg',
        ]);
        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/8.jpg',
        ]);
        Image::create([
            'product_id' => $products20->id,
            'url' => 'uploads/products/Lenovo/Laptop Lenovo Ideapad 1/9.jpg',
        ]);

        //21
        Product::create([
            'name' => 'Laptop Lenovo Ideapad Gaming 3 15ACH6 R5 5500H/16GB/512GB/4GB RTX2050/144Hz/Win11 (82K2027PVN)',
            'SKU' => '3145908276',
            'slug' => 'lenovo-ideapad-gaming-3-15ach6-r5-82k2027pvn',
            'description' => 'Một mẫu laptop gaming hot mang mức giá tầm trung và sở hữu những thông số đủ mạnh cho các anh em chiến thoải mái với những con game thịnh hành, phục vụ giải trí hay công việc đầy đủ. Laptop Lenovo Ideapad Gaming 3 15ACH6 R5 5500H (82K2027PVN) chắc chắn sẽ không khiến bạn thất vọng với giá trị bỏ ra.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 1,
            'category_id' => 5,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '21',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 5500H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '21',
            'product_specification_id' => '2',
            'value' => '4',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '21',
            'product_specification_id' => '3',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '21',
            'product_specification_id' => '4',
            'value' => '3.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '21',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.2 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '21',
            'product_specification_id' => '6',
            'value' => '8 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '21',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '21',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '21',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '21',
            'product_specification_id' => '10',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '21',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB (2280) / 512 GB (2242))Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '21',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '21',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '21',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '21',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '21',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare, 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '21',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 2050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '21',
            'product_specification_id' => '18',
            'value' => 'Nahimic Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '21',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C (chỉ hỗ trợ truyền dữ liệu)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '21',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax)Bluetooth 5.1',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '21',
            'product_specification_id' => '21',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '21',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '21',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '21',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '21',
            'product_specification_id' => '25',
            'value' => 'Dài 359.6 mm - Rộng 251.9 mm - Dày 24.2 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '21',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '21',
            'product_specification_id' => '27',
            'value' => '45 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '21',
            'product_specification_id' => '28',
            'value' => '135 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '21',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '21',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '21',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '21',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products21 = Product::find(21);

        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/1.jpg',
        ]);

        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/2.jpg',
        ]);
        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/3.jpg',
        ]);

        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/4.jpg',
        ]);
        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/5.jpg',
        ]);
        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/6.jpg',
        ]);
        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/7.jpg',
        ]);
        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/8.jpg',
        ]);
        Image::create([
            'product_id' => $products21->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Gaming 3/9.jpg',
        ]);

        //22
        Product::create([
            'name' => 'Laptop Lenovo Ideapad Slim 3 15IAH8 i5 12450H/16GB/512GB/Win11 (83ER000EVN)',
            'SKU' => '9074621835',
            'slug' => 'lenovo-ideapad-slim-3-15iah8-i5-83er00evn',
            'description' => 'Laptop Lenovo Ideapad Slim 3 15IAH8 i5 12450H (83ER000EVN) một mẫu laptop học tập - văn phòng sở hữu cấu hình mạnh mẽ với con chip Intel dòng H, RAM 16 GB cùng đa dạng các công nghệ hiện đại, hứa hẹn sẽ mang đến cho người dùng những trải nghiệm sử dụng làm việc và giải trí đa phương tiện một cách tối ưu và đầy tiện nghi.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 1,
            'category_id' => 5,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '22',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 12450H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '22',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '22',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '22',
            'product_specification_id' => '4',
            'value' => '2.00 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '22',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '22',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '22',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '22',
            'product_specification_id' => '8',
            'value' => 'LPDDR5 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '22',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '22',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '22',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '22',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '22',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '22',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '22',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '22',
            'product_specification_id' => '16',
            'value' => 'Low Blue Light,Tấm nền IPS, Chống chói Anti Glare, Độ sáng 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '22',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel UHD Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '22',
            'product_specification_id' => '18',
            'value' => 'Dolby Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '22',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1x USB-C 3.2 (hỗ trợ truyền dữ liệu, Power Delivery và DisplayPort 1.2)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '22',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax)Bluetooth 5.1',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '22',
            'product_specification_id' => '21',
            'value' => 'SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '22',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '22',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '22',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0, Độ bền chuẩn quân đội MIL STD 810H, Bản lề mở 180 độ, Bảo mật vân tay, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '22',
            'product_specification_id' => '25',
            'value' => 'Dài 359.3 mm - Rộng 235 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '22',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '22',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 47 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '22',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '22',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '22',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '22',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '22',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products22 = Product::find(22);

        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/1.jpg',
        ]);

        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/2.jpg',
        ]);
        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/3.jpg',
        ]);

        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/4.jpg',
        ]);
        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/5.jpg',
        ]);
        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/6.jpg',
        ]);
        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/7.jpg',
        ]);
        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/8.jpg',
        ]);
        Image::create([
            'product_id' => $products22->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 3/9.jpg',
        ]);

        //23
        Product::create([
            'name' => 'Laptop Lenovo Ideapad Slim 5 14IAH8 i5 12450H/16GB/1TB/Win11 (83BF003WVN) ',
            'SKU' => '5218934706',
            'slug' => 'lenovo-ideapad-5-14iah8-i5-83bf003wvn',
            'description' => 'Laptop Lenovo Ideapad 5 14IAH8 i5 12450H (83BF003WVN) vừa được lên kệ tại Thế Giới Di Động, mẫu sản phẩm laptop học tập - văn phòng sở hữu hơi hướng thời thượng, cao cấp với vẻ ngoài tinh tế đầy thu hút, đi kèm với đó là hiệu năng vượt trội hơn so với những dòng sản phẩm đồng phân khúc, mang lại cho người dùng những trải nghiệm tuyệt vời nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 1,
            'category_id' => 5,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '23',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 12450H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '23',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '23',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '23',
            'product_specification_id' => '4',
            'value' => '2.00 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '23',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '23',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '23',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '23',
            'product_specification_id' => '8',
            'value' => 'LPDDR5 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '23',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '23',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '23',
            'product_specification_id' => '11',
            'value' => '1 TB SSD NVMe PCIe Gen 4',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '23',
            'product_specification_id' => '12',
            'value' => '14 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '23',
            'product_specification_id' => '13',
            'value' => 'WUXGA (1920 x 1200)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '23',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '23',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '23',
            'product_specification_id' => '16',
            'value' => 'Low Blue Light, Tấm nền IPS, Chống chói Anti Glare, , Độ sáng 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '23',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel UHD Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '23',
            'product_specification_id' => '18',
            'value' => 'Dolby Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '23',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 3.2, HDMI, 1 x USB 3.2 (Always on), 2 x USB Type-C (hỗ trợ truyền dữ liệu, Power Delivery 3.0 và DisplayPort 1.4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '23',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '23',
            'product_specification_id' => '21',
            'value' => 'Micro SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '23',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '23',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '23',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0, Độ bền chuẩn quân đội MIL STD 810H, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '23',
            'product_specification_id' => '25',
            'value' => 'Dài 312 mm - Rộng 221 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '23',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa - nắp lưng bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '23',
            'product_specification_id' => '27',
            'value' => '56.6 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '23',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '23',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '23',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '23',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '23',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);
        $products23 = Product::find(23);

        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/1.jpg',
        ]);

        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/2.jpg',
        ]);
        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/3.jpg',
        ]);

        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/4.jpg',
        ]);
        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/5.jpg',
        ]);
        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/6.jpg',
        ]);
        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/7.jpg',
        ]);
        Image::create([
            'product_id' => $products23->id,
            'url' => 'uploads/products/Lenovo/Lenovo Ideapad Slim 5/8.jpg',
        ]);

        //24
        Product::create([
            'name' => 'Laptop Lenovo LOQ Gaming 15IAX9 i5 12450HX/16GB/512GB/6GB RTX3050/144Hz/Win11 (83GS000JVN)',
            'SKU' => '6730184952',
            'slug' => 'lenovo-loq-gaming-15iax9-i5-83gs000jvn',
            'description' => 'Laptop Lenovo LOQ Gaming 15IAX9 i5 12450HX (83GS000JVN) mang dáng dấp kiểu mẫu từ những chiếc laptop gaming nhà Lenovo, đưa đến một phiên bản hoàn toàn mới, đầy thời thượng. Laptop gaming còn được tích hợp với cấu hình mạnh mẽ, khung hình mượt mà cho phép bạn trải nghiệm sâu mọi tựa game.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 1,
            'category_id' => 5,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '24',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 12450HX',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '24',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '24',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '24',
            'product_specification_id' => '4',
            'value' => 'Hãng không công bố',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '24',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '24',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '24',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '24',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '24',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '24',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '24',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '24',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '24',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '24',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '24',
            'product_specification_id' => '15',
            'value' => '100% sRGB',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '24',
            'product_specification_id' => '16',
            'value' => 'Low Blue Light, G-Sync, Tấm nền IPS, Chống chói Anti Glare, Độ sáng 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '24',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 3050, 6 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '24',
            'product_specification_id' => '18',
            'value' => 'Nahimic Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '24',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 1 x USB-C 3.2 (hỗ trợ truyền dữ liệu, Power Delivery 140W và DisplayPort 1.4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '24',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '24',
            'product_specification_id' => '21',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '24',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '24',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '24',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0, AI Chip LA1, Bản lề mở 180 độ, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '24',
            'product_specification_id' => '25',
            'value' => 'Dài 359.86 mm - Rộng 258.7 mm - Dày 23.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '24',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '24',
            'product_specification_id' => '27',
            'value' => '60 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '24',
            'product_specification_id' => '28',
            'value' => '170 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '24',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '24',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '24',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '24',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);
        $products24 = Product::find(24);

        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/1.jpg',
        ]);

        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/2.jpg',
        ]);
        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/3.jpg',
        ]);

        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/4.jpg',
        ]);
        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/5.jpg',
        ]);
        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/6.jpg',
        ]);
        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/7.jpg',
        ]);
        Image::create([
            'product_id' => $products24->id,
            'url' => 'uploads/products/Lenovo/Lenovo LOQ Gaming/8.jpg',
        ]);
    }
}
