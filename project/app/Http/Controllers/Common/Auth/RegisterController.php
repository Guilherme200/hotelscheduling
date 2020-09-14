<?php

namespace App\Http\Controllers\Common\Auth;

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
        (new UserRepository())->create($data);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'login');
    }
}
