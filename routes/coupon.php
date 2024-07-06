<?php

use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;

Route::prefix('coupons')->group(function () {
    Route::name('coupons.')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('data-table', [CouponController::class, 'dataTable'])->name('data.table');
        Route::post('store', [CouponController::class, 'store'])->name('store');
        Route::get('{id}/edit', [CouponController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [CouponController::class, 'update'])->name('update');
        Route::delete('{id}', [CouponController::class, 'destroy'])->name('destroy');
    });
});


