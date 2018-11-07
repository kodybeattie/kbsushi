<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
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
            'first_name' => 'required',
            'lastt_name' => 'required',
            'email_address' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required'
        ];
    }

    public function persist()
    {
        //create and save the user
        
        $user = User::create([
            //$this->only(['1','first_name','last_name','email_address','phone_number','password'])
            'use_type' => '1',
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email_address' => request('email_address'),
            'phone_number' => request('phone_number'),
            'password' => request('password'),
        ]);

        $user->save();
    }
}
