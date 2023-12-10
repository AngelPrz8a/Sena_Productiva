<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Entregables</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')

@if(  Auth::user()->rol()->first()->tipo != 'Aprendiz'   )

<li class="breadcrumb-item"><a href="{{  url('fichas')  }}">Fichas</a>
</li>
<li class="breadcrumb-item"><a href="{{  url('fichas/'.$ficha->id )  }}"> {{  $ficha->numero  }} </a>
</li>
<li class="breadcrumb-item"><a href=" {{  url('fichas/'.$ficha->id.'/entregables' ) }}"> Entregables  </a>
</li>

@else

<li class="breadcrumb-item"><a href="{{  url('entregables')  }}">Entregables</a>
</li>

@endif

@endsection

<!--CONTENIDO-->
@section('contenido')


@if(  Auth::user()->rol()->first()->tipo != 'Aprendiz'   )

<!--------------------------------------------->
<!---LLAMA MODAL PARA CREACION-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#CreateEntregable">
    <i class="fas fa-plus"></i>
</button>


<!--------------------------------------------------------------->
<!---Card-->
<!--------------------------------------------------------------->
<div class="row">
    <div class="card-columns">
        @foreach ($entregables as $entregable)

        <div class="col-md-20">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$entregable->titulo  }}</h4>
            </div>
            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{url('fichas/'.$entregable->ficha()->id.'/entregables/'.$entregable->id )}}">
                        <button type="button" class="btn btn-primary btn-circle">
                            <i class="fas fa-info"></i>
                        </button>
                    </a>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA EDITAR-->
                    <!--------------------------------------------->
                    <a href="{{url('entregables/'.$entregable->id.'/edit' )}}">
                        <button type="button" class="btn btn-warning btn-circle">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>

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
        @foreach ($entregables as $entregable)

        <div class="col-md-20">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$entregable->titulo  }}</h4>
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

<!--------------------------------------------------------------->
<!---MODALES-->
<!--------------------------------------------------------------->
@include('plantilla.modales.entregable')

@endsection



