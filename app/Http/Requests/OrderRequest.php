<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => [
                'exists:customers,id',
                'required',
                'int',
            ],
            'total' => [
                'required',
                'float',
            ],
            'address' => [
              'string',
              'required',
            ],
            'telephone' => [
                'string',
                'required',
            ],
        ];
    }
}
