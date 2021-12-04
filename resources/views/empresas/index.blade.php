<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Empresa  </h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{  url('empresas')  }}">Empresa</a>
</li>

@endsection

<!--CONTENIDO-->
@section('contenido')



<!--MENSAJE-->
@if(Session::has('msg'))
 <div class="alert alert-warning alert-dismissible" role="alert">
{{ session::get('msg')}}

 <button type="button" class="close" data-dismiss="alert" aria-label="close">
     <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif


<!---SEGUN EL ROL, SI NO ES APRENDIZ VISUALIZA A TODAS LAS EMPRESAS Y APRENDICES-->
@if(Auth::user()->rol()->first()->tipoRol != 'Aprendiz')



<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lista de Empresas</h4>
            <div class="table-responsive">
                <table id="multi_col_order"
                    class="table table-striped table-bordered display no-wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Nombre Jefe</th>
                            <th>Email Jefe</th>
                            <th>Telefono Jefe</th>
                            <th>Aprendiz</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                        <tr>

                            <td>{{  $empresa->Nombre  }}</td>
                            <td>{{  $empresa->NombreInmediato  }}</td>
                            <td>{{  $empresa->EmailInmediato  }}</td>
                            <td>{{  $empresa->TelefonoInmediato  }}</td>
                            <td>Aprendiz</td>

                            <td>
                                <!--------------------------------------------->
                                <!---LLAMA MODAL PARA EDITAR-->
                                <!--------------------------------------------->
                                <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditEmpresa{{  $empresa->IdEmpresa  }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!--APRENDIZ-->
@else

    @if($empresa)

    <div class="row">
    <!------------------------------------------>
    <!--CARD -->
    <!------------------------------------------>
    <div class="col-12">
        <!-- Card -->
        <div class="card text-center">

            <div class="card-body">

                <h3 class="card-title">Empresa : {{  $empresa->Nombre  }}</h3>

                <!-- -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Nit">  {{  $empresa->NIT  }}  </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Nombre">  {{  $empresa->Nombre  }}  </h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Razon Social">  {{  $empresa->RazonSocial  }}  </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Telefono">  {{  $empresa->Telefono  }}  </h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Direccion">  {{  $empresa->Direccion  }}  </h4>
                        </div>
                    </div>
                </div>

                <h3 class="card-title">Jefe Inmediato</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Nombre Jefe">  {{  $empresa->NombreInmediato  }}  </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Apellido Jefe">  {{  $empresa->ApellidoInmediato  }}  </h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Email Jefe">  {{  $empresa->EmailInmediato  }}  </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Telefono Jefe">  {{  $empresa->TelefonoInmediato  }}  </h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 class="card-text"
                            data-toggle="tooltip" title="Cargo Jefe">  {{  $empresa->CargoInmediato  }}  </h4>
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer">
                <!--------------------------------------------->
                <!---LLAMA MODAL PARA EDITAR-->
                <!--------------------------------------------->
                <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditEmpresa{{  $empresa->IdEmpresa  }}">
                    <i class="far fa-edit"></i>
                </button>

            </div>

        </div>
        <!-- Card -->
    </div>
    <!------------------------------------------>
    <!--END CARD -->
    <!------------------------------------------>
    </div>


    <!--SI NO TIENE EMPRESA-->
    @else
        <!--------------------------------------------->
        <!---LLAMA MODAL PARA CREAR-->
        <!--------------------------------------------->
        <button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#CreateEmpresa">
            <i class="fas fa-plus"></i>
        </button>

    @endif

@endif


<!--MODALES-->
@include('plantilla.modales.empresa')

@endsection





