<?php

/**
 * Authenticated routes for common
 * Middleware 'auth:'web', 'auth'
 * Namespace 'App\Http\Controllers\Common
 */

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'WelcomeController');
Route::get('/home', 'HomeController@index')->name('home');

