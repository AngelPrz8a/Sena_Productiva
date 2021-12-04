<?php

namespace App\Http\Controllers;
use App\Models\Rol;
use App\Models\User;
use App\Models\Usuario;
use App\Models\UsuarioRol;
use Illuminate\Http\Request;
use App\Http\Requests\storeUsuario;
use App\Http\Requests\updateUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
//
    public function index()
    {

        $paginate = 25;
        return view('usuarios.index')
        ->with('usuarios', Usuario::paginate($paginate))
        ;

    }
//



//
    public function store(storeUsuario $request)
    {
        $newUsuario = new User();
        $newUsuario->Nombre = $request->input('nombre');
        $newUsuario->Apellido = $request->input('apellido');
        $newUsuario->FechaNacimiento = $request->input('fechaNacimiento');
        $newUsuario->Genero = $request->input('genero');
        $newUsuario->TipoDocumento = $request->input('tipoD');
        $newUsuario->NumeroIdentificacion = $request->input('numeroD');
        $newUsuario->NumeroCelular = $request->input('celular');
        $newUsuario->NumeroFijo = $request->input('telefono');
        $newUsuario->EmailPersonal = $request->input('emailP');
        $newUsuario->EmailSena = $request->input('emailS');
        $newUsuario->Direccion = $request->input('direccion');
        $newUsuario->Estado = $request->estado;
        $newUsuario->Contraseña = Hash::make(  $request->input('numeroD')  ); //valor predeterminado, que el usuario puede modificar
        $newUsuario->save();

        //consulta el id del rol si es el mismo al traido
        $selectrol = Rol::where('tipoRol', '=', $request->input('rol') )->first()->id ;

        $newUsuRol = new UsuarioRol();
        $newUsuRol->id_usuario = $newUsuario->IdUsuario;//trae el id del usuario creado
        $newUsuRol->id_rol = $selectrol; //rol del formulario
        $newUsuRol->save();


        return $newUsuario;
    }
//



//
    public function show( $usuario)
    {
        $usuario = User::find($usuario);
        return view('usuarios.show')
        ->with('usuario', $usuario);
    }
//



//
    public function update(updateUsuario $request,  $usuario)
    {
        $usuario = User::find($usuario);
        $usuario->Nombre = $request->input('nombre');
        $usuario->Apellido = $request->input('apellido');
        $usuario->FechaNacimiento = $request->input('fechaNacimiento');
        $usuario->Genero = $request->input('genero');
        $usuario->TipoDocumento = $request->input('tipoD');
        $usuario->NumeroIdentificacion = $request->input('numeroD');
        $usuario->NumeroCelular = $request->input('celular');
        $usuario->NumeroFijo = $request->input('telefono');
        $usuario->EmailPersonal = $request->input('emailP');
        $usuario->EmailSena = $request->input('emailS');
        $usuario->Direccion = $request->input('direccion');
        $usuario->Estado = $request->input('estado');
        $usuario->save();

        //consulta el id del rol si es el mismo al traido
        $selectrol = Rol::where('tipoRol', '=', $request->input('rol') )->first()->id ;

        $newUsuRol = UsuarioRol::where('id_usuario', '=', $usuario->IdUsuario)->first();
        $newUsuRol->id_rol = $selectrol;
        $newUsuRol->save();

        return $usuario;
    }
//



//
    public function destroy(/*Usuario*/ $usuario)
    {
        $usuario = Usuario::find($usuario);
        $usuario->delete();

        return redirect('usuarios')
        ->with('msg', "Se modifico a Inactivo correctamente");
    }
//



//
    public function habilitar($usuario){
        $usuario = Usuario::find($usuario);
        switch($usuario->Estado){
            case 'Activo'://estado activo
                $usuario->Estado = 'Inactivo';
                $usuario->save();
                break;

            case 'Inactivo'://estado inactivo
                $usuario->Estado = 'Activo';
                $usuario->save();
                break;

            default:    //sin estado
                $usuario->Estado = 'Activo';
                $usuario->save();
                break;
        }

        return redirect('usuarios');
        //echo $usuario->Estado;
    }//end function
//


//
  /**
     * ver perfil
     * unicamente del usuario logueado
     *
     * $perfil = los datos personales y especifica los datos de usuario
     */
    public function perfil(){

        $auth = Auth::user();   //solo el usuario logueado

        if($auth){
            //si el usuario logueado, es el mismo que mira el perfil, continua
            return redirect('perfil');
        }
        //else retornar al home y muestra msg
        return redirect('home')
        ->with('msg','Error al ver perfil.');
    }
//


}//end class
