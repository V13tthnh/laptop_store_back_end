<?php

use App\Http\Controllers\ProductSpecificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('product-specifications')->group(function () {
    Route::name('product-specifications.')->group(function () {
        Route::get('/', [ProductSpecificationController::class, 'index'])->name('index');
        Route::get('data-table', [ProductSpecificationController::class, 'dataTable'])->name('data.table');
        Route::post('store', [ProductSpecificationController::class, 'store'])->name('store');
        Route::get('{id}/edit', [ProductSpecificationController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [ProductSpecificationController::class, 'update'])->name('update');
        Route::delete('{id}', [ProductSpecificationController::class, 'destroy'])->name('destroy');
    });
});


