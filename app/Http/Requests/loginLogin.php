<?php

//JA

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginLogin extends FormRequest
{
//
    public function authorize()
    {
        return true;
    }
//



//
    public function rules()
    {
        return [
            'number' => 'required',
            'clave' => 'required'
        ];
    }
//

}
