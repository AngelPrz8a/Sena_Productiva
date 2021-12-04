<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateFicha extends FormRequest
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
            'numero'=>'Required|numeric|integer',

            'inicioLectiva'=>'required|date|before:finLectiva' ,
            'finLectiva'=>'required|date|after:inicioLectiva',

            'inicioProductiva' => 'required|date|After Or Equal:finLectiva',
            'finProductiva' => 'required|date|after:inicioProductiva',

            'jornada'=>'required',
            'estado' => 'required|regex:/^[\pL\s\-]+$/u|max:10',
            'programa' => 'required',
        ];
    }

    public function messages()
    {
        return[
            //Inicio Lectiva
            'inicioLectiva.before' => 'La fecha de Incio en etapa lectiva debe ser menor a la fecha de final lectiva.',

            //Fin Electiva
            'finLectiva.after' => 'La fecha de finalización en etapa lectiva debe ser posterior a la fecha de inicio lectiva.',

            //Inicio Productivada',
            'inicioProductiva.After Or Equal' => 'La fecha de Inicio en Etapa Productiva debe ser mayor o igual a la Etapa Final Lectiva',
        ];
    }//end
}
