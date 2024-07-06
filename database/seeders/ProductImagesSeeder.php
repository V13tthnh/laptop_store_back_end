<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products1 = Product::find(1);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/1.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/2.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/3.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/4.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/5.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/6.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/7.jpg',
        ]);

        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/8.jpg',
        ]);
        Image::create([
            'product_id' => $products1->id,
            'url' => 'uploads/products/asus-1/9.jpg',
        ]);


        $products2 = Product::find(2);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/1.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/2.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/3.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/4.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/5.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/6.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/7.jpg',
        ]);

        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/8.jpg',
        ]);
        Image::create([
            'product_id' => $products2->id,
            'url' => 'uploads/products/hp-1/9.jpg',
        ]);
    }
}
