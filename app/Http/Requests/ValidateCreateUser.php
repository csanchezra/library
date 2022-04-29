<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreateUser extends FormRequest
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
            'username'		=> 'required|max:20|min:3|unique:users',
            'password'		=> 'required',
            'password_again'=> 'required|same:password'
        ];
    }

    public function attributes()
    {
       return [
        "username" => "usuario",
        "password" => "contraseña",
       ];
    }

    public function messages()
    {
       return [
        'username.required' => 'Debe ingresar un usuario',
        'username.unique' => 'El usuario ya se encuentra registrado', 
        'password.required' => 'Debe ingresar una contraseña',
        'password_again.required'=> 'Este campo debe concidir con la contraña',
        'password_again.same'=> 'No coincide con la contraseña'
       ];
    }
}
