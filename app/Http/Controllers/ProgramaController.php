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
            'insert into centroprograma (id_centro, id_programa)
             values (?, ?)',
             [$request->centro, $newProgram->IdPrograma]
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
        $programa->Nombre = $request->input('nombre');
        $programa->Nivel = $request->input('nivel');
        $programa->Estado = $request->input('estado');
        $programa->save();

        $proCen = DB::update(
            'update centroprograma SET
            id_centro = ? ,
            id_programa = ?
            where id_programa = ?',
            [$request->centro, $programa->IdPrograma, $programa->IdPrograma]
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
        switch($usuario->Estado){
            case 'Activo'://estado activo
                $usuario->Estado = 'Inactivo';
                $usuario->save();
                break;

            case 'Inactivo'://estado inactivo
                $usuario->Estado = 'Activo';
                $usuario->save();
                break;

            default:    //sin estado
                $usuario->Estado = 'Activo';
                $usuario->save();
                break;
        }

        return redirect('programas');
        //echo $usuario->Estado;
    }//end function
//

}
