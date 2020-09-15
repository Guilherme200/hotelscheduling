<?php

/**
 * Authenticated routes for client
 * Prefix 'client/', middleware 'auth:'web', 'auth', 'user-type:CLIENT'
 *  * Name 'client.'
 * Namespace 'App\Http\Controllers\Client
 */

Route::resource('reservations', 'ReservationController');
