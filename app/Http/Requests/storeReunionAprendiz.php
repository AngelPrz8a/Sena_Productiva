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
            'titulo' => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'descripcion' => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'fechaCitacion' => 'required|date|after:now',
            'horaCitacion'=> 'required',
            'modalidad'=>'required',
            'momentoEleccion'=>'required',
            'estado'=>'nullable',
            'id_instructor'=>'required',
        ];
    }
}
