<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => data_get($this, 'name', ''),
            'description' => data_get($this, 'description', ''),
            'created_at' => format_date($this->created_at),
            'updated_at' => format_date($this->updated_at),

            'links' => [
                'edit' => $this->when(true, route('admin.categories.edit', $this->id)),
                'show' => $this->when(true, route('admin.categories.show', $this->id)),
                'destroy' => $this->when(true, route('admin.categories.destroy', $this->id)),
            ],
        ];
    }
}
