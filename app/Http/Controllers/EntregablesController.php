<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntregablesStoreRequest;
use App\Http\Requests\storeEntregables;
use App\Models\Entregables;
use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EntregablesController extends Controller
{



//
    public function index()
    {
        return view('entregables.index')
        ->with('entregables', Entregables::paginate(15));
    }
//




    public function create()
    {
        return view('entregables.create')
        ->with('instructores',Instructor::all());
    }
//



//
    public function store( storeEntregables  $request)
    {
        //Seleccinar el id max que exista en los centros
        $maxentregables=Entregables::all()->max('IdEntregables');

        $carbon = Carbon::now();

        //Crear el nuevo recurso cliente
        $nuevoentregable = new Entregables();
        $nuevoentregable ->Titulo = $request->input("titulo");
        $nuevoentregable ->Descripcion = $request->input("descripcion");
        $nuevoentregable ->FechaInicial= $carbon->toDateString();       //carbon
        $nuevoentregable ->FechaFinal= $request->input("fechaentrega");
        $nuevoentregable ->HoraInicial= $carbon->toTimeString();       //carbon
        $nuevoentregable ->HoraEntrega= $request->input("horaentrega");
        $nuevoentregable ->Acta= $request->input("acta");
        $nuevoentregable ->Estado='Activo';
        $nuevoentregable ->IdInstructor=$request->input('id_instructor');
        $nuevoentregable ->save();


        return redirect('entregables')
        ->with('msg', 'Se registro correctamente');


    }
//



//
    public function show(Entregables $entregables)
    {
        //
        return view('entregables.show')
        ->with('entregables', $entregables);
    }
//



//
    public function edit(/*Entregables*/ $entregables)
    {
        $entregables = Entregables::find($entregables);
        return view('entregables.edit')
        ->with('entregables' , $entregables);

    }
//




//
    public function update( storeEntregables $request, $entregables)
    {
        $entregables = Entregables::find($entregables);
        $entregables ->Titulo = $request->input("titulo");
        $entregables ->Descripcion = $request->input("descripcion");
        $entregables ->FechaHoraInicial= $request->input("fechainicial");
        $entregables ->FechaHoraEntrega= $request->input("fechaentrega");
        $entregables ->HoraInicial= $request->input("horainicial");
        $entregables ->HoraEntrega= $request->input("horaentrega");
        $entregables ->Acta= $request->input("acta");
        $entregables ->Estado= $request->input("estado");
        $entregables ->IdInstructor=$request->input('id_instructor');
        $entregables ->save();


        return redirect('entregables')
        ->with('msg', 'Se actualizo correctamente');
    }
//



//
    public function destroy(Entregables $entregables)
    {
        //



    }
//



//
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
//
}

