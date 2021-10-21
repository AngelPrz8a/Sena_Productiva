
<h1>Bienvenido {{$user->Nombre}} {{$user->Apellido}}</h1>
<h3>Eres un {{$rol}}</h3>

@switch($rol)
    @case('Aprendiz')
    <ul>
        <li>
            <a href="{{url('perfil')}}">perfil</a>
        </li>
        <li>
            <a href="#">entregables</a>
        </li>
        <li>
            <a href="#">reuniones</a>
        </li>
        <li>
            <a href="{{url('logout')}}">cerrar sesion</a>
        </li>
    </ul>
    @break

    @case('Administrador')
    <ul>
        <li>
            <a href="{{url('perfil')}}">perfil</a>
        </li>
        <li>
            <a href="{{url('programas')}}">programas</a>
        </li>
    </ul>
    @break

@endswitch

@if (session('msg'))
{{session('msg')}}
@endif
