<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\loginLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

//
    public function showLogin(){
        return view('login.Login');
    }
//



//
    public function login(loginLogin $request){
        $usuario = User::where('numeroIdentificacion','=',$request->input('number') )->first();

        if($usuario != null || $usuario != '')    //si la contraseña es diferente a null o no esta encriptada con hash
        {
            $usuario_contraseña =   //revisa si la contraseña que ingreso el usuario es la misma que en la BD
                Hash::check(
                $request->input('clave'),
                $usuario->contraseña);

            if ($usuario_contraseña) {  //si el usuario existe
                Auth::login($usuario);  //se crea la sesion

                return redirect('home');    //se retorna a la vista home
            }
            //end if
        }
        //end if

        //si nada de lo anterior se ejecuta , es por que no se hallo al usuario
        return redirect('login')
        ->with('msg','Usuario o Contraseña Incorrectas.');

    }
//



//
    public function logout(){
        Auth::logout();

        return redirect('login')
        ->with('msg', 'Se cerro sesión de forma exitosa');
    }
//

}
//end class
