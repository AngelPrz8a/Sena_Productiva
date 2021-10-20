<form method="POST" action="{{url('fichas/'.$ficha->IdFicha)}}" class="form-horizontal">
    @method('PUT')
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Form Name</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Número</label>
      <div class="col-md-4">
      <input readonly id="" value="{{$ficha->NumeroFicha}}" name="numero" type="text" placeholder="" class="form-control input-md">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Inicio Lectiva</label>
      <div class="col-md-4">
      <input id=""  value="{{$ficha->InicioLectiva}}" name="inicioLectiva" type="text" placeholder="" class="form-control input-md">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fin Lectiva</label>
      <div class="col-md-4">
      <input id=""  value="{{$ficha->FinLectiva}}" name="finLectiva" type="text" placeholder="" class="form-control input-md">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Inicio Productiva</label>
      <div class="col-md-4">
      <input id=""  value="{{$ficha->InicioProductiva}}" name="inicioProductiva" type="text" placeholder="" class="form-control input-md">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fin Productiva</label>
      <div class="col-md-4">
      <input id=""  value="{{$ficha->FinProductiva}}" name="finProductiva" type="text" placeholder="" class="form-control input-md">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Jornada</label>
        <div class="col-md-4">
        <select id="" name="jornada" class="form-control">
            <option value="">Seleccione...</option>
            <option {{$ficha->Jornada=='Mixta' ? 'selected' : ''}}>Mixta</option>
            <option {{$ficha->Jornada=='Diurna' ? 'selected' : ''}}>Diurna</option>
            <option {{$ficha->Jornada=='Nocturna' ? 'selected' : ''}}>Nocturna</option>
        </select>
        </div>
        @error('jornada')   {{$message}}    @enderror
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Estado</label>
        <div class="col-md-4">
        <select id="" name="estado" class="form-control">
            <option value="">Seleccione...</option>
            <option {{$ficha->Estado=='Activo' ? 'selected' : ''}}>Activo</option>
            <option {{$ficha->Estado=='Inactivo' ? 'selected' : ''}}>Inactivo</option>
        </select>
        </div>
        @error('estado')   {{$message}}    @enderror
    </div>



   <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Programa</label>
        <div class="col-md-4">
        <select id="" name="programa" class="form-control">
            <option>Seleccione...</option>
            @foreach ($programas as $programa)
                    <option {{$ficha->Id_programa == $programa->IdPrograma  ? 'selected' : ''}}
                         value="{{$programa->IdPrograma}}">
                        {{$programa->Nombre}}</option>
            @endforeach
        </select>
        </div>
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
