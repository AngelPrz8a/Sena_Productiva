<?php

//JA

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginLogin extends FormRequest
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
            'number' => 'required|numeric|integer|digits:10',
            'clave' => 'required'
            /*
            $number =  $request->input('number');
            $clave =  $request->input('clave');
            */
        ];
    }

    public function messages(){
        return [
        'required' => 'Campo Requerido',
        'numeric' => 'Solo tipo numerico',
        'integer' => 'Solo enteros',
        'digits' => 'Deben ser de :digits'
        ];

    }
}
