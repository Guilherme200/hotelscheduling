<?php

namespace App\Http\Controllers\Common\Auth;

use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Common\RegisterRequest;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = (new UserRepository())->create($data);
        $user->assignRole(UserRolesEnum::CLIENT);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'login');
    }
}
