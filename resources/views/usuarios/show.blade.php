@extends('plantilla.plantilla')
@section('contenido')

<h1>{{$usuario->nombre}}{{$usuario->apellido}}</h1>
    <ul>
        <li>{{$usuario->aombre}}</li>
        <li>{{$usuario->apellido}}</li>
        <li>{{$usuario->fechaNacimiento}}</li>
        <li>{{$usuario->genero}}</li>
        <li>{{$usuario->tipoDocumento}}</li>
        <li>{{$usuario->numeroIdentificacion}}</li>
        <li>{{$usuario->numeroCelular}}</li>
        <li>{{$usuario->numeroFijo}}</li>
        <li>{{$usuario->emailPersonal}}</li>
        <li>{{$usuario->emailSena}}</li>
        <li>{{$usuario->dirección}}</li>
        <li>{{$usuario->estado}}</li>
        <li>
            @foreach ($usuario->rol()->select('tipo')->get() as $rol)
                {{$rol->tipo}}
            @endforeach
        </li>
    </ul>

@endsection
