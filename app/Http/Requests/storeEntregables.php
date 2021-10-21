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
        $carbon = Carbon::now();
        $time = Carbon::parse($carbon)->format('H');
        return [
            //
            'titulo'=>'required|regex:/^[\pL\s\-]+$/u',
            'descripcion'=>'required|regex:/^[\pL\s\-]+$/u' ,

            //'fechainicial'=>'required|date|before Or Equal:fechaentrega',
            'fechaentrega' => "required|date|after_or_equal:{$carbon->toDateString()}",

            //'horainicial' => 'required|before Or Equal:horaentrega',
            'horaentrega'=>"required|date_format:H:i",

            //'acta' => 'required|regex:/^[\pL\s\-]+$/u|max:10',
            //'estado' => 'required'
            'id_instructor' =>'required',
        ];
    }
}
