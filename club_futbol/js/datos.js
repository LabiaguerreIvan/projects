
$(document).ready(function () {
    // Configuración de la DataTable
    let jugadores = $('#jugadores').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Realiza una solicitud AJAX para cargar los datos desde datos.php
    $.ajax({
        url: 'datosJugadores.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                jugadores.row.add([
                    data[i].cod_jugador,
                    data[i].dni,
                    data[i].nombre,
                    data[i].apellido,
                    data[i].fecha_nacimiento,
                    data[i].posicion,
                    data[i].posicion_alternativa,
                    data[i].pierna_habil,
                    data[i].mano_habil,
                    data[i].estado,
                    data[i].numero_camiseta,
                    data[i].telefono_emergencia,
                    data[i].email_contacto,
                    data[i].dniUsuario,
                    '<a href="../editar_ju/editarJugador.php?cod_jugador=' + data[i].cod_jugador + '" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>'+
                    '&nbsp;'+
                    '<a href="#" class="btn btn-danger eliminarBtn" data-cod-jugador="' + data[i].cod_jugador + '"><i class="fa-solid fa-trash"></i></a>'
                ]).draw();
            }
        },
        error: function () {
            alert('Error al cargar los datos');
        }
    });

    // Evento al hacer clic en el botón "Eliminar"
    $('#jugadores').on('click', '.eliminarBtn', function () {
        let codJugador = $(this).data('cod-jugador');

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción cambiará el estado a Retirado.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, cambiar a Retirado',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la acción de estadoInactivo.php mediante AJAX
                $.ajax({
                    url: '/TP6/redirect/administrador/jugadores/editar_ju/estadoRetirado.php?cod_jugador=' + codJugador,
                    type: 'GET',
                    dataType: 'json',
                    success: function () {
                        // Mostrar SweetAlert de éxito después de realizar la acción
                        console.log('Éxito al cambiar el estado del Usuario.');
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Se ha cambiado el estado del Usuario con éxito.',
                            icon: 'success'
                        });

                    },
                    error: function () {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al cambiar el estado del Usuario.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });

    let jugadoresXusuarios = $('#jugadoresXusuarios').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Realiza una solicitud AJAX para cargar los datos desde datos.php
    $.ajax({
        url: 'datosJugadores.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                jugadoresXusuarios.row.add([
                    data[i].cod_jugador,
                    data[i].dni,
                    data[i].nombre,
                    data[i].apellido,
                    data[i].fecha_nacimiento,
                    data[i].posicion,
                    data[i].posicion_alternativa,
                    data[i].pierna_habil,
                    data[i].mano_habil,
                    data[i].estado,
                    data[i].numero_camiseta,
                    data[i].telefono_emergencia,
                    data[i].email_contacto,
                    data[i].dniUsuario,
                    '<a href="../editar_ju/editarJugador.php?cod_jugador=' + data[i].cod_jugador + '" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>'+
                    '&nbsp;'+
                    '<a href="#" class="btn btn-danger eliminarBtn" data-cod-jugador="' + data[i].cod_jugador + '"><i class="fa-solid fa-trash"></i></a>'
                ]).draw();
            }
        },
        error: function () {
            alert('Error al cargar los datos');
        }
    });


});
