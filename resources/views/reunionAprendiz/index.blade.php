
@extends('reunionAprendiz.calendar')
@section('calendario')
<!-------------------------------------------------------------------------------->

<div class="container">
    <div id="calendar">
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">


                <form id="formEventos">
                    @csrf

                <div class="form-group d-none">
                    <label for="">ID</label>
                    <input type="text" name="id" class="form-control" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                <label for="">Descripcion</label>
                <textarea name="Descripcion" id="" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group " >
                        <label for="">Modalidad</label>
                        <select name="Modalidad" id='Modalidad' class="form-control">
                            <option value="">Seleccione</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Telefonica">Telefonica</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" >
                        <label for="">MomentoEleccion</label>
                        <select name="MomentoEleccion" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="Lectiva">Lectiva</option>
                            <option value="Productiva">Productiva</option>
                        </select>
                    </div>
                    </div>
                </div>


                @if(Auth::user()->rol()->first()->tipoRol != 'Aprendiz')
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="Estado" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Productiva">En Espera</option>
                        <option value="Lectiva">Aceptado</option>
                        <option value="Productiva">Finalizo</option>
                    </select>
                </div>
                @else
                <input type="hidden" name="Estado" value="En Espera">
                @endif


                <div class="form-group ">
                <label for="">start</label>
                <input type="datetime-local" name="start" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="">end</label>
                    <input type="datetime-local" name="end" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                @if(Auth::user()->rol()->first()->tipoRol == 'Aprendiz')
                    <input type="hidden" name="id_usuario" value="{{Auth::user()->IdUsuario}}">
                    <input type="hidden" name="id_instructor" value="{{Auth::user()->IdUsuario}}">
                @endif


                </form>


            </div>
            <div class="modal-footer">
                <button id="btnModificar" type="button" class="btn btn-warning" style="display:none;">Modificar</button>
                <button id="btnEliminar" type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!----------------------------------------------------------------------------------------------->
@endsection

