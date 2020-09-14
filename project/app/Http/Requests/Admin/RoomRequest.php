<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => 'required|integer|max:255',
            'description' => 'required|string|max:255',
            'capacity' => 'required|integer|max:10',
            'hotel_id' => 'required|integer|exists:hotels,id',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}