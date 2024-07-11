<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::prefix('customers')->group(function () {
    Route::name('customers.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('data-table', [CustomerController::class, 'listDataTableCustomers'])->name('data-table');
        Route::post('store', [CustomerController::class, 'store'])->name('store');
        Route::get('{id}', [CustomerController::class, 'show'])->name('detail');
        Route::get('{id}/edit', [CustomerController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [CustomerController::class, 'update'])->name('update');
        Route::get('trash', [CustomerController::class, 'trash'])->name('trash');
        Route::get('data-table-trash', [CustomerController::class, 'dataTableTrash'])->name('data.table.trash');
        Route::get('restore/{id}', [CustomerController::class, 'restore'])->name('restore');
        Route::delete('{id}', [CustomerController::class, 'destroy'])->name('destroy');
    });
});



Route::prefix('employees')->group(function () {
    Route::name('employees.')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('data-table', [EmployeeController::class, 'listDataTableUsers'])->name('data-table');
        Route::post('store', [EmployeeController::class, 'store'])->name('store');
        Route::get('{id}', [EmployeeController::class, 'show'])->name('detail');
        Route::get('{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [EmployeeController::class, 'update'])->name('update');
        Route::get('trash', [EmployeeController::class, 'trash'])->name('trash');
        Route::get('data-table-trash', [EmployeeController::class, 'dataTableTrash'])->name('data.table.trash');
        Route::get('restore/{id}', [EmployeeController::class, 'restore'])->name('restore');
        Route::delete('{id}', [EmployeeController::class, 'destroy'])->name('destroy');
    });
});



