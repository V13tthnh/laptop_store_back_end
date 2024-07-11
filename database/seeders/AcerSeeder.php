<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Image;
use App\Models\ProductSpecificationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Product::create([
            'name' => 'Laptop Acer Gaming Aspire 5 A515 58GM 51LB i5 13420H/16GB/512GB/4GB RTX2050/Win11 (NX.KQ4SV.002)',
            'SKU' => '7345921034',
            'slug' => 'acer-aspire-5-a515-58gm-51lb-i5-nxkq4sv002',
            'description' => 'Mẫu laptop gaming với mức giá tầm trung đến từ thương hiệu Acer vừa được lên kệ tại Thế Giới Di Động, sở hữu hiệu năng mạnh mẽ với con chip Intel Gen 13 dòng H hiệu năng cao, RAM 16 GB, card rời RTX cùng nhiều tính năng hiện đại. Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5 13420H (NX.KQ4SV.002) chắc chắn sẽ mang đến cho bạn những trải nghiệm sử dụng và chiến game giải trí tuyệt vời.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 4,
            'category_id' => 8,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '1',
            'product_specification_id' => '1',
            'value' => 'Intel Core i5 Raptor Lake - 13420H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '1',
            'product_specification_id' => '2',
            'value' => '8',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '1',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '1',
            'product_specification_id' => '4',
            'value' => '2.10  GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '1',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.6 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '1',
            'product_specification_id' => '6',
            'value' => '12 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '1',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '1',
            'product_specification_id' => '8',
            'value' => 'DDR4 2 khe (1 khe 8 GB + 1 khe 8 GB)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '1',
            'product_specification_id' => '9',
            'value' => '3200  MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '1',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '1',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe Gen 4 mở rộng (nâng cấp tối đa 1 TB)',
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
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '1',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPSAcer ComfyView',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '1',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 2050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '1',
            'product_specification_id' => '18',
            'value' => 'Acer Purified Voice',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '1',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 2 x USB Type-A, HDMI, 1 x USB Type-C (hỗ trợ USB, Thunderbolt 4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '1',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.1',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '1',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '1',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '1',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '1',
            'product_specification_id' => '24',
            'value' => 'Bảo mật vân tay',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '1',
            'product_specification_id' => '25',
            'value' => 'Dài 361 mm - Rộng 237 mm - Dày 17.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '1',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa - nắp lưng bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '1',
            'product_specification_id' => '27',
            'value' => '3-cell Li-ion, 50 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '1',
            'product_specification_id' => '28',
            'value' => '90 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '1',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '1',
            'product_specification_id' => '30',
            'value' => 'Xám',
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

        $products1 = Product::find(1);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/1.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/2.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/3.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/4.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/5.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/6.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/7.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/8.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/Acer/Laptop Acer Aspire 3 A315 510P 32EF/9.jpg',
        ]);


        //2
        Product::create([
            'name' => 'Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J i7 12700H/8GB/512GB/4GB RTX3050/144Hz/Win11 (NH.QFHSV.003)',
            'SKU' => '9182736450',
            'slug' => 'acer-nitro-5-an515-58-769j-i7-nhqfhsv003',
            'description' => 'Trải nghiệm giải trí đỉnh cao nhờ hiệu năng từ con chip Intel Core i7 dòng H series hiệu năng cao cùng ngoại hình độc đáo, laptop Acer Gaming Nitro 5 AN515 58 769J i7 12700H (NH.QFHSV.003) chắc chắn sẽ trở thành trợ thủ đắc lực cho người dùng trong những chiến trường ảo đầy kịch tính hay những tác vụ văn phòng và đồ hoạ chuyên nghiệp.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 4,
            'category_id' => 8,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '2',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Alder Lake - 12700H',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '2',
            'product_specification_id' => '2',
            'value' => '14',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '2',
            'product_specification_id' => '3',
            'value' => '20',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '2',
            'product_specification_id' => '4',
            'value' => '2.30  GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '2',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.7 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '2',
            'product_specification_id' => '6',
            'value' => '24 MB',
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
            'value' => '3200  MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '2',
            'product_specification_id' => '10',
            'value' => '32 GB',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '2',
            'product_specification_id' => '11',
            'value' => '512 GB SSD NVMe PCIe 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB), Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng, Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 1 TB)',
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
            'value' => '144 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '2',
            'product_specification_id' => '15',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '2',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, LED Backlit, Acer ComfyView',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '2',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 3050, 4 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '2',
            'product_specification_id' => '18',
            'value' => 'Spatial Audio, Acer Purified Voice, Acer TrueHarmony, DTS:X ULTRA',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '2',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ USB, DisplayPort, Thunderbolt 4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '2',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6 (802.11ax)Bluetooth 5.1',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '2',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '2',
            'product_specification_id' => '22',
            'value' => 'HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '2',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '2',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '2',
            'product_specification_id' => '25',
            'value' => 'Dài 360.4 mm - Rộng 271.09 mm - Dày 25.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '2',
            'product_specification_id' => '26',
            'value' => 'Vỏ nhựa',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '2',
            'product_specification_id' => '27',
            'value' => '4-cell Li-ion, 57.5 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '2',
            'product_specification_id' => '28',
            'value' => '180 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '2',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '2',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '2',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '2',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);

        $products2 = Product::find(2);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/1.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/2.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/3.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/4.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/5.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/6.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/7.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/8.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J/9.jpg',
        ]);

        //3
        Product::create([
            'name' => 'Laptop Acer Gaming Predator Helios 16 PH16 71 72BV i7 13700HX/16GB/512GB/8GB RTX4070/240Hz/Win11 (NH.QJRSV.001)',
            'SKU' => '5627812390',
            'slug' => 'acer-predator-helios-16-ph16-71-72bv-i7-nhqjrsv001',
            'description' => 'Siêu phẩm nhà Acer được ra mắt là một biểu tượng đầy ấn tượng trong thế giới laptop gaming, chinh phục người dùng bởi sự kết hợp hoàn hảo giữa thiết kế sang trọng và hiệu năng mạnh mẽ. Laptop Acer Gaming Predator Helios 16 PH16 71 72BV i7 13700HX (NH.QJRSV.001) được đánh giá là một công cụ giải trí tuyệt vời, một đối tác lý tưởng cho những nhiệm vụ đòi hỏi hiệu suất cao.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 4,
            'category_id' => 8,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '3',
            'product_specification_id' => '1',
            'value' => 'Intel Core i7 Raptor Lake - 13700HX',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '3',
            'product_specification_id' => '2',
            'value' => '24',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '3',
            'product_specification_id' => '3',
            'value' => '24',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '3',
            'product_specification_id' => '4',
            'value' => '2.10 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '3',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 5.0 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '3',
            'product_specification_id' => '6',
            'value' => '30 MB',
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
            'value' => '512 GB SSD NVMe PCIe SED (Có thể tháo ra, lắp thanh khác nâng cấp tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '3',
            'product_specification_id' => '12',
            'value' => '16 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '3',
            'product_specification_id' => '13',
            'value' => 'WQXGA (2560 x 1600)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '3',
            'product_specification_id' => '14',
            'value' => '240 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '3',
            'product_specification_id' => '15',
            'value' => '100% DCI-P3',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '3',
            'product_specification_id' => '16',
            'value' => 'Tấm nền IPS, LED Backlit, Acer ComfyView, 500 nits brightness, NVIDIA Advanced Optimus',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '3',
            'product_specification_id' => '17',
            'value' => 'Card rời - NVIDIA GeForce RTX 4070, 8 GB',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '3',
            'product_specification_id' => '18',
            'value' => 'Spatial Audio, Acer Purified Voice, Acer TrueHarmony, DTS:X ULTRA',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '3',
            'product_specification_id' => '19',
            'value' => 'LAN (RJ45), Jack tai nghe 3.5 mm, 3 x USB 3.2, HDMI, 2 x USB Type-C (hỗ trợ DisplayPort, Thunderbolt 4)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '3',
            'product_specification_id' => '20',
            'value' => 'Bluetooth 5.2Wi-Fi 6E (802.11ax)',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '3',
            'product_specification_id' => '21',
            'value' => 'Micro SD',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '3',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '3',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '3',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '3',
            'product_specification_id' => '25',
            'value' => 'Dài 357.78 mm - Rộng 278.74 mm - Dày 24.9 ~ 26.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '3',
            'product_specification_id' => '26',
            'value' => 'Nắp lưng và chiếu nghỉ tay bằng kim loại',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '3',
            'product_specification_id' => '27',
            'value' => '4-cell Li-ion, 90 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '3',
            'product_specification_id' => '28',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '3',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '3',
            'product_specification_id' => '30',
            'value' => 'Đen',
        ]);
        ProductSpecificationDetail::create([ //bảo hành
            'product_id' => '3',
            'product_specification_id' => '31',
            'value' => '12 tháng',
        ]);
        ProductSpecificationDetail::create([ //ngày ra mắt
            'product_id' => '3',
            'product_specification_id' => '32',
            'value' => '2022',
        ]);

        $products3 = Product::find(3);

        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/1.jpg',
        ]);

        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/2.jpg',
        ]);
        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/3.jpg',
        ]);

        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/4.jpg',
        ]);
        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/5.jpg',
        ]);

        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/6.jpg',
        ]);
        Image::create([
            'product_id' => $products3->id,
            'url' => 'uploads/products/Acer/Laptop Acer Gaming Predator Helios 16 PH16 71 72BV/7.jpg',
        ]);


        ///4
        Product::create([
            'name' => 'Laptop Acer Swift Go 14 41 R251 R5 7430U/16GB/1TB/Win11 (NX.KG3SV.005)',
            'SKU' => '8057329146',
            'slug' => 'acer-swift-go-14-41-r251-r5-nxkg3sv005',
            'description' => 'Siêu phẩm nhà Acer được ra mắt là một biểu tượng đầy ấn tượng trong việc văn phòng, chinh phục người dùng bởi sự kết hợp hoàn hảo giữa thiết kế sang trọng và hiệu năng mạnh mẽ được đánh giá là một công học tập tuyệt vời, một đối tác lý tưởng cho những nhiệm vụ đòi hỏi hiệu suất cao.',
            'featured' => 1,
            'status' => 1,
            'brand_id' => 4,
            'category_id' => 8,
        ]);

        ProductSpecificationDetail::create([//công nghệ cpu
            'product_id' => '4',
            'product_specification_id' => '1',
            'value' => 'AMD Ryzen 5 - 7430U',
        ]);
        ProductSpecificationDetail::create([//số nhân
            'product_id' => '4',
            'product_specification_id' => '2',
            'value' => '6',
        ]);
        ProductSpecificationDetail::create([//số luồng
            'product_id' => '4',
            'product_specification_id' => '3',
            'value' => '12',
        ]);
        ProductSpecificationDetail::create([//tốc độ cpu
            'product_id' => '4',
            'product_specification_id' => '4',
            'value' => '2.30 GHz',
        ]);
        ProductSpecificationDetail::create([//tốc độ tối đa
            'product_id' => '4',
            'product_specification_id' => '5',
            'value' => 'Turbo Boost 4.3 GHz',
        ]);
        ProductSpecificationDetail::create([//bộ nhớ đệm
            'product_id' => '4',
            'product_specification_id' => '6',
            'value' => '16 MB',
        ]);
        ProductSpecificationDetail::create([//ram
            'product_id' => '4',
            'product_specification_id' => '7',
            'value' => '16 GB',
        ]);
        ProductSpecificationDetail::create([//loại ram
            'product_id' => '4',
            'product_specification_id' => '8',
            'value' => 'LPDDR4X (Onboard)',
        ]);
        ProductSpecificationDetail::create([//tốc độ bus ram
            'product_id' => '4',
            'product_specification_id' => '9',
            'value' => '4800 MHz',
        ]);
        ProductSpecificationDetail::create([//hỗ trợ ram tối đa
            'product_id' => '4',
            'product_specification_id' => '10',
            'value' => 'Không hỗ trợ nâng cấp',
        ]);
        ProductSpecificationDetail::create([//ổ cứng
            'product_id' => '4',
            'product_specification_id' => '11',
            'value' => '1 TB SSD M.2 PCIe (Có thể tháo ra, lắp thanh khác tối đa 2 TB)',
        ]);
        ProductSpecificationDetail::create([//màn hình
            'product_id' => '4',
            'product_specification_id' => '12',
            'value' => '14 inch',
        ]);
        ProductSpecificationDetail::create([//độ phân giải
            'product_id' => '4',
            'product_specification_id' => '13',
            'value' => 'Full HD (1920 x 1080)',
        ]);
        ProductSpecificationDetail::create([//tần số quét
            'product_id' => '4',
            'product_specification_id' => '14',
            'value' => '60 Hz',
        ]);
        ProductSpecificationDetail::create([//độ phủ màu
            'product_id' => '4',
            'product_specification_id' => '15',
            'value' => '100% sRGB',
        ]);
        ProductSpecificationDetail::create([//công nghệ màn hình
            'product_id' => '4',
            'product_specification_id' => '16',
            'value' => 'TFT, LED Backlit, Acer ComfyView, Độ sáng 300 nits',
        ]);
        ProductSpecificationDetail::create([//card màn hình
            'product_id' => '4',
            'product_specification_id' => '17',
            'value' => 'Card tích hợp - AMD Radeon Graphics',
        ]);
        ProductSpecificationDetail::create([//công nghệ âm thanh
            'product_id' => '4',
            'product_specification_id' => '18',
            'value' => 'Acer Purified Voice, Acer TrueHarmony, DTS:X ULTRA',
        ]);
        ProductSpecificationDetail::create([//cổng giao tiếp
            'product_id' => '4',
            'product_specification_id' => '19',
            'value' => 'Jack tai nghe 3.5 mm, 2 x USB 3.2, HDMI, 1 x USB Type-C (hỗ trợ USB 3.2, DisplayPort)',
        ]);
        ProductSpecificationDetail::create([//kết nối không dây
            'product_id' => '4',
            'product_specification_id' => '20',
            'value' => 'Wi-Fi 6E (802.11ax)Bluetooth 5.1',
        ]);
        ProductSpecificationDetail::create([//khe đọc thẻ nhớ
            'product_id' => '4',
            'product_specification_id' => '21',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//webcam
            'product_id' => '4',
            'product_specification_id' => '22',
            'value' => 'Full HD Webcam',
        ]);
        ProductSpecificationDetail::create([//đèn pin
            'product_id' => '4',
            'product_specification_id' => '23',
            'value' => 'Không có',
        ]);
        ProductSpecificationDetail::create([//tính năng khác
            'product_id' => '4',
            'product_specification_id' => '24',
            'value' => '',
        ]);
        ProductSpecificationDetail::create([//kích thước, trọng lượng
            'product_id' => '4',
            'product_specification_id' => '25',
            'value' => 'Dài 321.71 mm - Rộng 211.72 mm - Dày 15.9 mm',
        ]);
        ProductSpecificationDetail::create([//chất liệu
            'product_id' => '4',
            'product_specification_id' => '26',
            'value' => 'Vỏ hợp kim Nhôm',
        ]);
        ProductSpecificationDetail::create([//thông tin pin
            'product_id' => '4',
            'product_specification_id' => '27',
            'value' => '50 Wh',
        ]);
        ProductSpecificationDetail::create([//công suất bộ sạc
            'product_id' => '4',
            'product_specification_id' => '28',
            'value' => '65 W',
        ]);
        ProductSpecificationDetail::create([ //hệ điều hành
            'product_id' => '4',
            'product_specification_id' => '29',
            'value' => 'Windows 11 Home SL',
        ]);
        ProductSpecificationDetail::create([ //màu sắc
            'product_id' => '4',
            'product_specification_id' => '30',
            'value' => 'Bạc',
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

        $products4 = Product::find(4);

        Image::create([
            'product_id' => $products4->id,
            'url' => 'uploads/products/Acer/Laptop Acer Swift Go 14 41/1.jpg',
        ]);

        Image::create([
            'product_id' => $products4->id,
            'url' => 'uploads/products/Acer/Laptop Acer Swift Go 14 41/2.jpg',
        ]);
        Image::create([
            'product_id' => $products4->id,
            'url' => 'uploads/products/Acer/Laptop Acer Swift Go 14 41/3.jpg',
        ]);

        Image::create([
            'product_id' => $products4->id,
            'url' => 'uploads/products/Acer/Laptop Acer Swift Go 14 41/4.jpg',
        ]);
        Image::create([
            'product_id' => $products4->id,
            'url' => 'uploads/products/Acer/Laptop Acer Swift Go 14 41/5.jpg',
        ]);

    }
}
