@extends('plantilla.plantilla')
@section('contenido')

<h1>{{$usuario->Nombre}}{{$usuario->Apellido}}</h1>
    <ul>
        <li>{{$usuario->Nombre}}</li>
        <li>{{$usuario->Apellido}}</li>
        <li>{{$usuario->FechaNacimiento}}</li>
        <li>{{$usuario->Genero}}</li>
        <li>{{$usuario->TipoDocumento}}</li>
        <li>{{$usuario->NumeroIdentificacion}}</li>
        <li>{{$usuario->NumeroCelular}}</li>
        <li>{{$usuario->NumeroFijo}}</li>
        <li>{{$usuario->EmailPersonal}}</li>
        <li>{{$usuario->EmailSena}}</li>
        <li>{{$usuario->Dirección}}</li>
        <li>{{$usuario->Estado}}</li>
        <li>
            @foreach ($usuario->rol()->select('tipoRol')->get() as $rol)
                {{$rol->tipoRol}}
            @endforeach
        </li>
    </ul>

@endsection
