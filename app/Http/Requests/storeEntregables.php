<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEntregables extends FormRequest
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
            'titulo'=>'required|regex:/^[\pL\s\-]+$/u',
            'descripcion'=>'required|regex:/^[\pL\s\-]+$/u' ,

            'fechainicial'=>'required|date|before Or Equal:fechaentrega',
           'fechaentrega' => 'required|date|After Or Equal:fechainicial',

           'horainicial' => 'required|before Or Equal:horaentrega',
            'horaentrega'=>'required|After Or Equal:horainicial',

            'acta' => 'required|regex:/^[\pL\s\-]+$/u|max:10',
            'estado' => 'required'
        ];
    }
}
