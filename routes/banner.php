<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('banners')->group(function () {
    Route::name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('data-table', [BannerController::class, 'dataTable'])->name('data.table');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('{id}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [BannerController::class, 'update'])->name('update');
        Route::delete('{id}', [BannerController::class, 'destroy'])->name('destroy');
    });
});


