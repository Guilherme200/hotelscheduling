<?php

namespace App\Models;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use SearchScope;

    protected $searchBy = ['created_at'];

    protected $searchByRelationship = [
        'user' => ['name', 'email'],
        'room' => ['number', 'description']
    ];

    protected $fillable = [
        'user_id', 'room_id', 'created_at', 'hotel_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
