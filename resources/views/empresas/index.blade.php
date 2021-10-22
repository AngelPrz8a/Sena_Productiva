@extends('plantilla.plantilla')
@section('contenido')



<center><h1>Lista de Empresas</h1></center>

@if(Session::has('msg'))
 <div class="alert alert-warning alert-dismissible" role="alert">
{{ session::get('msg')}}

 <button type="button" class="close" data-dismiss="alert" aria-label="close">
     <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif


<a type="submit" class=" btn btn-success" href="{{url('empresas/create')}}" >Nuevo</a>


<table class="table table-striped">
    <thead>
        <th></th>
        <th>NIT</th>
        <th>Nombre</th>
        <th>Nombre Jefe</th>
        <th>EmialInmediato</th>


    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
            <tr>
                <td>
                    <a href="{{url('empresas/'.$empresa->IdEmpresa)}}" >Show</a>

                    <a href="{{url('empresas/'.$empresa->IdEmpresa.'/edit')}}" >Edit</a>
                </td>
                <td>
                    {{$empresa->NIT}}
                </td>
                <td>
                    {{$empresa->Nombre}}
                </td>
                <td>
                    {{$empresa->NombreInmediato}}
                    {{$empresa->ApellidoInmediato}}
                </td>
                <td>
                    {{$empresa->EmailInmediato}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$empresas->links()}}

</div>

@endsection





