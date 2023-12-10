

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $instructor->usuarios()->first()->nombre }} {{ $instructor->usuarios()->first()->apellido }}</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')

<li class="breadcrumb-item">
    <a href="{{url('instructores')}}">Instructores</a>
</li>

<li class="breadcrumb-item">
    <a href="{{url('instructores/'.$instructor->id)}}">{{ $instructor->usuarios()->first()->nombre }} {{ $instructor->usuarios()->first()->apellido }}</a>
</li>


@endsection

<!--CONTENIDO-->
@section('contenido')



<!--------------------------------------------------------------->
<!---Card-->
<!--------------------------------------------------------------->
<div class="card">
    <div class="card-body">

        <div class="col-12">

            <!--NOMBRE, APELLIDO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $instructor->usuarios()->first()->nombre  }}"  name="nombre" class="form-control"
                        placeholder="Nombre" data-toggle="tooltip" title="Nombre" readonly>
                        @error('nombre')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $instructor->usuarios()->first()->apellido  }}"  name="apellido" class="form-control"
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
                        <input type="date" value="{{ $instructor->usuarios()->first()->fechaNacimiento }}"  name="fechaNacimiento" class="form-control"
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
                            <option {{ $instructor->usuarios()->first()->genero == "F" ? 'selected' : ''}}>F</option>
                            <option {{ $instructor->usuarios()->first()->genero =="M" ? 'selected' : ''}}>M</option>
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
                            <option {{ $instructor->usuarios()->first()->tipoDocumento == "CC" ? 'selected' : ''}}>CC</option>
                            <option {{ $instructor->usuarios()->first()->tipoDocumento == "TI" ? 'selected' : ''}}>TI</option>
                            <option {{ $instructor->usuarios()->first()->tipoDocumento == "CE" ? 'selected' : ''}}>CE</option>
                            <option {{ $instructor->usuarios()->first()->tipoDocumento == "NIP" ? 'selected' : ''}}>NIP</option>
                            <option {{ $instructor->usuarios()->first()->tipoDocumento == "NIT" ? 'selected' : ''}}>NIT</option>
                            <option {{ $instructor->usuarios()->first()->tipoDocumento == "PAP" ? 'selected' : ''}}>PAP</option>
                        </select>
                        @error('tipoD')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" value="{{ $instructor->usuarios()->first()->numeroIdentificacion }}"  name="numeroD" class="form-control"
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
                        <input type="text" value="{{ $instructor->usuarios()->first()->emailPersonal }}"  name="emailP" class="form-control"
                        placeholder="Email Personal" data-toggle="tooltip" title="Email Personal" readonly>
                        @error('emailP')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $instructor->usuarios()->first()->emailSena }}"  name="emailS" class="form-control"
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
                        <input type="text" value="{{ $instructor->usuarios()->first()->numeroCelular}}"  name="celular" class="form-control"
                        placeholder="Celular" data-toggle="tooltip" title="Celular" readonly>
                        @error('celular')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{ $instructor->usuarios()->first()->numeroFijo }}"  name="telefono" class="form-control"
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
                        <input type="text" value="{{ $instructor->usuarios()->first()->direccion }}"  name="direccion" class="form-control"
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
                        <input type="text" value="{{ $instructor->usuarios()->first()->estado }}"  name="estado" class="form-control"
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
                        <input type="text" value="{{$centro->id}}"  name="centro" class="form-control"
                        placeholder="Centro" data-toggle="tooltip" title="Centro" hidden>
                        @error('centro')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{$centro->nombre}}" class="form-control"
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
            <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditInstructor{{$instructor->id}}">
                <i class="far fa-edit"></i>
            </button>

        </div>


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
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#AsignarInstructor{{$instructor->id}}">
    <i class="fas fa-plus"></i>
</button>



<div class="row">
    <div class="card-columns">

        @foreach ($instructor->fichas() as $ficha)

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">{{$ficha->numero}}</h4>

                    <p class="card-text">{{ $ficha->programa()->nombre }} /

                        {{  $ficha->momento()  }}

                    </p>


            </div>

            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{  url('fichas/'.$ficha->id ) }}">
                    <button type="button" class="btn btn-primary btn-circle">
                        <i class="fas fa-info"></i>
                    </button>
                    </a>

                     <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteAsignar{{$ficha->id}}">
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
