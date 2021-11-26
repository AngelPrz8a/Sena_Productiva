<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{


//
    public function index()
    {
        //Visualiza todas las empresas, sino es aprendiz
        if (Auth::user()->rol()->first()->tipoRol != 'Aprendiz') {
            return view('empresas.index')
            ->with('empresas', Empresa::all());

            //vializa la empresa del aprendiz
        }else{
            $aprendiz = Aprendiz::where('id_usuario','=',Auth::user()->IdUsuario )->first();
            $empresa = $aprendiz->empresas();
            return view('empresas.index')
            ->with(  'empresa',   $empresa );
        }
    }
//



//
    public function store(Request $request)
    {
        $new = new Empresa();
        $new->NIT = $request->input('nit');
        $new->Nombre = $request->input('nombre');
        $new->Telefono = $request->input('telefono');
        $new->Direccion = $request->input('direccion');
        $new->RazonSocial = $request->input('razonSocial');
        $new->NombreInmediato = $request->input('nombreJefe');
        $new->ApellidoInmediato = $request->input('apellidoJefe');
        $new->TelefonoInmediato = $request->input('telefonoJefe');
        $new->EmailInmediato = $request->input('emailJefe');
        $new->CargoInmediato = $request->input('cargoJefe');
        $new->save();

        $usuario = Auth::user()->IdUsuario;
        $aprendiz_empresa = Aprendiz::where('id_usuario','=',$usuario)->first();
        $aprendiz_empresa->id_empresa = $new->IdEmpresa;
        $aprendiz_empresa->save();

        return redirect('empresas')
        ->with('msg', "Se registro correctamente");
    }
//



//
    public function show($id)
    {
        $id = Empresa::find($id);
        return view('empresas.show')
        ->with('empresa',$id);
    }
//



//
    public function update(Request $request, $id)
    {
        $new = Empresa::find($id);
        $new->NIT = $request->input('nit');
        $new->Nombre = $request->input('nombre');
        $new->Telefono = $request->input('telefono');
        $new->Direccion = $request->input('direccion');
        $new->RazonSocial = $request->input('razonSocial');
        $new->NombreInmediato = $request->input('nombreJefe');
        $new->ApellidoInmediato = $request->input('apellidoJefe');
        $new->TelefonoInmediato = $request->input('telefonoJefe');
        $new->EmailInmediato = $request->input('emailJefe');
        $new->CargoInmediato = $request->input('cargoJefe');
        $new->save();


        return redirect('empresas')
        ->with('msg', "Se actualizo correctamente");

    }
//




//
    public function destroy($id)
    {
        $id = Empresa::find($id);
        $id->delete();

        return redirect('empresas')
        ->msg('msg', 'Se elimino correctamente');
    }
//




//
    public function aprendiz($id)
    {
        return $id;
    }
//
}
