<?php

/**
 * Authenticated routes for common
 * Middleware 'auth:'web'
 * Namespace 'App\Http\Controllers\Common
 */

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');



