<form method="POST" action="{{url('fichas')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Form Name</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Número</label>
      <div class="col-md-4">
      <input value="{{old('numero')}}" id="" name="numero" type="text" placeholder="" class="form-control input-md">
      @error('numero')
        {{$message}}
      @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Inicio Lectiva</label>
      <div class="col-md-4">
      <input value="{{old('inicioLectiva')}}" id="" name="inicioLectiva" type="date" placeholder="" class="form-control input-md">
        @error('inicioLectiva')
        {{$message}}
        @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fin Lectiva</label>
      <div class="col-md-4">
      <input value="{{old('finLectiva')}}" id="" name="finLectiva" type="date" placeholder="" class="form-control input-md">
      @error('finLectiva')
        {{$message}}
      @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Inicio Productiva</label>
      <div class="col-md-4">
      <input value="{{old('inicioProductiva')}}" id="" name="inicioProductiva" type="date" placeholder="" class="form-control input-md">
      @error('inicioLectiva')
        {{$message}}
      @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Fin Productiva</label>
      <div class="col-md-4">
      <input value="{{old('finProductiva')}}" id="" name="finProductiva" type="date" placeholder="" class="form-control input-md">
      @error('finProductiva')
        {{$message}}
      @enderror
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Jornada</label>
        <div class="col-md-4">
        <select id="" name="jornada" class="form-control">
            <option value="">Seleccione...</option>
            <option {{old('jornada')=='Mixta' ? 'selected' : ''}}>Mixta</option>
            <option {{old('jornada')=='Diurna' ? 'selected' : ''}}>Diurna</option>
            <option {{old('jornada')=='Nocturna' ? 'selected' : ''}}>Nocturna</option>
        </select>
        </div>
        @error('jornada')   {{$message}}    @enderror
    </div>

    <!--
    <div class="form-group">
      <label class="col-md-4 control-label" for="">Estado</label>
      <div class="col-md-4">
      <input id="" name="estado" type="text" placeholder="" class="form-control input-md">

      </div>
    </div>
    -->

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Programa</label>
        <div class="col-md-4">
        <select id="" name="programa" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($programas as $p)
                <option {{old('programa')==$p->IdPrograma ? 'selected' : ''}} value="{{$p->IdPrograma}}">{{$p->Nombre}}</option>
            @endforeach

        </select>
        </div>
        @error('programa')   {{$message}}    @enderror
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
