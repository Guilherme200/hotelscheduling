<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository extends Repository
{
    protected function getClass()
    {
        return Hotel::class;
    }
}
