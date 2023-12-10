

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Fichas</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{url('fichas')}}">Fichas</a>
</li>
@endsection

<!--CONTENIDO-->
@section('contenido')




<!--------------------------------------------->
<!---MOSTRARA AL COORDINADOR Y ADMINISTRADOR TODOS LOS PROGRAMAS AL CONTRARIO SOLO ALGUNOS-->
<!--------------------------------------------->
@if(  Auth::user()->rol()->first()->tipo == 'Coordinador' || Auth::user()->rol()->first()->tipo == 'Administrador'  )



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
        @foreach ($fichas as $ficha)

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

                    @if($ficha->Estado == 'Activo')
                        <span class="badge badge-pill badge-success">{{  $ficha->estado  }}</span>
                    @elseif($ficha->Estado == 'Inactivo')
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
        @if(Auth::user()->instructor() != null || Auth::user()->instructor() != '')
        @foreach (Auth::user()->instructor()->fichas() as $ficha)

        <div class="col-md-20">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$ficha->numero}}</h4>
                <p class="card-text">


                    {{  $ficha->momento()  }}


                    / {{$ficha->programa()->nombre}}
                </p>
                <p>
                    @if($ficha->Estado == 'Activo')
                        <span class="badge badge-pill badge-success">{{  $ficha->estado  }}</span>
                    @elseif($ficha->Estado == 'Inactivo')
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
        @endif
    </div>
</div>
<!--------------------------------------------------------------->
<!---END Card-->
<!--------------------------------------------------------------->


@endif

<!--MODALES-->
@include('plantilla.modales.ficha')

@endsection
