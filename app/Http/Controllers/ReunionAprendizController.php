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
        if( Auth::user()->rol()->first()->tipoRol == 'Aprendiz'   ){
            return view('reunionAprendiz.index')
            ->with('reuniones', Auth::user()->aprendiz()->reuniones() );
        }else if( Auth::user()->rol()->first()->tipoRol == 'Instructor'){
            return view('reunionAprendiz.index')
            ->with('reuniones', Auth::user()->instructor()->reuniones() );
        }
    }
//



//
    public function store(storeReunionAprendiz $request)
    {
        $reunion = ReunionAprendiz::create($request->all());

        return redirect('reunionAprendiz');
    }
//



//
/*
se muestran todas las reuniones
*/
    public function show()
    {
        if( Auth::user()->rol()->first()->tipoRol == 'Aprendiz'   ){
            $reunionAprendiz =  Auth::user()->aprendiz()->reuniones();
        }else if( Auth::user()->rol()->first()->tipoRol == 'Instructor'){
            $reunionAprendiz =  Auth::user()->instructor()->reuniones();
        }

        return $reunionAprendiz;
    }
//



//
/*
Ayudaa visualizar en el calendario cambiando el formato
*/
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

        return redirect('reunionAprendiz')
        ->with('msg', 'Se Actualizo');
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
