<?php

/**
 * Authenticated routes for admin
 * Prefix 'admin/', middleware 'auth:'web', 'auth', 'user-type:ADMIN'
 *  * Name 'admin.'
 * Namespace 'App\Http\Controllers\admin
 */

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('admins', 'AdminController');
Route::resource('clients', 'ClientController');
Route::resource('hotels', 'HotelController');
Route::resource('categories', 'CategoryController');
Route::resource('rooms', 'RoomController');
