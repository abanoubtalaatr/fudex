<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'unique:users,email',
                'required',
            ],
            'first_name' => [
                'string',
                'required',
                'max:20'
            ],
            'last_name' => [
                'string',
                'required',
                'max:20'
            ],
            'store_credit' => [
                'nullable',
            ],
        ];
    }
}
