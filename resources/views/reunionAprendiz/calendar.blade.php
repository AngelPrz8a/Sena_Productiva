@extends('plantilla.plantilla')

@section('bread')
<li class="breadcrumb-item"><a href="{{url('reunionAprendiz')}}">Calendario</a>
</li>
@endsection

@section('contenido')

<head>

    <!--CALENDAR-->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/locales-all.js"></script>

    <script>
        let protocolo = window.location.protocol; //127...
        let baseUrl = protocolo;
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<!--------------------------------------------->
<!---LLAMA MODAL PARA CREAR-->
<!--------------------------------------------->
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#CreateEvento">
    <i class="fas fa-plus"></i>
</button>

<!--------------------------------------------->
<!---MOSTRARA INSTRUCTOR-->
<!--------------------------------------------->
@if(  Auth::user()->rol()->first()->tipoRol == 'Intructor' )




@else

<!--------------------------------------------->
<!---TABLE-->
<!--------------------------------------------->

<!--------------------------------------------->
<!---CARD   -->
<!--------------------------------------------->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lista de Reuniones</h4>
            <div class="table-responsive">
                <table id="multi_col_order"
                    class="table table-striped table-bordered display no-wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reuniones as $reunion)
                        <tr>
                            <td>{{  $reunion->title  }} </td>
                            <td>{{  $reunion->Descripcion  }} </td>
                            <td>{{  $reunion->Estado  }}</td>
                            <td>{{  $reunion->start  }} </td>
                            <td>{{  $reunion->end  }} </td>

                            <td>

                                <!--------------------------------------------->
                                <!---LLAMA MODAL PARA EDITAR-->
                                <!--------------------------------------------->
                                <button type="button" class="btn btn-warning btn-circle"  data-toggle="modal" data-target="#EditEvento{{$reunion->id}}">
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
<!--------------------------------------------->
<!---END CARD   -->
<!--------------------------------------------->
<!--------------------------------------------->
<!---END TABLE-->
<!--------------------------------------------->






<!------------------------------------------>
<!---CALENDAR-->
<!------------------------------------------>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
    <main class="py-4">
        @yield('calendario')
    </main>
<!------------------------------------------>
<!---END CALENDAR-->
<!------------------------------------------>

@endif

<!----------------------------------->
<!--MODALES-->
<!----------------------------------->
@include('plantilla.modales.reunion')
<!----------------------------------->
<!--END MODALES-->
<!----------------------------------->



</body>


@endsection
