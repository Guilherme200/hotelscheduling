<?php

/**
 * Authenticated routes for admin
 * Prefix 'pagination/admin/', middleware 'auth:'web', 'auth', 'user-type:ADMIN'
 *  * Name 'pagination.admin.'
 * Namespace 'App\Http\Controllers\admin
 */

Route::get('users/admins', 'AdminController@pagination')->name('admins');
Route::get('users/clients', 'ClientController@pagination')->name('clients');
Route::get('hotels', 'HotelController@pagination')->name('hotels');
Route::get('categories', 'CategoryController@pagination')->name('categories');
Route::get('rooms', 'RoomController@pagination')->name('rooms');
Route::get('reservations', 'ReservationController@pagination')->name('reservations');
