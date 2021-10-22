@extends('plantilla.plantilla')
@section('contenido')

<form method="POST" action="{{url('aprendices/'.$aprendiz->IdUsuario)}}" class="form-horizontal">
    @csrf
    @method('PUT')
    <fieldset>

    <!-- Form Name -->
    <legend>Editar Aprendiz</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Nombre</label>
        <div class="col-md-4">
        <input name="nombre" value="{{$aprendiz->Nombre}}" type="text" placeholder="" class="form-control input-md">
            @error('nombre')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Apellido</label>
        <div class="col-md-4">
        <input name="apellido" value="{{$aprendiz->Apellido}}" type="text" placeholder="" class="form-control input-md">
            @error('apellido')
                {{$message}}
             @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Fecha Nacimiento</label>
        <div class="col-md-4">
        <input name="fechaNacimiento" value="{{$aprendiz->FechaNacimiento}}" type="text" placeholder="" class="form-control input-md">
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
                <option {{$aprendiz->Genero == "F" ? 'selected' : ''}}>F</option>
                <option {{$aprendiz->Genero =="M" ? 'selected' : ''}}>M</option>
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
            <option {{$aprendiz->TipoDocumento == "CC" ? 'selected' : ''}}>CC</option>
            <option {{$aprendiz->TipoDocumento == "TI" ? 'selected' : ''}}>TI</option>
            <option {{$aprendiz->TipoDocumento == "CE" ? 'selected' : ''}}>CE</option>
            <option {{$aprendiz->TipoDocumento == "NIP" ? 'selected' : ''}}>NIP</option>
            <option {{$aprendiz->TipoDocumento == "NIT" ? 'selected' : ''}}>NIT</option>
            <option {{$aprendiz->TipoDocumento == "PAP" ? 'selected' : ''}}>PAP</option>
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
        <input name="numeroD" value="{{$aprendiz->NumeroIdentificacion}}" type="text" placeholder="" class="form-control input-md">
            @error('numeroD')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Email Personal</label>
        <div class="col-md-4">
        <input name="emailP" value="{{$aprendiz->EmailPersonal}}" type="text" placeholder="" class="form-control input-md">
            @error('emailP')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Email Sena</label>
        <div class="col-md-4">
        <input id="" name="emailS" value="{{$aprendiz->EmailSena}}" type="text" placeholder="" class="form-control input-md">
            @error('emailS')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Celular</label>
        <div class="col-md-4">
        <input id="" name="celular" value="{{$aprendiz->NumeroCelular}}" type="text" placeholder="" class="form-control input-md">
            @error('celular')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Telefono</label>
        <div class="col-md-4">
        <input id="" name="telefono" value="{{$aprendiz->NumeroFijo}}" type="text" placeholder="" class="form-control input-md">
            @error('telefono')
                {{$message}}
            @enderror
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="">Dirección</label>
        <div class="col-md-4">
        <input id="" name="direccion" value="{{$aprendiz->Direccion}}" type="text" placeholder="" class="form-control input-md">
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
            <option {{$aprendiz->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
            <option {{$aprendiz->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
        </select>
        </div>
        @error('estado')
             {{$message}}
        @enderror
     </div>

     <!--////////////////////////////////////////////////////////////////////-->
     <!--
        NOTA : Como es Aprendiz, no es necesario mostrar roles, a menos que sea administrador

     <div class="form-group">
        <label class="col-md-4 control-label" for="">Rol</label>
        <div class="col-md-4">
        <select id="" name="rol" class="form-control" hidden>
            <option value="1">Aprendiz</option>

            @ foreach ($roles as $rol)
                <option { {old('rol')==$rol->id ? 'selected' : ''}} value="{ {$rol->id}}">{ {$rol->tipoRol}}</option>
            @ endforeach

        </select>
        </div>
        @error('rol')
            {{$message}}
        @enderror
    </div>
    -->
    <!--////////////////////////////////////////////////////////////////////-->
    @foreach ($a->fichas()->get() as $f)
    @endforeach

     <!--////////////////////////////////////////////////////////////////////-->
     <div class="form-group">
        <label class="col-md-4 control-label" for="">Ficha</label>
        <div class="col-md-4">
        <select id="" name="ficha" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($fichas as $ficha)
                <option {{$f->IdFicha==$ficha->IdFicha ? 'selected' : ''}} value="{{$ficha->IdFicha}}">{{$ficha->NumeroFicha}}</option>
            @endforeach
        </select>
        </div>
        @error('rol')
            { {$message}}
        @enderror
    </div>
    <!--////////////////////////////////////////////////////////////////////-->


      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <button id="" name="" class="btn btn-primary">Update</button>
        </div>
      </div>

    </fieldset>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

@endsection
