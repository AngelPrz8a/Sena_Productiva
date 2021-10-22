<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assetsAdm/assets/images/iconoo.png">
    <title>ProductivA - Usuarios</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="./assetsAdm/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="./assetsAdm/dist/css/style.min.css" rel="stylesheet">
    <link href="./assetsAdm/dist/css/style.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="{{url('home')}}">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="./assetsAdm/assets/images/iconoo.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="./assetsAdm/assets/images/iconoo.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="./assetsAdm/assets/images/logooo-text-black.png" alt="homepage" class="dark-logoo" />
                                <!-- Light Logo text -->
                                <img src="./assetsAdm/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                        data-feather="calendar" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                        a reminder that you have event</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="settings" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                        can customize this template
                                                        as you want</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        -->

                        <!-- End Notification -->
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings" class="svg-icon"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Buscar" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="./assetsAdm/assets/images/usuarioN.png" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span
                                        class="text-dark">{{  Auth::user()->Nombre  }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{'perfil'}}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Mi perfil</a>
                                <!--
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{  url('logout')  }}"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Cerrar Sesión</a>
                                <!--
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div>
                                -->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- ------------------------------------------------ -->

                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{url('home')}}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Página Principal</span>
                            </a>
                        </li>

@switch(Auth::user()->rol()->first()->tipoRol)
    @case('Aprendiz')
    <ul>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{url('entregables')}}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Entregables</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{  url('reunionAprendiz')  }}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Reuniones</span>
            </a>
        </li>
    </ul>
    @break

    @case('Administrador')
    <ul>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{  url('programas')  }}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Programas</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{  url('fichas')  }}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Fichas</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{  url('usuarios')  }}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Usuarios</span>
            </a>
        </li>
    </ul>
    @break

@endswitch


{{--

                        <li class="list-divider"></li>

                        <!-- ------------------------------------------------ -->
                        <li class="nav-small-cap"><span class="hide-menu">Modulos</span></li>
                        <!-- ------------------------------------------------ -->

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('usuarios')}}" aria-expanded="false">
                                <i class="fas fa-users"></i>
                                <span class="hide-menu">Usuarios
                                </span>
                            </a>
                        </li>
                        <!-- ------------------------------------------------ -->
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('instructores')}}"
                                aria-expanded="false"><i class="fas fa-user-tie"></i><span
                                    class="hide-menu">Instructores</span></a>
                        </li>
                        <!-- ------------------------------------------------ -->
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{url('aprendices')}}" aria-expanded="false">
                                <i class="fas fa-user-graduate"></i>
                                <span class="hide-menu">Aprendices</span>
                            </a>
                        </li>
                        <!-- -------------------------------------------------->

                        <li class="list-divider"></li>

                        <!-- ------------------------------------------------ -->
                        <li class="nav-small-cap"><span class="hide-menu">Componentes</span></li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ui-cards.html" aria-expanded="false">
                                <i class="far fa-calendar-alt"></i>
                                <span class="hide-menu">Calendario
                                </span>
                            </a>
                        </li>
                        <!-- ------------------------------------------------ -->

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="form-input-grid.html" aria-expanded="false">
                                <i class="fas fa-puzzle-piece"></i>
                                <span class="hide-menu">Fichas
                                </span>
                            </a>
                        </li>
                        <!-- ------------------------------------------------ -->
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="chart-knob.html" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="hide-menu">Entregables</span>
                            </a>
                        </li>
                        <!-- ------------------------------------------------ -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="form-inputs.html" aria-expanded="false">
                                <i class="fas fa-video"></i>
                                <span class="hide-menu">Reuniones</span>
                            </a>
                        </li>

--}}
                        <!-- -------------------------------------------------->

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Buenos días {{  Auth::user()->Nombre  }} {{  Auth::user()->Apellido  }}</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{url('home')}}">Página Principal</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                </div>
            </div>
        <!--  -->
                  <!-- ============================================================== -->
        <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->




                @yield('contenido')


                <div class="row">
					<div class="col-md-6">
                                <!-- SignIn modal content -->
                                <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <a href="index.html" class="text-success">
                                                        <span><img class="mr-2" src="assets/images/logo-icon.png"
                                                                alt="" height="18"><img
                                                                src="assets/images/logo-text.png" alt=""
                                                                height="18"></span>
                                                    </a>
                                                </div>

                                                <form action="#" class="pl-3 pr-3">

                                                    <div class="form-group">
                                                        <label for="emailaddress1">Email address</label>
                                                        <input class="form-control" type="email" id="emailaddress1"
                                                            required="" placeholder="john@deo.com">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password1">Password</label>
                                                        <input class="form-control" type="password" required=""
                                                            id="password1" placeholder="Enter your password">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck2">
                                                            <label class="custom-control-label"
                                                                for="customCheck2">Remember me</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group text-center">
                                                        <button class="btn btn-rounded btn-primary" type="submit">Sign
                                                            In</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <div class="btn-list">
                                    <!-- Full width modal -->
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#login-modal">
                                        Log in Modal
                                    </button>
                                </div>
                </div> <!-- end row-->



                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
        <!--  -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./assetsAdm/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assetsAdm/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="./assetsAdm/assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <script src="./assetsAdm/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assetsAdm/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="./assetsAdm/dist/js/app-style-switcher.js"></script>
    <script src="./assetsAdm/dist/js/feather.min.js"></script>
    <script src="./assetsAdm/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="./assetsAdm/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./assetsAdm/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="./assetsAdm/assets/extra-libs/c3/d3.min.js"></script>
    <script src="./assetsAdm/assets/extra-libs/c3/c3.min.js"></script>
    <script src="./assetsAdm/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="./assetsAdm/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="./assetsAdm/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="./assetsAdm/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./assetsAdm/dist/js/pages/dashboards/dashboard1.min.js"></script>

    <script src="./assetsAdm/assets/libs/moment/min/moment.min.js"></script>
    <script src="./assetsAdm/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="./assetsAdm/dist/js/pages/calendar/cal-init.js"></script>


</body>

</html>

