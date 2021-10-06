<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCentro extends FormRequest
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
            'nombre'=>'required|unique:centro,Nombre|regex:/^[a-zA-Z0-9\s]+$/u|max:50',
            'sede'=>'required|regex:/^[a-zA-Z0-9\s]+$/u',
            'ciudad'=>'required|regex:/^[a-zA-Z0-9\s]+$/u|max:30',
            'direccion'=>'required|regex:/^[a-zA-Z0-9\s]+$/u',
            'region'=>'required|regex:/^[a-zA-Z0-9\s]+$/u|max:30',
            'estado'=>'nullable|regex:/^[a-zA-Z0-9\s]+$/u|max:10',
        ];
    }


}

