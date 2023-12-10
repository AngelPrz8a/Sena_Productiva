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
<div id="EditEmpresa{{  $empresa->id  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar  Empresa</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('empresas/'.$empresa->id) }}">
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
                                    <input type="text" value="{{ $empresa->nombre  }}"  name="nombre" class="form-control"
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
                                    <input type="text" value="{{ $empresa->telefono }}"  name="telefono" class="form-control"
                                    placeholder="Telefono" data-toggle="tooltip" title="Telefono">
                                    @error('telefono')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $empresa->direccion }}"  name="direccion" class="form-control"
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
                                    <input type="text" value="{{ $empresa->razonSocial }}"  name="razonSocial" class="form-control"
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
                                    <input type="text" value="{{ $empresa->nombre_jefe_inmediato }}"  name="nombreJefe" class="form-control"
                                    placeholder="Nombre Jefe" data-toggle="tooltip" title="Nombre Jefe">
                                    @error('nombreJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $empresa->apellido_jefe_inmediato }}"  name="apellidoJefe" class="form-control"
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
                                    <input type="text" value="{{  $empresa->telefono_jefe_inmediato }}"  name="telefonoJefe" class="form-control"
                                    placeholder="Telefono Jefe" data-toggle="tooltip" title="Telefono Jefe">
                                    @error('telefonoJefe')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $empresa->email_jefe_inmediato }}"  name="emailJefe" class="form-control"
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
                                    <input type="text" value="{{  $empresa->cargo_jefe_inmediato }}"  name="cargoJefe" class="form-control"
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

