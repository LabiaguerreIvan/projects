@extends('layouts/plantilla')

@section("tituloPagina", "Crear un Nuevo Registro")

@section('contenido')
<br><br>
<div class="card text">
    <h5 class="card-header">Agregar nuevo propietario al sistema</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('propietarios.store')}}" method="POST">
              @csrf 
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>

                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
                
                <label for="dni">DNI</label>
                <input type="number" name="dni" class="form-control" required>

                <label for="cuil">Cuil</label>
                <input type="number" name="cuil" class="form-control" placeholder="Ingrese solo los numeros" required>

                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" class="form-control" required>

                <label for="correo">Correo</label>
                <input type="text" name="correo" class="form-control" required>

                <br>
                <a href="{{ route("propietarios.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Regresar</a>
                
                <button class="btn btn-primary">Guardar </button>
            </form>
        </p>
    </div>
  </div>
@endsection