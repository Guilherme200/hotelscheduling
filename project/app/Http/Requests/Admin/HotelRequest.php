<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:15|max:15',
            'city' => 'required|string|max:255',
            'complement' => 'nullable|string|max:255',
        ];
    }
}
