<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository extends Repository
{
    protected function getClass()
    {
        return Room::class;
    }
}
