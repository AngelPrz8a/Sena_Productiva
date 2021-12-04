<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ficha;
use App\Models\Instructor;
use App\Models\Entregables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeEntregables;
use App\Http\Requests\EntregablesStoreRequest;

class EntregablesController extends Controller
{



//
    public function index($id_ficha)
    {

        if (Auth::user()->rol()->first()->tipoRol == 'Instructor') {
            return view('entregables.index')
            ->with('entregables', Auth::user()->instructor()->entregable($id_ficha))
            ->with('ficha', Ficha::find($id_ficha))
            ;
        }else{
            return view('entregables.index')
            ->with('entregables', Auth::user()->aprendiz()->instructor()->entregable($id_ficha) )
            ->with('id_ficha', $id_ficha);
        }

    }
//



//
    public function store( storeEntregables  $request)
    {
        //Crear el nuevo recurso cliente
        $nuevoentregable = new Entregables();
        $nuevoentregable ->Titulo = $request->input("titulo");
        $nuevoentregable ->Descripcion = $request->input("descripcion");
        $nuevoentregable ->FechaInicial=  $request->input("fechaInicial");;
        $nuevoentregable ->FechaFinal= $request->input("fechaentrega");
        $nuevoentregable ->HoraInicial=  $request->input("horaInicial");
        $nuevoentregable ->HoraEntrega= $request->input("horaentrega");
        $nuevoentregable ->Estado='Activo';
        $nuevoentregable ->id_ficha=$request->input('id_ficha');
        $nuevoentregable ->save();


        return redirect('fichas/'.$nuevoentregable->id_ficha.'/entregables')
        ->with('msg', 'Se registro correctamente');
    }
//



//
    public function show($id_ficha, $entregables)
    {
        $entregables = Entregables::find($entregables);
        return view('entregables.show')
        ->with('entregable', $entregables);
    }
//



//
public function edit( $entregables)
{
    $entregables = Entregables::find($entregables);
    return view('entregables.edit')
    ->with('entregable', $entregables);
}
//



//
    public function update( storeEntregables $request, $entregables)
    {
        $entregables = Entregables::find($entregables);
        $entregables ->Titulo = $request->input("titulo");
        $entregables ->Descripcion = $request->input("descripcion");
        $entregables ->FechaInicial= $request->input("fechaInicial");
        $entregables ->FechaFinal= $request->input("fechaentrega");
        $entregables ->HoraInicial= $request->input("horaInicial");
        $entregables ->HoraEntrega= $request->input("horaentrega");
        $entregables ->id_ficha=$request->input('id_ficha');
        $entregables ->save();


        return redirect('fichas/'.$entregables->id_ficha.'/entregables')
        ->with('msg', 'Se actualizo correctamente');
    }
//



//
    public function destroy(Entregables $entregables)
    {


    }
//

}

