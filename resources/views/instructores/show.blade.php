

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
@foreach ($instructor->usuarios() as $usuario )
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $usuario->Nombre }} {{ $usuario->Apellido }}</h4>
@endforeach
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')

<li class="breadcrumb-item">
    <a href="{{url('instructores')}}">Instructores</a>
</li>
@foreach ($instructor->usuarios() as $usuario )
    <li class="breadcrumb-item">
        <a href="{{url('instructores/'.$instructor->IdInstructor)}}">{{ $usuario->Nombre }} {{ $usuario->Apellido }}</a>
    </li>
@endforeach

@endsection

<!--CONTENIDO-->
@section('contenido')



<!--------------------------------------------------------------->
<!---Card-->
<!--------------------------------------------------------------->
<div class="card">
    <div class="card-body">

        @foreach ($instructor->usuarios() as $usuario )

        <div class="col-12">

            <!--NOMBRE, APELLIDO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->Nombre  }}"  name="nombre" class="form-control"
                        placeholder="Nombre" data-toggle="tooltip" title="Nombre" readonly>
                        @error('nombre')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->Apellido  }}"  name="apellido" class="form-control"
                        placeholder="Apellido" data-toggle="tooltip" title="Apellido" readonly>
                        @error('apellido')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>


            <!--FECHA NACIMIENTO, GENERO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" value="{{ $usuario->FechaNacimiento }}"  name="fechaNacimiento" class="form-control"
                        placeholder="Fecha Nacimiento" data-toggle="tooltip" title="Fecha Nacimiento" readonly>
                        @error('fechaNacimiento')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="genero" class="form-control" data-toggle="tooltip" title="Genero">
                            <option value="">Seleccione...</option>
                            <option {{ $usuario->Genero == "F" ? 'selected' : ''}}>F</option>
                            <option {{ $usuario->Genero =="M" ? 'selected' : ''}}>M</option>
                            </select>
                        @error('genero')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>

            <!--DOCUMENTO: TIPO, NUMERO-->
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="tipoD" class="form-control"  data-toggle="tooltip" title="Tipo Documento">
                            <option value="">Seleccione...</option>
                            <option {{ $usuario->TipoDocumento == "CC" ? 'selected' : ''}}>CC</option>
                            <option {{ $usuario->TipoDocumento == "TI" ? 'selected' : ''}}>TI</option>
                            <option {{ $usuario->TipoDocumento == "CE" ? 'selected' : ''}}>CE</option>
                            <option {{ $usuario->TipoDocumento == "NIP" ? 'selected' : ''}}>NIP</option>
                            <option {{ $usuario->TipoDocumento == "NIT" ? 'selected' : ''}}>NIT</option>
                            <option {{ $usuario->TipoDocumento == "PAP" ? 'selected' : ''}}>PAP</option>
                        </select>
                        @error('tipoD')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->NumeroIdentificacion }}"  name="numeroD" class="form-control"
                        placeholder="Número Documento" data-toggle="tooltip" title="Número Documento" readonly>
                        @error('numeroD')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>

            <!--EMAIL: PERSONAL, SENA-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->EmailPersonal }}"  name="emailP" class="form-control"
                        placeholder="Email Personal" data-toggle="tooltip" title="Email Personal" readonly>
                        @error('emailP')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->EmailSena }}"  name="emailS" class="form-control"
                        placeholder="Email Sena" data-toggle="tooltip" title="Email Sena" readonly>
                        @error('emailS')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>


             <!--NUMERO: CELULAR, TELEFONO-->
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->NumeroCelular}}"  name="celular" class="form-control"
                        placeholder="Celular" data-toggle="tooltip" title="Celular" readonly>
                        @error('celular')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->NumeroFijo }}"  name="telefono" class="form-control"
                        placeholder="Telefono" data-toggle="tooltip" title="Telefono" readonly>
                        @error('telefono')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>


            <!--DIRECCION  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->Direccion }}"  name="direccion" class="form-control"
                        placeholder="Dirección" data-toggle="tooltip" title="Dirección" readonly>
                        @error('direccion')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>


             <!--ESTADO, ROL, CENTRO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $usuario->Estado }}"  name="estado" class="form-control"
                        placeholder="Estado" data-toggle="tooltip" title="Estado" readonly>
                        @error('estado')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="col-md-0">
                    <div class="form-group">
                        <input type="text" value="Instructor"  name="rol" class="form-control"
                        placeholder="Rol" data-toggle="tooltip" title="Rol" hidden>
                        @error('rol')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                @foreach ($instructor->centro() as $centro )

                <div class="col-md-0">
                    <div class="form-group">
                        <input type="text" value="{{$centro->IdCentro}}"  name="centro" class="form-control"
                        placeholder="Centro" data-toggle="tooltip" title="Centro" hidden>
                        @error('centro')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{$centro->Nombre}}" class="form-control"
                        placeholder="Centro" data-toggle="tooltip" title="Centro" readonly>
                        @error('centro')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                @endforeach
            </div>

        </div>
        <div class="card-footer">
            <!--------------------------------------------->
            <!---LLAMA MODAL PARA EDITAR-->
            <!--------------------------------------------->
            <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditInstructor{{$instructor->IdInstructor}}">
                <i class="far fa-edit"></i>
            </button>

        </div>

        @endforeach

    </div>
</div>
<!--------------------------------------------------------------->
<!---END Card-->
<!--------------------------------------------------------------->













<!----------------------------------------------------------->
<!--CARD FICHAS-->
<!----------------------------------------------------------->


<!--------------------------------------------->
<!---LLAMA MODAL PARA ASIGNAR-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#AsignarInstructor{{$instructor->IdInstructor}}">
    <i class="fas fa-plus"></i>
</button>



<div class="row">
    <div class="card-columns">

        @foreach ($instructor->fichas() as $ficha)

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">{{$ficha->NumeroFicha}}</h4>

                    <p class="card-text">{{ $ficha->programa()->Nombre }} /

                        {{  $ficha->momento()  }}

                    </p>


            </div>

            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{  url('fichas/'.$ficha->IdFicha ) }}">
                    <button type="button" class="btn btn-primary btn-circle">
                        <i class="fas fa-info"></i>
                    </button>
                    </a>

                     <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteAsignar{{$ficha->IdFicha}}">
                        <i class=" fas fa-trash-alt"></i>
                    </button>

                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
<!----------------------------------------------------------->
<!--END CARD FICHAS-->
<!----------------------------------------------------------->


<!--MODALES-->
@include('plantilla.modales.instructor')


@endsection
