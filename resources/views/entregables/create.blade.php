@extends('plantilla.plantilla')
@section('contenido')

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
            <label class="col-md-4 control-label" for="textinput">Fecha Entrega</label>
            <div class="col-md-4">
            <input id="textinput" value="{{ old('fechaentrega')}}" name="fechaentrega" type="date" placeholder="" class="form-control input-md">
        <strong> {{ $errors->first("fechaentrega") }}</strong>
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

      <select name="id_instructor">
          <option value="">Seleccione</option>
          @foreach ($instructores as $i)
            <option value="{{$i->IdInstructor}}">{{$i->usuarios()->first()->Nombre}} {{$i->usuarios()->first()->Apellido}}</option>
          @endforeach
      </select>

      <!--
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Acta</label>
        <div class="col-md-4">
        <input id="textinput" value="{{ old('acta')}}" name="acta" type="text" placeholder="" class="form-control input-md">
    <strong> {{ $errors->first("acta") }}</strong>
        </div>
    </div>
    -->





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
