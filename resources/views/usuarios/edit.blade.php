@extends('plantilla.plantilla')
@section('contenido')


<form method="POST" action="{{url('usuarios/'.$usuario->IdUsuario)}}" class="form-horizontal">
    @method('PUT')
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Actualizar Usuario</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Nombre</label>
      <div class="col-md-4">
      <input name="nombre" value="{{$usuario->Nombre}}" type="text" placeholder="" class="form-control input-md">
         @error('nombre')
             {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Apellido</label>
      <div class="col-md-4">
      <input name="apellido" value="{{$usuario->Apellido}}" type="text" placeholder="" class="form-control input-md">
         @error('apellido')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fecha Nacimiento</label>
      <div class="col-md-4">
      <input name="fechaNacimiento" value="{{$usuario->FechaNacimiento}}" type="date" placeholder="" class="form-control input-md">
        @error('fechaNacimiento')   {{$message}}    @enderror
      </div>
    </div>


    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Genero</label>
        <div class="col-md-4">
            <select id="" name="genero" class="form-control">
            <option value="">Seleccione genero...</option>
            <option {{$usuario->Genero=="F" ? 'selected' : ''}}>F</option>
            <option {{$usuario->Genero=="M" ? 'selected' : ''}}>M</option>
            </select>
        </div>
        @error('genero')
            {{$message}}
        @enderror
    </div>


    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Tipo Documento</label>
        <div class="col-md-4">
        <select id="" name="tipoD" class="form-control">
            <option value="">Seleccione...</option>
            <option {{$usuario->TipoDocumento == "CC" ? 'selected' : ''}}>CC</option>
            <option {{$usuario->TipoDocumento == "TI" ? 'selected' : ''}}>TI</option>
            <option {{$usuario->TipoDocumento == "CE" ? 'selected' : ''}}>CE</option>
            <option {{$usuario->TipoDocumento == "NIP" ? 'selected' : ''}}>NIP</option>
            <option {{$usuario->TipoDocumento == "NIT" ? 'selected' : ''}}>NIT</option>
            <option {{$usuario->TipoDocumento == "PAP" ? 'selected' : ''}}>PAP</option>
        </select>
        @error('tipoD')
            {{$message}}
        @enderror
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Número Documento</label>
      <div class="col-md-4">
      <input name="numeroD" value="{{$usuario->NumeroIdentificacion}}" type="text" placeholder="" class="form-control input-md">
        @error('numeroD')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Email Personal</label>
      <div class="col-md-4">
      <input name="emailP" value="{{$usuario->EmailPersonal}}" type="text" placeholder="" class="form-control input-md">
         @error('emailP')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Email Sena</label>
      <div class="col-md-4">
      <input id="" name="emailS" value="{{$usuario->EmailSena}}" type="text" placeholder="" class="form-control input-md">
        @error('emailS')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Celular</label>
      <div class="col-md-4">
      <input id="" name="celular" value="{{$usuario->NumeroCelular}}" type="text" placeholder="" class="form-control input-md">
        @error('celular')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Telefono</label>
      <div class="col-md-4">
      <input id="" name="telefono" value="{{$usuario->NumeroFijo}}" type="text" placeholder="" class="form-control input-md">
        @error('telefono')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Dirección</label>
      <div class="col-md-4">
      <input id="" name="direccion" value="{{$usuario->Direccion}}" type="text" placeholder="" class="form-control input-md">
        @error('direccion')
            {{$message}}
        @enderror
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
          <select id="" name="estado" class="form-control">
            <option {{$usuario->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
            <option {{$usuario->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
          </select>
        </div>
        @error('estado')
            {{$message}}
        @enderror
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Contraseña</label>
        <div class="col-md-4">
        <input id="" name="clave" value="{{$usuario->Contraseña}}" type="password" placeholder="" class="form-control input-md">
            @error('clave')     {{$message}}    @enderror
        </div>
      </div>

         <!--////////////////////////////////////////////////////////////////////-->
         <div class="form-group">
            <label class="col-md-4 control-label" for="">Rol</label>
            <div class="col-md-4">
            <select id="" name="rol" class="form-control">
                <option value="">Seleccione...</option>
                @foreach ($roles as $rol)
                    @foreach ($usuario->rol()->get() as $ur)
                        <option {{$ur->id==$rol->id ? 'selected' : ''}} value="{{$rol->id}}">{{$rol->tipoRol}}</option>
                    @endforeach
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
        <button id="" name="" class="btn btn-primary">Update</button>
      </div>
    </div>

    </fieldset>
    </form>


@endsection
