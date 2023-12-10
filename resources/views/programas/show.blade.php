

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">  {{   $programa->nombre  }}  </h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')

<li class="breadcrumb-item">
    <a href="{{url('programas')}}">Programas</a>
</li>

<li class="breadcrumb-item">
    <a href="{{url('programas/'.$programa->id)}}">  {{  $programa->nombre  }}  </a>
</li>


@endsection

<!--CONTENIDO-->
@section('contenido')



<!---------------------------------------------->
<!---CARD-->
<!---------------------------------------------->
<div class="card">
    <div class="card-body">
        <div class="col-12">

            <!--NOMBRE, NIVEL-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <input type="text" value="{{ $programa->nombre }}"  name="nombre" class="form-control"
                        placeholder="Nombre" data-toggle="tooltip" title="Nombre" readonly>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        <input type="text" value="{{ $programa->nivel }}"  name="nivel" class="form-control"
                        placeholder="Nivel" data-toggle="tooltip" title="Nivel" readonly>

                    </div>
                </div>
            </div>


            <!--ESTADO, CENTRO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <input type="text" value="{{ $programa->estado }}"  name="estado" class="form-control"
                        placeholder="Estado" data-toggle="tooltip" title="Estado" readonly>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">


                        <input type="text" value="{{  $programa->centro()->nombre  }}"  name="centro" class="form-control"
                        placeholder="Centro" data-toggle="tooltip" title="Centro" readonly>


                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="card-footer">
        <!--------------------------------------------->
        <!---LLAMA MODAL PARA EDITAR-->
        <!--------------------------------------------->
        <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditPrograma{{$programa->id}}">
            <i class="far fa-edit"></i>
        </button>

    </div>
</div>
<!---------------------------------------------->
<!---END CARD-->
<!---------------------------------------------->









<!--------------------------------------------->
<!---MOSTRARA AL COORDINADOR Y ADMINISTRADOR TODOS LOS PROGRAMAS AL CONTRARIO SOLO ALGUNOS-->
<!--------------------------------------------->
@if( Auth::user()->rol()->first()->tipo == 'Administrador' || Auth::user()->rol()->first()->tipo == 'Coordinador'  )


<!--------------------------------------------->
<!---LLAMA MODAL PARA CREAR-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#CreateFicha">
    <i class="fas fa-plus"></i>
</button>

<!--------------------------------------------------------------->
<!---Card-->
<!--------------------------------------------------------------->
<div class="row">
    <div class="card-columns">
        @foreach ($programa->fichas()->get() as $ficha)

        <div class="col-md-20">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$ficha->numero}}</h4>
                <p class="card-text">

                    {{  $ficha->momento()  }}


                    / {{$ficha->programa()->nombre}}
                </p>
                <p>
                    @if( $ficha->instructor() )
                        {{  $ficha->instructor()->nombre  }} {{  $ficha->instructor()->apellido  }}
                    @else
                        <span class="badge badge-danger">{{  'Sin Instructor'  }}</span>
                    @endif

                    @if($ficha->estado == 'Activo')
                        <span class="badge badge-pill badge-success">{{  $ficha->estado  }}</span>
                    @elseif($ficha->estado == 'Inactivo')
                        <span class="badge badge-pill badge-secondary">{{  $ficha->estado  }}</span>
                    @else
                        <span class="badge badge-pill badge-info">{{  $ficha->estado  }}</span>
                    @endif
                </p>
            </div>
            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{url('fichas/'.$ficha->id )}}">
                        <button type="button" class="btn btn-primary btn-circle">
                            <i class="fas fa-info"></i>
                        </button>
                    </a>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA EDITAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditFicha{{$ficha->id}}">
                        <i class="far fa-edit"></i>
                    </button>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteFicha{{$ficha->id}}">
                        <i class=" fas fa-trash-alt"></i>
                    </button>

                </div>
            </div>

        </div>
        </div>

        @endforeach
    </div>
</div>
<!--------------------------------------------------------------->
<!---END Card-->
<!--------------------------------------------------------------->




@else

<!--------------------------------------------------------------->
<!---Card-->
<!--------------------------------------------------------------->
<div class="row">
    <div class="card-columns">
        @foreach ( Auth::user()->instructor()->fichasporprograma($programa->id) as $ficha)

        <div class="col-md-20">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$ficha->numero}}</h4>
                <p class="card-text">

                    {{  $ficha->momento()  }}


                    / {{$ficha->programa()->nombre}}
                </p>
                <p>
                    @if($ficha->estado == 'Activo')
                        <span class="badge badge-pill badge-success">{{  $ficha->estado  }}</span>
                    @elseif($ficha->estado == 'Inactivo')
                        <span class="badge badge-pill badge-secondary">{{  $ficha->estado  }}</span>
                    @else
                        <span class="badge badge-pill badge-info">{{  $ficha->estado  }}</span>
                    @endif
                </p>
            </div>
            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{url('fichas/'.$ficha->id )}}">
                        <button type="button" class="btn btn-primary btn-circle">
                            <i class="fas fa-info"></i>
                        </button>
                    </a>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA EDITAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditFicha{{$ficha->id}}">
                        <i class="far fa-edit"></i>
                    </button>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteFicha{{$ficha->id}}">
                        <i class=" fas fa-trash-alt"></i>
                    </button>

                </div>
            </div>

        </div>
        </div>

        @endforeach
    </div>
</div>
<!--------------------------------------------------------------->
<!---END Card-->
<!--------------------------------------------------------------->



@endif

<!--MODALES-->
@include('plantilla.modales.programa')
@include('plantilla.modales.ficha')

@endsection
