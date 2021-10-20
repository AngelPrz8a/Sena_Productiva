<form method="post" action="{{url('reunionAprendiz/'.$reunion->IdReunionAprendices)}}" class="form-horizontal">
    @csrf
    @method('PUT')
    <fieldset>

    <!-- Form Name -->
    <legend>Editar Reunion Aprendiz</legend>


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Titulo</label>
        <div class="col-md-4">
        <input value="{{$reunion->Titulo}}" id="" name="titulo" type="text" placeholder="" class="form-control input-md">
        @error('titulo')        {{$message}}        @enderror
        </div>
      </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Descripcion</label>
      <div class="col-md-4">
      <input value="{{$reunion->Descripcion}}" id="" name="descripcion" type="text" placeholder="" class="form-control input-md">
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
      <input value="{{$reunion->FechaCitacion}}" id="" name="fechaCitacion" type="date" placeholder="" class="form-control input-md">
      @error('fechaCitacion')        {{$message}}        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Hora Citacion</label>
      <div class="col-md-4">
      <input value="{{$reunion->HoraCitacion}}"  id="" name="horaCitacion" type="time" placeholder="" class="form-control input-md">
      @error('horaCitacion')        {{$message}}        @enderror
      </div>
    </div>


    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="">Modalidad</label>
    <div class="col-md-4">
        <select id="" name="modalidad" class="form-control">
            <option value="">Seleccione...</option>
            <option {{$reunion->Modalidad=='Presencial' ? 'selected' : ''}} value="Presencial">Presencial</option>
            <option {{$reunion->Modalidad=='Virtual' ? 'selected' : ''}} value="Virtual">Virtual</option>
            <option {{$reunion->Modalidad=='Telefonica' ? 'selected' : ''}} value="Telefonica">Telefonica</option>
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
            <option {{$reunion->MomentoEleccion == 'Lectiva' ? 'selected' : ''}} value="Lectiva">Lectiva</option>
            <option {{$reunion->MomentoEleccion == 'Productiva' ? 'selected' : ''}} value="Productiva">Productiva</option>
        </select>
        </div>
        @error('momentoEleccion')        {{$message}}        @enderror
    </div>



    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
            <select id="" name="estado" class="form-control">
                <option value="">Seleccioe...</option>
                <option {{$reunion->Estado == 'Activo' ? 'selected' : ''}} value="Activo">Activo</option>
                <option {{$reunion->Estado == 'Inactivo' ? 'selected' : ''}} value="Inactivo">Inactivo</option>
            </select>
            </div>
            @error('estado')        {{$message}}        @enderror
    </div>


    <div class="form-group">
    <label class="col-md-4 control-label" for="">Instructor</label>
    <div class="col-md-4">
        <select id="" name="id_instructor" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ( $instructores as $instructor)
                <option {{$reunion->IdInstructor == $instructor->IdInstructor ? 'selected' : '' }} value="{{$instructor->IdInstructor}}">{{$instructor->IdInstructor}}</option>
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
