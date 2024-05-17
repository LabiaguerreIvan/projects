$(document).ready(function () {

    //DATATABLE PARA MODAL DE USUARIOS EN "AGREGAR JUGADOR"
    let usersModal = $('#users').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Variable para almacenar el DNI seleccionado
    let dniSeleccionado;

    // Evento de clic para el botón "Seleccionar"
    $('#users tbody').on('click', 'button.seleccionarBtn', function () {
        // Obtener el DNI desde el valor del botón
        dniSeleccionado = $(this).val();

        // Mostrar el DNI en el modal-footer
        $('#dniSeleccionado').text(dniSeleccionado);
    });


    // Configuración de DataTable con AJAX
    $.ajax({
        url: '/TP6/usuarios/actions/users.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                usersModal.row.add([
                    data[i].dni,
                    data[i].nom_usuario,
                    data[i].email,
                    data[i].estado_usuario,
                    '<button type="button" class="seleccionarBtn btn btn-success" value="' + data[i].dni + '"><i class="fa-solid fa-plus fa-lg"></i></button>'
                ]).draw();
            }
        },
        error: function () {
            alert('Error al cargar los usuarios');
        }
    });

    // Evento al hacer clic en el botón "Guardar"
    $('#btnGuardar').on('click', function () {
        $('#dniUsuario').val(dniSeleccionado);
        $('#usuarios').modal('hide');
    });

    // -------------------------------------------------- //

    //DATATABLE PARA LISTADO DE USUARIOS EN EL MODULO "EDITAR"
    let usersEdit = $('#usersEdit').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    $.ajax({
        url: '/TP6/usuarios/actions/users.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                usersEdit.row.add([
                    data[i].cod_usuario,
                    data[i].dni,
                    data[i].nom_usuario,
                    data[i].email,
                    data[i].tipo_usuario,
                    data[i].estado_usuario,
                    '<a href="/TP6/redirect/administrador/usuarios/editar_us/editarUsuario.php?cod_usuario=' + data[i].cod_usuario + '" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>' +
                    '&nbsp;' +
                    '<a href="#" class="btn btn-danger eliminarBtn" data-cod-usuario="' + data[i].cod_usuario + '"><i class="fa-solid fa-trash"></i></a>'
                ]).draw();
            }
        },
        error: function () {
            alert('Error al cargar los usuarios');
        }
    });

    // Evento al hacer clic en el botón "Eliminar"
    $('#usersEdit').on('click', '.eliminarBtn', function () {
        let codUsuario = $(this).data('cod-usuario');

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción cambiará el estado a Inactivo.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, cambiar a Inactivo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la acción de estadoInactivo.php mediante AJAX
                $.ajax({
                    url: '/TP6/redirect/administrador/usuarios/editar_us/estadoInactivo.php?cod_usuario=' + codUsuario,
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



});
