<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', '\App\Http\Controllers\Frontend\HomeController@index');
Route::get('/home', '\App\Http\Controllers\Frontend\HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', '\App\Http\Controllers\Backend\DashboardController@index')->name('backend.home');
    Route::get('/dashboard', '\App\Http\Controllers\Backend\DashboardController@index')->name('dashboard');
});
