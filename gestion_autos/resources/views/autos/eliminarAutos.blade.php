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
                <th>Propietario</th>
                <th>Marca</th>
                <th>Chasis</th>
                <th>Patente</th>
                <th>Color</th>
                <th>Modelo</th>
                <th>Rodado</th>
            </thead>
            <tbody>
                <td>{{ $autos->propietarios_id_propietario }}</td>
                <td>{{ $autos->marcas_id_marca }}</td>
                <td>{{ $autos->chasis }}</td>
                <td>{{ $autos->patente }}</td>
                <td>{{ $autos->color }}</td>
                <td>{{ $autos->modelo }}</td>
                <td>{{ $autos->rodado }}</td>
            </tbody>
        </table>
    
    </div>
    <div class="card-footer text-body-secondary">
        <form action="{{ route("autos.destroy", $autos->id)}}" method="POST">
            @csrf
            @method('delete')

            <a href="{{ route("autos.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Regresar</a>
            
            <button class="btn btn-danger">Eliminar</button>
        </form>    
    </div>
</div>
@endsection