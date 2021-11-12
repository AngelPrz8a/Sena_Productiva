<!---------------------------------------------->
<!--CENTROS-->
<!---------------------------------------------->

    <!---------------------------------------------->
    <!---CREATE-->
    <!---------------------------------------------->
<div id="CreateCentro" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear  Centro</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('centros') }}">
                    @csrf
                    <div class="form-body">

                        <!--NOMBRE-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{ old('nombre')}}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--SEDE, CIUDAD-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text"  value="{{ old('sede')}}"  name="sede" class="form-control"
                                        placeholder="Sede" data-toggle="tooltip" title="Sede">
                                        @error('sede')
                                        {{$message}}
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('ciudad')}}" name="ciudad" class="form-control"
                                        placeholder="Ciudad" data-toggle="tooltip" title="Ciudad">
                                        @error('ciudad')
                                        {{$message}}
                                        @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text"  value="{{ old('direccion')}}" name="direccion" class="form-control"
                                        placeholder="Dirección" data-toggle="tooltip" title="Dirección">
                                        @error('direccion')
                                        {{$message}}
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('region')}}" name="region" class="form-control"
                                        placeholder="Región" data-toggle="tooltip" title="Región">
                                        @error('region')
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





 @foreach (App\Models\Centro::all() as $centro)

    <!---------------------------------------------->
    <!---EDIT-->
    <!---------------------------------------------->
 <div id="EditCentro{{$centro->IdCentro}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Editar  Centro</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('centros/' . $centro->IdCentro) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">

                        <!--NOMBRE-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text"  value="{{ $centro->Nombre }}"  name="nombre" class="form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--ESTADO-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="estado" class="form-control"
                                    data-toggle="tooltip" title="estado">
                                        <option {{$centro->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
                                        <option {{$centro->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
                                    </select>

                                    @error('estado')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--SEDE, CIUDAD-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text"  value="{{ $centro->Sede }}"  name="sede" class="form-control"
                                        placeholder="Sede" data-toggle="tooltip" title="Sede">
                                        @error('sede')
                                        {{$message}}
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $centro->Ciudad }}" name="ciudad" class="form-control"
                                        placeholder="Ciudad" data-toggle="tooltip" title="Ciudad">
                                        @error('ciudad')
                                        {{$message}}
                                        @enderror
                                </div>
                            </div>
                        </div>


                        <!--DIRECCION, REGION-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text"  value="{{ $centro->Direccion }}" name="direccion" class="form-control"
                                        placeholder="Dirección" data-toggle="tooltip" title="Dirección">
                                        @error('direccion')
                                        {{$message}}
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $centro->Region }}" name="region" class="form-control"
                                        placeholder="Región" data-toggle="tooltip" title="Región">
                                        @error('region')
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











<!---------------------------------------------->
<!---DELETE-->
<!---------------------------------------------->
<div id="DeleteCentro{{$centro->IdCentro}}" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="fill-danger-modalLabel" aria-hidden="true">
<div class="modal-dialog">
    <form method="post" action="{{url('centros/'.$centro->IdCentro)}}">
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
<!--END CENTROS-->
<!---------------------------------------------->








