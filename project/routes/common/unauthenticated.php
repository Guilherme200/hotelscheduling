<?php

/**
 * Authenticated routes for common
 * Middleware 'auth:'web'
 * Namespace 'App\Http\Controllers\Common
 */

Route::get('/', 'HomeController@index')->name('home');

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');



