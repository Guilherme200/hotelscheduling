<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => data_get($this, 'name', ''),
            'phone' => data_get($this, 'phone', ''),
            'city' => data_get($this, 'city', ''),
            'complement' => data_get($this, 'complement', '-----'),

            'links' => [
                'edit' => $this->when(true, route('admin.hotels.edit', $this->id)),
                'show' => $this->when(true, route('admin.hotels.show', $this->id)),
                'destroy' => $this->when(true, route('admin.hotels.destroy', $this->id)),
            ],
        ];
    }
}
