@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('tituloPagina', 'CRUD con Laravel')

@section('contenido')

    <div class="container mt-3">
        <div class="card">
            <h5 class="card-header text-center">Listado de Propietarios en el sistema</h5>
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
                        <a href='{{ route('propietarios.create') }}' class="btn btn-primary"><i
                                class="fa-solid fa-user-plus"></i> Agregar Persona</a>
                    </div>
                </div>
                <div class="table table-responsive">
                    <table id="propietarios" name="propietarios"class="table table-sm table-bordered shadow-sm">
                        <thead class="">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Cuil</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody> 
                            @if (isset($datos) && count($datos) > 0)
                               @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->apellido }}</td>
                                    <td>{{ $item->dni }}</td>
                                    <td>{{ $item->cuil }}</td>
                                    <td>{{ $item->telefono }}</td>
                                    <td>{{ $item->correo }}</td>
                                    <td>
                                        <form action="{{ route('propietarios.edit', $item->id) }}" method="GET">
                                            <button class="btn btn-warning btn-sm"><i
                                                    class="fa-solid fa-user-pen"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('propietarios.show', $item->id) }}" method="GET">
                                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <p>No hay datos disponibles.</p>
                        @endif
                        </tbody>
                    </table>

                @section('js')
                    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            let tabla = $('#propietarios').DataTable({
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
