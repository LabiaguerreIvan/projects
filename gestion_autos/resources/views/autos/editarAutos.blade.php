@extends('layouts/plantilla')

@section("tituloPagina", "Actualizar Registro")

@section('contenido')
<br><br>
<div class="card">
  <h5 class="card-header">Actualizar un auto</h5>
    
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('autos.update', $autos->id)}}" method="POST">
              @csrf
              @method("PUT")
              <label for="propietarios_id_propietario">Propietario</label>
              <select name="propietarios_id_propietario" id="propietarios_id_propietario" class="form-control" required>
                <option value="{{ $autos->propietarios_id_propietario }}">{{ $autos->propietarios_id_propietario }}</option>
                @foreach($propietarios as $propietario)
                    <option value="{{ $propietario->id }}">{{ $propietario->nombre }} {{ $propietario->apellido }} - {{ $propietario->dni }}</option>
                @endforeach
            </select><br>
            
              <label for="marcas_id_marca">Marca</label>
              <select name="marcas_id_marca" id="marcas_id_marca" class="form-control" required>
                <option value="{{ $autos->marcas_id_marca }}">{{ $autos->marcas_id_marca }}</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nombre_marca }}</option>
                @endforeach
            </select><br>
                <label for="chasis">Chasis</label>
                <input type="text" name="chasis" class="form-control" value="{{$autos->chasis}}"required>

                <label for="patente">Patente</label>
                <input type="text" name="patente" class="form-control" value="{{$autos->patente}}" required>

                <label for="color">color</label>
                <input type="text" name="color" class="form-control" value="{{$autos->color}}"required>

                <label for="modelo">Modelo</label>
                <input type="number" name="modelo" class="form-control" value="{{$autos->modelo}}"required>

                <label for="rodado">Rodado</label>
                <input type="number" name="rodado" class="form-control" value="{{$autos->rodado}}"required>

                <br>
                <a href="{{ route("autos.index")}}" class="btn btn-secondary">Regresar</a>
                
                <button class="btn btn-warning">Actualizar Datos</button>
            </form>
        </p>
    </div>
  </div>
@endsection