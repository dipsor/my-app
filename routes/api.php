<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'Api', 'prefix' => '/v1'], function () {
    Route::group(['prefix' => '/users'], function() {
        Route::get('/', 'UsersController@index')->name('users.api.index');
        Route::post('/', 'UsersController@store')->name('users.api.store');
        Route::delete('/{id}', 'UsersController@destroy')->name('users.api.destroy');
        Route::get('/{id}', 'UsersController@show')->name('users.api.show');
        Route::put('/{id}', 'UsersController@update')->name('users.api.update');
        Route::put('/profile-update/{id}', 'UsersController@updateGeneralInfo')->name('users.api.update.general.info');
        Route::put('/user-password-update/{id}', 'UsersController@updatePassword')->name('users.api.update.password');
    });

    Route::group(['prefix' => '/roles'], function() {
        Route::get('/', 'RolesController@index')->name('roles.api.index');
    });

    Route::group(['prefix' => '/teams'], function() {
        Route::get('/', 'TeamsController@index')->name('teams.api.index');
    });

});