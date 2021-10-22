@extends('plantilla.plantilla')
@section('contenido')


<form method="POST" action="{{url('instructores')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <div class ="container p-3 my-3 bg-dark text-white">

    <legend>Crear Instructor</legend>


    <div class="form-group">
        <label class="col-md-4 control-label" for="">Id</label>
        <div class="col-md-4">
        <input name="id" value="{{old('IdInstructor')}}" type="text" placeholder="" class="form-control input-md">
            @error('id')
                {{$message}}
            @enderror
        </div>
      </div>

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
        <label class="col-md-4 control-label" for="">Centro</label>
        <div class="col-md-4">
        <input name="centro" value="{{old('centro')}}" type="text" placeholder="" class="form-control input-md">
            @error('centro')
                {{$message}}
            @enderror
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <button id="" name="" class="btn btn-primary">Update</button>
        </div>
      </div>

    </fieldset>
    </form>

</div>


@endsection
