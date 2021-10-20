<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCentro extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            //
            'nombre'=>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'sede'=>'required|regex:/^[\pL\s\-]+$/u',
            'ciudad'=>'required|regex:/^[\pL\s\-]+$/u|max:30',
            'direccion'=>'required|regex:/^[a-zA-Z0-9\s]+$/u',
            'region'=>'required|regex:/^[\pL\s\-]+$/u|max:30',
            'estado'=>'required|regex:/^[\pL\s\-]+$/u|max:10',
        ];
    }
}
