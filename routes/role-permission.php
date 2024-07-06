<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


Route::prefix('roles')->group(function () {
    Route::name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('data-table', [RoleController::class, 'listDataTableRoles'])->name('data-table');
        Route::post('store', [RoleController::class, 'store'])->name('store')->middleware('permission:store role');
        Route::get('{id}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [RoleController::class, 'update'])->name('update');
        Route::delete('{id}', [RoleController::class, 'destroy'])->name('destroy');
        Route::put('{id}/assign-permission', [RoleController::class, 'assignPermission'])->name('assign.permission');
    });
});


Route::prefix('permissions')->group(function () {
    Route::name('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('data-table', [PermissionController::class, 'listDataTablePermissions'])->name('data-table');
        Route::post('store', [PermissionController::class, 'store'])->name('store');
        Route::get('{id}/edit', [PermissionController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [PermissionController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [PermissionController::class, 'destroy'])->name('destroy');
        Route::get('data-table-trash', [PermissionController::class, 'edit'])->name('trash');
        Route::post('{id}/recover', [PermissionController::class, 'recover'])->name('recover');
    });
});



