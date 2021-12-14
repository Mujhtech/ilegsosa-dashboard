<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMemberRequest extends FormRequest
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
            //'password' => 'string|min:8',
            'email' => 'required|email',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'max:11',
        ];
    }

    public function messages()
    {
        return [
            //'password.required' => 'Password is required',
            //'password.string' => 'Password must be a character',
            //'password.min' => 'Password must be 8 character minimum',
            'email.required' => 'Email address is required',
            'email.email' => 'Incorrect email address',
            //'email.unique' => 'Email Address already exist',
            'lastname.required' => 'Last name is required',
            'lastname.string' => 'Last name must be a character',
            'firstname.required' => 'Last name is required',
            'firstname.string' => 'Last name must be a character',
            'phone.max' => 'Phone number must be 11 in digit',
        ];
    }
}
