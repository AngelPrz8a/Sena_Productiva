<!---------------------------------------------->
<!--ENTREGABLE-->
<!---------------------------------------------->


<!---------------------------------------------->
<!---CREATE-->
<!---------------------------------------------->
<div id="CreateEntregable" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <!--TITLE-->
                <div class="text-center mt-2 mb-4">
                        <h2>Crear Entregable</h2>
                </div>

            <div class="col-12">
                <!--FORM-->
                <form method="POST" action="{{ url('entregables') }}">
                    @csrf
                    <div class="form-body">

                    <!--TITULO-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input value="{{old('titulo')}}" name="titulo" type="text" class="form-control"
                                placeholder="Titulo" data-toggle="tooltip" title="Titulo">
                                @error('titulo') {{$message}}  @enderror
                            </div>
                        </div>
                    </div>

                    <!--DESCRIPCION-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input value="{{old('descripcion')}}" name="descripcion" type="text" class="form-control"
                                placeholder="Descripcion" data-toggle="tooltip" title="Descripcion">
                                @error('descripcion') {{$message}}  @enderror
                            </div>
                        </div>
                    </div>

                    <!--FECHA INICIAL, FECHA FINAL-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input value="{{  Carbon\Carbon::now()->toDateString()  }}" name="fechaInicial" type="date" class="form-control"
                                placeholder="Fecha Inicial" data-toggle="tooltip" title="Fecha Inicial" readonly>
                                @error('fechaInicial') {{$message}}  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input value="{{old('fechaentrega')}}" name="fechaentrega" type="date" class="form-control"
                                placeholder="Fecha Entrega" data-toggle="tooltip" title="Fecha Entrega">
                                @error('fechaentrega') {{$message}}  @enderror
                            </div>
                        </div>
                    </div>


                    <!--HORA INICIAL, HORA FINAL-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input value="{{  Carbon\Carbon::now()->toTimeString()  }}" name="horaInicial" type="time" class="form-control"
                                placeholder="Hora Inicial" data-toggle="tooltip" title="Hora Inicial" readonly>
                                @error('horaInicial') {{$message}}  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input value="{{old('horaentrega')}}" name="horaentrega" type="time" class="form-control"
                                placeholder="Hora Entrega" data-toggle="tooltip" title="Hora Entrega">
                                @error('horaentrega') {{$message}}  @enderror
                            </div>
                        </div>
                    </div>


                    <!--ID_FICHA-->
                    @if(  isset($ficha)  )
                    <input type="hidden" name="id_ficha" value="{{  $ficha->id  }}">
                    @else
                    <input type="hidden" name="id_ficha" value="{{  $id_ficha  }}">
                    @endif


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
<!--END ENTREGABLE-->
<!---------------------------------------------->








