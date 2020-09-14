<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'number' => data_get($this, 'number', ''),
            'description' => data_get($this, 'description', ''),
            'capacity' => data_get($this, 'capacity', ''),
            'category_name' => data_get($this, 'category.name', '-----'),
            'hotel_name' => data_get($this, 'hotel.name', '-----'),

            'links' => [
                'edit' => $this->when(true, route('admin.rooms.edit', $this->id)),
                'show' => $this->when(true, route('admin.rooms.show', $this->id)),
                'destroy' => $this->when(true, route('admin.rooms.destroy', $this->id)),
            ],
        ];
    }
}
