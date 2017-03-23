<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        return [
            'note' => 'max:255',
            'amount' => array('required','regex:'.$regex)
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
            'note.max' => 'La nota no puede superar los 255 caracteres.',
            'amount.required'  => 'El monto no puede ser vacío.',
            'amount.regex'  => 'El monto es inválido.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        //User cannot bid its own listing
        $validator->after(function ($validator) {
            if (auth()->user()->id==$this->listing->user_id)
                $validator->errors()->add('auth', 'No puedes ofertar en tu propio listado.');
        });
    }
}
