<?php

namespace App\Http\Controllers;
use App\Models\Ficha;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFicha;
use App\Http\Requests\updateFicha;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fichas.index')
        ->with('fichas', Ficha::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fichas.create')
        ->with('programas', Programa::all());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/*Ficha*/ $ficha)
    {
        $f = $ficha;
        $ficha = Ficha::find($ficha);

        return view('fichas.show')
        ->with('ficha', $ficha);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Ficha*/ $ficha)
    {
        $ficha = Ficha::find($ficha);

        return view('fichas.edit')
        ->with('ficha' ,$ficha)
        ->with('programas', Programa::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateFicha $request,/*Ficha*/ $ficha)
    {
        $f = $ficha;
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

        return redirect('fichas')
        ->with('msg', 'Se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(/*Ficha*/$ficha)
    {
        $f = $ficha;
        $ficha = Ficha::find($ficha);
        $ficha->Estado = "Inactivo";
        $ficha->save();

        return redirect('fichas')
        ->with('msg', 'Se elimino correctamente.');

    }
}
