
<form  method="POST" action="{{ url('entregables') }}" class="form-horizontal">
    @csrf
    <fieldset>

        <!-- Alerta -->
    <!-- Recorrer errores -->


    <!-- Form Name -->
    <legend>Nuevo Entregable</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Titulo</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('titulo')}}" name="titulo" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("titulo") }} </strong>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Descripción</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('descripcion')}}" name="descripcion" type="text" placeholder="" class="form-control input-md">
    <strong> {{ $errors->first("descripcion") }}</strong>
      </div>
    </div>



    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Fecha Inicial</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('fechainicial')}}" name="fechainicial" type="date" placeholder="" class="form-control input-md">
    <strong> {{ $errors->first("fechainicial") }}</strong>
      </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Fecha Entrega</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ old('fechaentrega')}}" name="fechaentrega" type="date" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("fechaentrega") }}</strong>
            </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Hora Inicial</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('horainicial')}}" name="horainicial" type="time" placeholder="" class="form-control input-md">
      <strong> {{ $errors->first("horainicial") }}</strong>
        </div>
      </div>


      <!-- Text input-->
      <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Hora Entrega</label>
              <div class="col-md-4">
              <input id="textinput" value="{{ old('horaentrega')}}" name="horaentrega" type="time" placeholder="" class="form-control input-md">
          <strong> {{ $errors->first("horaentrega") }}</strong>
              </div>
      </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Acta</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('acta')}}" name="acta" type="text" placeholder="" class="form-control input-md">
    <strong> {{ $errors->first("acta") }}</strong>
        </div>
</div>




     <!-- Text input   -->
     <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Estado</label>
        <div class="col-md-4">
            <select  name="estado" id="" class="form-control">
                <option value=""> Seleccione un estado </option>
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
        <strong>  {{ $errors->first("estado") }} </strong>

        </div>
    </div>



    <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="" class="btn btn-info">Guardar</button>
            </div>
          </div>

        <a type="submit" class=" btn btn-success" href="{{url('entregables')}}" >Regresar</a>

    </fieldset>
    </form>
