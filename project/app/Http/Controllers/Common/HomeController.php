<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('login.index');
    }
}
