
<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Instructores</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{url('instructores')}}">Instructores</a>
</li>
@endsection

<!--CONTENIDO-->
@section('contenido')


<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lista de Instructores</h4>
            <div class="table-responsive">
                <table id="multi_col_order"
                    class="table table-striped table-bordered display no-wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Centro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instructores as $instructor)
                        <tr>
                            
                            <td>
                                {{$instructor->usuarios()->first()->nombre}}  {{$instructor->usuarios()->first()->apellido}}
                            </td>

                            @foreach ($instructor->centro() as $c)
                            <td>
                                {{$c->nombre}}
                            </td>
                            @endforeach

                            <td>
                                <!--------------------------------------------->
                                <!---URL PARA VER-->
                                <!--------------------------------------------->
                                <a href="{{url('instructores/'.$instructor->id)}}">
                                    <button type="button" class="btn btn-primary btn-circle">
                                        <i class="fas fa-info"></i>
                                    </button>
                                </a>

                                <!--------------------------------------------->
                                <!---LLAMA MODAL PARA EDITAR-->
                                <!--------------------------------------------->
                                <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditInstructor{{$instructor->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!--------------------------------------------->
                                <!---LLAMA MODAL PARA ELIMINAR-->
                                <!--------------------------------------------->
                                <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteInstructor{{$instructor->id}}">
                                    <i class=" fas fa-trash-alt"></i>
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


<!--MODALES-->
@include('plantilla.modales.instructor')



@endsection





