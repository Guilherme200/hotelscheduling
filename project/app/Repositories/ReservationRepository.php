<?php

namespace App\Repositories;

use App\Models\Reservation;

class ReservationRepository extends Repository
{
    protected function getClass()
    {
        return Reservation::class;
    }
}
