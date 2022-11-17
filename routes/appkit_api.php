<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('send-verification-code', 'API\App_kit\AuthController@appkit_register_verify');
Route::post('user-registration', 'API\App_kit\AuthController@user_registration');
Route::post('login', 'API\App_kit\AuthController@login');
Route::post('App_forgot_password', 'API\App_kit\AuthController@forgot_password');
Route::post('App_match_otp', 'API\App_kit\AuthController@match_otp');
Route::post('app_change_password', 'API\App_kit\AuthController@change_password');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'API\App_kit\AuthController@logout');
    Route::get('app_customerprofile', 'API\App_kit\AuthController@customerprofile');
    Route::post('customerregisterupdate', 'API\App_kit\AuthController@customerregisterupdate');
    Route::post('user_detail', 'API\App_kit\AuthController@user_details');

    Route::match(['get', 'post'], 'new-user', 'API\App_kit\AuthController@new_user');
    Route::get('delete-user/{id}', 'API\App_kit\AuthController@delete_user');
    Route::get('get-user-details/{id}', 'API\App_kit\AuthController@edit_customer_user');
    Route::post('update-user-details', 'API\App_kit\AuthController@update_customer_user');

    Route::post('appkit_bug_store', 'API\App_kit\BugController@store');
    Route::post('appkit_bug_index', 'API\App_kit\BugController@index');
    Route::get('appkit_bug_show', 'API\App_kit\BugController@show');
    Route::post('appkit_bug_status', 'API\App_kit\BugController@bugstatus');

    //aboutApp

    Route::get('appkit_app_detail', 'API\App_kit\AppController@app_detail');
    Route::post('appkit_app_store', 'API\App_kit\AppController@app_store');
    Route::post('appkit_app_update', 'API\App_kit\AppController@app_update');

    //task

    Route::post('appkit_app_task_index', 'API\App_kit\TaskController@app_task_index');
    Route::post('appkit_app_task_show', 'API\App_kit\TaskController@app_task_show');

    //notification

    Route::post('notification', 'API\App_kit\AuthController@notification');
    Route::get('count-notifications', 'API\App_kit\AuthController@count_notification');
    Route::post('update_firebase', 'API\App_kit\AuthController@update_firebase_token');

    //to do

    Route::get('to_do_list', 'API\App_kit\ToDoListController@index');
    Route::post('to_do_list_store', 'API\App_kit\ToDoListController@store');
    Route::post('task_reply', 'API\App_kit\ToDoListController@task_reply');
    Route::post('delete_task', 'API\App_kit\ToDoListController@delete_task');
    Route::post('task_status', 'API\App_kit\ToDoListController@task_status');
    Route::post('view_list', 'API\App_kit\ToDoListController@view_list');

    Route::post('ChatImages', 'API\App_kit\ToDoListController@ChatImages');
});

Route::get('appkit_bug_bugs', 'API\App_kit\BugController@bugs');
Route::post('user_firebase', 'API\App_kit\AuthController@user_firebase');
Route::post('customer-profile-image', 'API\App_kit\AuthController@customerprofileImage');

Route::post('childProfileImage', 'API\App_kit\AuthController@childProfileImage');
