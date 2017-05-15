<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class RegistrationRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed'            
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'  => 'El nombre no puede ser vacío.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',
            'email.required'  => 'El email no puede ser vacío.',
            'email.max' => 'El email no puede superar los 255 caracteres.',
            'password.required'  => 'Por favor ingrese una contraseña.',
            'password.confirmed'  => 'Las contraseñas no coinciden. Por favor verifique e intentelo nuevamente.',
        ];
    }
}
