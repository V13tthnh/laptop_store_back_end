<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->double('value');
            $table->double('minimum_spend'); //chi phí tối thiểu
            $table->tinyInteger('type'); //1: % đơn hàng. 2:giảm giá tiền, 3: giao hàng(freeship)
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->text('description');
            $table->tinyInteger('status'); //1: xuất bản, 2: chờ xét duyệt, 3: bản nháp
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
