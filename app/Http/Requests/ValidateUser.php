<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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
            'username' 	=> 'required',
            'password'	=> 'required'
        ];
    }

    public function attributes()
    {
       return [
        "username" => "usuario",
        "password" => "contraseñar",
       ];
    }

    public function messages()
    {
       return [
        'username.required' => 'Debe ingresar un usuario',
        'password.required' => 'Debe ingresar una contraseña',
       ];
    }
}
