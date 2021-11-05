

@switch(Auth::user()->rol()->first()->tipoRol)
    @case("Aprendiz")

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('entregables')}}" aria-expanded="false">
        <i data-feather="file-text" class="feather-icon"></i>
        <span class="hide-menu">Entregables</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('reunionAprendiz')}}" aria-expanded="false">
        <i data-feather="calendar" class="feather-icon"></i>
        <span class="hide-menu">Reuniones</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('empresa')}}" aria-expanded="false">
        <i data-feather="briefcase" class="feather-icon"></i>
        <span class="hide-menu">Empresa</span></a>
    </li>


    @break


@endswitch

