<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::delete('delete/{id}', 'API\AuthController@delete');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\AuthController@details');
});

Route::get('user', 'API\AuthController@index');

// Ecommerce Templates


Route::post('app_users', 'API\CustomerRegisterController@customerregister');
Route::post('sign-in', 'API\CustomerRegisterController@signin');
Route::post('logout', 'API\CustomerRegisterController@logout');
Route::post('ecomm_update_user', 'API\CustomerRegisterController@customerregisterupdate');
Route::get('privacy_policy', 'API\E_Commerce\EcommerceThemeController@privacy_policy');
Route::get('ecomm_app_setting', 'API\E_Commerce\EcommAppSettingController@index');
Route::get('ecomm_splashscreen', 'API\E_Commerce\EcommTempSettingController@splashscreen');
Route::get('ecomm_loginscreen', 'API\E_Commerce\EcommTempSettingController@loginscreen');
Route::get('ecomm_signupscreen', 'API\E_Commerce\EcommTempSettingController@signupscreen');
Route::get('ecomm_collections', 'API\E_Commerce\EcommTempSettingController@collections');
Route::get('ecomm_products', 'API\E_Commerce\EcommTempSettingController@products');
Route::get('show_favourite', 'API\E_Commerce\EcommTempSettingController@show_favourite');
Route::post('productsrange', 'API\E_Commerce\EcommTempSettingController@productsrange');

Route::post('ecomm_sorting', 'API\E_Commerce\EcommTempSettingController@sorting');
Route::post('product_variations', 'API\E_Commerce\EcommTempSettingController@product_variations');
Route::post('ecomm_filter_products', 'API\E_Commerce\EcommTempSettingController@filter_products');
Route::post('ecomm_productbycategories', 'API\E_Commerce\EcommTempSettingController@productsbycategories');
Route::post('ecomm_productbycatlogin', 'API\E_Commerce\EcommTempSettingController@productbycat_login');
Route::post('ecomm_productfavourite', 'API\E_Commerce\EcommTempSettingController@productfavourite');
Route::get('searchproduct', 'API\E_Commerce\EcommTempSettingController@searchproduct');

Route::post('ecomm_productdetails', 'API\E_Commerce\EcommTempSettingController@productdetails');
Route::post('ecomm_loginproductdetails', 'API\E_Commerce\EcommTempSettingController@loginproductdetails');

Route::get('shipping_details', 'API\ShippingController@shipping_details');
Route::get('themes', 'API\E_Commerce\EcommerceThemeController@ecommerce_theme');
Route::get('userthemes', 'API\E_Commerce\EcommerceThemeController@usertheme');

Route::post('forgot_password', 'API\CustomerRegisterController@forgot_password');
Route::post('match_otp', 'API\CustomerRegisterController@match_otp');
Route::post('reset_password', 'API\CustomerRegisterController@reset_password');
Route::post('change_password', 'API\CustomerRegisterController@change_password');

Route::get('coupon_detail', 'API\E_Commerce\CouponController@coupon_details');

Route::group(['middleware' => 'guest:app_user'], function () {
    Route::get('profile', 'API\CustomerRegisterController@customerprofile');
    Route::post('add_to_cart', 'API\E_Commerce\CartController@add_to_cart');
    Route::get('carts', 'API\E_Commerce\CartController@carts');
    Route::post('remove_cart', 'API\E_Commerce\CartController@remove_cart');
    Route::post('apply_coupon', 'API\E_Commerce\CartController@apply_coupon');
    Route::post('ecomm_payment', 'API\E_Commerce\PaymentController@ecomm_payment');
    Route::get('generate_token', 'API\E_Commerce\PaymentController@generate_token');
    Route::get('ecomm_address', 'API\E_Commerce\CartController@address');
    Route::post('ecomm_storeaddress', 'API\E_Commerce\CartController@storeaddress');
    Route::post('ecomm_address_update', 'API\E_Commerce\CartController@storeaddressupdate');
    Route::post('ecomm_address_delete', 'API\E_Commerce\CartController@deleteaddress');
    Route::post('ecomm_address_show', 'API\E_Commerce\CartController@showaddress');
    Route::get('my_orders', 'API\E_Commerce\PaymentController@my_orders');
    Route::post('order_details', 'API\E_Commerce\PaymentController@order_details');
    Route::post('order_invoice', 'API\E_Commerce\PaymentController@invoice');
});

// Food Templates

Route::post('food_categories', 'API\Food_Delivery\CategoryController@categories');
Route::post('food_products', 'API\Food_Delivery\ProductController@products');
Route::post('food_app_users', 'API\Food_Delivery\AuthController@register');
Route::post('food_sign-in', 'API\Food_Delivery\AuthController@signin');
Route::post('food_forgot_password', 'API\Food_Delivery\AuthController@forgot_password');
Route::post('food_match_otp', 'API\Food_Delivery\AuthController@match_otp');


Route::group(['middleware' => 'guest:food_app_user'], function () {
    Route::post('food_remove_account', 'API\Food_Delivery\AuthController@remove_account');

    Route::get('food_logout', 'API\Food_Delivery\AuthController@logout');
    Route::get('food_profile', 'API\Food_Delivery\AuthController@user');
    Route::post('edit_profile', 'API\Food_Delivery\AuthController@edit_profile');
    Route::get('food_promo', 'API\Food_Delivery\PaymentController@promo');
    Route::post('food_apply_promo', 'API\Food_Delivery\CartController@promo');
    Route::post('food_review_basket', 'API\Food_Delivery\CartController@review_basket');
    Route::post('food_generate_token', 'API\Food_Delivery\PaymentController@generate_token');
    Route::post('good_generate_customer', 'API\Food_Delivery\PaymentController@generate_customer');
    Route::get('food_card_lists', 'API\Food_Delivery\PaymentController@get_all_cards');
    Route::post('food_payment', 'API\Food_Delivery\PaymentController@payment');
    Route::get('food_my_orders', 'API\Food_Delivery\PaymentController@my_orders');
    Route::get('food_my_order_history/{id}', 'API\Food_Delivery\PaymentController@my_order_history');
    Route::match(['get', 'post'], 'food_cards', 'API\Food_Delivery\PaymentController@add_cards');
    Route::post('food_square_payment', 'API\Food_Delivery\ChargeController@payment');
    Route::group(['prefix' => 'customer'], function () {
        Route::post('charge', 'API\Food_Delivery\ChargeController@charge');
    });
});


Route::group(['prefix' => 'customer'], function () {
    Route::post('food_create', 'API\Food_Delivery\ChargeController@createCustomer');
});

Route::post('food_related_products', 'API\Food_Delivery\AppController@related_products');
Route::post('food_featured_product', 'API\Food_Delivery\AppController@featured_product');
Route::post('food_product_detail', 'API\Food_Delivery\AppController@single_product_detail');
Route::post('food_product_show_accroding_to_catsub', 'API\Food_Delivery\AppController@product_show_according_to_catsub');
Route::post('food_search', 'API\Food_Delivery\AppController@search');
Route::post('food_contact_us', 'API\Food_Delivery\AppController@contact_us');
Route::post('food_postcode', 'API\Food_Delivery\AppController@postcode');
Route::post('food_postcode_new', 'API\Food_Delivery\AppController@postcode_new');
Route::get('food_shopinfo', 'API\Food_Delivery\AppController@shopinfo');
Route::post('food_send_email', 'API\Food_Delivery\AppController@send_email');

Route::post('food_cart', 'API\Food_Delivery\CartController@cart');
Route::post('food_add_to_cart', 'API\Food_Delivery\CartController@addToCart');
Route::post('food_update_cart', 'API\Food_Delivery\CartController@updateCart');
Route::post('food_remove_from_cart', 'API\Food_Delivery\CartController@deleteCart');

Route::get('food_banners', 'API\Food_Delivery\AppController@banners');
Route::get('food_search_name', 'API\Food_Delivery\AppController@search_product');
Route::get('food_subscription', 'API\Food_Delivery\ChargeController@subscription');

// Booking Templates


Route::post('booking_register', 'API\Booking\AuthController@register');
Route::post('booking_login', 'API\Booking\AuthController@login');
Route::post('booking_forgot_password', 'API\Booking\AuthController@forgot_password');
Route::post('booking_match_otp', 'API\Booking\AuthController@match_otp');
Route::post('booking_change_password', 'API\Booking\AuthController@change_password');

Route::group(['middleware' => 'guest:booking_app_user'], function () {

    Route::get('booking_logout', 'API\Booking\AuthController@logout');
    Route::get('booking_profile', 'API\Booking\AuthController@profile');
    Route::post('booking_edit_profile', 'API\Booking\AuthController@edit_profile');
    Route::post('booking_edit_address', 'API\Booking\AuthController@edit_address');
    Route::post('booking_update_password', 'API\Booking\AuthController@update_password');
    Route::post('booking_update_firebase_token', 'API\Booking\AuthController@update_firebase_token');
    Route::post('booking_add_booking', 'API\Booking\AppController@add_booking');
    Route::post('booking_add_newcar', 'API\Booking\AppController@add_newcar');
    Route::get('booking_customer_allcars', 'API\Booking\AppController@customer_allcars');
    Route::post('booking_select_car', 'API\Booking\AppController@select_car');
    Route::post('booking_remove_car', 'API\Booking\AppController@remove_car');
    Route::get('booking_generate_token', 'API\Booking\AppController@generate_token');
    Route::get('booking_cust_upcomeing_booking', 'API\Booking\AppController@cust_upcomeing_booking');
    Route::get('booking_cust_completed_booking', 'API\Booking\AppController@cust_completed_booking');
    Route::post('booking_cust_cancel_booking', 'API\Booking\AppController@cust_cancel_booking');
    Route::post('booking_cust_view_booking', 'API\Booking\AppController@cust_view_booking');
    Route::post('booking_apply_promo', 'API\Booking\AppController@apply_promo');
    Route::match(['get', 'post'], 'booking_add_cards', 'API\Booking\AppController@add_cards');
    Route::get('booking_count', 'API\Booking\AppController@booking_count');

    /*-------Admin API------------*/

    Route::get('booking_all_new_jobs', 'API\Booking\AppController@all_new_jobs');
    Route::post('confirm_booking', 'API\Booking\AppController@confirm_booking');
    Route::get('booking_all_upcomeing_jobs', 'API\Booking\AppController@all_upcomeing_jobs');
    Route::post('booking_upcomeing_jobs_by_date', 'API\Booking\AppController@upcomeing_jobs_by_date');
    Route::post('booking_admin_view_full_job', 'API\Booking\AppController@admin_view_full_job');
    Route::post('booking_job_done', 'API\Booking\AppController@job_done');

    Route::get('booking_all_completed_jobs', 'API\Booking\AppController@all_completed_jobs');
    Route::post('booking_admin_view_completed_job', 'API\Booking\AppController@admin_view_completed_job');
});
Route::post('booking_check_promo', 'API\Booking\AppController@check_promo');
Route::get('booking_cartypes', 'API\Booking\AppController@cartypes');
Route::get('booking_deals', 'API\Booking\AppController@deals');
Route::get('booking_free_booking_deals', 'API\Booking\AppController@free_booking_deals');
Route::post('booking_deal_services', 'API\Booking\AppController@deal_services');
Route::post('booking_postcode', 'API\Booking\AppController@postcode');
Route::post('booking_postcode_new', 'API\Booking\AppController@postcode_new');
Route::post('booking_workingday_time', 'API\Booking\AppController@workingday_time');
Route::get('booking_faqs', 'API\Booking\AppController@faqs');
Route::post('booking_contact_us', 'API\Booking\AppController@contact_us');
Route::get('booking_vat_servicefee', 'API\Booking\AppController@vat_servicefee');
