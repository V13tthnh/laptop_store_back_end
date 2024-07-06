<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('products')->group(function () {
    Route::name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::get('data-table', [ProductController::class, 'dataTable'])->name('data.table');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [ProductController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('trash', [ProductController::class, 'trash'])->name('trash');
        Route::get('data-table-trash', [ProductController::class, 'dataTableTrash'])->name('data.table.trash');
        Route::get('restore/{id}', [ProductController::class, 'restore'])->name('restore');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('check-slug', [ProductController::class, 'checkSlug'])->name('check-slug');
    });
});



