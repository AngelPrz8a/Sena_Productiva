


<form  method="POST" action="{{ url('entregables/' . $entregables->IdEntregables) }}" class="form-horizontal">
    @method('PUT')
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend> {{ $entregables->Titulo }}</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Titulo</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $entregables->Titulo }}" name="titulo" type="text" placeholder="" class="form-control input-md">
        {{ $errors->first("titulo") }}
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Descripción</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $entregables->Descripción }}" name="descripcion" type="text" placeholder="" class="form-control input-md">
      {{ $errors->first("descripcion") }}
      </div>
    </div>



    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Fecha Inicial</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $entregables->FechaHoraInicial }}" name="fechainicial" type="date" placeholder="" class="form-control input-md">
      {{ $errors->first("fechainicial") }}
      </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Fecha Entrega</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ $entregables->FechaHoraEntrega }}" name="fechaentrega" type="date" placeholder="" class="form-control input-md">
            {{ $errors->first("fechaentrega") }}
            </div>
    </div>

     <!-- Text input-->
     <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Hora Inicial</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $entregables->HoraInicial }}" name="horainicial" type="time" placeholder="" class="form-control input-md">
        {{ $errors->first("horainicial") }}
        </div>
      </div>


      <!-- Text input-->
      <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Hora Entrega</label>
              <div class="col-md-4">
              <input id="textinput" value="{{ $entregables->HoraEntrega }}" name="horaentrega" type="time" placeholder="" class="form-control input-md">
              {{ $errors->first("horaentrega") }}
              </div>
      </div>





     <!-- Text input-->
     <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Acta</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $entregables->Acta }}" name="acta" type="text" placeholder="" class="form-control input-md">
        {{ $errors->first("acta") }}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Estado</label>
        <div class="col-md-4">
        <select  name="estado" id="" class="form-control">
            <option value=""> Seleccione un estado </option>

            <option {{ $entregables->Estado == 'Activo' ? 'selected' : '' }} >Activo</option>
            <option {{ $entregables->Estado == 'Activo' ? 'selected' : '' }} >Inactivo</option>
        </select>


        </div>
    </div>



    <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="" class="btn btn-info">Actualizar</button>
            </div>
          </div>


          <a type="submit" class=" btn btn-success" href="{{url('entregables')}}" >Regresar</a>
    </fieldset>
    </form>
