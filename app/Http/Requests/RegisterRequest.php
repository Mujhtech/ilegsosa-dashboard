<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'password' => 'required|string|min:8',
            'password2' => 'required|string|same:password',
            'email' => 'required|email|unique:users',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            //'username' => 'string',
            'city' => 'required|string',
            'country' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a character',
            'password.min' => 'Password must be 8 character minimum',
            'password2.required' => 'Password is required',
            'password2.string' => 'Password must be a character',
            'password2.same' => 'Password did not match',
            'email.required' => 'Email address is required',
            'email.email' => 'Incorrect email address',
            'email.unique' => 'Email Address already exist',
            'lastname.required' => 'Last name is required',
            'lastname.string' => 'Last name must be a character',
            'firstname.required' => 'Last name is required',
            'firstname.string' => 'Last name must be a character',
            //'username.string' => 'User name must be a character',
            'city.required' => 'City is required',
            'city.string' => 'Present City must be a character',
            'country.required' => 'Country is required',
            'country.string' => 'Present Country must be a character',
        ];
    }
}
