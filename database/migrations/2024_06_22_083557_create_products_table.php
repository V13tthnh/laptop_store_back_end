<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('SKU');
            $table->string('slug');
            $table->integer('quantity')->default(0);
            $table->double('unit_price')->default(0);
            $table->double('sale_price')->default(0);
            $table->text('description');
            $table->boolean('featured');
            $table->float('overrate')->default(0);
            $table->tinyInteger('status');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
