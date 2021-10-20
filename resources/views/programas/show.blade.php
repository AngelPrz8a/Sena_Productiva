<h1>{{$programa->Nombre}}</h1>
    <ul>
        <li>Nombre: {{$programa->Nombre}}</li>
        <li>Nivel: {{$programa->Nivel}}</li>

        @foreach ($programa->fichas()->get() as $fichas)
            <li>
                <a href="{{url('fichas/'.$fichas->IdFicha)}}">{{$fichas->NumeroFicha}}</a>
                </li>
        @endforeach
    </ul>
