<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Entregables</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{  url('fichas')  }}">Fichas</a>
</li>
<li class="breadcrumb-item"><a href="{{  url('fichas/'.$entregable->ficha()->IdFicha )  }}"> {{  $entregable->ficha()->NumeroFicha  }} </a>
</li>
<li class="breadcrumb-item"><a href=" {{  url('fichas/'.$entregable->ficha()->IdFicha.'/entregables' ) }}"> Entregables  </a>
</li>
@endsection

<!--CONTENIDO-->
@section('contenido')

<div class="col-12">
    <!--FORM-->
    <form method="POST" action="{{ url('entregables/'.$entregable->IdEntregables) }}">
        @csrf
        @method('PUT')

        <div class="form-body">

        <!--TITULO-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input value="{{ $entregable->Titulo }}" name="titulo" type="text" class="form-control"
                    placeholder="Titulo" data-toggle="tooltip" title="Titulo">
                    @error('titulo') {{$message}}  @enderror
                </div>
            </div>
        </div>

        <!--DESCRIPCION-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input value="{{  $entregable->Descripcion  }}" name="descripcion" type="text" class="form-control"
                    placeholder="Descripcion" data-toggle="tooltip" title="Descripcion">
                    @error('descripcion') {{$message}}  @enderror
                </div>
            </div>
        </div>

        <!--FECHA INICIAL, FECHA FINAL-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input value="{{  $entregable->FechaInicial }}" name="fechaInicial" type="date" class="form-control"
                    placeholder="Fecha Inicial" data-toggle="tooltip" title="Fecha Inicial" readonly>
                    @error('fechaInicial') {{$message}}  @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input value="{{  $entregable->FechaFinal  }}" name="fechaentrega" type="date" class="form-control"
                    placeholder="Fecha Entrega" data-toggle="tooltip" title="Fecha Entrega">
                    @error('fechaentrega') {{$message}}  @enderror
                </div>
            </div>
        </div>


        <!--HORA INICIAL, HORA FINAL-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input value="{{  $entregable->HoraInicial }}" name="horaInicial" type="text" class="form-control"
                    placeholder="Hora Inicial" data-toggle="tooltip" title="Hora Inicial" readonly>
                    @error('horaInicial') {{$message}}  @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input value="{{  $entregable->HoraEntrega  }}" name="horaentrega" type="text" class="form-control"
                    placeholder="Hora Entrega" data-toggle="tooltip" title="Hora Entrega">
                    @error('horaentrega') {{$message}}  @enderror
                </div>
            </div>
        </div>


        <!--ID_FICHA-->
        <input type="hidden" name="id_ficha" value="{{  $entregable->id_ficha  }}">



        <!--BTNS-->
        <div class="form-actions">
            <div class="text-right">
                <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
            </div>
        </div>

    </form>
</div>


@endsection
