<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Aprendices  </h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{  url('fichas')  }}">Fichas</a>
</li>
<li class="breadcrumb-item"><a href="{{  url('fichas/'.$ficha->id)  }}">  {{  $ficha->numero  }}  </a>
</li>
<li class="breadcrumb-item"><a href="{{  url('fichas/'.$ficha->id.'/aprendices' )  }}"> Aprendices  </a>
</li>
@endsection

<!--CONTENIDO-->
@section('contenido')


<!--------------------------------------------->
<!---LLAMA MODAL PARA CREAR-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#CreateAprendiz">
    <i class="fas fa-plus"></i>
</button>

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
                            <th>Empresa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aprendices as $aprendiz)
                        <tr>
                            <td>{{  $aprendiz->usuarios()->nombre  }} {{  $aprendiz->usuarios()->apellido  }}</td>
                            <td>
                                @if( $aprendiz->empresas() != null || $aprendiz->empresas() != '' )
                                    {{--  $aprendiz->empresas()->nombre  --}}
                                    {{-- <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditEmpresa{{  $aprendiz->empresas()->id  }}">
                                        <i class="far fa-edit"></i>
                                    </button> --}}

                                @else
                                    {{  'Sin Empresa'  }}
                                @endif
                            </td>

                            <td>
                                <!--------------------------------------------->
                                <!---URL PARA VER-->
                                <!--------------------------------------------->
                                <a href="{{url('aprendices/'.$aprendiz->id)}}">
                                    <button type="button" class="btn btn-primary btn-circle">
                                        <i class="fas fa-info"></i>
                                    </button>
                                </a>

                                <!--------------------------------------------->
                                <!---LLAMA MODAL PARA EDITAR-->
                                <!--------------------------------------------->
                                <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditAprendiz{{$aprendiz->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!--------------------------------------------->
                                <!---LLAMA MODAL PARA ELIMINAR-->
                                <!--------------------------------------------->
                                {{-- <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteAprendiz{{$aprendiz->id}}">
                                    <i class=" fas fa-trash-alt"></i>
                                </button> --}}

                            </td>
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

<!--MODALES-->
@include('plantilla.modales.aprendiz')
@include('plantilla.modales.empresa')

@endsection
