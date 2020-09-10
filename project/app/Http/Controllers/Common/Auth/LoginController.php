<?php

namespace App\Http\Controllers\Common\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('common.auth.login');
    }
}
