<!---------------------------------------------->
<!--INSTRUCTOR-->
<!---------------------------------------------->

@if(isset($centro->id) != null || isset($centro->id) != '')
    <!---------------------------------------------->
    <!---CREATE-->
    <!---------------------------------------------->
    <div id="CreateInstructor" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <!--TITLE-->
                    <div class="text-center mt-2 mb-4">
                            <h2>Crear Instructor</h2>
                    </div>

                <div class="col-12">
                    <!--FORM-->
                    <form method="POST" action="{{ url('instructores') }}">
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


                             <!--ESTADO, ROL, CENTRO-->
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
                                        <input type="text" value="Instructor"  name="rol" class="form-control"
                                        placeholder="Rol" data-toggle="tooltip" title="Rol" hidden>
                                        @error('rol')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-0">
                                    <div class="form-group">
                                        <input type="text" value="{{$centro->id}}"  name="centro" class="form-control"
                                        placeholder="Centro" data-toggle="tooltip" title="Centro" hidden>
                                        @error('centro')
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
@endif




@foreach (App\Models\Instructor::all() as $instructor)

    <!---------------------------------------------->
    <!---EDIT-->
    <!---------------------------------------------->
    <div id="EditInstructor{{$instructor->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar Instructor</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('instructores/'.$instructor->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">



                         <!--NOMBRE, APELLIDO-->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $instructor->usuarios()->first()->nombre  }}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $instructor->usuarios()->first()->apellido  }}"  name="apellido" class="form-control"
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
                                    <input type="date" value="{{ $instructor->usuarios()->first()->fechaNacimiento }}"  name="fechaNacimiento" class="form-control"
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
                                        <option {{ $instructor->usuarios()->first()->genero == "F" ? 'selected' : ''}}>F</option>
                                        <option {{ $instructor->usuarios()->first()->genero =="M" ? 'selected' : ''}}>M</option>
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
                                    <select name="tipoD" class="form-control"  data-toggle="tooltip" title="Tipo Documento">
                                        <option value="">Seleccione...</option>
                                        <option {{ $instructor->usuarios()->first()->tipoDocumento == "CC" ? 'selected' : ''}}>CC</option>
                                        <option {{ $instructor->usuarios()->first()->tipoDocumento == "TI" ? 'selected' : ''}}>TI</option>
                                        <option {{ $instructor->usuarios()->first()->tipoDocumento == "CE" ? 'selected' : ''}}>CE</option>
                                        <option {{ $instructor->usuarios()->first()->tipoDocumento == "NIP" ? 'selected' : ''}}>NIP</option>
                                        <option {{ $instructor->usuarios()->first()->tipoDocumento == "NIT" ? 'selected' : ''}}>NIT</option>
                                        <option {{ $instructor->usuarios()->first()->tipoDocumento == "PAP" ? 'selected' : ''}}>PAP</option>
                                    </select>
                                    @error('tipoD')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" value="{{ $instructor->usuarios()->first()->numeroIdentificacion }}"  name="numeroD" class="form-control"
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
                                    <input type="text" value="{{ $instructor->usuarios()->first()->emailPersonal }}"  name="emailP" class="form-control"
                                    placeholder="Email Personal" data-toggle="tooltip" title="Email Personal">
                                    @error('emailP')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $instructor->usuarios()->first()->emailSena }}"  name="emailS" class="form-control"
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
                                    <input type="text" value="{{ $instructor->usuarios()->first()->numeroCelular}}"  name="celular" class="form-control"
                                    placeholder="Celular" data-toggle="tooltip" title="Celular">
                                    @error('celular')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $instructor->usuarios()->first()->numeroFijo }}"  name="telefono" class="form-control"
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
                                    <input type="text" value="{{ $instructor->usuarios()->first()->direccion }}"  name="direccion" class="form-control"
                                    placeholder="Dirección" data-toggle="tooltip" title="Dirección">
                                    @error('direccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                         <!--ESTADO, ROL, CENTRO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="estado" class="form-control"
                                    data-toggle="tooltip" title="Estado">
                                        <option value="">Seleccione...</option>
                                        <option {{ $instructor->usuarios()->first()->estado == "Activo" ? 'selected' : ''}}>Activo</option>
                                        <option {{ $instructor->usuarios()->first()->estado == "Inactivo" ? 'selected' : ''}}>Inactivo</option>
                                    </select>
                                    @error('estado')  {{$message}}  @enderror
                                </div>
                            </div>

                            <div class="col-md-0">
                                <div class="form-group">
                                    <input type="text" value="Instructor"  name="rol" class="form-control"
                                    placeholder="Rol" data-toggle="tooltip" title="Rol" hidden>
                                    @error('rol')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            @foreach ($instructor->centro() as $centro)

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="centro" class="form-control"
                                    data-toggle="tooltip" title="Centro">
                                        <option value="">Seleccione...</option>
                                        @foreach(  App\Models\Centro::all() as $c  )
                                            <option {{ $centro->id == $c->id ? 'selected' : ''}} value="{{  $c->id  }}">  {{  $c->nombre  }}  </option>
                                        @endforeach
                                    </select>
                                    @error('centro')  {{$message}}  @enderror
                                </div>
                            </div>

                            @endforeach

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











<!---------------------------------------------->
<!---DELETE-->
<!---------------------------------------------->
<div id="DeleteInstructor{{$instructor->id}}" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="fill-danger-modalLabel" aria-hidden="true">
<div class="modal-dialog">
    <form method="post" action="{{url('instructores/'.$instructor->id)}}">
        @method('DELETE')
        @csrf

    <div class="modal-content modal-filled bg-danger">

        <div class="modal-header">
            <h4 class="modal-title" id="fill-danger-modalLabel">Advertencia !
            </h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
            <p>Seguro desea eliminar este elemento ?</p>
        </div>

        <!--BTNS-->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
        </div>

    </div><!-- /.modal-content -->
    </form>
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------------------------->
<!---end DELETE-->
<!---------------------------------------------->





<!---------------------------------------------->
<!---ASIGNAR-->
<!---------------------------------------------->
<div id="AsignarInstructor{{$instructor->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Asignar Ficha</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="GET" action="{{ url('instructores/'.$instructor->id.'/asignar') }}">
                    @csrf
                    <div class="form-body">

                        <!---------------------------------------------->
                        <!--Consulta todas las fichas libres de insstructores-->
                        <!---------------------------------------------->

                        @foreach ($instructor->fichaSinInstructor() as $ficha)

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">


                                    <fieldset class="checkbox">
                                        <label>
                                            <input name="ficha{{  $ficha->id  }}" value="on" type="checkbox"> {{  $ficha->numero  }}
                                        </label>
                                    </fieldset>

                                </div>
                            </div>
                        </div>

                        @endforeach
                        <!---------------------------------------------->
                        <!--END CONSULTA-->
                        <!---------------------------------------------->


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
<!---END ASIGNAR-->
<!---------------------------------------------->


@endforeach




<!---------------------------------------------->
<!---DELETE ASIGNAR-->
<!---------------------------------------------->
@foreach (App\Models\Ficha::all() as $ficha)

<div id="DeleteAsignar{{$ficha->id}}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="fill-danger-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{url('instructores/'.$ficha->id.'/desasignar')}}">
            @csrf

        <div class="modal-content modal-filled bg-danger">

            <div class="modal-header">
                <h4 class="modal-title" id="fill-danger-modalLabel">Advertencia !
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <p>Seguro desea eliminar este elemento ?</p>
            </div>

            <!--BTNS-->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
            </div>

        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endforeach
<!---------------------------------------------->
<!---END DELETE ASIGNAR-->
<!---------------------------------------------->




<!---------------------------------------------->
<!--END INSTRUCTOR-->
<!---------------------------------------------->








