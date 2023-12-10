<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ficha;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeUsuario;
use App\Http\Requests\updateUsuario;
use App\Http\Requests\storeInstructor;
use App\Http\Requests\updateInstructor;



class InstructorController extends Controller
{

    public function index()
    {
        return view('instructores.index')
        ->with('instructores', Instructor::paginate(25));
    }

    public function store(storeUsuario $request)
    {
        $usuarioC = new UsuarioController();
        $usuarioC = $usuarioC->store($request);

        $newInstructor = new Instructor();
        $newInstructor->id_centro = $request->input('centro');
        $newInstructor->id_usuario = $usuarioC->id;
        $newInstructor->save();

        return redirect('instructores')
        ->with('msg', "Se actualizo correctamente");

    }


    public function show( $instructor)
    {
        $instructor = Instructor::find($instructor);

        return view('instructores.show')
        ->with('instructor', $instructor);
    }


    public function update(updateUsuario $request, $Instructor)
    {
        $instructor = Instructor::find($Instructor);
        $usuario = User::where('id','=',$instructor->id_usuario)->first()->id;

        //usuario
        $usuarioC = new UsuarioController();
        $usuarioC = $usuarioC->update($request, $usuario );

        //instructor
        $instructor->id_centro = $request->input('centro');
        $instructor->id_usuario = $usuarioC->id;
        $instructor->save();

        return redirect('instructores')
        ->with('msg', 'Se actualizo correctamente');
    }


    public function destroy($instructor)
    {
        $instructor = Instructor::find($instructor);

        $usuario = User::find($instructor->id_usuario);
        $usuario->estado = 'Inactivo';
        $usuario->save();

        return redirect('instructores')
        ->with('msg', 'Se Elimino Correctamente');
    }


    public function asignar(Request $request, $instructor){

        //recorre lo que el usuario selecciono y lo guarda en un array
        $id_ficha = [];
        foreach (Ficha::all() as $fichas) {
            //1.sacar los id y saber cuantas fichas son
            //el valor del request es 'ficha[IdFicha]', recorro los request con esta estructura y unicamente uso el id
            if ($request->input('ficha'.strval($fichas->id) ) == 'on') {
                array_push($id_ficha, $fichas->id);
            }
        }
        // return $id_ficha;


        //recorreo el array con los id de ficha para ser insertados en la tabla intermedia instructorficha
        foreach($id_ficha as $id){
            DB::insert('insert into instructor_ficha (id_instructor, id_ficha) values (?, ?)',
            [$instructor, $id]
            );
        }

        return redirect('instructores/'.$instructor)
        ->with('msg', 'Se Asignaron Fichas Correctamente');
    }


    public function desasignar($id_ficha){
        //return $id_ficha;

        //consulta hacia instructorficha para retornar al instructor
        //como DB::select debuelve un array, por ello el foreach, para acceder de forma mas facil a sus atributos
        foreach( DB::select('select * from instructor_ficha where id_ficha = ?', [$id_ficha]) as $sql ){}
        //eliminar la ficha asignada al instructor
        DB::delete('delete from instructor_ficha where id_ficha = ?', [$id_ficha]);

        return redirect('instructores/'.$sql->id_instructor)
        ->with('msg', 'Se Elimino la Ficha Asignada al Instructor Correctamente');
    }
}
