<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_id' => [
                'required',
                'int',
                'exists:items,id'
            ],
            'customer_id' => [
                'int',
                'required',
            ],
            'quantity' => [
                'required',
                'int',
            ]
        ];
    }
}
