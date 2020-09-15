<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Scopes\SearchScope;

class User extends Authenticatable
{
	use Notifiable, HasRoles, SearchScope;

    protected $searchBy = [
        'name', 'email',
    ];

	protected $fillable = [
		'name', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];
}
