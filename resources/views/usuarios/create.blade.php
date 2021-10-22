@extends('plantilla.plantilla')
@section('contenido')

<form method="POST" action="{{url('usuarios')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Crear Usuario</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Nombre</label>
        <div class="col-md-4">
        <input name="nombre" value="{{old('nombre')}}" type="text" placeholder="" class="form-control input-md">
            @error('nombre')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Apellido</label>
        <div class="col-md-4">
        <input name="apellido" value="{{old('apellido')}}" type="text" placeholder="" class="form-control input-md">
            @error('apellido')
                {{$message}}
             @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Fecha Nacimiento</label>
        <div class="col-md-4">
        <input name="fechaNacimiento" value="{{old('fechaNacimiento')}}" type="date" placeholder="" class="form-control input-md">
            @error('fechaNacimiento')
                {{$message}}
            @enderror
        </div>
      </div>


        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Genero</label>
            <div class="col-md-4">
                <select id="" name="genero" class="form-control">
                <option value="">Seleccione...</option>
                <option {{old('genero') == "F" ? 'selected' : ''}}>F</option>
                <option {{old('genero') =="M" ? 'selected' : ''}}>M</option>
                </select>
            </div>
            @error('genero')
                 {{$message}}
             @enderror
        </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="">Tipo Documento</label>
        <div class="col-md-4">
        <select id="" name="tipoD" class="form-control">
            <option value="">Seleccione...</option>
            <option {{old('tipoD') == "CC" ? 'selected' : ''}}>CC</option>
            <option {{old('tipoD') == "TI" ? 'selected' : ''}}>TI</option>
            <option {{old('tipoD') == "CE" ? 'selected' : ''}}>CE</option>
            <option {{old('tipoD') == "NIP" ? 'selected' : ''}}>NIP</option>
            <option {{old('tipoD') == "NIT" ? 'selected' : ''}}>NIT</option>
            <option {{old('tipoD') == "PAP" ? 'selected' : ''}}>PAP</option>
        </select>
        </div>

        @error('tipoD')
            {{$message}}
        @enderror
    </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Número Documento</label>
        <div class="col-md-4">
        <input name="numeroD" value="{{old('numeroD')}}" type="text" placeholder="" class="form-control input-md">
            @error('numeroD')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Email Personal</label>
        <div class="col-md-4">
        <input name="emailP" value="{{old('emailP')}}" type="text" placeholder="" class="form-control input-md">
            @error('emailP')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Email Sena</label>
        <div class="col-md-4">
        <input id="" name="emailS" value="{{old('emailS')}}" type="text" placeholder="" class="form-control input-md">
            @error('emailS')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Celular</label>
        <div class="col-md-4">
        <input id="" name="celular" value="{{old('celular')}}" type="text" placeholder="" class="form-control input-md">
            @error('celular')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Telefono</label>
        <div class="col-md-4">
        <input id="" name="telefono" value="{{old('telefono')}}" type="text" placeholder="" class="form-control input-md">
            @error('telefono')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Dirección</label>
        <div class="col-md-4">
        <input id="" name="direccion" value="{{old('direccion')}}" type="text" placeholder="" class="form-control input-md">
            @error('direccion')
                {{$message}}
            @enderror
        </div>
      </div>

    <!--
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
        <select id="" name="estado" class="form-control">
            <option {{old('estado')=='Activo' ? 'selected' : ''}}>Activo</option>
            <option {{old('estado')=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
        </select>
        </div>
        @error('estado')
             {{$message}}
        @enderror
     </div> -->

     <!--////////////////////////////////////////////////////////////////////-->
     <div class="form-group">
        <label class="col-md-4 control-label" for="">Rol</label>
        <div class="col-md-4">
        <select id="" name="rol" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($roles as $rol)
                <option {{old('rol')==$rol->id ? 'selected' : ''}} value="{{$rol->id}}">{{$rol->tipoRol}}</option>
            @endforeach
        </select>
        </div>
        @error('rol')
            {{$message}}
        @enderror
    </div>


      <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <button id="" name="" class="btn btn-primary">Create</button>
        </div>
      </div>

    </fieldset>
    </form>

@endsection

