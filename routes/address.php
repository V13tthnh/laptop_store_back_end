<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::prefix('addresses')->group(function () {
    Route::name('addresses.')->group(function () {
        Route::get('/', [AddressController::class, 'index'])->name('index');
        Route::get('data-table', [AddressController::class, 'dataTable'])->name('data.table');
        Route::post('store', [AddressController::class, 'store'])->name('store');
        Route::get('{id}/edit', [AddressController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [AddressController::class, 'update'])->name('update');
        Route::delete('{id}', [AddressController::class, 'destroy'])->name('destroy');
    });
});


