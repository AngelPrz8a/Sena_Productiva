<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{


    public function empresa(){

        $user = Auth::user()->IdUsuario;
        $apren = DB::select('select Aprendiz.id from Aprendiz inner join usuario on usuario.IdUsuario = Aprendiz.id_usuario where id_usuario = ?', [$user]);
        $apren = Aprendiz::find(intval($apren));
        $apren = $apren->empresas()->get();

        foreach($apren as $ap){
            $apren = $ap;
        }

        $con = new EmpresaController();
         return $con = $con->edit($apren->IdEmpresa);

        return redirect('empresas/'.$apren['IdEmpresa'].'/edit');
    }
//
    public function index()
    {
        return view('empresas.index')
        ->with('empresas', Empresa::paginate(15));
    }
//



//
    public function create()
    {
        return view('empresas.create');
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
    public function edit($id)
    {
        $id = Empresa::find($id);

        return view('empresas.edit')
        ->with('empresa', $id);
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

        if(Auth::user()->rol()->first()->tipoRol != 'Aprendiz'){
            return redirect('empresas')
            ->with('msg', "Se actualizo correctamente");
        }else{
            return redirect('empresa')
            ->with('msg', "Se actualizo correctamente");
        }
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
