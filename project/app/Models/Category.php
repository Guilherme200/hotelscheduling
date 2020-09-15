<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\SearchScope;

class Category extends Model
{
    use SearchScope;

    protected $searchBy = [
        'name', 'description',
    ];

    protected $fillable = [
        'name', 'description'
    ];
}
