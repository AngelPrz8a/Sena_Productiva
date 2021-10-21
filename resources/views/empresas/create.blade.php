
<form  method="POST" action="{{ url('empresas') }}" class="form-horizontal">
    @csrf
    <fieldset>

        <!-- Alerta -->
    <!-- Recorrer errores -->


    <!-- Form Name -->
    <legend>Nueva empresa</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">NIT</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('nit')}}" name="nit" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("nit") }} </strong>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('nombre')}}" name="nombre" type="text" placeholder="" class="form-control input-md">
    <strong> {{ $errors->first("nombre") }}</strong>
      </div>
    </div>




    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Telefono</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ old('telefono')}}" name="telefono" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("telefono") }}</strong>
            </div>
    </div>



      <!-- Text input-->
      <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Dirección</label>
              <div class="col-md-4">
              <input id="textinput" value="{{ old('direccion')}}" name="direccion" type="text" placeholder="" class="form-control input-md">
          <strong> {{ $errors->first("direccion") }}</strong>
              </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Razón Social</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('razonSocial')}}" name="razonSocial" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("razonSocial") }}</strong>
            </div>
        </div>



        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Nombre Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('nombreJefe')}}" name="nombreJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("nombreJefe") }}</strong>
            </div>
        </div>



        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Apellido Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('apellidoJefe')}}" name="apellidoJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("apellidoJefe") }}</strong>
            </div>
        </div>


         <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Telefono Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('telefonoJefe')}}" name="telefonoJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("telefonoJefe") }}</strong>
            </div>
        </div>


         <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Email Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('emailJefe')}}" name="emailJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("emailJefe") }}</strong>
            </div>
        </div>


        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Cargo Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('cargoJefe')}}" name="cargoJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("cargoJefe") }}</strong>
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
