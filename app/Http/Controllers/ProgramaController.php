<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use App\Models\CentroPrograma;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\storePrograma;
use App\Http\Requests\updatePrograma;

class ProgramaController extends Controller
{
//
    public function index()
    {
        return view('programas.index')->
        with('programas', Programa::paginate(25));
    }
//



//
    public function store(storePrograma $request)
    {
        $newProgram = new Programa();
        $newProgram->Nombre = $request->input('nombre');
        $newProgram->Nivel = $request->input('nivel');
        $newProgram->Estado = $request->input('estado');
        $newProgram->save();

        $newProCen = DB::insert(
            'insert into centro_programa (id_centro, id_programa)
             values (?, ?)',
             [$request->centro, $newProgram->id]
        );

        $msg = 'Se registro correctamente';

        return redirect('programas')
        ->with('msg', $msg);
    }
//



//
    public function show(Programa $programa)
    {
        return view('programas.show')
        ->with('programa',$programa);
    }
//



//
    public function update(updatePrograma $request, Programa $programa)
    {
        //$newProgram = new Programa();
        $programa->nombre = $request->input('nombre');
        $programa->nivel = $request->input('nivel');
        $programa->estado = $request->input('estado');
        $programa->save();

        $proCen = DB::update(
            'update centro_programa SET
            id_centro = ? ,
            id_programa = ?
            where id_programa = ?',
            [$request->centro, $programa->id, $programa->id]
        );

        return redirect('programas')
        ->with('msg', 'Se actualizo correctamente');
    }
//



//
    public function destroy($id)
    {
        $id = Programa::find($id);
        $id->Estado = 'Inactivo';
        $id->save();

        return redirect('programas');
    }
//



//
    public function habilitar($usuario){
        $usuario = Programa::find($usuario);
        switch($usuario->estado){
            case 'Activo'://estado activo
                $usuario->estado = 'Inactivo';
                $usuario->save();
                break;

            case 'Inactivo'://estado inactivo
                $usuario->estado = 'Activo';
                $usuario->save();
                break;

            default:    //sin estado
                $usuario->estado = 'Activo';
                $usuario->save();
                break;
        }

        return redirect('programas');
        //echo $usuario->Estado;
    }//end function
//

}
