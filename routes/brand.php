<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brands')->group(function () {
    Route::name('brands.')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('data-table', [BrandController::class, 'dataTable'])->name('data.table');
        Route::post('store', [BrandController::class, 'store'])->name('store');
        Route::get('{id}/edit', [BrandController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [BrandController::class, 'update'])->name('update');
        Route::delete('{id}', [BrandController::class, 'destroy'])->name('destroy');
    });
});


