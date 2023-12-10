<?php

namespace App\Http\Controllers;
use App\Models\Ficha;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFicha;
use App\Http\Requests\updateFicha;

class FichaController extends Controller
{

    public function aprendices($id){
        $ficha = Ficha::find($id);
        $array = $ficha->aprendices()->get();

        return view('aprendices.index')
        ->with('aprendices', $array)
        ->with('ficha', $ficha);
    }



    public function index(){
        return view('fichas.index')
        ->with('fichas', Ficha::all());
    }


    public function store(StoreFicha $request)
    {
        $newFicha = new Ficha();
        $newFicha->numero = $request->input('numero');
        $newFicha->inicioLectiva = $request->input('inicioLectiva');
        $newFicha->finLectiva = $request->input('finLectiva');
        $newFicha->inicioProductiva = $request->input('inicioProductiva');
        $newFicha->finProductiva = $request->input('finProductiva');
        $newFicha->jornada = $request->input('jornada');
        $newFicha->estado = 'Activo';
        $newFicha->id_Programa = $request->input('programa');
        $newFicha->save();

        return redirect('fichas')
        ->with('msg', 'Se registro correctamente.');
    }



    public function show( $ficha )
    {
        $ficha = Ficha::find($ficha);

        return view('fichas.show')
        ->with('ficha', $ficha);
    }



    public function update(updateFicha $request, $ficha )
    {
        $ficha = Ficha::find($ficha);
        $ficha->numeroFicha = $request->input('numero');
        $ficha->inicioLectiva = $request->input('inicioLectiva');
        $ficha->finLectiva = $request->input('finLectiva');
        $ficha->inicioProductiva = $request->input('inicioProductiva');
        $ficha->finProductiva = $request->input('finProductiva');
        $ficha->jornada = $request->input('jornada');
        $ficha->estado = $request->input('estado');
        $ficha->id_programa = $request->input('programa');
        $ficha->save();

        $msg = 'Se actualizo correctamente.' ;

        if( $request->url ){
            return redirect( $request->url )
            ->with('msg', $msg);
        }
        return redirect('fichas')
        ->with('msg', $msg);
    }



    public function destroy( $ficha )
    {
        $ficha = Ficha::find($ficha);
        $ficha->Estado = "Inactivo";
        $ficha->save();

        return redirect('fichas')
        ->with('msg', 'Se elimino correctamente.');
    }



}
