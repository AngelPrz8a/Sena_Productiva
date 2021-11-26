

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $centro->Nombre }}</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{url('centros')}}">Centros</a>
</li>
<li class="breadcrumb-item"><a href="{{url('centros')}}">{{ $centro->Nombre }}</a>
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


                <!--NOMBRE-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text"  value="{{ $centro->Nombre }}"  name="nombre" class="form-control"
                            placeholder="Nombre" data-toggle="tooltip" title="Nombre" readonly>
                        </div>
                    </div>
                </div>

                <!--SEDE, CIUDAD-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text"  value="{{ $centro->Sede }}"  name="sede" class="form-control"
                                placeholder="Sede" data-toggle="tooltip" title="Sede" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $centro->Ciudad }}" name="ciudad" class="form-control"
                                placeholder="Ciudad" data-toggle="tooltip" title="Ciudad" readonly>
                        </div>
                    </div>
                </div>


                <!--DIRECCION, REGION-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text"  value="{{ $centro->Direccion }}" name="direccion" class="form-control"
                                placeholder="Dirección" data-toggle="tooltip" title="Dirección" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $centro->Region }}" name="region" class="form-control"
                                placeholder="Región" data-toggle="tooltip" title="Región" readonly>
                        </div>
                    </div>
                </div>



                <!--ESTADO-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="estado" class="form-control"
                            data-toggle="tooltip" title="estado" aria-readonly="readonly">
                                <option {{$centro->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
                                <option {{$centro->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
    </div>
    <div class="card-footer">
        <!--------------------------------------------->
        <!---LLAMA MODAL PARA EDITAR-->
        <!--------------------------------------------->
        <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditCentro{{$centro->IdCentro}}">
            <i class="far fa-edit"></i>
        </button>

            <!--------------------------------------------->
        <!---LLAMA MODAL PARA ELIMINAR-->
        <!--------------------------------------------->
        <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteCentro{{$centro->IdCentro}}">
            <i class=" fas fa-trash-alt"></i>
        </button>
    </div>
    </div>
</div>
<!--------------------------------------------------------------->
    <!---END Card-->
<!--------------------------------------------------------------->




<!--ROW CARD Y CAROUSEL-->
<div class="row">
<!--------------------------------------------------------------->
    <!---Card-->
<!--------------------------------------------------------------->
<div class="col-4">
    <div class="table-responsive">
        <table class="table">
            <thead class="bg-warning text-white">
                <tr>
                    <th>Programas</th>
                    <th>
                        <!--------------------------------------------->
                        <!---LLAMA MODAL PARA CREACION-->
                        <!--------------------------------------------->
                        <button type="button" class="btn btn-sm btn-primary btn-circle"  data-toggle="modal" data-target="#CreatePrograma">
                            <i class="fas fa-plus"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody class="border border-warning">
                @foreach ($centro->programas() as $programa)
                <tr>
                    <td>
                        {{$programa->Nombre}}
                    </td>
                    <td>
                        <!--------------------------------------------->
                        <!---URL PARA VER-->
                        <!--------------------------------------------->
                        <a href="{{url('programas/'.$programa->IdPrograma)}}">
                            <button type="button" class="btn btn-primary btn-circle">
                                <i class="fas fa-info"></i>
                            </button>
                        </a>

                        <!--------------------------------------------->
                        <!---LLAMA MODAL PARA EDITAR-->
                        <!--------------------------------------------->
                        <button type="button" class="btn btn-sm btn-warning btn-circle"  data-toggle="modal" data-target="#EditPrograma{{$programa->IdPrograma}}">
                            <i class="far fa-edit"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!--------------------------------------------------------------->
    <!---END Card-->
<!--------------------------------------------------------------->






<!--------------------------------------------------------------->
    <!---CARUSEL-->
<!--------------------------------------------------------------->
<div class="col-8">
<div id="carouselExampleIndicators3" class="carousel slide"
    data-ride="carousel">

    <ol class="carousel-indicators" style="opacity: 0.5; background:gray;">
        <li data-target="#carouselExampleIndicators2" data-slide-to="{{$i=1}}"
            class="active"></li>

            @foreach ($centro->programas() as $programa)
                <li data-target="#carouselExampleIndicators2" data-slide-to="{{$i+1}}"></li>
            @endforeach

    </ol>

    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <img class="img-fluid" src="{{asset('logoSena.png')}}"
                alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <div style="color:black;">
                    <h3>Programas</h3>
                </div>
            </div>
        </div>

        @foreach ($centro->programas() as $programa)
        <div class="carousel-item ">
            <img class="img-fluid d-block" src="{{asset('logoSena.png')}}"
                alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <div style="color:black;">
                    <h3>
                    <a href="{{url('programas/'.$programa->IdPrograma)}}">
                        {{$programa->Nombre}}
                    </a>
                    </h3>
                    <p>{{$programa->Nivel}}</p>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators3"
        role="button" data-slide="prev">
        <i class=" fas fa-arrow-left " style="color:black;" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators3"
        role="button" data-slide="next">
        <i class="fas fa-arrow-right"  style="color:black;" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<!--------------------------------------------------------------->
    <!---end CARUSEL-->
<!--------------------------------------------------------------->
</div>
<!--EDN ROW CARD Y CAROUSEL-->





<!--------------------------------------------------------------->
    <!---Card-->
<!--------------------------------------------------------------->


<!--------------------------------------------->
<!---LLAMA MODAL PARA CREACION-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#CreateInstructor">
    <i class="fas fa-plus"></i>
</button>


<div class="row">
    <div class="card-columns">
        @foreach ($centro->instructores() as $i)
        @foreach ($i->usuarios() as $instructor)

        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$instructor->Nombre}} {{$instructor->Apellido}}</h4>
            </div>
            <div class="card-footer">
                <div class="row">

                    <!--------------------------------------------->
                    <!---URL PARA VER-->
                    <!--------------------------------------------->
                    <a href="{{  url('instructores/'.$i->IdInstructor ) }}">
                    <button type="button" class="btn btn-primary btn-circle">
                        <i class="fas fa-info"></i>
                    </button>
                    </a>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA EDITAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditInstructor{{$i->IdInstructor}}">
                        <i class="far fa-edit"></i>
                    </button>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <!--
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteInstructor{{$i->IdInstructor}}">
                        <i class=" fas fa-trash-alt"></i>
                    </button>
                    -->

                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</div>
<!--------------------------------------------------------------->
    <!---END Card-->
<!--------------------------------------------------------------->



<!--MODALES-->
@include('plantilla.modales.programa')
@include('plantilla.modales.centro')
@include('plantilla.modales.instructor')


@endsection
