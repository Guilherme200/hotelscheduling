<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_name' => data_get($this, 'user.name', ''),
            'room_number' => data_get($this, 'room.number', ''),
            'reserved_at' => format_date($this->created_at)
        ];
    }
}
