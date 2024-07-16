<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\MailController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

//Auth API
Route::post('login', [AuthController::class, 'login']);

Route::get('auth/redirect/{provider}', [AuthController::class, 'redirect']);
Route::get('auth/callback/{provider}', [AuthController::class, 'callback']);

Route::post('register', [AuthController::class, 'register']);
Route::get('/email/verify/{email}', [MailController::class, 'verifyEmail']);
Route::post('email/resend', [MailController::class, 'resend']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
//Category
Route::get('/categories', [CategoryController::class, 'fetchAllCategories']);
//Laptop
Route::get('/laptops', [ProductController::class, 'fetchAllProductData']);
Route::get('/laptop/{slug}', [ProductController::class, 'getProductBySlug']);
Route::get('/laptop/search/{key}', [ProductController::class, 'search']);
Route::get('/get-related-product', [ProductController::class, 'getRelatedProducts']);
Route::post('/get-total-reviews-of-product', [ReviewController::class, 'getTotalReviewOfProduct']);
Route::post('/fetch-reviews-of-product', [ReviewController::class, 'fetchPreviewOfProduct']);
Route::get('/laptops/filter', [ProductController::class, 'filter']);
Route::post('/related-laptops', [ProductController::class, 'getRelatedProducts']);
Route::get('/featured-laptops', [ProductController::class, 'getFeaturedProducts']);
//Brand
Route::get('/brands', [BrandController::class, 'getAllBrand']);
Route::get('/provinces', [AddressController::class, 'getProvinces']);
Route::get('/provinces/{provinceId}/districts', [AddressController::class, 'getDistrictsByProvinceId']);
Route::get('/districts/{districtId}/wards', [AddressController::class, 'getWardsByDistrictsId']);

//Banner
Route::get('/banners', [BannerController::class, 'banners']);

Route::post('/momo/checkout', [CheckoutController::class, 'momoCheckout']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    //Quản lý thông tin người dùng
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('/update-profile', [CustomerController::class, 'updateProfile']);
    Route::post('/change-password', [CustomerController::class, 'changePassword']);

    //Quản lý địa chỉ
    Route::get('/addresses/{id}/all', [AddressController::class, 'getAllAddress']);
    Route::get('/addresses/{id}', [AddressController::class, 'getAllAddressNotDefault']);
    Route::get('/address/{id}/default', [AddressController::class, 'getDefaultAddress']);
    Route::post('/addresses', [AddressController::class, 'store']);
    Route::put('/addresses/{id}', [AddressController::class, 'update']);
    Route::delete('/addresses/{id}', [AddressController::class, 'delete']);
    Route::post('/address/{id}/set-default', [AddressController::class, 'setDefault']);
    Route::post('/address/{id}/province-type', [AddressController::class, 'getProvinceType']);

    //mã giảm giá
    Route::get('/coupons', [CouponController::class, 'getAllCoupons']);
    Route::post('/apply-coupon', [CouponController::class, 'applyCoupon']);
    Route::post('/get-available-coupons', [CouponController::class, 'getAvailableCoupons']);

    //hóa đơn
    Route::post('/get-order-detail', [OrderController::class, 'getOrderDetails']);
    Route::post('/get-orders', [OrderController::class, 'getAllOrders']);
    Route::post('/cancel-order', [OrderController::class, 'cancelOrder']);
    Route::post('/re-order', [OrderController::class, 'reOrder']);

    //Đánh giá
    Route::post('/store-review', [ReviewController::class, 'store']);

    //Thanh toán
    Route::post('/checkout-online', [CheckoutController::class, 'onlineCheckout']);
    Route::post('/checkout', [OrderController::class, 'store']);
    route::get('/vnp/callback', [CheckoutController::class, 'vnPayCallBack']);

    //tính phí ship
    Route::post('/calculate-shipping-fee', [ShippingController::class, 'calculateShippingFee']);
});

