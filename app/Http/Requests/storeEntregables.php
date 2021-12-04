<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'fechaInicial' => "required|date",
            'fechaentrega' => "required|date",
            'horaentrega'=>"required",
            'horaInicial'=>"required",
            'id_ficha' =>'required',
        ];
    }
}
