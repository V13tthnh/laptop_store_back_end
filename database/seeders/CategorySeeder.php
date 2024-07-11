<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Category::create(['name' => 'Laptop', 'slug' => 'laptop', 'description' => 'laptop', 'parent_id' => null]);
        //2
        Category::create(['name' => 'Thương hiệu', 'slug' => 'thuong-hieu', 'description' => 'laptop', 'parent_id' => null]);
        //3
        Category::create(['name' => 'Giá bán', 'slug' => 'gia-ban', 'description' => 'laptop', 'parent_id' => null]);
        //4
        Category::create(['name' => 'Nhu cầu sử dụng', 'slug' => 'nhu-cau', 'description' => 'laptop', 'parent_id' => null]);
        //5
        Category::create(['name' => 'LENOVO', 'slug' => 'lenovo', 'description' => 'laptop', 'parent_id' => 2]);
        //6
        Category::create(['name' => 'DELL', 'slug' => 'dell', 'description' => 'laptop', 'parent_id' => 2]);
        //7
        Category::create(['name' => 'ASUS', 'slug' => 'asus', 'description' => 'laptop', 'parent_id' => 2]);
        //8
        Category::create(['name' => 'ACER', 'slug' => 'acer', 'description' => 'laptop', 'parent_id' => 2]);
        //9
        Category::create(['name' => 'MSI', 'slug' => 'msi', 'description' => 'laptop', 'parent_id' => 2]);
        //10
        Category::create(['name' => 'MACBOOK', 'slug' => 'macbook', 'description' => 'laptop', 'parent_id' => 2]);
        //11
        Category::create(['name' => 'HP', 'slug' => 'hp', 'description' => 'laptop', 'parent_id' => 2]);
        //12
        Category::create(['name' => 'MASSTEL', 'slug' => 'masstel', 'description' => 'laptop', 'parent_id' => 2]);

        Category::create(['name' => 'Laptop AI', 'slug' => 'laptop-ai', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop đồ họa', 'slug' => 'laptop-do-hoa', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop sinh viên', 'slug' => 'laptop-sinh-vien', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop văn phòng', 'slug' => 'laptop-van-phong', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop cảm ứng 2 in 1', 'slug' => 'laptop-cam-ung', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop mỏng nhẹ', 'slug' => 'laptop-mong-nhe', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop workstation', 'slug' => 'laptop-workstation', 'description' => 'laptop', 'parent_id' => 4]);
        Category::create(['name' => 'Laptop cũ-giá rẻ', 'slug' => 'laptop-cu-gia-re', 'description' => 'laptop', 'parent_id' => 4]);

        Category::create(['name' => 'Dưới 15 triệu', 'slug' => 'laptop-hoc-tap-va-lam-viec-duoi-15tr', 'description' => 'laptop', 'parent_id' => 3]);
        Category::create(['name' => 'Từ 15 đến 20 triệu', 'slug' => 'laptop-hoc-tap-va-lam-viec-tu-15tr-den-20tr', 'description' => 'laptop', 'parent_id' => 3]);
        Category::create(['name' => 'Trên 20 triệu', 'slug' => 'laptop-hoc-tap-va-lam-viec-tren-20tr', 'description' => 'laptop', 'parent_id' => 3]);
    }
}
