<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return Gate::allows('user_create');
        
    }
    public function rules()
    {
        return [
            "name" => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ]
        ];
    }
}
