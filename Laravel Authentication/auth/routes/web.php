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

Route::GET('admin/editor','EditorController@index');
Route::GET('admin/test','EditorController@test');

// custom admin authentication fucntionality route

Route::GET('admin/home','AdminController@index')->name('admin.home');

Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login');


Route::POST('admin-password\email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::GET('admin-password\reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

Route::POST('admin-password\reset','Admin\ResetPasswordController@reset')->name('admin.password.update');

Route::GET('admin-password\reset\{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

// custom register and login route

Route::get('custom-register','CustomController@showRegisterForm')->name('custom-register');
Route::post('custom-register','CustomController@register');


Route::get('custom-login','CustomController@showLoginForm')->name('custom-login');
Route::post('custom-login','CustomController@login');

// Access Control Level Route

