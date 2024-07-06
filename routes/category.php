<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::prefix('categories')->group(function () {
    Route::name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('data-table', [CategoryController::class, 'dataTable'])->name('data.table');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [CategoryController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [CategoryController::class, 'destroy'])->name('destroy');
        Route::delete('delete', [CategoryController::class, 'deleteSelectedCategories']);
        Route::get('check-slug', [CategoryController::class, 'checkSlug'])->name('check-slug');
    });
});


