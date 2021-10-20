    <?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\ReunionAprendiz;
use App\Http\Requests\storeReunionAprendiz;
use App\Http\Requests\updateReunionAprendiz;

class ReunionAprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reunionAprendiz.index')
        ->with('reuniones', ReunionAprendiz::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reunionAprendiz.create')
        ->with('instructores', Instructor::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeReunionAprendiz $request)
    {
        $new = new ReunionAprendiz();
        $new->Titulo = $request->input('titulo');
        $new->Descripcion = $request->input('descripcion');
        $new->FechaCitacion = $request->input('fechaCitacion');
        $new->HoraCitacion = $request->input('horaCitacion');
        $new->Modalidad = $request->input('modalidad');
        $new->FechaCreacion = Carbon::now();
        $new->MomentoEleccion = $request->input('momentoEleccion');
        $new->Estado = 'Activo';
        $new->IdInstructor = $request->input('id_instructor');
        $new->save();

        return redirect('reunionAprendiz')
        ->with('msg', 'Se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReunionAprendiz  $reunionAprendiz
     * @return \Illuminate\Http\Response
     */
    public function show(/*ReunionAprendiz*/ $reunionAprendiz)
    {
        $reunionAprendiz = ReunionAprendiz::find($reunionAprendiz);

        return view('reunionAprendiz.show')
        ->with('reunion',$reunionAprendiz );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReunionAprendiz  $reunionAprendiz
     * @return \Illuminate\Http\Response
     */
    public function edit(/*ReunionAprendiz*/ $reunionAprendiz)
    {
        $reunionAprendiz = ReunionAprendiz::find($reunionAprendiz);
        return view('reunionAprendiz.edit')
        ->with('reunion',$reunionAprendiz )
        ->with('instructores', Instructor::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReunionAprendiz  $reunionAprendiz
     * @return \Illuminate\Http\Response
     */
    public function update(updateReunionAprendiz $request, /*ReunionAprendiz*/ $reunionAprendiz)
    {
        $new = ReunionAprendiz::find($reunionAprendiz);
        $new->Titulo = $request->input('titulo');
        $new->Descripcion = $request->input('descripcion');
        $new->FechaCitacion = $request->input('fechaCitacion');
        $new->HoraCitacion = $request->input('horaCitacion');
        $new->Modalidad = $request->input('modalidad');
        $new->FechaCreacion = Carbon::now();
        $new->MomentoEleccion = $request->input('momentoEleccion');
        $new->Estado = $request->input('estado');
        $new->IdInstructor = $request->input('id_instructor');
        $new->save();

        return redirect('reunionAprendiz')
        ->with('msg', 'Se registro correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReunionAprendiz  $reunionAprendiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReunionAprendiz $reunionAprendiz)
    {
        //
    }


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

        return redirect('usuarios');
        //echo $usuario->Estado;
    }//end function
    ////////////////////////////
}
