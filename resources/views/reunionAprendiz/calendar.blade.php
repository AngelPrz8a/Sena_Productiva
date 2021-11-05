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
    <!------------>
</head>
<body>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
    <main class="py-4">
        @yield('calendario')
    </main>
</body>

@endsection
