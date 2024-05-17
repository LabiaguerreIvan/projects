<?php
include '../../../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_jugador = $_POST['cod_jugador'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $posicion = $_POST['posicion'];
    $posicion_alternativa = $_POST['posicion_alternativa'];
    $pierna_habil = $_POST['pierna_habil'];
    $mano_habil = $_POST['mano_habil'];
    $estado = $_POST['estado'];
    $numero_camiseta = $_POST['numero_camiseta'];
    $telefono_emergencia = $_POST['telefono_emergencia'];
    $email_contacto = $_POST['email_contacto'];
    $dniUsuario = $_POST['dniUsuario'];


    // DNI
    


    
    //NOMBRE
    if ($nombre == "") {
        echo '<script>alert("Ingrese un nombre");history.go(-1);</script>';
        exit;
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
        echo '<script>alert("El nombre solo deben contener letras y espacios");history.go(-1);</script>';
        exit;
    }

    //APELLIDO
    if ($apellido == "") {
        echo '<script> alert("Ingrese un apellido");history.go(-1);</script>';
        exit;
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $apellido)) {
        echo '<script>alert("El nombre solo deben contener letras y espacios");history.go(-1);</script>';
        exit;
    }

    //posicion
    if ($posicion[0] == -1) {
        echo '<script> alert("Seleccione una Posición válida");history.go(-1);</script>';
        exit;
    }

    //posicion alternativa
    if ($posicion_alternativa[0] == -1) {
        echo '<script> alert("Seleccione una Posición alternativa válida");history.go(-1);</script>';
        exit;
    }

        //posicion
        if ($posicion == $posicion_alternativa) {
            echo '<script>alert("No se puede repetir la posición del jugador");history.go(-1);</script>';
            exit;
        }

    //PIERNA HABIL
    if ($pierna_habil[0] == -1) {
        echo '<script> alert("Pierna hábil indefinida");history.go(-1);</script>';
        exit;
    }

    //MANO HABIL
    if ($mano_habil[0] == -1) {
        echo '<script> alert("Mano hábil indefinida");history.go(-1);</script>';
        exit;
    }

    //ESTADO
    if ($estado[0] == -1) {
        echo '<script> alert("Estado del jugador indefinido");history.go(-1);</script>';
        exit;
    }

    //NUMERO CAMISETA
    if ($numero_camiseta == "") {
        echo '<script> alert("Ingrese un número de camiseta");history.go(-1);</script>';
        exit;
    }

    //TELEFONO
    if ($telefono_emergencia == "") {
        echo '<script> alert("Indique un número telefónico");history.go(-1);</script>';
        exit;
    }

    //EMAIL
    if (!filter_var($email_contacto, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("El correo ingresado no es válido");history.go(-1);</script>';
        exit;
    }

    if (strlen($email_contacto) > 100) {
        echo '<script>alert("El correo no puede tener más de 100 caracteres");history.go(-1);</script>';
        exit;
    }
    if ($email_contacto == "") {
        echo '<script> alert("Ingrese un correo válido");history.go(-1);</script>';
        exit;
    }

    $sql = "UPDATE jugadores SET
        dni = $dni,
        nombre = '$nombre',
        apellido = '$apellido',
        fecha_nacimiento = '$fecha_nacimiento',
        posicion = $posicion,
        posicion_alternativa = $posicion_alternativa,
        pierna_habil = $pierna_habil,
        mano_habil = $mano_habil,
        estado = $estado,
        numero_camiseta = $numero_camiseta,
        telefono_emergencia = $telefono_emergencia,
        email_contacto = '$email_contacto',
        dniUsuario = '$dniUsuario'
        WHERE cod_jugador = $cod_jugador";


    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo '<script>alert("Registro modificado con éxito");window.location="/TP6/redirect/administrador/jugadores/listado_ju/listadoJugadores.php";</script>';
    } else {
        echo '<script>alert("No se ha podido modificar el registro");history.go(-1)</script>';
    }

    mysqli_close($conexion);
}
