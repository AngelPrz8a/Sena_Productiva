<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeReunionAprendiz extends FormRequest
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
            'title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'Descripcion' => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'start' => 'required|date|after:yesterday()',
            'end'=> 'required',
            'Modalidad'=>'required',
            'MomentoEleccion'=>'required',
            'Estado'=>'nullable',
            'id_instructor'=>'required',
        ];
    }
}
