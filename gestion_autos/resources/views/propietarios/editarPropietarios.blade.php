@extends('layouts/plantilla')

@section("tituloPagina", "Actualizar Registro")

@section('contenido')
<br><br>
<div class="card">
  <h5 class="card-header">Actualizar un propietario</h5>
    
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('propietarios.update', $propietarios->id)}}" method="POST">
              @csrf
              @method("PUT")
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$propietarios->nombre}}"required>

                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{$propietarios->apellido}}"required>
                
                <label for="dni">DNI</label>
                <input type="number" name="dni" class="form-control" value="{{$propietarios->dni}}"required>

                <label for="cuil">Cuil</label>
                <input type="number" name="cuil" class="form-control" value="{{$propietarios->cuil}}" required>

                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" class="form-control" value="{{$propietarios->telefono}}"required>

                <label for="correo">Correo</label>
                <input type="text" name="correo" class="form-control" value="{{$propietarios->correo}}"required>

                <br>
                <a href="{{ route("propietarios.index")}}" class="btn btn-secondary">Regresar</a>
                
                <button class="btn btn-warning">Actualizar Datos</button>
            </form>
        </p>
    </div>
  </div>
@endsection