@extends('plantilla.plantilla')
@section('contenido')

<h1>
    @foreach ($aprendiz->usuarios()->get() as $usuario)
    {{$usuario->Nombre}}
    {{$usuario->Apellido}}
    @endforeach
</h1>
    <ul>
        <li>
            Empresa: {{$aprendiz->id_empresa}}
        </li>
        <li>
            @foreach ($aprendiz->fichas()->get() as $ficha)
                Ficha:{{$ficha->NumeroFicha}}
            @endforeach

        </li>
    </ul>

@endsection
