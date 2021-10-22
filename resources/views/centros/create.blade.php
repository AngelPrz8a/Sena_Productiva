@extends('plantilla.plantilla')
@section('contenido')

<form  method="POST" action="{{ url('centros') }}" class="form-horizontal">
    @csrf
    <fieldset>

        <!-- Alerta -->
    <!-- Recorrer errores -->
    @if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
    @foreach ( $errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif

    <!-- Form Name -->
    <legend>Nuevo Centro </legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('nombre')}}" name="nombre" type="text" placeholder="" class="form-control input-md">
        {{ $errors->first("nombre") }}
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Sede</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('sede')}}" name="sede" type="text" placeholder="" class="form-control input-md">
      {{ $errors->first("sede") }}
      </div>
    </div>



    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Ciudad</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ old('ciudad')}}" name="ciudad" type="text" placeholder="" class="form-control input-md">
      {{ $errors->first("ciudad") }}
      </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Direccion</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ old('direccion')}}" name="direccion" type="text" placeholder="" class="form-control input-md">
            {{ $errors->first("direccion") }}
            </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Region</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ old('region')}}" name="region" type="text" placeholder="" class="form-control input-md">
            {{ $errors->first("region") }}
            </div>
    </div>


    <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="" class="btn btn-info">Guardar</button>
            </div>
          </div>

    </fieldset>
    </form>

@endsection
