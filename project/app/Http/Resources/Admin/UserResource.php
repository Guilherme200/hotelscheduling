<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => data_get($this, 'name', ''),
            'email' => data_get($this, 'email', ''),
            'created_at' => format_date($this->created_at),
            'updated_at' => format_date($this->updated_at),

            'links' => [
                'edit' => $this->when(true, route('admin.admins.edit', $this->id)),
                'show' => $this->when(true, route('admin.admins.show', $this->id)),
                'destroy' => $this->when(true, route('admin.admins.destroy', $this->id)),
            ],
        ];
    }
}
