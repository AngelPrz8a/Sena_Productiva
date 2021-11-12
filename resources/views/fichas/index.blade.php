

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
                <h4 class="card-title">{{$ficha->NumeroFicha}}</h4>
                <p class="card-text">

                    {{  $ficha->momento()  }}


                    / {{$ficha->programa()->Nombre}}
                </p>
                <p>
                    @if( $ficha->instructor() )
                        {{  $ficha->instructor()->Nombre  }} {{  $ficha->instructor()->Apellido  }}
                    @else
                        <span class="badge badge-danger">{{  'Sin Instructor'  }}</span>
                    @endif

                    @if($ficha->Estado == 'Activo')
                        <span class="badge badge-pill badge-success">{{  $ficha->Estado  }}</span>
                    @elseif($ficha->Estado == 'Inactivo')
                        <span class="badge badge-pill badge-secondary">{{  $ficha->Estado  }}</span>
                    @else
                        <span class="badge badge-pill badge-info">{{  $ficha->Estado  }}</span>
                    @endif
                </p>
            </div>
            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{url('fichas/'.$ficha->IdFicha )}}">
                        <button type="button" class="btn btn-primary btn-circle">
                            <i class="fas fa-info"></i>
                        </button>
                    </a>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA EDITAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditFicha{{$ficha->IdFicha}}">
                        <i class="far fa-edit"></i>
                    </button>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteFicha{{$ficha->IdFicha}}">
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


<!--MODALES-->
@include('plantilla.modales.ficha')

@endsection
