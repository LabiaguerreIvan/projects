@extends('layouts/plantilla')

@section("tituloPagina", "Actualizar Registro")

@section('contenido')
<br><br>
<div class="card">
  <h5 class="card-header">Actualizar una Marca</h5>
    
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('marcas.update', $marcas->id)}}" method="POST">
              @csrf
              @method("PUT")
                <label for="nombre_marca">Nombre</label>
                <input type="text" name="nombre_marca" class="form-control" value="{{$marcas->nombre_marca}}"required>

                <label for="lugar_fabrica">Origen de Fabricación</label>
                <input type="text" name="lugar_fabrica" class="form-control" value="{{$marcas->lugar_fabrica}}"required>
                
                <label for="fecha_fabricacion">Fecha de Fabricación</label>
                <input type="date" name="fecha_fabricacion" class="form-control" value="{{$marcas->fecha_fabricacion}}"required>

                <br>
                <a href="{{ route("marcas.index")}}" class="btn btn-secondary">Regresar</a>
                
                <button class="btn btn-warning">Actualizar Datos</button>
            </form>
        </p>
    </div>
  </div>
@endsection