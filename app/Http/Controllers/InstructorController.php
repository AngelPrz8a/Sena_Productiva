<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeInstructor;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Requests\storeUsuario;
use App\Http\Requests\updateInstructor;
use App\Http\Requests\updateUsuario;



class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructores.index')
        ->with('instructores', Instructor::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeInstructor $request)
    {
        $newInstructor = new Instructor();
        $newInstructor->IdInstructor= $request->input('id');
        $newInstructor->Nombre= $request->input('nombre');
        $newInstructor->Apellido= $request->input('apellido');
        $newInstructor->id_centro= $request->input('centro');

        $newInstructor->save();

        return redirect('instructores')
        ->with('msg', "Se actualizo correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(/*Instructor*/ $instructor)
    {
        $instructor = Instructor::find($instructor);

        return view('instructores.show')
        ->with('instructor', $instructor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Instructor*/ $instructor)
    {
        $instructor = Instructor::find($instructor);

        return view('instructores.edit')
        ->with('instructor', $instructor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(updateInstructor $request, Instructor $Instructor)
    {

        $inst = $Instructor;
        $Instructor =Instructor::find($inst);

        $Instructor = new Instructor();
        $Instructor->Id= $request->input('id');
        $Instructor->Nombre= $request->input('nombre');
        $Instructor->Apellido= $request->input('apellido');
        $Instructor->Centro= $request->input('centro');

        $Instructor->save();

        return redirect('instructores')
        ->with('msg', 'Se actualizo correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {

        $i = $instructor;
        $instructor = Instructor::find($instructor);
        $instructor->delete();
        return redirect('instructores')
        ->msg('msg', 'Se actualizo correctamente');

    }
}
