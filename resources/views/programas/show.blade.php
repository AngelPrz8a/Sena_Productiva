

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">  {{   $programa->Nombre  }}  </h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')

<li class="breadcrumb-item">
    <a href="{{url('programas')}}">Programas</a>
</li>

<li class="breadcrumb-item">
    <a href="{{url('programas/'.$programa->IdPrograma)}}">  {{  $programa->Nombre  }}  </a>
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

                        <input type="text" value="{{ $programa->Nombre }}"  name="nombre" class="form-control"
                        placeholder="Nombre" data-toggle="tooltip" title="Nombre" readonly>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        <input type="text" value="{{ $programa->Nivel }}"  name="nivel" class="form-control"
                        placeholder="Nivel" data-toggle="tooltip" title="Nivel" readonly>

                    </div>
                </div>
            </div>


            <!--ESTADO, CENTRO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <input type="text" value="{{ $programa->Estado }}"  name="estado" class="form-control"
                        placeholder="Estado" data-toggle="tooltip" title="Estado" readonly>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">


                        <input type="text" value="{{  $programa->centro()->Nombre  }}"  name="centro" class="form-control"
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
        <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditPrograma{{$programa->IdPrograma}}">
            <i class="far fa-edit"></i>
        </button>

    </div>
</div>
<!---------------------------------------------->
<!---END CARD-->
<!---------------------------------------------->






<!--------------------------------------------------------------->
<!---Card-->
<!--------------------------------------------------------------->
<div class="row">
    <div class="card-columns">
        @foreach ($programa->fichas()->get() as $ficha)

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
@include('plantilla.modales.programa')
@include('plantilla.modales.ficha')

@endsection
