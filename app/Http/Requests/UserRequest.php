<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|alpha|between:3,20',
            'last_name' =>  'required|alpha|between:3,20',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10',
            'country' => 'required|regex:/^[A-Za-z\s]{3,20}$/',
            'city' => 'required|regex:/^[A-Za-z\s]{3,20}$/',
            'username' => 'required|between:3,20|unique:users'
        ];
    }
}
