<form method="post" action="{{url('reunionAprendiz')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Crear Reunion Aprendiz</legend>


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Titulo</label>
        <div class="col-md-4">
        <input value="{{old('titulo')}}" id="" name="titulo" type="text" placeholder="" class="form-control input-md">
            @error('titulo')        {{$message}}        @enderror
        </div>
      </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Descripcion</label>
      <div class="col-md-4">
      <input value="{{old('descripcion')}}" id="" name="descripcion" type="text" placeholder="" class="form-control input-md">
      @error('descripcion')        {{$message}}        @enderror
      </div>
    </div>


    <!--
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fecha Creacion</label>
      <div class="col-md-4">
      <input id="" name="fechaCreacion" type="date" placeholder="" class="form-control input-md">

      </div>
    </div>-->

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fecha Citacion</label>
      <div class="col-md-4">
      <input value="{{old('fechaCitacion')}}" id="" name="fechaCitacion" type="date" placeholder="" class="form-control input-md">
      @error('fechaCitacion')        {{$message}}        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Hora Citacion</label>
      <div class="col-md-4">
      <input value="{{old('horaCitacion')}}"  id="" name="horaCitacion" type="time" placeholder="" class="form-control input-md">
      @error('horaCitacion')        {{$message}}        @enderror
      </div>
    </div>


    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="">Modalidad</label>
    <div class="col-md-4">
        <select id="" name="modalidad" class="form-control">
            <option value="">Seleccioe...</option>
            <option value="Presencial">Presencial</option>
            <option value="Virtual">Virtual</option>
            <option value="Telefonica">Telefonica</option>
        </select>
        </div>
        @error('modalidad')        {{$message}}        @enderror
    </div>


    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="">Momento Eleccion</label>
    <div class="col-md-4">
        <select id="" name="momentoEleccion" class="form-control">
            <option value="">Seleccioe...</option>
            <option value="Lectiva">Lectiva</option>
            <option value="Productiva">Productiva</option>
        </select>
        </div>
        @error('momentoEleccion')        {{$message}}        @enderror
    </div>


    <!--
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
        <input id="" name="" type="text" placeholder="" class="form-control input-md">

        </div>
      </div>-->


    <div class="form-group">
    <label class="col-md-4 control-label" for="">Instructor</label>
    <div class="col-md-4">
        <select id="" name="id_instructor" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ( $instructores as $instructor)
                <option value="{{$instructor->IdInstructor}}">{{$instructor->IdInstructor}}</option>
            @endforeach
        </select>
        </div>
        @error('id_instructor')        {{$message}}        @enderror
    </div>


    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <button id="" name="" class="btn btn-success">Create</button>
        </div>
    </div>

    </fieldset>
    </form>
