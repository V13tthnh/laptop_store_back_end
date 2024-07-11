<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSpecificationDetail;


class MSISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //30
        Product::create([
            'name' => 'Laptop MSI Gaming Bravo 15 B7ED R5 7535HS/16GB/512GB/4GB RX6550M/144Hz/Win11 (010VN)',
            'SKU' => '5283017496',
            'slug' => 'msi-bravo-15-b7ed-r5-010vn',
            'description' => 'Laptop MSI Gaming Bravo 15 B7ED R5 7535HS (010VN) không chỉ là một mẫu laptop gaming tầm trung thông thường, mà còn là người bạn đồng hành đáng tin cậy dành cho những game thủ cũng như những người đam mê công việc sáng tạo. Với thiết kế hầm hố, máy trở thành biểu tượng của sức mạnh và sự phong cách, hứa hẹn sẽ tạo nên một trải nghiệm tuyệt vời trên mọi đấu trường ảo.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 5,
            'category_id' => 9,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '30',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7535HS',
        ]);

        ProductSpecificationDetail::create([//số nhân
            'product_id' => '30',
            'product_specification_id' => '2',
            'value' => '6',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '30',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '30',
            'product_specification_id' => '4',
            'value' => '3.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '30',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.55 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '30',
            'product_specification_id' => '6',
            'value' => '16 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '30',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '30',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '30',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '30',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '30',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '30',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '30',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '30',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '30',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '30',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '30',
            'product_specification_id' => '17',
            'value' => 'Card rời - AMD Radeon RX 6550M, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '30',
            'product_specification_id' => '18',
            'value' => 'Hi-Res Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '30',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), 1 x USB 2.0, Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ USB 3.2, DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '30',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.3',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '30',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '30',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '30',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '30',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0Bản lề mở 180 độ',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '30',
            'product_specification_id' => '25',
            'value' => 'Dài 359 mm - Rộng 259 mm - Dày 24.95 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '30',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '30',
            'product_specification_id' => '27',
            'value' => '3 cell, 53.5 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '30',
            'product_specification_id' => '28',
            'value' => '180 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '30',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '30',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '30',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '30',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products30 = Product::find(30);

        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/1.jpg',
        ]);

        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/1.jpg',
        ]);
        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/3.jpg',
        ]);

        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/4.jpg',
        ]);
        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/5.jpg',
        ]);
        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/6.jpg',
        ]);
        Image::create([
            'product_id' => $products30->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Bravo 15 B7ED/7.jpg',
        ]);

        //31
        Product::create([
            'name' => 'Laptop MSI Gaming Cyborg 15 A12VE i7 12650H/16GB/512GB/6GB RTX4050/144Hz/Balo/Win11 (240VN)',
            'SKU' => '6409817352',
            'slug' => 'msi-gaming-cyborg-15-a12ve-i7-240vn',
            'description' => 'Laptop MSI Gaming Cyborg 15 A12VE i7 12650H (240VN) không chỉ là một chiếc laptop mạnh mẽ, mà còn là người bạn đồng hành đáng tin cậy cho cả game thủ và những chuyên viên thiết kế đồ họa chuyên nghiệp. Sở hữu cấu hình vượt trội cùng thiết kế đẳng cấp, chiếc máy này đáp ứng mọi nhu cầu giải trí và sáng tạo của bạn một cách hoàn hảo..',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 5,
            'category_id' => 9,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '31',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Alder Lake - 12650H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '31',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '31',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '31',
            'product_specification_id' => '4',
            'value' => '2.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '31',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.7 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '31',
            'product_specification_id' => '6',
            'value' => '24 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '31',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '31',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '31',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '31',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '31',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '31',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '31',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '31',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '31',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '31',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '31',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 4050, 6 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '31',
            'product_specification_id' => '18',
            'value' => 'Hi-Res Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '31',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ USB 3.2, DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '31',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6E (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '31',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '31',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '31',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '31',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '31',
            'product_specification_id' => '25',
            'value' => 'Dài 359.36 mm - Rộng 250.34 mm - Dày 22.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '31',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '31',
            'product_specification_id' => '27',
            'value' => '3 cell, 53.5 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '31',
            'product_specification_id' => '28',
            'value' => '120 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '31',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '31',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '31',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '31',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);


        $products31 = Product::find(31);

        Image::create([
            'product_id' => $products31->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Cyborg 15 A12VE/1.jpg',
        ]);

        Image::create([
            'product_id' => $products31->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Cyborg 15 A12VE/1.jpg',
        ]);
        Image::create([
            'product_id' => $products31->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Cyborg 15 A12VE/3.jpg',
        ]);

        Image::create([
            'product_id' => $products31->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Cyborg 15 A12VE/4.jpg',
        ]);
        Image::create([
            'product_id' => $products31->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Cyborg 15 A12VE/5.jpg',
        ]);

        //32
        Product::create([
            'name' => 'Laptop MSI Gaming GF63 Thin 12UCX i5 12450H/16GB/512GB/4GB RTX2050/144Hz/Win11 (873VN) ',
            'SKU' => '7392041865',
            'slug' => 'msi-gaming-gf63-thin-12ucx-i5-873vn',
            'description' => 'Mẫu laptop Gaming "quốc dân" sở hữu mức giá thân thiện phù hợp với mọi game thủ, mang trong mình hiệu suất mạnh mẽ vượt trội cùng đa dạng các tính năng sử dụng. Laptop MSI Gaming GF63 Thin 12UCX i5 12450H (873VN) chắc chắn là sự lựa chọn tuyệt vời cho những buổi chiến game của bạn.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 5,
            'category_id' => 9,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '32',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 12450H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '32',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '32',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '32',
            'product_specification_id' => '4',
            'value' => '2.00 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '32',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '32',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '32',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '32',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '32',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '32',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '32',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe Gen 4.0Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '32',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '32',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '32',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '32',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '32',
            'product_specification_id' => '16',
            'value' => 'Wled-backlit, Tấm nền IPS, Chống chói Anti Glare',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '32',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 2050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '32',
            'product_specification_id' => '18',
            'value' => 'Hi-Res AudioNahimic 3',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '32',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ USB 3.2, DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '32',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '32',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '32',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '32',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '32',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '32',
            'product_specification_id' => '25',
            'value' => 'Dài 359 mm - Rộng 254 mm - Dày 21.7 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '32',
            'product_specification_id' => '26',
            'value' => 'Nắp lưng và chiếu nghỉ tay bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '32',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 52.4 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '32',
            'product_specification_id' => '28',
            'value' => '120 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '32',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '32',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '32',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '32',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);


        $products32 = Product::find(32);

        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/1.jpg',
        ]);

        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/1.jpg',
        ]);
        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/3.jpg',
        ]);

        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/4.jpg',
        ]);
        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/5.jpg',
        ]);
        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/6.jpg',
        ]);
        Image::create([
            'product_id' => $products32->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming GF63 Thin 12UCX/7.jpg',
        ]);

        //33
        Product::create([
            'name' => 'Laptop MSI Gaming Katana 15 B13UDXK i7 13620H/16GB/1TB/6GB RTX3050/144Hz/Balo/Win11 (2077VN) ',
            'SKU' => '8905123476',
            'slug' => 'msi-katana-15-b13udxk-i7-2077vn',
            'description' => 'Laptop MSI Gaming Katana 15 B13UDXK i7 13620H (2077VN) - cỗ máy chiến game đỉnh cao đến từ MSI với chip Intel Gen 13 dòng H hiệu năng cao và card RTX 30 series mạnh mẽ, sẵn sàng chinh phục mọi chiến trường ảo cùng cộng đồng game thủ.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 5,
            'category_id' => 9,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '33',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Raptor Lake - 13620H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '33',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '33',
            'product_specification_id' => '3',
            'value' => '16',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '33',
            'product_specification_id' => '4',
            'value' => '2.40  GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '33',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.9 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '33',
            'product_specification_id' => '6',
            'value' => '24 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '33',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '33',
            'product_specification_id' => '8',
            'value' => 'DDR5 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '33',
            'product_specification_id' => '9',
            'value' => '5200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '33',
            'product_specification_id' => '10',
            'value' => '64 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '33',
            'product_specification_id' => '11',
            'value' => '1 TB SSD NVMe PCIe Gen 4',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '33',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '33',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '33',
            'product_specification_id' => '14',
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '33',
            'product_specification_id' => '15',
            'value' => '45% NTSC',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '33',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '33',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 3050, 6 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '33',
            'product_specification_id' => '18',
            'value' => 'Hi-Res Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '33',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), 1 x USB 2.0, Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ USB 3.2, DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '33',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6E (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '33',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '33',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '33',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '33',
            'product_specification_id' => '24',
            'value' => 'TPM 2.0Bản lề mở 180 độ',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '33',
            'product_specification_id' => '25',
            'value' => 'Dài 359 mm - Rộng 259 mm - Dày 24.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '33',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '33',
            'product_specification_id' => '27',
            'value' => '3 cell, 53.5 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '33',
            'product_specification_id' => '28',
            'value' => '180 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '33',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '33',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '33',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '33',
            'product_specification_id' => '32',
            'value' => '2024',
        ]);

        $products33 = Product::find(33);

        Image::create([
            'product_id' => $products33->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Katana 15 B13UDXK/1.jpg',
        ]);

        Image::create([
            'product_id' => $products33->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Katana 15 B13UDXK/1.jpg',
        ]);
        Image::create([
            'product_id' => $products33->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Katana 15 B13UDXK/3.jpg',
        ]);

        Image::create([
            'product_id' => $products33->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Katana 15 B13UDXK/4.jpg',
        ]);
        Image::create([
            'product_id' => $products33->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Katana 15 B13UDXK/5.jpg',
        ]);
        Image::create([
            'product_id' => $products33->id,
            'url' => 'uploads/products/MSI/Laptop MSI Gaming Katana 15 B13UDXK/6.jpg',
        ]);

        Product::create([
            'name' => 'Laptop MSI Modern 15 B12MO i5 1235U/8GB/512GB/Win11 (625VN)  ',
            'SKU' => '1824079356',
            'slug' => 'msi-modern-15-b12mo-i5-625vn',
            'description' => 'Laptop MSI Modern 15 B12MO i5 1235U (625VN) mang đam mê của bạn bắt nhịp với lối sống năng động hiện đại. Dù là bạn đang bận rộn trong văn phòng hay làm việc trên giảng đường, vi xử lý Intel Core Alder lake thế hệ mới cũng sẽ đáp ứng mọi nhu cầu của bạn.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 5,
            'category_id' => 9,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '34',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Alder Lake - 1235U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '34',
            'product_specification_id' => '2',
            'value' => '10',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '34',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '34',
            'product_specification_id' => '4',
            'value' => '1.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '34',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.4 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '34',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '34',
            'product_specification_id' => '7',
            'value' => '8 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '34',
            'product_specification_id' => '8',
            'value' => 'DDR4 (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '34',
            'product_specification_id' => '9',
            'value' => '3200 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '34',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '34',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '34',
            'product_specification_id' => '12',
            'value' => '15.6 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '34',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '34',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '34',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '34',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPSChống chói Anti Glare',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '34',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - Intel Iris Xe Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '34',
            'product_specification_id' => '18',
            'value' => 'Hi-Res Audio',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '34',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 1 x USB 3.2, HDMI, 2 x USB 2.0, 1 x USB Type-C (hỗ trợ USB, Power Delivery và DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '34',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6 (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '34',
            'product_specification_id' => '21',
            'value' => 'Micro SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '34',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '34',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '34',
            'product_specification_id' => '24',
            'value' => 'Bản lề mở 180 độ',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '34',
            'product_specification_id' => '25',
            'value' => 'Dài 359 mm - Rộng 241 mm - Dày 19.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '34',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '34',
            'product_specification_id' => '27',
            'value' => '3-Cell, 39.3 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '34',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '34',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '34',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '34',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '34',
            'product_specification_id' => '32',
            'value' => '2023',
        ]);

        $products34 = Product::find(34);

        Image::create([
            'product_id' => $products34->id,
            'url' => 'uploads/products/MSI/Laptop MSI Modern 15 B12MO/1.jpg',
        ]);

        Image::create([
            'product_id' => $products34->id,
            'url' => 'uploads/products/MSI/Laptop MSI Modern 15 B12MO/1.jpg',
        ]);
        Image::create([
            'product_id' => $products34->id,
            'url' => 'uploads/products/MSI/Laptop MSI Modern 15 B12MO/3.jpg',
        ]);

        Image::create([
            'product_id' => $products34->id,
            'url' => 'uploads/products/MSI/Laptop MSI Modern 15 B12MO/4.jpg',
        ]);
        Image::create([
            'product_id' => $products34->id,
            'url' => 'uploads/products/MSI/Laptop MSI Modern 15 B12MO/5.jpg',
        ]);
        Image::create([
            'product_id' => $products34->id,
            'url' => 'uploads/products/MSI/Laptop MSI Modern 15 B12MO/6.jpg',
        ]);
    }
}
