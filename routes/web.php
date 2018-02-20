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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'client_guest'], function(){
    Route::get('clientregister','ClientAuth\RegisterController@showRegistrationForm');
    Route::post('clientregister','ClientAuth\RegisterController@register');
    Route::get('clientlogin', 'ClientAuth\LoginController@showLoginForm');
    Route::post('clientlogin', 'ClientAuth\LoginController@login');

    //password reset routes
    Route::get('clientpassword/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('clientpassword/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail');
    // Route::get('clientpassword/reset/{token}','ClientAuth\ResetPasswordController@showResetForm');
    // Route::post('clientpassword/reset', 'ClientAuth\ResetPasswordController@reset');

});

//only logged in clients can access or send requests to these pages
Route::group(['middleware' => 'client_auth'], function(){
    // Route::post('clientlogout', 'ClientAuth\LoginController@logout');
    Route::get('/clientlogout','ClientAuth\LoginController@logout');
    Route::get('/clientdashboard', function(){
        return view('client.dashboard');
    });
    
    Route::get('/clientdashboard', 'ClientController@index');
    Route::get('/clientprofile','ClientController@details');
    //users/
    Route::group(['prefix' => 'client/'], function(){
        Route::get('users','ClientController@showUsers');
        Route::get('user/create','ClientController@createUserForm');
        Route::post('user/create','ClientController@storeUser');
    });
});

