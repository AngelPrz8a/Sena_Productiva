<!---------------------------------------------->
<!--EMPRESA-->
<!---------------------------------------------->

<!---------------------------------------------->
<!---CREATE-->
<!---------------------------------------------->
<div id="CreateEmpresa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear  Empresa</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('empresas') }}">
                    @csrf
                    <div class="form-body">

                        <!--NIT, NOMBRE-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('nit')}}"  name="nit" class="form-control"
                                    placeholder="Nit" data-toggle="tooltip" title="Nit">
                                    @error('nit')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('nombre')}}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--TELEFONO, DIRECCION-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('telefono')}}"  name="telefono" class="form-control"
                                    placeholder="Telefono" data-toggle="tooltip" title="Telefono">
                                    @error('telefono')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('direccion')}}"  name="direccion" class="form-control"
                                    placeholder="Direccion" data-toggle="tooltip" title="Direccion">
                                    @error('direccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--RAZON SOCIAL -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('razonSocial')}}"  name="razonSocial" class="form-control"
                                    placeholder="Razon Social" data-toggle="tooltip" title="Razon Social">
                                    @error('razonSocial')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>



                         <!--NOMBRE JEFE, APELLIDO JEFE -->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('nombreJefe')}}"  name="nombreJefe" class="form-control"
                                    placeholder="Nombre Jefe" data-toggle="tooltip" title="Nombre Jefe">
                                    @error('nombreJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('apellidoJefe')}}"  name="apellidoJefe" class="form-control"
                                    placeholder="Apellido Jefe" data-toggle="tooltip" title="Apellido Jefe">
                                    @error('apellidoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--TELEFONO JEFE, EMAIL JEFE -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('telefonoJefe')}}"  name="telefonoJefe" class="form-control"
                                    placeholder="Telefono Jefe" data-toggle="tooltip" title="Telefono Jefe">
                                    @error('telefonoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('emailJefe')}}"  name="emailJefe" class="form-control"
                                    placeholder="Email Jefe" data-toggle="tooltip" title="Email Jefe">
                                    @error('emailJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--CARGO SOCIAL -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{ old('cargoJefe')}}"  name="cargoJefe" class="form-control"
                                    placeholder="Cargo Jefe" data-toggle="tooltip" title="Razon Social">
                                    @error('cargoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--BTNS-->
                    <div class="form-actions">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
                        </div>
                    </div>

                </form>
            </div>


            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------------------------->
<!---END CREATE-->
<!---------------------------------------------->




@foreach (App\Models\Empresa::all() as $empresa )
<!---------------------------------------------->
<!---EDIT-->
<!---------------------------------------------->
<div id="EditEmpresa{{  $empresa->IdEmpresa  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar  Empresa</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('empresas/'.$empresa->IdEmpresa) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">

                        <!--NIT, NOMBRE-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->NIT  }}"  name="nit" class="form-control"
                                    placeholder="Nit" data-toggle="tooltip" title="Nit">
                                    @error('nit')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->Nombre  }}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--TELEFONO, DIRECCION-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->Telefono }}"  name="telefono" class="form-control"
                                    placeholder="Telefono" data-toggle="tooltip" title="Telefono">
                                    @error('telefono')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->Direccion }}"  name="direccion" class="form-control"
                                    placeholder="Direccion" data-toggle="tooltip" title="Direccion">
                                    @error('direccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--RAZON SOCIAL -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->RazonSocial }}"  name="razonSocial" class="form-control"
                                    placeholder="Razon Social" data-toggle="tooltip" title="Razon Social">
                                    @error('razonSocial')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>



                         <!--NOMBRE JEFE, APELLIDO JEFE -->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->NombreInmediato }}"  name="nombreJefe" class="form-control"
                                    placeholder="Nombre Jefe" data-toggle="tooltip" title="Nombre Jefe">
                                    @error('nombreJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $empresa->ApellidoInmediato }}"  name="apellidoJefe" class="form-control"
                                    placeholder="Apellido Jefe" data-toggle="tooltip" title="Apellido Jefe">
                                    @error('apellidoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--TELEFONO JEFE, EMAIL JEFE -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $empresa->TelefonoInmediato }}"  name="telefonoJefe" class="form-control"
                                    placeholder="Telefono Jefe" data-toggle="tooltip" title="Telefono Jefe">
                                    @error('telefonoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $empresa->EmailInmediato }}"  name="emailJefe" class="form-control"
                                    placeholder="Email Jefe" data-toggle="tooltip" title="Email Jefe">
                                    @error('emailJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--CARGO SOCIAL -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{  $empresa->CargoInmediato }}"  name="cargoJefe" class="form-control"
                                    placeholder="Cargo Jefe" data-toggle="tooltip" title="Razon Social">
                                    @error('cargoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--BTNS-->
                    <div class="form-actions">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
                        </div>
                    </div>

                </form>
            </div>


            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------------------------->
<!---END EDIT-->
<!---------------------------------------------->

@endforeach


<!---------------------------------------------->
<!--END EMPRESA-->
<!---------------------------------------------->

