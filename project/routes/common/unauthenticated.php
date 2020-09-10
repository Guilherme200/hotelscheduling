<?php

/**
 * Authenticated routes for common
 * Middleware 'auth:'web'
 * Namespace 'App\Http\Controllers\Common
 */

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@index')->name('login.index');



