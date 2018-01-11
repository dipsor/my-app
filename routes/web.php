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
Route::impersonate();

Route::get('/', 'HomeController@index');
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function () {
    // Users
    Route::group(['prefix' => 'users', 'namespace' => 'Users'], function () {
        Route::get('/', 'UsersController@index')->name('users.index');
    });

});

Route::get('login/facebook', 'Auth\FacebookAuthController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\FacebookAuthController@handleProviderCallback')->name('facebook.login.callback');
Route::get('login/google', 'Auth\GoogleAuthController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\GoogleAuthController@handleProviderCallback')->name('google.login.callback');
Auth::routes();

