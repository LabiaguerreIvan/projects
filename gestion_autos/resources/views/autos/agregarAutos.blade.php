@extends('layouts/plantilla')

@section("tituloPagina", "Crear un Nuevo Registro")

@section('contenido')
<br><br>
<div class="card text">
    <h5 class="card-header">Agregar nuevo auto al sistema</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('autos.store')}}" method="POST">
              @csrf 
                <label for="propietarios_id_propietario">Propietario</label>
                <select name="propietarios_id_propietario" id="propietarios_id_propietario" class="form-control" required>
                  <option value="-1">Seleccionar Propietario</option>
                  @foreach($propietarios as $propietario)
                      <option value="{{ $propietario->id }}">{{ $propietario->nombre }} {{ $propietario->apellido }} - {{ $propietario->dni }}</option>
                  @endforeach
              </select><br>
              
                <label for="marcas_id_marca">Marca</label>
                <select name="marcas_id_marca" id="marcas_id_marca" class="form-control" required>
                  <option value="-1">Seleccionar Propietario</option>
                  @foreach($marcas as $marca)
                      <option value="{{ $marca->id }}">{{ $marca->nombre_marca }}</option>
                  @endforeach
              </select><br>
                
                <label for="chasis">Chasis</label>
                <input type="text" name="chasis" class="form-control" required><br>

                <label for="patente">Patente</label>
                <input type="text" name="patente" class="form-control" placeholder="Ingrese solo los numeros" required><br>

                <label for="color">Color</label>
                <input type="text" name="color" class="form-control" required><br>

                <label for="modelo">Modelo</label>
                <input type="number" name="modelo" class="form-control" required><br>

                <label for="rodado">Rodado</label>
                <input type="number" name="rodado" class="form-control" required><br>

                <br>
                <a href="{{ route("autos.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Regresar</a>
                
                <button class="btn btn-primary">Guardar</button>
            </form>
        </p>
    </div>
  </div>
@endsection