<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">  {{  $ficha->numero  }}  </h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{url('fichas')}}">Fichas</a>
</li>
<li class="breadcrumb-item"><a href="{{url('fichas/'.$ficha->id)}}">  {{  $ficha->numero  }}  </a>
</li>
@endsection

<!--CONTENIDO-->
@section('contenido')

<!------------------------------------------>
<!--FICHA Y OPCIONES-->
<!------------------------------------------>
<div class="row">

<!------------------------------------------>
<!--FICHA -->
<!------------------------------------------>
    <div class="col-4">
        <!-- Card -->
        <div class="card text-center">

            <div class="card-body">

                <!--img  -->
                <img class="card-img-top img-fluid" src="{{asset('logoSena.png')}}">

                <!--numero ficha -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 class="card-title">  {{  $ficha->numero  }}  </h4>
                        </div>
                    </div>
                </div>


                <!--momento programa -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="{{  url('programas/'.$ficha->programa()->id)  }}">
                                {{ $ficha->programa()->nombre  }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{  $ficha->momento()  }}
                        </div>
                    </div>
                </div>


                <!--cantidad de aprendices, instructor -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            N°  Aprendices {{  $ficha->countAprendices()  }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--------------------------------------------->
                            <!---MOSTRARA AL COORDINADOR Y ADMINISTRADOR TODOS LOS PROGRAMAS AL CONTRARIO SOLO ALGUNOS-->
                            <!--------------------------------------------->
                            @if(  Auth::user()->rol()->first()->tipo == 'Coordinador' || Auth::user()->rol()->first()->tipo == 'Adminsitrador'  )
                            Instructor

                            <a href="{{ url('instructores/'.$ficha->instructor()->id )  }}">
                                 {{  $ficha->instructor()->nombre  }}  {{  $ficha->instructor()->apellido  }}
                            </a>

                             @elseif ($ficha->instructor() == null)

                             Sin instructor

                             @else
                                {{  $ficha->instructor()->nombre  }}  {{  $ficha->instructor()->apellido  }}
                            @endif

                        </div>
                    </div>
                </div>

                <!--instructor -->


                <!-- estado -->
                @if($ficha->estado == 'Activo')
                    <span class="badge badge-pill badge-success">{{  $ficha->estado  }}</span>
                @elseif($ficha->estado == 'Inactivo')
                    <span class="badge badge-pill badge-secondary">{{  $ficha->estado  }}</span>
                @else
                    <span class="badge badge-pill badge-info">{{  $ficha->estado  }}</span>
                @endif


            </div>

            <div class="card-footer">
                <!--------------------------------------------->
                <!---LLAMA MODAL PARA EDITAR-->
                <!--------------------------------------------->
                <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditFicha{{$ficha->id}}">
                    <i class="far fa-edit"></i>
                </button>

            </div>

        </div>
        <!-- Card -->
    </div>
<!------------------------------------------>
<!--END FICHA -->
<!------------------------------------------>






<!------------------------------------------>
<!--OPCIONES -->
<!------------------------------------------>

    <div class="col-8">
        <!-- Card -->
        <div class="card text-center">

            <div class="card-body">
                <h4 class="card-title"> Opciones</h4>
            <div class="card-deck">

                            <div class="card">
                                <a>
                                    <img class="card-img-top1" src="{{asset('graduation-hat.png')}}">
                                    <div class="card-body">
                                        <a href="{{ url( 'fichas/'.$ficha->id.'/aprendices' ) }}" class="a_fichas">
                                            <h4 class="card-title">Aprendiz</h4>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            @if ($ficha->instructor() != null)
                            <div class="card">
                                <img class="card-img-top"  src="{{asset('book.png')}}">

                                <div class="card-body">
                                    <a href="{{  url('fichas/'.$ficha->id.'/entregables')  }}" class="a_fichas"><h4 class="card-title">Entregables</h4></a>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <img class="card-img-top"  src="{{asset('calendar.png')}}">
                                <div class="card-body">
                                <a href="{{ url('reunionAprendiz') }}" class="a_fichas"><h4 class="card-title">Calendario</h4></a>
                                </div>
                            </div>
            </div>

        </div>
        <!-- Card -->
    </div>
<!------------------------------------------>
<!--END OPCIONES -->
<!------------------------------------------>

</div>



<!------------------------------------------>
<!--END FICHA Y OPCIONES-->
<!------------------------------------------>

<!--FICHA-->
@include('plantilla.modales.ficha')

@endsection
