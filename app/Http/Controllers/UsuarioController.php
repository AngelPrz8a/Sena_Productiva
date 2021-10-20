<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Http\Requests\storeUsuario;
use App\Http\Requests\updateUsuario;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\UsuarioRol;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paginate = 25;
        return view('usuarios.index')
        ->with('usuarios', Usuario::paginate($paginate))
        ;

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create')
        ->with('roles', Rol::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUsuario $request)
    {
        $newUsuario = new Usuario();
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
        $newUsuario->Estado = 'Activo';
        $newUsuario->Contraseña = $request->input('numeroD');

        $newUsuario->save();

        $newUsuRol = new UsuarioRol();
        $newUsuRol->id_usuario = $newUsuario->IdUsuario;
        $newUsuRol->id_rol = $request->input('rol');

        $newUsuRol->save();


        return redirect('usuarios')
         ->with('msg', "Se registro correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show')
        ->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit')
        ->with('usuario', $usuario)
        ->with('roles', Rol::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUsuario $request, Usuario $usuario)
    {
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
        $usuario->Contraseña = $request->input('clave');
        $usuario->save();

        $newUsuRol = UsuarioRol::where('id_usuario', '=', $usuario->IdUsuario)->first();
        $newUsuRol->id_rol = $request->input('rol');

        $newUsuRol->save();

        return redirect('usuarios')
        ->with('msg', "Se actualizo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(/*Usuario*/ $usuario)
    {
        $usuario = Usuario::find($usuario);
        $usuario->delete();

        return redirect('usuarios')
        ->with('msg', "Se modifico a Inactivo correctamente");
    }


    ////////////////////////////
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
    ////////////////////////////


}//end class
