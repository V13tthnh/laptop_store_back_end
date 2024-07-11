<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::prefix('orders')->group(function () {
    Route::name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('create', [OrderController::class, 'create'])->name('create');
        Route::get('data-table', [OrderController::class, 'dataTable'])->name('data.table');
        Route::get('{id}', [OrderController::class, 'show'])->name('show');
        Route::get('{id}/print', [OrderController::class, 'print'])->name('print');
        Route::post('store', [OrderController::class, 'store'])->name('store');
        Route::get('{id}/edit', [OrderController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [OrderController::class, 'update'])->name('update');
        Route::post('update-status', [OrderController::class, 'updateStatus'])->name('update.status');
        Route::post('send-email', [OrderController::class, 'sendEMail'])->name('send.email');
        // Route::post('/add-to-invoice', [OrderController::class, 'addToInvoice'])->name('add-to-invoice');
        // Route::post('update-status', [OrderController::class, 'updateStatus'])->name('update-status');
    });
});



