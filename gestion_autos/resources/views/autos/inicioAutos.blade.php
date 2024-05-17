@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('tituloPagina', 'Autos')

@section('contenido')

<div class="container mt-3">
    <div class="card">
        <h5 class="card-header text-center">Listado de Autos en el sistema</h5>
        <div class="card-body">

            {{-- muestra una mensaje cuando hay algun evento --}}
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-auto">
                    <a href='{{ route('autos.create') }}' class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Agregar Autos</a>
                </div>
            </div>
            <div class="table table-responsive">
                <table id="autos" name="autos"class="table table-sm table-bordered shadow-sm">
                    <thead class="">
                        <th>Propietario</th>
                        <th>Marca</th>
                        <th>Chasis</th>
                        <th>Patente</th>
                        <th>Color</th>
                        <th>Modelo</th>
                        <th>Rodado</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                       
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                            <tr>
                                {{-- <td>{{ $item->marcas->nombre_marca }}</td>
                                 --}}
                                <td>{{ $item->propietarios_id_propietario }}</td>
                                <td>{{ $item->marcas_id_marca }}</td>
                                <td>{{ $item->chasis }}</td>
                                <td>{{ $item->patente }}</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->modelo }}</td>
                                <td>{{ $item->rodado }}</td>
                                <td>
                                    <form action="{{ route('autos.edit', $item->id) }}" method="GET">
                                        <button class="btn btn-warning btn-sm"><i class="fa-solid fa-user-pen"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('autos.show', $item->id) }}" method="GET">
                                        <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @section('js')
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

                <script>
                    $(document).ready(function() {
                        let tabla = $('#autos').DataTable({
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                            }
                        });
                    });
                </script>
            @endsection

        </div>

        <div class="row">
            <div class="col-sm-12">
                {{ $datos->links() }}
            </div>
        </div>

    </div>
</div>
</div>
@endsection
