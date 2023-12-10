

<!--PLANTILLA-->
@extends('plantilla.plantilla')

<!--TITULO MIGAJAS DE PAN-->
@section('title-bread')
    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Centros</h4>
@endsection

<!--MIGAJAS DE PAN-->
@section('bread')
<li class="breadcrumb-item"><a href="{{url('centros')}}">Centros</a>
</li>
@endsection

<!--CONTENIDO-->
@section('contenido')




<!--------------------------------------------->
<!---LLAMA MODAL PARA CREACION-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary btn-circle"  data-toggle="modal" data-target="#CreateCentro">
    <i class="fas fa-plus"></i>
</button>



<!--------------------------------------------------------------->
    <!---CARUSEL-->
<!--------------------------------------------------------------->
<div id="carouselExampleIndicators3" class="carousel slide"
    data-ride="carousel">

    <ol class="carousel-indicators" style="opacity: 0.5; background:gray;">
        <li data-target="#carouselExampleIndicators2" data-slide-to="{{$i=1}}"
            class="active"></li>
            @foreach ($centros as $centro)
            <li data-target="#carouselExampleIndicators2" data-slide-to="{{$i+1}}"></li>
            @endforeach
    </ol>

    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <img class="img-fluid" src="{{asset('logoSena.png')}}"
                alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <div style="color:black;">
                    <h3>CENTROS</h3>
                </div>
            </div>
        </div>

        @foreach ($centros as $centro)
        <div class="carousel-item ">
            <img class="img-fluid d-block" src="{{asset('logoSena.png')}}"
                alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <div style="color:black;">
                    <h3>
                    <a href="{{url('centros/'.$centro->id)}}">
                        {{$centro->nombre}}
                    </a>
                    </h3>
                    <p>{{$centro->ciudad}} / {{$centro->region}}</p>
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

<!--------------------------------------------------------------->
    <!---end CARUSEL-->
<!--------------------------------------------------------------->





<!--------------------------------------------------------------->
    <!---Card-->
<!--------------------------------------------------------------->
<div class="row">
    <div class="card-columns">
        @foreach ($centros as $centro)

        <div class="col-md-20">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">{{$centro->nombre}}</h4>
                <p class="card-text"> {{$centro->ciudad}} / {{$centro->region}}</p>

                @if($centro->estado == 'Activo')
                    <span class="badge badge-pill badge-success"> {{$centro->estado}}</span>
                @else
                    <span class="badge badge-pill badge-secondary"> {{$centro->estado}}</span>
                @endif
            </div>
            <div class="card-footer">
                <div class="row">

                    <!--ver-->
                    <a href="{{url('centros/'.$centro->id)}}">
                    <button type="button" class="btn btn-primary btn-circle">
                        <i class="fas fa-info"></i>
                    </button>
                    </a>

                    <!--------------------------------------------->
                    <!---LLAMA MODAL PARA EDITAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditCentro{{$centro->id}}">
                        <i class="far fa-edit"></i>
                    </button>

                     <!--------------------------------------------->
                    <!---LLAMA MODAL PARA ELIMINAR-->
                    <!--------------------------------------------->
                    <button type="button" class="btn btn-danger btn-circle"  data-toggle="modal" data-target="#DeleteCentro{{$centro->id}}">
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
@include('plantilla.modales.centro')

@endsection


