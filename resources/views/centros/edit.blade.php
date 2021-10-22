
@extends('plantilla.plantilla')
@section('contenido')

<form  method="POST" action="{{ url('centros/' . $centro->IdCentro) }}" class="form-horizontal">
    @method('PUT')
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend> {{ $centro->Nombre }}</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $centro->Nombre }}" name="nombre" type="text" placeholder="" class="form-control input-md">
        {{ $errors->first("nombre") }}
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Sede</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $centro->Sede }}" name="sede" type="text" placeholder="" class="form-control input-md">
      {{ $errors->first("sede") }}
      </div>
    </div>



    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Ciudad</label>
      <div class="col-md-4">
      <input id="textinput" value="{{ $centro->Ciudad }}" name="ciudad" type="text" placeholder="" class="form-control input-md">
      {{ $errors->first("ciudad") }}
      </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Direccion</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ $centro->Direccion }}" name="direccion" type="text" placeholder="" class="form-control input-md">
            {{ $errors->first("direccion") }}
            </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Region</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ $centro->Region }}" name="region" type="text" placeholder="" class="form-control input-md">
            {{ $errors->first("region") }}
            </div>
    </div>


     <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
        <select id="" name="estado" class="form-control">
            <option {{$centro->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
            <option {{$centro->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
        </select>
        </div>
        @error('estado')
             {{$message}}
        @enderror
     </div>


    <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="" class="btn btn-info">Actualizar</button>
            </div>
          </div>

    </fieldset>
    </form>
@endsection
