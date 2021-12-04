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


<!--------------------------------------------------------------->
    <!---Card-->
<!--------------------------------------------------------------->
<div class="card">
    <div class="card-body">
        <div class="col-12">


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


    </div>
    <div class="card-footer">
        <!--------------------------------------------->
        <!---LLAMA MODAL PARA EDITAR-->
        <!--------------------------------------------->
        <a href="{{url('entregables/'.$entregable->IdEntregables.'/edit' )}}">
            <button type="button" class="btn btn-warning btn-circle">
                <i class="fas fa-edit"></i>
            </button>
        </a>

    </div>
    </div>
</div>
<!--------------------------------------------------------------->
<!---END Card-->
<!--------------------------------------------------------------->










<!--------------------------------------------->
<!---CARD   -->
<!--------------------------------------------->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lista de Aprendices</h4>
            <div class="table-responsive">
                <table id="multi_col_order"
                    class="table table-striped table-bordered display no-wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entregable->ficha()->aprendices() as $aprendiz)
                        <tr>
                            <td>{{  $aprendiz->usuarios()->Nombre  }} {{  $aprendiz->usuarios()->Apellido  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------->
<!---END CARD   -->
<!--------------------------------------------->

@endsection
