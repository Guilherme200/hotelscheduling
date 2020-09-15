<?php

namespace App\Http\Controllers\Common;

use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return current_user()->hasRole(UserRolesEnum::ADMIN)
            ? redirect()->route('admin.dashboard')
            : redirect()->route('client.reservations.index');
    }
}
