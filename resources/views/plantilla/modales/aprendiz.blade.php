<!---------------------------------------------->
<!--INSTRUCTOR-->
<!---------------------------------------------->

@if(  isset($ficha) )
<!---------------------------------------------->
<!---CREATE-->
<!---------------------------------------------->
<div id="CreateAprendiz" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear Aprendiz</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('aprendices') }}">
                    @csrf
                    <div class="form-body">

                        <!--NOMBRE, APELLIDO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('nombre')}}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('apellido')}}"  name="apellido" class="form-control"
                                    placeholder="Apellido" data-toggle="tooltip" title="Apellido">
                                    @error('apellido')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--FECHA NACIMIENTO, GENERO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" value="{{ old('fechaNacimiento')}}"  name="fechaNacimiento" class="form-control"
                                    placeholder="Fecha Nacimiento" data-toggle="tooltip" title="Fecha Nacimiento">
                                    @error('fechaNacimiento')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="genero" class="form-control" data-toggle="tooltip" title="Genero">
                                        <option value="">Seleccione...</option>
                                        <option {{old('genero') == "F" ? 'selected' : ''}}>F</option>
                                        <option {{old('genero') =="M" ? 'selected' : ''}}>M</option>
                                        </select>
                                    @error('genero')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--DOCUMENTO: TIPO, NUMERO-->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select id="" name="tipoD" class="form-control"  data-toggle="tooltip" title="Tipo Documento">
                                        <option value="">Seleccione...</option>
                                        <option {{old('tipoD') == "CC" ? 'selected' : ''}}>CC</option>
                                        <option {{old('tipoD') == "TI" ? 'selected' : ''}}>TI</option>
                                        <option {{old('tipoD') == "CE" ? 'selected' : ''}}>CE</option>
                                        <option {{old('tipoD') == "NIP" ? 'selected' : ''}}>NIP</option>
                                        <option {{old('tipoD') == "NIT" ? 'selected' : ''}}>NIT</option>
                                        <option {{old('tipoD') == "PAP" ? 'selected' : ''}}>PAP</option>
                                    </select>
                                    @error('tipoD')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" value="{{ old('numeroD')}}"  name="numeroD" class="form-control"
                                    placeholder="Número Documento" data-toggle="tooltip" title="Número Documento">
                                    @error('numeroD')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--EMAIL: PERSONAL, SENA-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('emailP')}}"  name="emailP" class="form-control"
                                    placeholder="Email Personal" data-toggle="tooltip" title="Email Personal">
                                    @error('emailP')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('emailS')}}"  name="emailS" class="form-control"
                                    placeholder="Email Sena" data-toggle="tooltip" title="Email Sena">
                                    @error('emailS')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <!--NUMERO: CELULAR, TELEFONO-->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('celular')}}"  name="celular" class="form-control"
                                    placeholder="Celular" data-toggle="tooltip" title="Celular">
                                    @error('celular')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('telefono')}}"  name="telefono" class="form-control"
                                    placeholder="Telefono" data-toggle="tooltip" title="Telefono">
                                    @error('telefono')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--DIRECCION  -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{ old('direccion')}}"  name="direccion" class="form-control"
                                    placeholder="Dirección" data-toggle="tooltip" title="Dirección">
                                    @error('direccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <!--ESTADO, ROL, FICHA-->
                        <div class="row">
                            <div class="col-md-0">
                                <div class="form-group">
                                    <input type="text" value="Activo"  name="estado" class="form-control"
                                    placeholder="Estado" data-toggle="tooltip" title="Estado" hidden>
                                    @error('estado')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-0">
                                <div class="form-group">
                                    <input type="text" value="Aprendiz"  name="rol" class="form-control"
                                    placeholder="Rol" data-toggle="tooltip" title="Rol" hidden>
                                    @error('rol')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-0">
                                <div class="form-group">
                                    <input type="text" value="{{  $ficha->IdFicha  }}"  name="ficha" class="form-control"
                                    placeholder="Ficha" data-toggle="tooltip" title="Ficha" hidden>
                                    @error('ficha')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="url" value=" {{  'fichas/'.$ficha->IdFicha.'/aprendices'  }}  ">


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
@endif


@foreach (App\Models\Aprendiz::all() as $aprendiz)

<!---------------------------------------------->
<!---EDIT-->
<!---------------------------------------------->
<div id="EditAprendiz{{  $aprendiz->id  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar Aprendiz</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('aprendices/'.$aprendiz->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">

                        <!--NOMBRE, APELLIDO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $aprendiz->usuarios()->nombre }}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $aprendiz->usuarios()->apellido  }}"  name="apellido" class="form-control"
                                    placeholder="Apellido" data-toggle="tooltip" title="Apellido">
                                    @error('apellido')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--FECHA NACIMIENTO, GENERO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" value="{{ $aprendiz->usuarios()->fechaNacimiento  }}"  name="fechaNacimiento" class="form-control"
                                    placeholder="Fecha Nacimiento" data-toggle="tooltip" title="Fecha Nacimiento">
                                    @error('fechaNacimiento')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="genero" class="form-control" data-toggle="tooltip" title="Genero">
                                        <option value="">Seleccione...</option>
                                        <option {{ $aprendiz->usuarios()->genero == "F" ? 'selected' : ''}}>F</option>
                                        <option {{ $aprendiz->usuarios()->genero =="M" ? 'selected' : ''}}>M</option>
                                        </select>
                                    @error('genero')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--DOCUMENTO: TIPO, NUMERO-->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select id="" name="tipoD" class="form-control"  data-toggle="tooltip" title="Tipo Documento">
                                        <option value="">Seleccione...</option>
                                        <option {{ $aprendiz->usuarios()->tipoDocumento == "CC" ? 'selected' : ''}}>CC</option>
                                        <option {{ $aprendiz->usuarios()->tipoDocumento == "TI" ? 'selected' : ''}}>TI</option>
                                        <option {{ $aprendiz->usuarios()->tipoDocumento == "CE" ? 'selected' : ''}}>CE</option>
                                        <option {{ $aprendiz->usuarios()->tipoDocumento == "NIP" ? 'selected' : ''}}>NIP</option>
                                        <option {{ $aprendiz->usuarios()->tipoDocumento == "NIT" ? 'selected' : ''}}>NIT</option>
                                        <option {{ $aprendiz->usuarios()->tipoDocumento == "PAP" ? 'selected' : ''}}>PAP</option>
                                    </select>
                                    @error('tipoD')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->usuarios()->numeroIdentificacion  }}"  name="numeroD" class="form-control"
                                    placeholder="Número Documento" data-toggle="tooltip" title="Número Documento">
                                    @error('numeroD')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--EMAIL: PERSONAL, SENA-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->usuarios()->emailPersonal }}"  name="emailP" class="form-control"
                                    placeholder="Email Personal" data-toggle="tooltip" title="Email Personal">
                                    @error('emailP')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->usuarios()->emailSena }}"  name="emailS" class="form-control"
                                    placeholder="Email Sena" data-toggle="tooltip" title="Email Sena">
                                    @error('emailS')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <!--NUMERO: CELULAR, TELEFONO-->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->usuarios()->numeroCelular }}"  name="celular" class="form-control"
                                    placeholder="Celular" data-toggle="tooltip" title="Celular">
                                    @error('celular')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->usuarios()->numeroFijo }}"  name="telefono" class="form-control"
                                    placeholder="Telefono" data-toggle="tooltip" title="Telefono">
                                    @error('telefono')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--DIRECCION  -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->usuarios()->direccion }}"  name="direccion" class="form-control"
                                    placeholder="Dirección" data-toggle="tooltip" title="Dirección">
                                    @error('direccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <!--ESTADO, ROL, FICHA-->
                        <div class="row">
                            <div class="col-md-6">
                                <dizv class="form-group">
                                   <select name="estado" class="form-control"
                                   data-toggle="tooltip" title="Estado">
                                        <option value="">Seleccione</option>
                                        <option {{  $aprendiz->usuarios()->estado == 'Activo' ? 'selected' : ''  }} value="Activo">Activo</option>
                                        <option {{  $aprendiz->usuarios()->estado == 'Inactivo' ? 'selected' : ''  }}  value="Inactivo">Inactivo</option>
                                   </select>
                                    @error('estado')
                                    {{$message}}
                                    @enderror
                                </dizv>
                            </div>

                            <div class="col-md-0">
                                <div class="form-group">
                                    <input type="text" value="Aprendiz"  name="rol" class="form-control"
                                    placeholder="Rol" data-toggle="tooltip" title="Rol" hidden>
                                    @error('rol')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-0">
                                <div class="form-group">
                                    <input type="text" value="{{  $aprendiz->fichas()->first()->id  }}"  name="ficha" class="form-control"
                                    placeholder="Ficha" data-toggle="tooltip" title="Ficha" hidden>
                                    @error('ficha')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="text" name="url" value=" {{  'fichas/'.$aprendiz->fichas()->first()->idz.'/aprendices'  }}  " hidden>

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
<!---END APRENDIZ-->
<!---------------------------------------------->

