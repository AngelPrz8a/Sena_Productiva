@extends('plantilla.plantilla')
@section('contenido')

<form  method="POST" action="{{ url('empresas/'.$empresa->IdEmpresa) }}" class="form-horizontal">
    @csrf
    @method('PUT')
    <fieldset>

    <!-- Form Name -->
    <legend>Editar empresa</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">NIT</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $empresa->NIT}}" name="nit" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("nit") }} </strong>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $empresa->Nombre}}" name="nombre" type="text" placeholder="" class="form-control input-md">
    <strong> {{ $errors->first("nombre") }}</strong>
      </div>
    </div>




    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Telefono</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ $empresa->Telefono}}" name="telefono" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("telefono") }}</strong>
            </div>
    </div>



      <!-- Text input-->
      <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Dirección</label>
              <div class="col-md-4">
              <input id="textinput" value="{{ $empresa->Direccion}}" name="direccion" type="text" placeholder="" class="form-control input-md">
          <strong> {{ $errors->first("direccion") }}</strong>
              </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Razón Social</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $empresa->RazonSocial}}" name="razonSocial" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("razonSocial") }}</strong>
            </div>
        </div>



        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Nombre Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $empresa->NombreInmediato}}" name="nombreJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("nombreJefe") }}</strong>
            </div>
        </div>



        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Apellido Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $empresa->ApellidoInmediato}}" name="apellidoJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("apellidoJefe") }}</strong>
            </div>
        </div>


         <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Telefono Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $empresa->TelefonoInmediato}}" name="telefonoJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("telefonoJefe") }}</strong>
            </div>
        </div>


         <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Email Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $empresa->EmailInmediato}}" name="emailJefe" type="text" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("emailJefe") }}</strong>
            </div>
        </div>


        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Cargo Jefe</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ $empresa->CargoInmediato }}" name="cargoJefe" type="text" placeholder="" class="form-control input-md">
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
@endsection
