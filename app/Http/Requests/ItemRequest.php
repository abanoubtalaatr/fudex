<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'max:30',
            ],
            'description' => [
                'string',
                'required'
            ],
            'price' => [
              'float',
              'required',
            ]
        ];
    }
}
