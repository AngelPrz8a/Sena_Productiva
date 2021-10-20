<h1>{{$ficha->NumeroFicha}}</h1>
    <ul>
        <li>Inicio Lectiva: {{$ficha->InicioLectiva}}</li>
        <li>Fin Lectiva: {{$ficha->FinLectiva}}</li>
        <li>Inicio Productiva: {{$ficha->InicioProductiva}}</li>
        <li>Fin Productiva: {{$ficha->FinProductiva}}</li>
        <li>Jornada: {{$ficha->Jornada}}</li>
        <li>Estado: {{$ficha->Estado}}</li>
        <li>Programa: {{$ficha->programa()->first()->Nombre}}</li>

        @foreach ($ficha->aprendices()->get() as $aprendiz)
            @foreach ($aprendiz->usuarios()->get() as $usuario )
             @endforeach
            <li> Aprendiz :<a href="{{url('aprendices/'.$aprendiz->id)}}"> {{$usuario->Nombre}} {{$usuario->Apellido}} </a></li>
        @endforeach





    </ul>
