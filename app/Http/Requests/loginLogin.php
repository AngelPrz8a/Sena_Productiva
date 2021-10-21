<?php

//JA

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginLogin extends FormRequest
{
//
    public function authorize()
    {
        return true;
    }
//



//
    public function rules()
    {
        return [
            'number' => 'required|numeric|integer|digits:10',
            'clave' => 'required'
        ];
    }
//



//
    public function messages(){
        return [
        'required' => 'Campo Requerido',
        'numeric' => 'Solo tipo numerico',
        'integer' => 'Solo enteros',
        'digits' => 'Deben ser de :digits'
        ];

    }
//
}
