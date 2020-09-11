<?php

namespace App\Http\Controllers\Common\Auth;

use App\Http\Controllers\Controller;
use App\Traits\CustomAuthenticatesUsers;

class LoginController extends Controller
{
    use CustomAuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
