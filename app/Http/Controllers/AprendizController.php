<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Ficha;
use App\Models\Usuario;
use App\Models\Aprendiz;
use App\Models\UsuarioRol;
use Illuminate\Http\Request;
use App\Http\Requests\storeUsuario;
use App\Http\Requests\storeAprendiz;
use App\Http\Requests\updateUsuario;
use App\Http\Requests\updateAprendiz;

class AprendizController extends Controller
{
//
    public function index($id)
    {
        $ficha = Ficha::find($id);
        $array = $ficha->aprendices()->get();

        return view('aprendices.index')
        ->with('aprendices', $array)
        ->with('ficha', $ficha);
    }
//



//
    public function store(storeUsuario $request)
    {
        $usuarioC = new UsuarioController();
        $usuarioC = $usuarioC->store($request);
        $usuarioC->save();

        $newA = new Aprendiz();
        $newA->id_usuario = $usuarioC->id;
        $newA->id_ficha = $request->input('ficha');
        $newA->save();

        return redirect($request->url)
        ->with('msg', "Se registro correctamente");
    }
//



//
    public function show($aprendiz)
    {
        $aprendiz = Aprendiz::find($aprendiz);

        return view('aprendices.show')
        ->with('aprendiz',$aprendiz);
    }
//



//
    public function update(updateUsuario $request,  $aprendiz)
    {
        $aprendiz = Aprendiz::find($aprendiz);
        $user = $aprendiz->usuarios();

        $usuarioC = new UsuarioController();
        $usuarioC = $usuarioC->update(  $request, $user->id  );
        $usuarioC->save();

        return redirect($request->url)
        ->with('msg', 'Se actualizo correctamente');
    }
//



//
    public function destroy(/*Aprendiz*/ $aprendiz)
    {
        $a = $aprendiz;
        $aprendiz = User::find($aprendiz);
        $aprendiz->delete();
        return redirect('aprendices')
        ->msg('msg', 'Se actualizo correctamente');
    }
//


}
