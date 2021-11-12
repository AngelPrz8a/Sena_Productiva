

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

    @case("Instructor")

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('programas')}}" aria-expanded="false">
        <i data-feather="file-text" class="feather-icon"></i>
        <span class="hide-menu">Programas</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('fichas')}}" aria-expanded="false">
        <i data-feather="file-text" class="feather-icon"></i>
        <span class="hide-menu">Fichas</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('reunionAprendiz')}}" aria-expanded="false">
        <i data-feather="calendar" class="feather-icon"></i>
        <span class="hide-menu">Reuniones</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('empresas')}}" aria-expanded="false">
        <i data-feather="briefcase" class="feather-icon"></i>
        <span class="hide-menu">Empresa</span></a>
    </li>


    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('entregables')}}" aria-expanded="false">
        <i data-feather="file-text" class="feather-icon"></i>
        <span class="hide-menu">Entregables</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('reunionAprendiz')}}" aria-expanded="false">
        <i data-feather="calendar" class="feather-icon"></i>
        <span class="hide-menu">Reuniones</span></a>
    </li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{url('empresas')}}" aria-expanded="false">
        <i data-feather="briefcase" class="feather-icon"></i>
        <span class="hide-menu">Empresa</span></a>
    </li>


    @break


    @case("Administrador")

    <li class="sidebar-item">
        <a class="sidebar-link" href="{{url('centros')}}" aria-expanded="false">
        <i  data-feather="globe"  class="feather-icon"></i>
        <span class="hide-menu">centros</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a class="sidebar-link" href="{{url('programas')}}" aria-expanded="false">
        <i data-feather="layers" class="feather-icon"></i>
        <span class="hide-menu">programas</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a class="sidebar-link" href="{{url('fichas')}}" aria-expanded="false">
        <i data-feather="grid"  class="feather-icon"></i>
        <span class="hide-menu">fichas</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a class="sidebar-link" href="{{url('instructores')}}" aria-expanded="false">
        <i data-feather="users" class="feather-icon"></i>
        <span class="hide-menu">instructores</span>
        </a>
    </li>

    @break

@endswitch

