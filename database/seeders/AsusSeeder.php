<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;

class AsusSeeder extends Seeder
{
    public function run(): void
    {
        //5
        Product::create([
            'name' => 'Laptop Asus TUF Gaming A15 FA506NF R5 7535HS/16GB/512GB/4GB RTX2050/144Hz/Win11 (HN012W)',
            'SKU' => '4179538260',
            'slug' => 'asus-tuf-gaming-a15-fa506nf-r5-hn012w',
            'description' => 'Một mẫu laptop chiến game đến từ thương hiệu Asus vừa được lên kệ tại Thế Giới Di Động, sở hữu những thông số cấu hình vượt trội với AMD Ryzen 5 dòng HS mạnh mẽ, card rời RTX 2050 và có một mức giá cân đối. Laptop Asus TUF Gaming A15 FA506NF R5 7535HS (HN012W) chắc chắn sẽ là công cụ tuyệt vời để thoả mãn mọi nhu cầu giải trí của anh em.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 3,
            'category_id' => 7,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '5',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7535HS',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '5',
            'product_specification_id' => '2',
            'value' => '6',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '5',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '5',
            'product_specification_id' => '4',
            'value' => '3.30  GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '5',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.55 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '5',
            'product_specification_id' => '6',
            'value' => '16 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '5',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '5',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '5',
            'product_specification_id' => '9',
            'value' => '4800  MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '5',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '5',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '5',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '5',
            'product_specification_id' => '13',
            'value' => 'Full HD+ (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '5',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '5',
            'product_specification_id' => '15',
            'value' => '62.5% sRGB, 47.34% Adobe RGB, 45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '5',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare, Adaptive-Sync, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '5',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 2050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '5',
            'product_specification_id' => '18',
            'value' => 'Hi-Res AudioDTS Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '5',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '5',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '5',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '5',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '5',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '5',
            'product_specification_id' => '24',
            'value' => 'NVIDIA Optimus',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '5',
            'product_specification_id' => '25',
            'value' => 'Dài 359 mm - Rộng 256 mm - Dày 24.5 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '5',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa - nắp lưng bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '5',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 48 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '5',
            'product_specification_id' => '28',
            'value' => '150 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '5',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '5',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '5',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '5',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);

        $products5 = Product::find(5);

        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/1.jpg',
        ]);

        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/2.jpg',
        ]);
        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/3.jpg',
        ]);

        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/4.jpg',
        ]);
        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/5.jpg',
        ]);
        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/6.jpg',
        ]);

        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/7.jpg',
        ]);
        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/8.jpg',
        ]);
        Image::create([
            'product_id' => $products5->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming A15 FA506NF/9.jpg',
        ]);


        //6
        Product::create([
            'name' => 'Laptop Asus TUF Gaming F15 FX507ZC4 i5 12500H/16GB/1TB/4GB RTX3050/144Hz/Win11 (HN229W) ',
            'SKU' => '2948176350',
            'slug' => 'asus-tuf-gaming-f15-fx507zc4-i5-hn229w',
            'description' => 'Laptop Asus TUF Gaming F15 FX507ZC4 i5 12500H (HN229W) với cấu trúc mạnh mẽ, hiệu năng vượt trội cùng mức giá hoàn toàn ưu đãi tại Thế Giới Di Động. Đây chính xác là mẫu laptop gaming được thiết kế dành riêng cho những anh em đam mê thể thao điện tử, đáp ứng đầy đủ đến cả những công việc thiết kế, sáng tạo.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 3,
            'category_id' => 7,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '6',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 12500H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '6',
            'product_specification_id' => '2',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '6',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '6',
            'product_specification_id' => '4',
            'value' => '2.50 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '6',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.5 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '6',
            'product_specification_id' => '6',
            'value' => '18 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '6',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '6',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '6',
            'product_specification_id' => '9',
            'value' => '3200  MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '6',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '6',
            'product_specification_id' => '11',
            'value' => '1 TB SSD M.2 PCIeHỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '6',
            'product_specification_id' => '12',
	    'value' => '15.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '6',
            'product_specification_id' => '13',
            'value' => 'Full HD+ (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '6',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '6',
            'product_specification_id' => '15',
            'value' => '62.5% sRGB',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '6',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, Chống chói Anti Glare, Adaptive-Sync',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '6',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 3050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '6',
            'product_specification_id' => '18',
            'value' => 'Hi-Res AudioDolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '6',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 1 x USB Type-C 3.2 (hỗ trợ DisplayPort / G-SYNC), 2 x USB 3.2, HDMI, 1 x Thunderbolt 4 (hỗ trợ DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '6',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '6',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '6',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '6',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '6',
            'product_specification_id' => '24',
            'value' => 'MUX Switch, NVIDIA Optimus, Độ bền chuẩn quân đội MIL STD 810H',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '6',
            'product_specification_id' => '25',
            'value' => 'Dài 354 mm - Rộng 251 mm - Dày 22.4 ~ 24.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '6',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa - nắp lưng bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '6',
            'product_specification_id' => '27',
            'value' => '4-cell Li-ion, 56 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '6',
            'product_specification_id' => '28',
            'value' => '200 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '6',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '6',
            'product_specification_id' => '30',
            'value' => 'Xám',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '6',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '6',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products6 = Product::find(6);

        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/1.jpg',
        ]);

        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/2.jpg',
        ]);
        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/3.jpg',
        ]);

        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/4.jpg',
        ]);
        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/5.jpg',
        ]);
        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/6.jpg',
        ]);

        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/7.jpg',
        ]);
        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/8.jpg',
        ]);
        Image::create([
            'product_id' => $products6->id,
            'url' => 'uploads/products/Asus/Laptop Asus TUF Gaming F15 FX507ZC4/9.jpg',
        ]);

        //7
        Product::create([
            'name' => 'Laptop Asus Vivobook 15 OLED A1505VA i5 13500H/16GB/512GB/Chuột/Win11 (L1341W)',
            'SKU' => '6137598240',
            'slug' => 'asus-vivobook-15-oled-a1505va-i5-l1341w',
            'description' => 'Bạn đang tìm kiếm cho mình một mẫu laptop học tập - văn phòng mang hiệu năng xử lý mạnh mẽ, khung hình hiển thị sắc nét cùng đa dạng các tính năng hiện đại. Laptop Asus Vivobook 15 OLED A1505VA i5 13500H (L1341W) là một trong những lựa chọn hàng đầu cho việc đáp ứng hoàn hảo nhu cầu công việc, học tập cũng như giải trí thường ngày.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 3,
            'category_id' => 7,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '7',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Raptor Lake - 13500H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '7',
            'product_specification_id' => '2',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '7',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '7',
            'product_specification_id' => '4',
            'value' => '2.60  GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '7',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.7 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '7',
            'product_specification_id' => '6',
            'value' => '18 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '7',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '7',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (8 GB onboard + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '7',
            'product_specification_id' => '9',
            'value' => '3200  MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '7',
            'product_specification_id' => '10',
            'value' => '24 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '7',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '7',
            'product_specification_id' => '12',
	    'value' => '15.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '7',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080) OLED',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '7',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '7',
            'product_specification_id' => '15',
            'value' => '100% DCI-P3',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '7',
            'product_specification_id' => '16',
            'value' => 'Độ sáng 600 nits, Thời gian phản hồi 0.2 ms, Màn hình bảo vệ mắt - EYE CARE, Chuẩn DisplayHDR True Black 600, Low Blue Light, Màn hình OLED, 1.07 tỷ màu',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '7',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '7',
            'product_specification_id' => '18',
            'value' => 'SonicMaster audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '7',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 2.0, 2 x USB 3.2, HDMI, 1 x USB Type-C (chỉ hỗ trợ Power Delivery)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '7',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '7',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '7',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '7',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '7',
            'product_specification_id' => '24',
            'value' => 'Lớp phủ ASUS Antimicrobial Guard, Độ bền chuẩn quân đội MIL STD 810H, Bản lề mở 180 độ, Bảo mật vân tay, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '7',
            'product_specification_id' => '25',
            'value' => 'Dài 356.8 mm - Rộng 227.6 mm - Dày 19.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '7',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '7',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 50 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '7',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '7',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
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
            'value' => '2023',
        ]);

        $products7 = Product::find(7);

        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/1.jpg',
        ]);

        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/2.jpg',
        ]);
        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/3.jpg',
        ]);

        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/4.jpg',
        ]);
        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/5.jpg',
        ]);
        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/6.jpg',
        ]);

        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/7.jpg',
        ]);
        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/8.jpg',
        ]);
        Image::create([
            'product_id' => $products7->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook 15 OLED A1505VA/9.jpg',
        ]);

        //8
        Product::create([
            'name' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',
            'SKU' => '3874016259',
            'slug' => 'asus-vivobook-go-15-e1504fa-r5-nj776w',
            'description' => 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 3,
            'category_id' => 7,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '7',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7520U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '7',
            'product_specification_id' => '2',
            'value' => '4',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '7',
            'product_specification_id' => '3',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '7',
            'product_specification_id' => '4',
            'value' => '2.80 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '7',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.3 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '7',
            'product_specification_id' => '6',
            'value' => '4 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '7',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '7',
            'product_specification_id' => '8',
            'value' => 'LPDDR5 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '7',
            'product_specification_id' => '9',
            'value' => '5500 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '7',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '7',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '7',
            'product_specification_id' => '12',
	    'value' => '15.6 inch',
  	]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '7',
            'product_specification_id' => '13',
            'value' => 'Full HD+ (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '7',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '7',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '7',
            'product_specification_id' => '16',
            'value' => 'Tấm nền TN, Chống chói Anti Glare, 250 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '7',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - AMD Radeon Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '7',
            'product_specification_id' => '18',
            'value' => 'SonicMaster audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '7',
            'product_specification_id' => '19',
            'value' => 'USB Type-C, 1 x USB 2.0, Jack tai nghe 3.5 mm, 1 x USB 3.2, HDMI',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '7',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '7',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '7',
            'product_specification_id' => '22',
            'value' => 'HD webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '7',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '7',
            'product_specification_id' => '24',
            'value' => 'Độ bền chuẩn quân đội MIL STD 810H, Bản lề mở 180 độ, Bảo mật vân tay, Công tắc khóa camera',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '7',
            'product_specification_id' => '25',
            'value' => 'Dài 360.3 mm - Rộng 232.5 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '7',
	    'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '7',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 42 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '7',
            'product_specification_id' => '28',
            'value' => '45 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '7',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '7',
            'product_specification_id' => '30',
            'value' => 'Bạc',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '7',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '7',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products8 = Product::find(8);

        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg',
        ]);

        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg2.jpg',
        ]);
        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg3.jpg',
        ]);

        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg4.jpg',
        ]);
        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg5.jpg',
        ]);
        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg6.jpg',
        ]);

        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg7.jpg',
        ]);
        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg8.jpg',
        ]);
        Image::create([
            'product_id' => $products8->id,
            'url' => 'uploads/products/Asus/Laptop Asus Vivobook Go 15 E1504FA/1.jpg9.jpg',
        ]);

        //9
        Product::create([
            'name' => 'Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5 125H/16GB/512GB/Túi/Win11 (PP151W) ',
            'SKU' => '5098763124',
            'slug' => 'asus-zenbook-14-oled-ux3405ma-ultra-5-pp151w',
            'description' => 'Mở đầu cho kỷ nguyên laptop mới, hiện đại, thông minh, laptop Asus Zenbook 14 OLED UX3405MA Ultra 5 (PP151W) sở hữu con chip Intel Meteor Lake hoàn toàn mới, được tích hợp hàng loạt những tính năng AI hữu ích, màn hình chuẩn sắc nét. Mẫu sản phẩm này chắc chắn sẽ nâng tầm đáng kể cho phong cách làm việc của bạn.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 3,
            'category_id' => 7,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '9',
            'product_specification_id' => '1',
            'value' => 'Intel Core Ultra 5 Meteor Lake - 125H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '9',
            'product_specification_id' => '2',
            'value' => '14',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '9',
            'product_specification_id' => '3',
            'value' => '18',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '9',
            'product_specification_id' => '4',
            'value' => '1.20 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '9',
            'product_specification_id' => '8',
            'value' => 'Turbo Boost 4.5 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '9',
            'product_specification_id' => '6',
            'value' => '18 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '9',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '9',
            'product_specification_id' => '8',
            'value' => 'LPDDR5X (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '9',
            'product_specification_id' => '9',
            'value' => '5200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '9',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '9',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '9',
            'product_specification_id' => '12',
            'value' => '14 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '9',
            'product_specification_id' => '13',
            'value' => '2.8K (2880 x 1800) - OLED 16:10',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '9',
            'product_specification_id' => '14',
            'value' => '120 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '9',
            'product_specification_id' => '15',
            'value' => '100% DCI-P3',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '9',
            'product_specification_id' => '16',
            'value' => 'Thời gian phản hồi 0.2 ms, Màn hình bảo vệ mắt - EYE CARE, Low Blue Light, LED Backlit, Màn hình OLED, 400 nits, 600 nits (Khi bật HDR), 1.07 tỷ màu',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '9',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Arc Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '9',
            'product_specification_id' => '18',
            'value' => 'Công nghệ Smart AMP, Audio by Harman/Kardon, Dolby Atmos',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '9',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 3.2, HDMI, 2 x Thunderbolt 4 (hỗ trợ Power Delivery, DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '9',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '9',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '9',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam, Camera IR',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '9',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '9',
            'product_specification_id' => '24',
            'value' => 'Độ bền chuẩn quân đội MIL STD 810H, Tiêu chuẩn Nền Intel Evo, Bản lề mở 180 độ, Công tắc khóa camera, Numberpad, Mở khóa khuôn mặt',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '9',
            'product_specification_id' => '25',
            'value' => 'Dài 312.4 mm - Rộng 220.1 mm - Dày 14.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '9',
            'product_specification_id' => '26',
            'value' => 'Vỏ kim loại - Nhôm',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '9',
            'product_specification_id' => '27',
            'value' => '4-cell Li-ion, 75 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '9',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '9',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '9',
            'product_specification_id' => '30',
            'value' => 'Xanh dươnng',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '9',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //thời điểm ra mắt
            'product_id' => '9',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products9 = Product::find(9);

        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/1.jpg',
        ]);

        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/2.jpg',
        ]);
        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/3.jpg',
        ]);

        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/4.jpg',
        ]);
        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/5.jpg',
        ]);
        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/6.jpg',
        ]);

        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/7.jpg',
        ]);
        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/8.jpg',
        ]);
        Image::create([
            'product_id' => $products9->id,
            'url' => 'uploads/products/Asus/Laptop Asus Zenbook 14 OLED UX3405MA Ultra 5/9.jpg',
        ]);
    }
}
