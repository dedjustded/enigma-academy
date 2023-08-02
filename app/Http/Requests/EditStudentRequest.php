<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStudentRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'country' => 'required|regex:/^[A-Za-z\s]{3,20}$/',
            'city' => 'required|regex:/^[A-Za-z\s]{3,20}$/',
            'language' => 'nullable|alpha',
            'repository' =>'nullable|url',
            'info' => 'nullable|string|between:3,250',
            'link' => 'nullable|url',
            'web_page_name' => 'nullable|string|between:3,20',
            'messenger_name' => 'nullable|alpha_dash|between:3,20',
            'username' => 'required|between:3,20|unique:users',
            'hoby' => 'nullable|string|between:3,20',
            'skils' => 'nullable|string|between:3,20'
        ];
    }
}
