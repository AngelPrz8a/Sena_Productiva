@extends('plantilla.plantilla')
@section('contenido')

<ul>
    <li>
        {{$reunion->Titulo}}
     </li>
     <li>
         {{$reunion->Descripcion}}
     </li>
     <li>
         {{$reunion->FechaCitacion}}
     </li>
     <li>
         {{$reunion->HoraCitacion}}
     </li>
     <li>
         {{$reunion->Modalidad}}
     </li>
     <li>
         {{$reunion->FechaCreacion}}
     </li>
     <li>
         {{$reunion->MomentoEleccion}}
     </li>
     <li>
         @foreach ($reunion->instructor()->get() as $instructor)
            {{$instructor->IdInstructor}}
         @endforeach
     </li>
</ul>

@endsection
