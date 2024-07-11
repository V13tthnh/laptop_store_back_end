<?php

use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->group(function () {
    Route::name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('revenue', [DashboardController::class, 'getRevenueData'])->name('revenue');
        Route::get('order-status-summary', [DashboardController::class, 'getOrderStatusSummary'])->name('order.total.summary');
        Route::get('shipped', [DashboardController::class, 'shipped'])->name('order.shipped');
    });
});



