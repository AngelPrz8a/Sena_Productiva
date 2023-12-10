<!---------------------------------------------->
<!--REUNION-->
<!---------------------------------------------->


<!---------------------------------------------->
<!---CREATE-->
<!---------------------------------------------->
<div id="CreateEvento" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear  Reunion</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('reunionAprendiz') }}">
                    @csrf
                    <div class="form-body">

                        <!--Titulo, Descripcion-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title"
                                    data-toggle="tooltip" title="Titulo">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="Descripcion" class="form-control"
                                    data-toggle="tooltip" title="Descripcion"></textarea>
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <!--Modalidad, MomentoEleccion-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="Modalidad" class="form-control"
                                    data-toggle="tooltip" title="Modalidad">
                                        <option value="">Seleccione</option>
                                        <option value="Virtual">Virtual</option>
                                        <option value="Presencial">Presencial</option>
                                        <option value="Telefonica">Telefonica</option>
                                    </select>
                                    @error('Modalidad')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="MomentoEleccion" class="form-control"
                                    data-toggle="tooltip" title="Momento Eleccion">
                                        <option value="">Seleccione</option>
                                        <option value="Lectiva">Lectiva</option>
                                        <option value="Productiva">Productiva</option>
                                    </select>
                                    @error('MomentoEleccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        @if(Auth::user()->rol()->first()->tipo != 'Aprendiz')

                        <!--Estado-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="Estado" class="form-control"
                                    data-toggle="tooltip" title="Estado">
                                        <option value="">Seleccione</option>
                                        <option value="En espera">En espera</option>
                                        <option value="Aceptado">Aceptado</option>
                                        <option value="Rechazado">Rechazado</option>
                                        <option value="Finalizado">Finalizado</option>
                                    </select>
                                    @error('Estado')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @else
                            <input type="hidden" name="Estado" value="En Espera">
                        @endif



                        <!--start-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="datetime-local" name="start" class="form-control"
                                    data-toggle="tooltip" title="Empieza">
                                    @error('start')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--end-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="datetime-local" name="end" class="form-control"
                                    data-toggle="tooltip" title="Finaliza">
                                    @error('end')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--INSTRUCTOR, APRENDICES-->
                        @if(Auth::user()->rol()->first()->tipo == 'Aprendiz')
                            <input type="hidden" name="id_aprendiz" value="{{  Auth::user()->aprendiz()->id  }}">
                            <input type="hidden" name="id_instructor" value="{{  Auth::user()->aprendiz()->instructor()->id   }}">
                        @else
                            <select name="id_aprendiz" class="form-control"
                            data-toggle="tooltip" title="Aprendiz">
                                <option value="">Seleccione...</option>
                                @foreach ( Auth::user()->instructor()->aprendices() as $aprendiz )
                                    <option value="{{  $aprendiz->id  }}">{{  $aprendiz->nombre  }} {{  $aprendiz->apellido  }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id_instructor" value="{{Auth::user()->instructor()->id}}">
                        @endif


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






@foreach (App\Models\ReunionAprendiz::all() as $reunion )


<!---------------------------------------------->
<!---EDIT-->
<!---------------------------------------------->
<div id="EditEvento{{  $reunion->id  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar  Reunion</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('reunionAprendiz/'. $reunion->id ) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-body">

                        <!--Titulo, Descripcion-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{  $reunion->title  }}" type="text" class="form-control" name="title"
                                    data-toggle="tooltip" title="Titulo">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea  name="Descripcion" class="form-control"
                                    data-toggle="tooltip" title="Descripcion">{{  $reunion->descripcion  }}</textarea>
                                    @error('Descripcion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <!--Modalidad, MomentoEleccion-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="Modalidad" class="form-control"
                                    data-toggle="tooltip" title="Modalidad">
                                        <option value="">Seleccione</option>
                                        <option {{  $reunion->modalidad == 'Virtual' ? 'selected' : ''  }}  value="Virtual">Virtual</option>
                                        <option {{  $reunion->modalidad == 'Presencial' ? 'selected' : ''  }} value="Presencial">Presencial</option>
                                        <option {{  $reunion->modalidad == 'Telefonica' ? 'selected' : ''  }} value="Telefonica">Telefonica</option>
                                    </select>
                                    @error('Modalidad')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="MomentoEleccion" class="form-control"
                                    data-toggle="tooltip" title="Momento Eleccion">
                                        <option  value="">Seleccione</option>
                                        <option {{  $reunion->momentoEleccion == 'Lectiva' ? 'selected' : ''  }} value="Lectiva">Lectiva</option>
                                        <option {{  $reunion->momentoEleccion == 'Productiva' ? 'selected' : ''  }} value="Productiva">Productiva</option>
                                    </select>
                                    @error('MomentoEleccion')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        @if(Auth::user()->rol()->first()->tipo != 'Aprendiz')

                        <!--Estado-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="Estado" class="form-control"
                                    data-toggle="tooltip" title="Estado">
                                        <option value="">Seleccione</option>
                                        <option {{  $reunion->estado == 'En espera' ? 'selected' : ''  }} value="En espera">En espera</option>
                                        <option {{  $reunion->estado == 'Aceptado' ? 'selected' : ''  }} value="Aceptado">Aceptado</option>
                                        <option {{  $reunion->estado == 'Rechazado' ? 'selected' : ''  }} value="Rechazado">Rechazado</option>
                                        <option {{  $reunion->estado == 'Finalizado' ? 'selected' : ''  }} value="Finalizado">Finalizado</option>
                                    </select>
                                    @error('Estado')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @else
                            <input type="hidden" name="Estado" value="En Espera">
                        @endif



                        <!--start-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{  $reunion->start }}" name="start" class="form-control"
                                    data-toggle="tooltip" title="Empieza">
                                    @error('start')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--end-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input value="{{  $reunion->end  }}" type="text" name="end" class="form-control"
                                    data-toggle="tooltip" title="Finaliza">
                                    @error('end')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!--INSTRUCTOR, APRENDICES-->
                        @if(Auth::user()->rol()->first()->tipo == 'Aprendiz')
                            <input type="hidden" name="id_aprendiz" value="{{  Auth::user()->aprendiz()->id  }}">
                            <input type="hidden" name="id_instructor" value="{{  Auth::user()->aprendiz()->instructor()->id   }}">
                        @else
                            <select name="id_aprendiz" class="form-control"
                            data-toggle="tooltip" title="Aprendiz">
                                <option value="">Seleccione...</option>
                                @foreach ( Auth::user()->instructor()->aprendices() as $aprendiz )
                                    <option {{  $aprendiz->id == $reunion->id_aprendiz ? 'selected' : ''  }} value="{{  $aprendiz->id  }}">{{  $aprendiz->Nombre  }} {{  $aprendiz->Apellido  }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id_instructor" value="{{Auth::user()->instructor()->id}}">
                        @endif


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
<!--END REUNION-->
<!---------------------------------------------->
