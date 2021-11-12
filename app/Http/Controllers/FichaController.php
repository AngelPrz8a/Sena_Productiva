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
        $newFicha->NumeroFicha = $request->input('numero');
        $newFicha->InicioLectiva = $request->input('inicioLectiva');
        $newFicha->FinLectiva = $request->input('finLectiva');
        $newFicha->InicioProductiva = $request->input('inicioProductiva');
        $newFicha->FinProductiva = $request->input('finProductiva');
        $newFicha->Jornada = $request->input('jornada');
        $newFicha->Estado = 'Activo';
        $newFicha->Id_Programa = $request->input('programa');
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
        $ficha->NumeroFicha = $request->input('numero');
        $ficha->InicioLectiva = $request->input('inicioLectiva');
        $ficha->FinLectiva = $request->input('finLectiva');
        $ficha->InicioProductiva = $request->input('inicioProductiva');
        $ficha->FinProductiva = $request->input('finProductiva');
        $ficha->Jornada = $request->input('jornada');
        $ficha->Estado = $request->input('estado');
        $ficha->Id_programa = $request->input('programa');
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
