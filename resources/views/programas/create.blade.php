@extends('plantilla.plantilla')
@section('contenido')

<form method="POST" action="{{url('programas')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Registrar Programa</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Nombre</label>
      <div class="col-md-4">
      <input value="{{old('nombre')}}" id="" name="nombre" type="text" placeholder="Nombre" class="form-control input-md">
        @error('nombre')    {{$message}}        @enderror
      </div>
    </div>



    <!-- Select Basic -->

    <div class="form-group">
      <label class="col-md-4 control-label" for="">Nivel</label>
      <div class="col-md-4">
        <select id="" name="nivel" class="form-control">
            <option value="">Seleccione...</option>
            <option {{old('nivel')=='Tecnólogo' ? 'selected' : ''}}>Tecnólogo</option>
            <option {{old('nivel')=='Técnico' ? 'selected' : ''}}>Técnico</option>
            <option {{old('nivel')=='Auxiliar' ? 'selected' : ''}}>Auxiliar</option>
        </select>
      </div>
      @error('nivel')    {{$message}}        @enderror
    </div>



    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
      <div class="col-md-4">
        <button id="" name="" class="btn btn-primary">Insert</button>
      </div>
    </div>

    </fieldset>
</form>

@endsection
