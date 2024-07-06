<?php

use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;



Route::prefix('suppliers')->group(function () {
    Route::name('suppliers.')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('data-table', [SupplierController::class, 'dataTable'])->name('data.table');
        Route::post('store', [SupplierController::class, 'store'])->name('store');
        Route::get('{id}/edit', [SupplierController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [SupplierController::class, 'update'])->name('update');
        Route::delete('{id}', [SupplierController::class, 'destroy'])->name('destroy');
    });
});


