<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAprendiz;
use App\Http\Requests\storeUsuario;
use App\Http\Requests\updateAprendiz;
use App\Models\Rol;
use App\Models\Usuario;
use App\Models\Aprendiz;
use App\Models\Ficha;
use App\Models\UsuarioRol;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aprendices.index')
        ->with('aprendices',Aprendiz::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aprendices.create')
        ->with('roles', Rol::all())
        ->with('fichas', Ficha::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeAprendiz $request)
    {
        $newUsuario = new Usuario();
        $newUsuario->Nombre = $request->input('nombre');
        $newUsuarioN = $request->input('nombre');
        $newUsuario->Apellido = $request->input('apellido');
        $newUsuarioA = $request->input('apellido');
        $newUsuario->FechaNacimiento = $request->input('fechaNacimiento');
        $newUsuarioF = $request->input('fechaNacimiento');
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
        $rolAprendiz = Rol::select('id')->where('tipoRol', '=' , 'Aprendiz')->first();
        $newUsuRol->id_rol = $rolAprendiz->id;

        $newUsuRol->save();

        $newA = new Aprendiz();
        $newA->id_usuario = $newUsuario->IdUsuario;
        $newA->id_ficha = $request->input('ficha');

        $newA->save();

        return redirect('aprendices')
        ->with('msg', "Se registro correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function show(/*Aprendiz*/ $aprendiz)
    {
        $aprendiz = Aprendiz::find($aprendiz);
        return view('aprendices.show')
        ->with('aprendiz',$aprendiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Aprendiz*/ $usuario)
    {
        $usu = $usuario;

        $usuario = Usuario::find($usu);
        $aprendiz = Aprendiz::find($usu);

        return view('aprendices.edit')
        ->with('aprendiz', $usuario)
        ->with('a', $aprendiz)
        ->with('fichas', Ficha::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function update(updateAprendiz $request, /*Aprendiz*/ $aprendiz)
    {
        $apre = $aprendiz;
        $aprendiz = Usuario::find($apre);

        $aprendiz->Nombre = $request->input('nombre');
        $aprendiz->Apellido = $request->input('apellido');
        $aprendiz->FechaNacimiento = $request->input('fechaNacimiento');
        $aprendiz->Genero = $request->input('genero');
        $aprendiz->TipoDocumento = $request->input('tipoD');
        $aprendiz->NumeroIdentificacion = $request->input('numeroD');
        $aprendiz->NumeroCelular = $request->input('celular');
        $aprendiz->NumeroFijo = $request->input('telefono');
        $aprendiz->EmailPersonal = $request->input('emailP');
        $aprendiz->EmailSena = $request->input('emailS');
        $aprendiz->Direccion = $request->input('direccion');
        $aprendiz->Estado = $request->input('estado');

        $aprendiz->save();

        $a = Aprendiz::find($apre);
        $a->id_ficha = $request->input('ficha');
        $a->save();

        return redirect('aprendices')
        ->with('msg', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(/*Aprendiz*/ $aprendiz)
    {
        $a = $aprendiz;
        $aprendiz = Usuario::find($aprendiz);
        $aprendiz->delete();
        return redirect('aprendices')
        ->msg('msg', 'Se actualizo correctamente');
    }
}
