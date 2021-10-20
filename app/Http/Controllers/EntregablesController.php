<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntregablesStoreRequest;
use App\Http\Requests\storeEntregables;
use App\Models\Entregables;
use Illuminate\Http\Request;

class EntregablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('entregables.index')
        ->with('entregables', Entregables::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('entregables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( storeEntregables  $request)
    {
        //

        //Seleccinar el id max que exista en los centros

        $maxentregables=Entregables::all()->max('IdEntregables');


        //Crear el nuevo recurso cliente

        $nuevoentregable = new Entregables();
        $nuevoentregable ->IdEntregables = $maxentregables + 1;
        $nuevoentregable ->Titulo = $request->input("titulo");
        $nuevoentregable ->Descripción = $request->input("descripcion");
        $nuevoentregable ->FechaInicial= $request->input("fechainicial");
        $nuevoentregable ->FechaEntrega= $request->input("fechaentrega");
        $nuevoentregable ->HoraInicial= $request->input("horainicial");
        $nuevoentregable ->HoraEntrega= $request->input("horaentrega");
        $nuevoentregable ->Acta= $request->input("acta");
        $nuevoentregable ->Estado= $request->input("estado");



        $nuevoentregable ->save();


        return redirect('entregables')
        ->with('msg', 'Se registro correctamente');




        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entregables  $entregables
     * @return \Illuminate\Http\Response
     */
    public function show(Entregables $entregables)
    {
        //
        return view('entregables.show')
        ->with('entregables', $entregables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entregables  $entregables
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Entregables*/ $entregables)
    {
        //
        $entregables = Entregables::find($entregables);
        return view('entregables.edit')->with('entregables' , $entregables);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entregables  $entregables
     * @return \Illuminate\Http\Response
     */
    public function update( storeEntregables $request, /*Entregables*/ $entregables)
    {
        //
        $entregables = Entregables::find($entregables);
        $entregables ->Titulo = $request->input("titulo");
        $entregables ->Descripción = $request->input("descripcion");
        $entregables ->FechaInicial= $request->input("fechainicial");
        $entregables ->FechaEntrega= $request->input("fechaentrega");
        $entregables ->HoraInicial= $request->input("horainicial");
        $entregables ->HoraEntrega= $request->input("horaentrega");
        $entregables ->Acta= $request->input("acta");
        $entregables ->Estado= $request->input("estado");



        $entregables ->save();


        return redirect('entregables')
        ->with('msg', 'Se actualizo correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entregables  $entregables
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entregables $entregables)
    {
        //



    }

    public function habilitar ($entregables){

         $entregables= Entregables::find($entregables);


        switch($entregables->Estado)
         {
            case('Activo'):
                $entregables->Estado = 'Inactivo';
                $entregables->save();
            break;

            case('Inactivo'):
                $entregables->Estado = 'Activo';
                $entregables->save();
            break;

            default;
                $entregables->Estado = 'Activo';
                $entregables->save();
            break;


        }

        return redirect('entregables');
    }
}

