@extends('plantilla.plantilla')
@section('contenido')


<div class="col-12">
        <!-- Card -->
        <div class="card text-center">

            <div class="card-body">
                <h4 class="card-title"> Opciones - Entregables</h4>
            <div class="card-deck">

                            <div class="card">
                                <a>
                                    <img class="card-img-top" src="{{asset('plus.png')}}">
                                    <div class="card-body">
                                        <a href="" class="a_fichas  btn btn-primary" >
                                            <h4 style="color:white;" class="card-title">Crear</h4>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <img class="card-img-top"  src="{{asset('writing.png')}}">

                                <div class="card-body">
                                    <a href="#" class="a_fichas"><h4 class="card-title">Plan mejoramiento</h4></a>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top"  src="{{asset('list.png')}}">
                                <div class="card-body">
                                <a href="#" class="a_fichas"><h4 class="card-title">Bitacora</h4></a>
                                </div>
                            </div>
                            <div class="card">
                                <a>
                                    <img class="card-img-top" src="{{asset('more.png')}}">
                                    <div class="card-body">
                                        <a href="" class="a_fichas">
                                            <h4 class="card-title">otros</h4>
                                        </a>
                                    </div>
                                </a>
                            </div>
            </div>

        </div>
        <!-- Card -->
    </div>

                <script src="./assetsAdm/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assetsAdm/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="./assetsAdm/dist/js/app-style-switcher.js"></script>
    <script src="./assetsAdm/dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="./assetsAdm/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="./assetsAdm/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="./assetsAdm/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./assetsAdm/dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="./assetsAdm/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./assetsAdm/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection



