<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\SaleController;
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

Route::prefix('sales')->group(function () {
    Route::name('sales.')->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('index');
        Route::get('create', [SaleController::class, 'create'])->name('create');
        Route::get('data-table', [SaleController::class, 'dataTable'])->name('data.table');
        Route::post('store', [SaleController::class, 'store'])->name('store');
        Route::get('{id}/edit', [SaleController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [SaleController::class, 'update'])->name('update');
        Route::delete('{id}', [SaleController::class, 'destroy'])->name('destroy');
    });
});


