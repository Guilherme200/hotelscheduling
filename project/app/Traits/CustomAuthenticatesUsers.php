<?php

namespace App\Traits;

use App\Enums\UserRolesEnum;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait CustomAuthenticatesUsers
{
    use AuthenticatesUsers;

    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->hasAnyRole([UserRolesEnum::ADMIN, UserRolesEnum::CLIENT])) {
                $this->guard()->attempt(
                    $this->credentials($request), $request->filled('remember')
                );
            } else {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.invalid_role')],
                ]);
            }
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
