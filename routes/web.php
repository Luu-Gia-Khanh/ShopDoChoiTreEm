<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('layout', function () {
    return view('layout');
});
Route::get('dashboard', function () {
    return view('admin_layout');
});

//ADMIN
Route::prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('all_category', 'CategoryController@all_category');
        Route::get('add_category', 'CategoryController@add_category');
        Route::get('remove_cate/{id}', 'CategoryController@remove_category');
        Route::get('update_cate/{id}', 'CategoryController@update_category');

        Route::post('process_add_category', 'CategoryController@process_add_category');
        Route::post('process_update_category/{id}', 'CategoryController@process_update_category');

    });

    Route::prefix('product')->group(function () {
        Route::get('all_product', 'ProductController@all_product');
        Route::get('add_product', 'ProductController@add_product');
        Route::get('remove_product/{id}', 'ProductController@remove_product');
        Route::get('update_product/{id}', 'ProductController@update_product');

        Route::post('process_add_product', 'ProductController@process_add_product');
        Route::post('process_update_product/{id}', 'ProductController@process_update_product');
    });

    Route::prefix('admin')->group(function () {
        Route::get('all_admin', 'AdminController@all_admin');
        Route::get('add_amin', 'AdminController@add_admin');
        Route::get('remove_admin/{id}', 'AdminController@remove_admin');
        Route::get('update_admin/{id}', 'AdminController@update_admin');

        Route::post('process_add_admin', 'AdminController@process_add_admin');
        Route::post('process_update_admin/{id}', 'AdminController@process_update_admin');
    });
    Route::prefix('voucher')->group(function () {
        Route::get('add_voucher', 'CouponController@add_coupon');
        Route::post('process_add_voucher', 'CouponController@process_add_voucher');
        Route::post('check_coupon', 'CouponController@check_coupon');
    });
});
//LOGIN
Route::get('LoginAdmin', 'AdminController@LoginAdmin');
Route::post('process_login', 'AdminController@process_login');

//HOME

Route::get('TrangChu', 'HomeController@index');
Route::get('desc_product/{id}', 'HomeController@desc_product');

//ADD CART
Route::post('add_to_cart', 'CartController@save_cart');
Route::get('show_cart', 'CartController@show_cart');
Route::get('remove_item_cart/{id}', 'CartController@remove_item_cart');
Route::post('update_cart', 'CartController@update_cart');
Route::get('clear_cart', 'CartController@clear_cart');

//Check Out
Route::get('login_user', 'CheckoutController@login_user');
Route::post('process_login_user', 'CheckoutController@process_login_user');
Route::get('logout_user', 'CheckoutController@logout_user');

Route::get('add_user_meta', 'CheckoutController@add_user_meta');
Route::post('process_add_user_meta', 'CheckoutController@process_add_user_meta');
Route::get('check_out', 'CheckoutController@check_out');
Route::post('payment', 'CheckoutController@payment');
Route::get('history_order', 'CheckoutController@history_oder');
Route::get('order_item/{id}', 'CheckoutController@order_item');

Route::get('payment_paypal', 'CheckoutController@payment_paypal');
