
@extends('plantilla.plantilla')
@section('contenido')


<h3>Eres un {{  Auth::user()->rol()->first()->tipoRol  }}</h3>

@if (session('msg'))
{{session('msg')}}
@endif


@endsection
