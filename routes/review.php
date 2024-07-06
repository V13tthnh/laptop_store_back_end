<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('reviews')->group(function () {
    Route::name('reviews.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
        Route::get('data-table', [ReviewController::class, 'dataTable'])->name('data.table');
        Route::post('store', [ReviewController::class, 'store'])->name('store');
        Route::post('{id}/update', [ReviewController::class, 'update'])->name('update');
        Route::delete('{id}', [ReviewController::class, 'destroy'])->name('destroy');
    });
});


