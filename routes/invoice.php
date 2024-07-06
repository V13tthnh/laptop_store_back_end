<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


Route::prefix('invoices')->group(function () {
    Route::name('invoices.')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('create', [InvoiceController::class, 'create'])->name('create');
        Route::get('data-table', [InvoiceController::class, 'dataTable'])->name('data.table');
        Route::get('{id}', [InvoiceController::class, 'show'])->name('show');
        Route::post('store', [InvoiceController::class, 'store'])->name('store');
        Route::get('{id}/edit', [InvoiceController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [InvoiceController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [InvoiceController::class, 'destroy'])->name('destroy');
        Route::post('/add-to-invoice', [InvoiceController::class, 'addToInvoice'])->name('add-to-invoice');
        Route::post('update-status', [InvoiceController::class, 'updateStatus'])->name('update-status');

    });
});



