

<!---------------------------------------------->
<!--PROGRAMAS-->
<!---------------------------------------------->

<!---------------------------------------------->
<!--- CREATE-->
<!---------------------------------------------->
<div id="CreatePrograma" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear  Programa</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('programas') }}">
                    @csrf
                    <div class="form-body">


                        <!--NOMBRE, NIVEL-->
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

                                    <select id="" name="nivel" class="form-control"
                                    data-toggle="tooltip" title="Nivel">
                                        <option value="">Seleccione...</option>
                                        <option {{old('nivel')=='Tecnólogo' ? 'selected' : ''}}>Tecnólogo</option>
                                        <option {{old('nivel')=='Técnico' ? 'selected' : ''}}>Técnico</option>
                                        <option {{old('nivel')=='Auxiliar' ? 'selected' : ''}}>Auxiliar</option>
                                    </select>
                                    @error('nivel')    {{$message}}        @enderror

                                </div>
                            </div>
                        </div>


                        <!--ESTADO, CENTRO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" value="Activo"  name="estado" class="form-control"
                                    placeholder="Estado" data-toggle="tooltip" title="Estado" hidden>

                                </div>

                                </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <!---------------------------------------------->
                                    <!---Si trae $centro-->
                                    <!---------------------------------------------->

                                    @if(  isset($centro) != null || isset($centro) != '' )

                                    <input type="text" value="{{$centro->id}}"  name="centro" class="form-control"
                                    placeholder="Centro" data-toggle="tooltip" title="Centro" hidden>


                                    @else
                                    <!--------------------------------------------->
                                    <!---Si no trae $centro-->
                                    <!---------------------------------------------->

                                    <select name="centro" class="form-control"
                                     data-toggle="tooltip" title="Centro">
                                          @foreach (App\Models\Centro::all() as $c)
                                            <option value="{{ $c->id }}">{{  $c->nombre  }}</option>
                                          @endforeach
                                          @error('centro')
                                            {{$message}}
                                          @enderror
                                    </select>

                                    @endif
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



<!---------------------------------------------->
<!---EDIT AND DELETE IF TRAE $centro-->
<!---------------------------------------------->
@foreach (App\Models\Programa::all() as $programa)
<!---------------------------------------------->
<!---EDIT-->
<!---------------------------------------------->
    <div id="EditPrograma{{$programa->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <!--TITLE-->
                    <div class="text-center mt-2 mb-4">
                            <h2>Editar  Programa</h2>
                    </div>

                <div class="col-12">
                    <!--FORM-->
                    <form method="POST" action="{{  url('programas/'.$programa->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-body">


                        <!--NOMBRE, NIVEL-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" value="{{ $programa->nombre }}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <select id="" name="nivel" class="form-control"
                                    data-toggle="tooltip" title="Nivel">
                                        <option value="">Seleccione...</option>
                                        <option {{ $programa->nivel=='Tecnólogo' ? 'selected' : ''}}>Tecnólogo</option>
                                        <option {{ $programa->nivel=='Técnico' ? 'selected' : ''}}>Técnico</option>
                                        <option {{ $programa->nivel=='Auxiliar' ? 'selected' : ''}}>Auxiliar</option>
                                    </select>
                                    @error('nivel')    {{$message}}        @enderror

                                </div>
                            </div>
                        </div>


                        <!--ESTADO, CENTRO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <select id="" name="estado" class="form-control"
                                    data-toggle="tooltip" title="Estado">
                                        <option value="">Seleccione...</option>
                                        <option {{ $programa->estado=='Activo' ? 'selected' : ''}}>Activo</option>
                                        <option {{ $programa->estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
                                    </select>
                                    @error('estado')    {{$message}}        @enderror


                                </div>

                                </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <!---------------------------------------------->
                                    <!---Si trae $centro-->
                                    <!---------------------------------------------->
                                    @if(  isset($centro) != null || isset($centro) != ''  )
                                        <input type="text" value="{{$centro->id}}"  name="centro" class="form-control"
                                        placeholder="Centro" data-toggle="tooltip" title="Centro" hidden>
                                    @else
                                    <!--------------------------------------------->
                                    <!---Si no trae $centro-->
                                    <!---------------------------------------------->
                                        <select name="centro" class="form-control"
                                        data-toggle="tooltip" title="Centro"  data-toggle="tooltip" title="Centro">
                                            @foreach (App\Models\Centro::all() as $c)
                                                <option {{ $programa->centro()->id == $c->id ? 'selected' : ''  }} value="{{ $c->id }}">{{  $c->nombre  }}</option>
                                            @endforeach
                                        </select>
                                        @error('centro')
                                            {{$message}}
                                        @enderror

                                    @endif

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





<!---------------------------------------------->
<!---DELETE-->
<!---------------------------------------------->
<div id="DeletePrograma{{$programa->id}}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="fill-danger-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('programas/'.$programa->id)}}">
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

@endforeach

<!---------------------------------------------->
<!--END PROGRAMAS-->
<!---------------------------------------------->
