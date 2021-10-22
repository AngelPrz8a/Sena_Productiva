@extends('plantilla.plantilla')
@section('contenido')


<form method="POST" action="{{url('programas/'.$programa->IdPrograma)}}" class="form-horizontal">
    @method('PUT')
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Editar Programa</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Nombre</label>
      <div class="col-md-4">
      <input value="{{$programa->Nombre}}" name="nombre" type="text" placeholder="Nombre" class="form-control input-md">

      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Nivel</label>
      <div class="col-md-4">
        <select name="nivel" class="form-control">
            <option value="">Seleccione...</option>
          <option {{$programa->Nivel=='Tecnólogo' ? 'selected' : ''}}>Tecnólogo</option>
          <option {{$programa->Nivel=='Técnico' ? 'selected' : ''}}>Técnico</option>
          <option {{$programa->Nivel=='Auxiliar' ? 'selected' : ''}}>Auxiliar</option>
        </select>
      </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
          <select id="" name="estado" class="form-control">
              <option value="">Seleccione...</option>
              <option {{$programa->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
              <option {{$programa->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
          </select>
        </div>
        @error('estado')    {{$message}}        @enderror
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
