@extends('layouts/plantilla')

@section("tituloPagina", "Crear un Nuevo Registro")

@section('contenido')
<br><br>
<div class="card">
    <div class="card">
      <h5 class="card-header">Eliminar marcas</h5>
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
                <th>Origen de Fabricación</th>
                <th>Fecha de Fabricación</th>
            </thead>
            <tbody>
                <td>{{ $marcas -> nombre_marca}}</td>
                <td>{{ $marcas -> lugar_fabrica}}</td>
                <td>{{ $marcas -> fecha_fabricacion}}</td>
            </tbody>
        </table>
    
    </div>
    <div class="card-footer text-body-secondary">
        <form action="{{ route("marcas.destroy", $marcas->id)}}" method="POST">
            @csrf
            @method('delete')

            <a href="{{ route("marcas.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Regresar</a>
            
            <button class="btn btn-danger">Eliminar</button>
        </form>    
    </div>
</div>
@endsection