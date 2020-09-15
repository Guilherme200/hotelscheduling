<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\SearchScope;

class Room extends Model
{
    use SearchScope;

    protected $searchBy = [
        'number', 'description',
    ];

    protected $fillable = [
        'number', 'description', 'capacity', 'category_id', 'hotel_id'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
