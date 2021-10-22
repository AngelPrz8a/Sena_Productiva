@extends('plantilla.plantilla')
@section('contenido')

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <center><h1 class="card-title">Entregables</h1></center>
                                <div class="table-responsive">

                                    <button  type="button" class="btn btn-primary"><a style=" color: white;" href="{{url('entregables/create')}}">+ Entregable </a></button>


									<table style="margin-top:1rem;" id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr
											style="
                                            background:#ffb880;
											aling-text:center;
                                            color:white;
											"
											>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Fecha Inicial</th>
                                            <th>Fecha Final</th>
                                            <th>Hora Inicial</th>
                                            <th>Hora Entrega</th>
                                            <!--
                                            <th>Acta</th>
                                            -->
                                            <th>Estado</th>
                                            <th>Instructor</th>
                                            <th>Ver</th>
                                            <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($entregables as $entregable)
                                            <tr>
                                            <td style="padding-right:20px;">
                                              {{$entregable->Titulo}}
                                            </td>
                                            <td>
                                                {{$entregable->Descripcion}}
                                            </td>
                                            <td>
                                                {{$entregable->FechaInicial}}
                                            </td>
                                            <td>
                                                {{$entregable->FechaFinal}}
                                            </td>
                                            <td>
                                                {{$entregable->HoraInicial}}
                                            </td>
                                            <td>
                                                {{$entregable->HoraFinal}}
                                            </td>
                                            <!--
                                            <td>
                                                {{$entregable->Acta}}
                                            </td>
                                            -->
                                            <td>

                                                @switch($entregable->Estado)
                                                    @case('Activo')
                                                    <a type="submit" href="{{ url('entregables/habilitar/' .$entregable->IdEntregables ) }}" class="btn btn-danger btn-sm">Inactivar</a>
                                                    @break

                                                    @case('Inactivo')
                                                    <a type="submit" href="{{ url('entregables/habilitar/' .$entregable->IdEntregables ) }}" class="btn btn-success btn-sm">Activar</a>
                                                    @break

                                                    @default
                                                    <a href="{{ url('entregables/habilitar/' .$entregable->IdEntregables ) }}" class="btn btn-info btn-sm">Sin Estado</a>

                                                @endswitch
                                            </td>

                                            <td>
                                             @foreach ($entregable->instructor()->get() as $instructor)
                                                @foreach ($instructor->usuarios()->get() as $i)
                                                     {{$i->Nombre}} {{$i->Apellido}}
                                             @endforeach
                                            @endforeach
                                            </td>

                                            <!--
                                            <td>
                                                 <a href="{ {url('entregables/'.$entregable->IdEntregables)}}" >Show</a>
                                            </td>

                                            <td>
                                                 <a href="{ {url('entregables/'.$entregable->IdEntregables.'/edit')}}" >Edit</a>
                                            </td>
                                        -->


                                            <td>
                                                <form action="{{url('entregables/'.$entregable->IdEntregables)}}">
                                                <button style="border: none;"><i style="color: orange;" class="fas fa-eye"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{url('entregables/'.$entregable->IdEntregables.'/edit')}}">
                                                <button style="border: none;"><i style="color: orange;" class="fas fa-edit"></i></button>
                                                 </form>
                                            </td>


                                      </tr>
                                    @endforeach
                                 </tbody>
                                   </table>
                                    {{$entregables->links()}}

                                    </div>

                        </div>
                    </div>
                </div>
@endsection



