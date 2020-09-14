<?php

namespace App\Http\Controllers\Common;

use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('home');
    }
}
