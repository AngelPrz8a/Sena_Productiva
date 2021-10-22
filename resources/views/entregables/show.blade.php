@extends('plantilla.plantilla')
@section('contenido')


<h1>Lista de Entregables</h1>

<h1>{{$entregables->Titulo}}</h1>
    <ul>
        <li>Descripción: {{$entregables->Descripción}}</li>
        <li>Fecha Inicial: {{$entregables->FechaHoraInicial}}</li>
        <li>Fecha Final: {{$entregables->FechaHoraEntrega}}</li>
        <li>Instructor: {{$entregables->IdInstructor}}</li>
    </ul>



<a type="submit" class=" btn btn-success" href="{{url('entregables')}}" >Regresar</a>

@endsection
