<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\ReunionAprendiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeReunionAprendiz;
use App\Http\Requests\updateReunionAprendiz;

class ReunionAprendizController extends Controller
{
//
    public function index()
    {
        return view('reunionAprendiz.index')
        ->with('reuniones', ReunionAprendiz::paginate(25));
    }
//



//
    public function store(storeReunionAprendiz $request)
    {

        $reunion = ReunionAprendiz::create($request->all());
        if(Auth::user()->rol()->first()->tipoRol == 'Aprendiz'){
            DB::insert(
                'insert into reunionaprendiz_aprendices (id_reunionaprendiz, id_aprendiz) values (?, ?)',
                 [$reunion->id, $request->id_usuario]
                );
        }

    }
//



//
    public function show( $reunionAprendiz)
    {
        $reunionAprendiz = ReunionAprendiz::all();

        return $reunionAprendiz;
    }
//



//
    public function edit( $reunionAprendiz)
    {
        $reunionAprendiz = ReunionAprendiz::find($reunionAprendiz);

        $reunionAprendiz->start= date_create($reunionAprendiz->start);
        $reunionAprendiz->start =  date_format($reunionAprendiz->start,'Y-m-d\TH:m:s');

        $reunionAprendiz->end= date_create($reunionAprendiz->end);
        $reunionAprendiz->end =  date_format($reunionAprendiz->end,'Y-m-d\TH:m:s');

        return $reunionAprendiz;
    }
//



//
    public function update(updateReunionAprendiz $request,  $reunionAprendiz)
    {
        $reunionAprendiz = ReunionAprendiz::find($reunionAprendiz);
        $reunionAprendiz -> update($request->all());
    }
//



//
    public function destroy($reunionAprendiz)
    {
        $reunionAprendiz = ReunionAprendiz::find($reunionAprendiz)->delete();
        return $reunionAprendiz;
    }
//



 ////////////////////////////
    public function habilitar($usuario){
        $usuario = ReunionAprendiz::find($usuario);
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

        return redirect('reunionAprendiz');
        //echo $usuario->Estado;
    }//end function
////////////////////////////
}
