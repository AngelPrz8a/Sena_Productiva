<!---------------------------------------------->
<!--FICHA-->
<!---------------------------------------------->

<!---------------------------------------------->
<!---CREATE-->
<!---------------------------------------------->
<div id="CreateFicha" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear  Ficha</h2>
                </div>

                <!--FORM-->
                <form method="POST" action="{{ url('fichas') }}">
                    @csrf
                    <div class="form-body">



                        <!--NUMERO, JORNADA-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{old('numero')}}" name="numero" type="text" class="form-control"
                                    placeholder="Número" data-toggle="tooltip" title="Número">
                                    @error('numero')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="jornada" class="form-control"
                                    data-toggle="tooltip" title="Jornada">
                                        <option value="">Seleccione...</option>
                                        <option {{old('jornada')=='Mixta' ? 'selected' : ''}}>Mixta</option>
                                        <option {{old('jornada')=='Diurna' ? 'selected' : ''}}>Diurna</option>
                                        <option {{old('jornada')=='Nocturna' ? 'selected' : ''}}>Nocturna</option>
                                    </select>
                                    @error('jornada')   {{$message}}    @enderror
                                </div>
                            </div>
                        </div>



                         <!--LECTIVA, FECHAS-->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{old('inicioLectiva')}}" name="inicioLectiva" type="date" class="form-control"
                                    placeholder="Inicio Lectiva" data-toggle="tooltip" title="Inicio Lectiva">
                                    @error('inicioLectiva') {{$message}}  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{old('finLectiva')}}" name="finLectiva" type="date" class="form-control"
                                    placeholder="Fin Lectiva" data-toggle="tooltip" title="Fin Lectiva">
                                    @error('finLectiva') {{$message}}  @enderror
                                </div>
                            </div>
                        </div>



                         <!--PRODUCTIVA, FECHAS-->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{old('inicioProductiva')}}" name="inicioProductiva" type="date" class="form-control"
                                    placeholder="Inicio Productiva" data-toggle="tooltip" title="Inicio Productiva">
                                    @error('inicioProductiva')  {{$message}}  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{old('finProductiva')}}" name="finProductiva" type="date" class="form-control"
                                    placeholder="Fin Productiva" data-toggle="tooltip" title="Fin Productiva">
                                    @error('finProductiva')  {{$message}}  @enderror
                                </div>
                            </div>
                        </div>



                        <!--PROGRAMA, ESTADO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="" name="programa" class="form-control"
                                    data-toggle="tooltip" title="Programa">
                                        <option value="">Seleccione...</option>
                                        @foreach (App\Models\Programa::all() as $p)
                                            <option {{old('programa')==$p->IdPrograma ? 'selected' : ''}} value="{{$p->IdPrograma}}">{{$p->Nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('programa')   {{$message}}    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="estado" type="text" value="Activo" class="form-control" hidden>
                                    @error('estado')   {{$message}}    @enderror
                                </div>
                            </div>
                        </div>

                    </div>



                    <input type="text" name="url" value="{{  'fichas'  }}" hidden>



                    <!--BTNS-->
                    <div class="form-actions">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------------------------->
<!---END CREATE-->
<!---------------------------------------------->







@foreach(App\Models\Ficha::all() as $ficha)
<!---------------------------------------------->
<!---EDIT-->
<!---------------------------------------------->
<div id="EditFicha{{  $ficha->IdFicha  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar  Ficha</h2>
                </div>

                <!--FORM-->
                <form method="POST" action="{{ url('fichas/'.$ficha->IdFicha) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">



                        <!--NUMERO, JORNADA-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{  $ficha->NumeroFicha  }}" name="numero" type="text" class="form-control"
                                    placeholder="Número" data-toggle="tooltip" title="Número">
                                    @error('numero')   {{$message}}   @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="jornada" class="form-control"
                                    data-toggle="tooltip" title="Jornada">
                                        <option value="">Seleccione...</option>
                                        <option {{ $ficha->Jornada =='Mixta' ? 'selected' : ''}}>Mixta</option>
                                        <option {{ $ficha->Jornada =='Diurna' ? 'selected' : ''}}>Diurna</option>
                                        <option {{ $ficha->Jornada =='Nocturna' ? 'selected' : ''}}>Nocturna</option>
                                    </select>
                                    @error('jornada')   {{$message}}    @enderror
                                </div>
                            </div>
                        </div>



                         <!--LECTIVA, FECHAS-->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{  $ficha->InicioLectiva  }}" name="inicioLectiva" type="date" class="form-control"
                                    placeholder="Inicio Lectiva" data-toggle="tooltip" title="Inicio Lectiva">
                                    @error('inicioLectiva') {{$message}}  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{  $ficha->FinLectiva }}" name="finLectiva" type="date" class="form-control"
                                    placeholder="Fin Lectiva" data-toggle="tooltip" title="Fin Lectiva">
                                    @error('finLectiva') {{$message}}  @enderror
                                </div>
                            </div>
                        </div>



                         <!--PRODUCTIVA, FECHAS-->
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{  $ficha->InicioProductiva }}" name="inicioProductiva" type="date" class="form-control"
                                    placeholder="Inicio Productiva" data-toggle="tooltip" title="Inicio Productiva">
                                    @error('inicioProductiva')  {{$message}}  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="{{  $ficha->FinProductiva  }}" name="finProductiva" type="date" class="form-control"
                                    placeholder="Fin Productiva" data-toggle="tooltip" title="Fin Productiva">
                                    @error('finProductiva')  {{$message}}  @enderror
                                </div>
                            </div>
                        </div>



                        <!--PROGRAMA, ESTADO-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="" name="programa" class="form-control"
                                    data-toggle="tooltip" title="Programa">
                                        <option value="">Seleccione...</option>
                                        @foreach (App\Models\Programa::all() as $p)
                                            <option {{  $ficha->Id_programa == $p->IdPrograma ? 'selected' : ''}} value="{{  $p->IdPrograma  }}">{{  $p->Nombre  }}</option>
                                        @endforeach
                                    </select>
                                    @error('programa')   {{$message}}    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="estado" class="form-control"
                                    data-toggle="tooltip" title="Estado">
                                        <option value="">Seleccione...</option>
                                        <option {{ $ficha->Estado =='Activo' ? 'selected' : ''}}>Activo</option>
                                        <option {{ $ficha->Estado =='Inactivo' ? 'selected' : ''}}>Inactivo</option>
                                    </select>
                                    @error('estado')   {{$message}}    @enderror
                                </div>
                            </div>
                        </div>

                    </div>


                    <input type="text" name="url" value="{{  'fichas' }}" hidden>

                    <!--BTNS-->
                    <div class="form-actions">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><i class=" fas fa-thumbs-up"></i></button>
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-thumbs-down"></i></button>
                        </div>
                    </div>

                </form>

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
<div id="DeleteFicha{{$ficha->IdFicha}}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="fill-danger-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('fichas/'.$ficha->IdFicha)}}">
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

            <input type="text" name="url" value="{{  'fichas/'.$ficha->IdFicha  }}" hidden>

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
<!--END FICHAS-->
<!---------------------------------------------->
