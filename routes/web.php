<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/products', function () {
    if (Auth::check()) {
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('product.index', compact('role'));
    }

})->middleware(['auth', 'verified'])->name('products.name');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        require __DIR__ . '/dashboard.php';

        require __DIR__ . '/category.php';

        require __DIR__ . '/supplier.php';

        require __DIR__ . '/brand.php';

        require __DIR__ . '/product_specification.php';

        require __DIR__ . '/product.php';

        require __DIR__ . '/role-permission.php';

        require __DIR__ . '/user.php';

        require __DIR__ . '/invoice.php';

        require __DIR__ . '/order.php';

        require __DIR__ . '/address.php';

        require __DIR__ . '/coupon.php';

        require __DIR__ . '/review.php';

        require __DIR__ . '/banner.php';
    });
});
Route::get('mail', function () {
    return view('mail.forgot-password');
});
require __DIR__ . '/auth.php';


