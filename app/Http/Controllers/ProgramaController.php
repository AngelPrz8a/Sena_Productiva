<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePrograma;
use App\Http\Requests\updatePrograma;
use App\Models\Programa;

use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('programas.index')->
        with('programas', Programa::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePrograma $request)
    {
        $newProgram = new Programa();
        $newProgram->Nombre = $request->input('nombre');
        $newProgram->Nivel = $request->input('nivel');
        $newProgram->Estado = 'Activo';
        $newProgram->save();

        return redirect('programas')
        ->with('msg', 'Se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        return view('programas.show')
        ->with('programa',$programa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        return view('programas.edit')
        ->with('programa',$programa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePrograma $request, Programa $programa)
    {
        //$newProgram = new Programa();
        $programa->Nombre = $request->input('nombre');
        $programa->Nivel = $request->input('nivel');
        $programa->Estado = $request->input('estado');
        $programa->save();

        return redirect('programas')
        ->with('msg', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    ////////////////////////////
    public function habilitar($usuario){
        $usuario = Programa::find($usuario);
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

        return redirect('programas');
        //echo $usuario->Estado;
    }//end function
    ////////////////////////////

}
