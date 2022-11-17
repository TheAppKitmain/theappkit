<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

//Frontend
Route::get('/', function () {
    $session_out = Request::input('q');
    if ($session_out == 'session_out') {
        Auth::logout();
        return view('appkit_frontend.index');
    } else {
        return view('appkit_frontend.index');
    }
})->name('myhome');

Route::get('/pricing', function () {
    return view('appkit_frontend.pricing');
});
Route::get('/solutions', function () {
    return view('appkit_frontend.solutions');
});
// Route::get('/work', function () {return view('appkit_frontend.work');});
Route::get('/Ecommerce', function () {
    return view('appkit_frontend.Ecommerce');
});
Route::get('/booking', function () {
    return view('appkit_frontend.booking');
});
Route::get('/documents', function () {
    return view('appkit_frontend.documents');
});
Route::get('/shopify', function () {
    return view('appkit_frontend.shopify');
});
Route::get('/shopify_page', function () {
    return view('appkit_frontend.shopify_page');
});
Route::get('/privacy_policy', function () {
    return view('appkit_frontend.privacy_policy');
});

Route::post('contact-request', 'ContactFormController@contactRequest')->name('contact-request');

Route::resource('/blog', 'BlogController');
Route::get('/blog-category/{blogcategory?}', 'BlogController@bloglist')->name('blog-category');
Route::resource('/faqs', 'FaqController');
Route::resource('/residential', 'ResidentialController');


Route::get('/contact_us', 'ContactController@contact_us')->name('contact_us');
Route::get('reload-captcha', 'ContactController@reloadCaptcha');

// Route::post('captcha-validation', [CaptchaValidationController::class, 'capthcaFormValidate']);
// Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha']);

Route::resource('/work', 'OurWorkController');
Route::post('/contact_us_appkit', 'ContactController@contact_appkit_submit')->name('contact_us_appkit');
Route::post('/shopifymail', 'ContactController@shopifymail')->name('shopifymail');
Route::get('/frontent_home', 'HomeController@index')->name('frontent_home');

Auth::routes();

// Themes
Route::resource('/themes', 'ThemeController');
Route::get('category-themes/{id}', 'ThemeController@show')->name('category_theme');
Route::get('logout', 'ThemeController@logout');
Route::get('/template_modal', 'ThemeController@template_modal')->name('template_modal');

//ThemeCategory
Route::get('/themecategory/{slug}', 'ThemeCategoryController@show');
Route::any('/template/{slug}', 'ThemeCategoryController@register_theme')->name('template');

// Build App

// Route::get('/get_data_sameer', 'Admin\Template\AddProductController@get_data_sameer');

Route::resource('/buildapp', 'BuildappController');

// OTP
Route::post('/user_register', 'OtpController@user_register')->name('user_register');
Route::resource('/otp', 'OtpController');
Route::any('user_otp', 'OtpController@user_otp')->name('user_otp');
Route::get('otp_resend', 'OtpController@otp_resend');

// Super Admin
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::match(['get', 'post'], 'send-notification', 'Admin\NotificationController@manage_notification')->name('manage_notification');

    Route::get('/admin/{type?}', 'Admin\AdminController@index')->name('super_admin');
    Route::resource('/admin', 'Admin\AdminController', ['except' => ['index']]);

    Route::get('/shopify_customers/{type?}', 'Admin\ShopifyController@index')->name('shopify_customers');
    Route::resource('/shopify_customers', 'Admin\ShopifyController', ['except' => ['index']]);



    Route::get('/buglist', 'Admin\Custom\BugController@buglist')->name('buglist');
    Route::get('/bug/{id}', 'Admin\Custom\BugController@getbug')->name('getbug');
    Route::get('/showuser_app/{id}', 'Admin\AdminController@showuser_app')->name('showuser_app');

    Route::get('/show_shopify_users/{id}', 'Admin\ShopifyController@show_shopify_users')->name('show_shopify_users');

    Route::get('all-messages', 'Admin\FirebaseController@index')->name('get_all_messages');
    Route::get('all-messages-data/{id?}', 'Admin\FirebaseController@load_ajex_data')->name('load_ajex_data');
    Route::get('get_count', 'Admin\FirebaseController@get_count')->name('get_count');
    Route::get('get_test_data', 'Admin\FirebaseController@get_test_data')->name('get_test_data');
    
    Route::post('send-message', 'Admin\FirebaseController@send_message')->name('send_message');
    
    Route::get('get-message/{id}', 'Admin\FirebaseController@get_message')->name('get_message');

    Route::get('/showuser_app_data/{id}/{app_id}', 'Admin\AdminController@showuser_app_data')->name('showuser_app_data');
    Route::get('/showuser_temp_data/{id}', 'Admin\TemplateviewController@showuser_temp_data')->name('showuser_temp_data');
    Route::get('/employee_updates_list', 'Admin\EmployeeUpdateController@employee_updates_list')->name('employee_updates_list');
    Route::get('/show_employee_updates/{id}', 'Admin\EmployeeUpdateController@show_employee_updates')->name('show_employee_updates');
    
    Route::post('/short-task-list', 'Admin\AdminController@short_task_list')->name('short_task_list');

    Route::resource('/user_template', 'Admin\TemplateviewController');
    Route::resource('/get_started', 'Admin\GetStartedController');


    Route::resource('/uploadbuild', 'Admin\UploadbuildController');
    Route::post('/agreement_upload', 'Admin\UploadbuildController@agreement_upload')->name('agreement_upload');

    Route::post('/bugstatus', 'Admin\AdminController@bugstatus')->name('bugstatus');
    Route::post('/add_xd_link', 'Admin\AdminController@add_xd_link')->name('add_xd_link');

    
    
    Route::post('/maintanence_mail', 'Admin\AdminController@maintanence_mail')->name('maintanence_mail');
    Route::post('/missed_maintanence_mail', 'Admin\AdminController@missed_maintanence_mail')->name('missed_maintanence_mail');
    Route::post('/missed_server_mail', 'Admin\AdminController@missed_server_mail')->name('missed_server_mail');

    Route::post('/upload_details', 'Admin\AdminController@upload_details')->name('upload_details');

    Route::post('/UploadAdminDetail', 'Admin\AdminController@UploadAdminDetail')->name('UploadAdminDetail');
    // Route::match(['get','post'],'upload_details','Admin\AdminController@upload_details')->name('upload_details');

    Route::post('/pmmulaatiple_status_bug', 'Admin\AdminController@pmmultiple_status_bug')->name('pmmultiple_status_bug');

    Route::resource('/addteam', 'Admin\AddteamController');
    Route::resource('/faq', 'Admin\FaqController');

    Route::resource('/to_do_list', 'Admin\ToDoListController');
    Route::get('/view_list/{id}', 'Admin\ToDoListController@view_list')->name('view_list');
    Route::post('/task_reply', 'Admin\ToDoListController@task_reply')->name('task_reply');
    Route::get('delete_task/{id}', 'Admin\ToDoListController@delete_task')->name('delete_task');
    Route::post('/task_status', 'Admin\ToDoListController@task_status')->name('task_status');



    Route::post('faq-position/{id}', 'Admin\FaqController@position')->name('faq-position');

    Route::get('/internal_update', 'Admin\InternalUpdatesController@index')->name('internal_update');
    Route::get('/quote_list', 'Admin\QuoteListController@index')->name('quote_list');
    Route::get('/show_notes/{id}', 'Admin\InternalUpdatesController@show_notes')->name('show_notes');
    Route::get('/show_quotes/{id}', 'Admin\QuoteListController@show_quotes')->name('show_quotes');
    Route::post('/store_notes', 'Admin\InternalUpdatesController@store_notes')->name('store_notes');
    Route::get('/edit_note/{id}', 'Admin\InternalUpdatesController@edit_note')->name('edit_note');
    Route::post('/update_notes', 'Admin\InternalUpdatesController@update_notes')->name('update_notes');
    Route::get('/view_note/{id}', 'Admin\InternalUpdatesController@view_note')->name('view_note');
    Route::post('/note_reply', 'Admin\InternalUpdatesController@note_reply')->name('note_reply');
    Route::post('/note_status', 'Admin\InternalUpdatesController@note_status')->name('note_status');
    Route::post('/quote_status', 'Admin\QuoteListController@quote_status')->name('quote_status');

    Route::get('/delete_quote/{id}', 'Admin\QuoteListController@delete_quote')->name('delete_quote');
    Route::get('/delete_note/{id}', 'Admin\InternalUpdatesController@delete_note')->name('delete_note');

    Route::get('/bug_preview/{id}', 'Admin\AdminController@bug_preview')->name('bug_preview');

    Route::resource('/blogcategory', 'Admin\BlogcategoriesController');

    Route::resource('/theme_blog', 'Admin\BlogController');
    Route::resource('/our_work', 'Admin\OurWorkController');

    Route::resource('/addcategory', 'Admin\AddCategoryController');
    
    Route::resource('/addtheme', 'Admin\AddThemeController');
    Route::resource('/allthemes', 'Admin\AllthemesController');
    Route::resource('/myteam', 'Admin\MyteamController');
    Route::resource('/aboutappnotes', 'Admin\AboutappnotesController');
    Route::resource('/quotes', 'Admin\QuotesController');
    Route::put('/update_quote/{id}', 'Admin\QuotesController@update_quote')->name('update_quote');
    Route::resource('/invoicepayment', 'Admin\InvoicepaymentController');
    Route::post('/update_invoice_url', 'Admin\InvoicepaymentController@update_invoice_url');

    Route::match(['get', 'post'], 'project-managers', 'Admin\AdminController@project_manager')->name('project_manager');
    Route::match(['get', 'post'], 'developers', 'Admin\AdminController@developers')->name('developers');
    Route::get('/edit-users-data/{id}/{type}', 'Admin\AdminController@edit_project_manager')->name('edit_project_manager');
    Route::put('/update-users-data/{id}/{type}', 'Admin\AdminController@update_project_manager')->name('update_project_manager');
    Route::delete('delete-users-data/{id}/{type}', 'Admin\AdminController@delete_project_manager')->name('delete_project_manager');

    // Route::post('adminbuildudid', 'Admin\AdminController@adminbuildudid')->name('adminbuildudid');
    
    Route::match(['get', 'post'], 'custom_users', 'Admin\AdminController@custom_users')->name('custom_users');
    Route::get('/edit_custom_users/{id}/{type}', 'Admin\AdminController@edit_custom_users')->name('edit_custom_users');
    Route::put('/update_custom_users/{id}/{type}', 'Admin\AdminController@update_custom_users')->name('update_custom_users');
    Route::delete('delete_custom_users/{id}/{type}', 'Admin\AdminController@delete_custom_users')->name('delete_custom_users');

    Route::post('/paymentstatus', 'Admin\AdminController@paymentstatus')->name('paymentstatus');
    Route::post('/assignpm', 'Admin\AdminController@assignpm')->name('assignpm');
    Route::get('/customer/pending', 'Admin\ProjectmanagerclientController@myclientspending')->name('myclientspending');
    Route::get('/customer/confirmed', 'Admin\ProjectmanagerclientController@myclientsconfirmed')->name('myclientsconfirmed');
    Route::post('/clientsstatus', 'Admin\AdminController@clientsstatus')->name('clientsstatus');
    Route::resource('/chat', 'Admin\ChatController');
    Route::resource('/timeline', 'Admin\TimelineController');
    Route::resource('/pm_bugs', 'Admin\BugPMController');
    Route::post('/timeline_tasksstatus', 'Admin\AdminController@timeline_tasksstatus')->name('timeline_tasksstatus');
    Route::get('/message/{id}', 'Admin\ChatController@getMessage')->name('message');
    Route::post('message', 'Admin\ChatController@sendMessage');
    Route::get('/delete-task/{id}', 'Admin\TimelineController@custom_delete')->name('delete_task');
    Route::post('select-developers', 'Admin\Team\DevloperappsController@store')->name('select-developers');
    Route::get('remove-developers/{id}', 'Admin\Team\DevloperappsController@delete')->name('remove-developers');
    Route::post('/verifyandroid', 'Admin\AdminController@verifyandroid')->name('verifyandroid');
    Route::post('/verifyios', 'Admin\AdminController@verifyios')->name('verifyios');


    Route::resource('/web-update', 'Admin\WebBugController');
    Route::post('/web_bugstatus', 'Admin\WebBugController@bugstatus')->name('web_bugstatus');


    Route::get('/delete-webbug/{id}', 'Admin\WebBugController@custom_delete')->name('delete_webbug');
    Route::post('/webappkit_tasksstatus', 'Admin\WebBugController@webappkit_tasksstatus')->name('webappkit_tasksstatus');
    Route::resource('/adminaboutapp', 'Admin\AdminaboutappController');
    Route::group(['prefix' => 'app', 'as' => 'app.'], function () {
        Route::resource('/adminaboutapp', 'Admin\AdminaboutappController');
    });
    Route::resource('blogcategories', 'BlogcategoriesController');
});


//Template Dashboard

Route::group(['middleware' => ['auth', 'custom']], function () {

    Route::resource('/dashboard', 'Admin\Template\DashboardController');
    Route::resource('/template_user', 'Admin\Template\TemplateuserController');
    Route::resource('/my-temp-account', 'Admin\Template\MyaccountController');
    Route::resource('/myapp', 'Admin\Template\E_Commerce\MyappController');
    Route::match(['get', 'post'], 'temp_new_user', 'Admin\Template\TemplateuserController@new_user')->name('temp_new_user');
    Route::delete('temp_delete_user/{id}', 'Admin\Template\TemplateuserController@delete_user')->name('temp_delete_user');
    Route::get('/temp_edit_customer_user/{id}', 'Admin\Template\TemplateuserController@edit_customer_user')->name('temp_edit_customer_user');
    Route::put('/temp_update_customer_user/{id}', 'Admin\Template\TemplateuserController@update_customer_user')->name('temp_update_customer_user');


    Route::group(['prefix' => 'theme', 'as' => 'theme.'], function () {

        // Template E_Commerce

        Route::resource('/branding', 'Admin\Template\E_Commerce\TypographyController');
        Route::resource('/products', 'Admin\Template\E_Commerce\ProductController');
        Route::get('deleted_product_image/{id}/{img}', 'Admin\Template\E_Commerce\ProductController@deleted_product_image')->name('deleted_product_image');
        
        Route::resource('/collections', 'Admin\Template\E_Commerce\CollectionController');
        Route::resource('/myorders', 'Admin\Template\E_Commerce\MyOrderController');

        Route::get('new_orders', 'Admin\Template\E_Commerce\MyOrderController@new_orders')->name('new_orders');
        Route::get('confirmed_orders', 'Admin\Template\E_Commerce\MyOrderController@confirmed_orders')->name('confirmed_orders');
        Route::get('shipped_orders', 'Admin\Template\E_Commerce\MyOrderController@shipped_orders')->name('shipped_orders');
        Route::post('update_status', 'Admin\Template\E_Commerce\MyOrderController@update_status')->name('update_status');
        Route::resource('/shipping', 'Admin\Template\E_Commerce\ShippingController');

        Route::resource('/appstore', 'Admin\Template\ThemeAppStoreController');
        Route::resource('/paymentinfo', 'Admin\Template\PaymentInfoController');
        Route::resource('/notifications', 'Admin\Template\PushNotificationController');
        Route::resource('/publish', 'Admin\Template\PublishController');
        Route::resource('/privacypolicy', 'Admin\Template\PrivacyPolicyController');

        Route::resource('/theme_settings', 'Admin\Template\E_Commerce\TemplateSettingController');
        Route::match(['get', 'post'], 'send-notification', 'Admin\Template\PushNotificationController@manage_notification')->name('manage_notification');

        Route::post('/splashscreen', 'Admin\Template\E_Commerce\TemplateSettingController@splash_screen')->name('splashscreen');
        Route::post('/loginscreen', 'Admin\Template\E_Commerce\TemplateSettingController@login_screen')->name('loginscreen');
        Route::post('/signupscreen', 'Admin\Template\E_Commerce\TemplateSettingController@signup_screen')->name('signupscreen');

        Route::get('/edit_variant/{id}', 'Admin\Template\E_Commerce\ProductController@edit_variant')->name('edit_variants');
        Route::get('/del_variant/{id}', 'Admin\Template\E_Commerce\ProductController@del_variant')->name('del_variants');
        Route::post('/update_variants', 'Admin\Template\E_Commerce\ProductController@update_variant')->name('update_variants');;
        Route::post('/add_variants', 'Admin\Template\E_Commerce\ProductController@add_variant')->name('add_variants');

        Route::any('/publish_app', 'Admin\PaymentController@publish_app')->name('publish_app');
        Route::get('/cancel_subscription_data', 'Admin\Template\PublishController@cancel_subscription_view')->name('cancel_subscription_view');
        Route::post('/cancel_subscription', 'Admin\PaymentController@cancel_subscription')->name('cancel_subscription');
        Route::get('/update_subscription_data', 'Admin\Template\PublishController@update_subscription_data')->name('update_subscription_data');
        Route::get('/update_subscription_single/{template_id}/{plan_id}', 'Admin\Template\PublishController@update_subscription_single')->name('update_subscription_single');
        Route::post('/update_subscription', 'Admin\PaymentController@update_subscription')->name('update_subscription');
        Route::get('/addpayment_method', 'Admin\Template\PublishController@addpayment_method')->name('addpayment_method');
        Route::post('/addpayment_method', 'Admin\Template\PublishController@addpayment_method_data')->name('addpayment_method_data');
        Route::post('/deletepayment_method', 'Admin\Template\PublishController@deletepayment_method')->name('deletepayment_method');
        Route::post('/defaultpayment_method', 'Admin\Template\PublishController@defaultpayment_method')->name('defaultpayment_method');

        Route::get('/addcoupon', 'Admin\Template\E_Commerce\CouponController@create')->name('addcoupon');
        Route::get('/coupon', 'Admin\Template\E_Commerce\CouponController@index')->name('coupon');

        Route::get('/editcoupon/{id}', 'Admin\Template\E_Commerce\CouponController@edit')->name('editcoupon');
        Route::post('/storecoupon', 'Admin\Template\E_Commerce\CouponController@storecoupon')->name('storecoupon');
        Route::post('/updatecoupon/{id}', 'Admin\Template\E_Commerce\CouponController@updatecoupon')->name('updatecoupon');
        Route::post('/destroycoupon/{id}', 'Admin\Template\E_Commerce\CouponController@destroycoupon')->name('destroycoupon');

        Route::post('/storestripe', 'Admin\Template\E_Commerce\ECommStripeCredentialsController@storestripe')->name('storestripe');
        Route::get('/addstripe', 'Admin\Template\E_Commerce\ECommStripeCredentialsController@create')->name('addstripe');
        Route::get('/stripe', 'Admin\Template\E_Commerce\ECommStripeCredentialsController@index')->name('stripe');
        Route::get('/editstripe/{id}', 'Admin\Template\E_Commerce\ECommStripeCredentialsController@edit')->name('editstripe');
        Route::post('/updatestripe/{id}', 'Admin\Template\E_Commerce\ECommStripeCredentialsController@update')->name('updatestripe');
        Route::post('/destroystripe/{id}', 'Admin\Template\E_Commerce\ECommStripeCredentialsController@destroy')->name('destroystripe');


        // Template Food & Delivery

        Route::resource('/food_theme_settings', 'Admin\Template\Food_Delivery\TemplateSettingController');
        Route::match(['get', 'post'], 'working_days', 'Admin\Template\Food_Delivery\TemplateSettingController@working_days')->name('working_days');

        Route::resource('/app_settings', 'Admin\Template\Food_Delivery\TypographyController');

        Route::resource('/food_category', 'Admin\Template\Food_Delivery\CategoryController');
        Route::post('get_category', 'Admin\Template\Food_Delivery\ProductAttributeController@get_category')->name('get_category');
        Route::post('get_subcategory', 'Admin\Template\Food_Delivery\ProductAttributeController@get_subcategory')->name('get_subcategory');

        Route::resource('food_products', 'Admin\Template\Food_Delivery\ProductController');
        Route::resource('/food_notifications', 'Admin\Template\Food_Delivery\PushNotificationController');


        Route::match(['get', 'post'], 'add_product/{id}', 'Admin\Template\Food_Delivery\ProductController@add_product_page')->name('add_products');
        Route::match(['get', 'post'], 'theme_add_product/{id}', 'Admin\Template\Food_Delivery\TemplateSettingController@add_product_page')->name('theme_add_products');

        Route::get('edit_product/{id}/{product_id}', 'Admin\Template\Food_Delivery\ProductController@edit_product')->name('edit_product');
        Route::post('edit_product/{id}/{product_id}', 'Admin\Template\Food_Delivery\ProductController@update_product')->name('update_product');

        Route::post('removeProductImage', 'Admin\Template\Food_Delivery\ProductController@removeProductImage')->name('removeProductImage');
        Route::post('update_position', 'Admin\Template\Food_Delivery\ProductController@update_position')->name('update_position');

        Route::post('food_product_attributes/{id}', 'Admin\Template\Food_Delivery\ProductAttributeController@position')->name('position');
        Route::resource('food_product_attributes', 'Admin\Template\Food_Delivery\ProductAttributeController');
        Route::match(['get', 'post'], 'send-food_notification', 'Admin\Template\Food_Delivery\PushNotificationController@manage_food_notification')->name('manage_food_notification');

        Route::resource('food_promo', 'Admin\Template\Food_Delivery\PromoController');

        Route::resource('food_customers', 'Admin\Template\Food_Delivery\CustomerController');

        Route::resource('food_contacts', 'Admin\Template\Food_Delivery\ContactController');

        Route::get('show_inbox/{id}', 'Admin\Template\Food_Delivery\ContactController@contact_us')->name('contact_us');
        Route::match(['get', 'post', 'delete', 'put'], 'banner', 'Admin\Template\Food_Delivery\BannerController@banner')->name('banner');
        Route::post('banner_position/{id}', 'Admin\Template\Food_Delivery\BannerController@position')->name('banner_position');
        Route::post('banner_delete/{id}', 'Admin\Template\Food_Delivery\BannerController@delete')->name('banner_delete');

        Route::match(['get', 'post'], 'shop', 'Admin\Template\Food_Delivery\ShopController@shops')->name('shops');

        Route::get('food_orders', 'Admin\Template\Food_Delivery\PaymentController@orders')->name('orders');
        Route::get('food_orders/{id}', 'Admin\Template\Food_Delivery\PaymentController@order_histories')->name('orders.show');
        Route::get('new_food_orders', 'Admin\Template\Food_Delivery\PaymentController@recent_orders')->name('recent_orders');
        Route::get('completed_food_orders', 'Admin\Template\Food_Delivery\PaymentController@completed_orders')->name('completed_orders');
        Route::get('delivery_food_orders', 'Admin\Template\Food_Delivery\PaymentController@delivery_orders')->name('delivery_orders');
        Route::get('pending_food_orders', 'Admin\Template\Food_Delivery\PaymentController@pending_orders')->name('pending_orders');

        Route::post('/storesquare', 'Admin\Template\Food_Delivery\ECommSquareCredentialsController@storesquare')->name('storesquare');
        Route::get('/addsquare', 'Admin\Template\Food_Delivery\ECommSquareCredentialsController@create')->name('addsquare');
        Route::get('/square', 'Admin\Template\Food_Delivery\ECommSquareCredentialsController@index')->name('square');
        Route::get('/editsquare/{id}', 'Admin\Template\Food_Delivery\ECommSquareCredentialsController@edit')->name('editsquare');
        Route::post('/updatesquare/{id}', 'Admin\Template\Food_Delivery\ECommSquareCredentialsController@update')->name('updatesquare');
        Route::post('/destroysquare/{id}', 'Admin\Template\Food_Delivery\ECommSquareCredentialsController@destroy')->name('destroysquare');


        Route::get('food_delivery_receipts/{id}','Admin\Template\Food_Delivery\PaymentController@delivery_receipt')->name('food_delivery_receipts');

        Route::post('food_update_status','Admin\Template\Food_Delivery\PaymentController@update_status')->name('food_update_status');



        // Booking

        Route::resource('/app_settings', 'Admin\Template\Food_Delivery\TypographyController');
        Route::resource('cartypes', 'Admin\Template\Booking\CartypeController');
        Route::get('booking_contacts', 'Admin\Template\Booking\HomeController@contact_us')->name('booking_contacts');
        Route::resource('booking_customers', 'Admin\Template\Booking\CustomerController');
        Route::resource('services', 'Admin\Template\Booking\ServiceController');
        Route::resource('deals', 'Admin\Template\Booking\DealController');
        Route::resource('booking_promo', 'Admin\Template\Booking\PromoController');
        Route::resource('booking_faqs', 'Admin\Template\Booking\FaqController');
        Route::resource('booking_theme_settings', 'Admin\Template\Booking\TemplateSettingController');
        Route::match(['get', 'post'], 'working_day_time', 'Admin\Template\Booking\HomeController@working_day_time')->name('working_day_time');
        Route::get('bookings', 'Admin\Template\Booking\BookingController@index')->name('bookings');
        Route::get('view_job/{id}', 'Admin\Template\Booking\BookingController@view_job')->name('view_job');
        Route::get('new_booking', 'Admin\Template\Booking\BookingController@new_booking')->name('new_booking');
        Route::get('accept_jobs', 'Admin\Template\Booking\BookingController@accept_jobs')->name('accept_jobs');
        Route::get('started_jobs', 'Admin\Template\Booking\BookingController@started_jobs')->name('started_jobs');
        Route::get('cancelled_jobs', 'Admin\Template\Booking\BookingController@cancelled_jobs')->name('cancelled_jobs');
        Route::get('completed_jobs', 'Admin\Template\Booking\BookingController@completed_jobs')->name('completed_jobs');
        Route::post('update_status', 'Admin\Template\Booking\BookingController@update_status')->name('update_status');

        Route::resource('booking_orders', 'Admin\Template\Booking\MyOrderController');
        Route::get('booking_new_orders', 'Admin\Template\Booking\MyOrderController@new_orders')->name('booking_new_orders');
        Route::get('booking_confirmed_orders', 'Admin\Template\Booking\MyOrderController@confirmed_orders')->name('booking_confirmed_orders');
        Route::get('booking_shipped_orders', 'Admin\Template\Booking\MyOrderController@shipped_orders')->name('booking_shipped_orders');
        Route::post('booking_update_status', 'Admin\Template\Booking\MyOrderController@update_status')->name('booking_update_status');
        Route::post('/booking_splashscreen', 'Admin\Template\Booking\TemplateSettingController@splash_screen')->name('booking_splashscreen');

        // Meal Prep

        Route::resource('/meal_theme_settings', 'Admin\Template\Meal_Prep\TemplateSettingController');
        Route::resource('/meal_collections', 'Admin\Template\Meal_Prep\CollectionController');
        Route::resource('/meal_products', 'Admin\Template\Meal_Prep\ProductController');
    });

    //Custom Dashboard

    Route::resource('/home', 'Admin\Custom\DashboardController');
    Route::resource('/myapps', 'Admin\Custom\MyappsController');
    Route::get('/mywebapps', 'Admin\Custom\MyappsController@mywebapps')->name('mywebapps');
    Route::match(['get', 'post'], 'new_user', 'Admin\Custom\UserController@new_user')->name('new_user');
    Route::delete('delete_user/{id}', 'Admin\Custom\UserController@delete_user')->name('delete_user');
    Route::get('show_details', 'Admin\Custom\UserController@show_details')->name('show_details');

    Route::get('show_admin_details', 'Admin\Custom\UserController@show_admin_details')->name('show_admin_details');

    Route::get('/edit_customer_user/{id}', 'Admin\Custom\UserController@edit_customer_user')->name('edit_customer_user');
    Route::put('/update_customer_user/{id}', 'Admin\Custom\UserController@update_customer_user')->name('update_customer_user');

    Route::group(['prefix' => 'app', 'as' => 'app.'], function () {

        Route::resource('/aboutapp', 'Admin\Custom\AboutappController');
        Route::resource('/aboutwebapp', 'Admin\Custom\AboutwebController');
        Route::resource('/domaindetail', 'Admin\Custom\DomaindetailController');
        Route::resource('/storeinformation', 'Admin\Custom\StoreInformationController');
        Route::resource('/appstore', 'Admin\Custom\AppstoreController');
        Route::resource('/designdetail', 'Admin\Custom\DesigndetailController');
        Route::resource('/bug', 'Admin\Custom\BugController');
        Route::resource('/testbuild', 'Admin\Custom\TestbuildController');
        Route::resource('/buildudid', 'Admin\Custom\BuildudidController');
        Route::resource('/agreement', 'Admin\Custom\AgreementController');
        Route::resource('/team', 'Admin\Custom\TeamController');
        Route::resource('/payment', 'Admin\Custom\PaymentController');
        Route::resource('/quote', 'Admin\Custom\QuoteController');
        Route::resource('/project_timeline', 'Admin\Custom\ProjectTimelineController');
        Route::resource('/chat', 'Admin\Custom\ChatController');
        Route::resource('/schedulechat', 'Admin\Custom\SchedulechatController');
        Route::get('/message/{id}', 'Admin\Custom\ChatController@getMessage')->name('message');
        Route::post('message', 'Admin\Custom\ChatController@sendMessage');
        Route::post('/send_message_user', 'Admin\Custom\ChatController@sendMessage');
        Route::get('get_customer_count', 'Admin\Custom\ChatController@get_count')->name('get_customer_count');
        Route::get('/user_all_messages/{id}/{pm}','Admin\Custom\ChatController@get_user_chat');
    });

    Route::get('/delete-bug/{id}', 'Admin\Custom\BugController@custom_delete')->name('delete_bug');
    Route::resource('/schedulechat', 'Admin\Custom\SchedulechatController');
    Route::resource('/myaccount', 'Admin\Custom\MyaccountController');
    Route::get('/goto_token_subdomain/{template_id}', 'Admin\Template\DashboardController@subdomain')->name('goto_token_subdomain');
    Route::resource('/custom_user', 'Admin\Custom\CustomuserController');
});

Route::group(['middleware' => ['auth', 'developer']], function () {

    Route::resource('dev-dashboard', 'Admin\Team\DashboardController');
    Route::resource('dev-myaccount', 'Admin\Team\MyaccountController');
    Route::resource('appkitupdate', 'Admin\Team\AppkitUpdatesController');
    Route::get('/dev_bug_preview/{id}', 'Admin\Team\DevloperappsController@bug_preview')->name('dev_bug_preview');
    Route::get('developer_buglist', 'Admin\Team\DevloperappsController@buglist')->name('developer_buglist');
    Route::get('/developer_bug/{id}', 'Admin\Team\DevloperappsController@getbug')->name('developer_bug');
    Route::post('/developer_bugstatus', 'Admin\Team\DevloperappsController@bugstatus')->name('developer_bugstatus');
    Route::get('/developer_app', 'Admin\Team\DevloperappsController@developer_app')->name('developer_app');
    Route::resource('employee_update', 'Admin\EmployeeUpdateController');
    Route::get('/developer_app_data/{id}/{app_id}', 'Admin\Team\DevloperappsController@developer_app_data')->name('developer_app_data');
    Route::post('/uploadbuild_developer', 'Admin\Team\DevloperappsController@uploadbuild_developer')->name('uploadbuild_developer');
    Route::post('/developer_timeline_tasksstatus', 'Admin\Team\DevloperappsController@developer_timeline_tasksstatus')->name('developer_timeline_tasksstatus');
    Route::get('developer_tasks', 'Admin\Team\DevloperappsController@developer_tasks')->name('developer_tasks');
    Route::post('/developer_timeline_add', 'Admin\Team\DevloperappsController@developer_timeline_add')->name('developer_timeline_add');
    Route::get('/developer_timeline/{id}', 'Admin\Team\DevloperappsController@gettask')->name('developer_timeline');
    Route::post('/multiple_status_bug', 'Admin\Team\DevloperappsController@multiple_status_bug')->name('multiple_status_bug');
});
