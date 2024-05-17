@extends('layouts/plantilla')

@section("tituloPagina", "Crear un Nuevo Registro")

@section('contenido')
<br><br>
<div class="card text">
    <h5 class="card-header">Agregar nuevo propietario al sistema</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('marcas.store')}}" method="POST">
              @csrf 
                <label for="nombre_marca">Nombre</label>
                <input type="text" name="nombre_marca" class="form-control" required>

                <label for="lugar_fabrica">Origen de Fabricación</label>
                <input type="text" name="lugar_fabrica" class="form-control" required>
                
                <label for="fecha_fabricacion">Fecha de Fabricación</label>
                <input type="date" name="fecha_fabricacion" class="form-control" required>

                <br>
                <a href="{{ route("marcas.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Regresar</a>
                
                <button class="btn btn-primary">Guardar</button>
            </form>
        </p>
    </div>
  </div>
@endsection