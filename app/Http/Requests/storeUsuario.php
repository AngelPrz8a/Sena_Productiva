<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class storeUsuario extends FormRequest
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
            "nombre" => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            "apellido" => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            "fechaNacimiento" => 'required|date|before:yesterday',
            "genero" => 'required',
            "tipoD" => 'required',
            "numeroD" => 'required|unique:usuario,numeroIdentificacion|integer|numeric|digits:10',
            "emailP" => 'required|email|unique:usuario,emailPersonal|max:30',
            "emailS" => 'required|email|unique:usuario,emailSena|max:30',
            "celular" => 'required|unique:usuario,numeroCelular|integer|numeric|digits:10',
            "telefono" => 'nullable|integer|numeric|digits:7',
            "direccion" => 'nullable|alpha_num|regex:/^[a-zA-Z0-9\s]+$/u|max:20',
            "estado" => 'nullable',
            'rol' => 'required',

            'centro'=>'nullable'
        ];
    }

}
