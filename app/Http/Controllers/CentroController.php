<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCentro;
use App\Http\Requests\UpdateCentro;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('centros.index')
        ->with('centros', Centro::all() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCentro $request)
    {
        $nuevocentro = new Centro();
        $nuevocentro ->nombre = $request->input("nombre");
        $nuevocentro ->sede = $request->input("sede");
        $nuevocentro ->ciudad= $request->input("ciudad");
        $nuevocentro ->direccion= $request->input("direccion");
        $nuevocentro ->region= $request->input("region");
        $nuevocentro ->estado = 'Activo';

        $nuevocentro ->save();


        return redirect('centros')
        ->with('msg', 'Se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(/*Centro*/ $centro)
    {
        $c = $centro;
        $centro = Centro::find($c);
        return view('centros.show')
        ->with('centro', $centro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Centro*/ $centro)
    {
        $c = $centro;
        $centro = Centro::find($c);
        return view('centros.edit')
        ->with('centro' , $centro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCentro $request, Centro $centro)
    {
        $centro->nombre = $request->input("nombre");
        $centro->sede = $request->input("sede");
        $centro->ciudad= $request->input("ciudad");
        $centro->direccion= $request->input("direccion");
        $centro->region= $request->input("region");
        $centro->estado= $request->input('estado');

        $centro->save();
        return redirect('centros')
        ->with('msg', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(/*Centro*/ $centro)
    {
        $c = $centro;
        $centro = Centro::find($c);
        $centro ->Estado="Inactivo";
        $centro->save();

        return redirect('centros')
        ->with('msg', 'Se modifico correctamente')
        ;
    }
}
