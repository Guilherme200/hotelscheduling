<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\SearchScope;

class Hotel extends Model
{
    use SearchScope;

    protected $searchBy = [
        'name', 'city',
    ];

    protected $fillable = [
        'name', 'phone', 'city', 'complement'
    ];
}
