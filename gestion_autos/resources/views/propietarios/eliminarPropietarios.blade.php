@extends('layouts/plantilla')

@section("tituloPagina", "Crear un Nuevo Registro")

@section('contenido')
<br><br>
<div class="card">
    <div class="card">
      <h5 class="card-header">Eliminar Propietario</h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                ¿Deseas eliminar este registro?
              </div>
        </p>
        <table class="table table-sm table-hover">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Cuil</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </thead>
            <tbody>
                <td>{{ $propietarios -> nombre}}</td>
                <td>{{ $propietarios -> apellido}}</td>
                <td>{{ $propietarios -> dni}}</td>
                <td>{{ $propietarios -> cuil}}</td>
                <td>{{ $propietarios -> telefono}}</td>
                <td>{{ $propietarios -> correo}}</td>
            </tbody>
        </table>
    
    </div>
    <div class="card-footer text-body-secondary">
        <form action="{{ route("propietarios.destroy", $propietarios->id)}}" method="POST">
            @csrf
            @method('delete')

            <a href="{{ route("propietarios.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Regresar</a>
            
            <button class="btn btn-danger">Eliminar</button>
        </form>    
    </div>
</div>
@endsection