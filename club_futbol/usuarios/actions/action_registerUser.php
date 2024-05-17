<?php

include "../../conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom_usuario = $_POST['nom_usuario'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $estado_usuario = $_POST['estado_usuario'];

    //NOMBRE
    //Realizar validacion de numeros y caracteres
    if (empty($nom_usuario)) {
        echo '<script>alert("Ingrese un nombre y apellido");history.go(-1);</script>';
        exit;
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $nom_usuario)) {
        echo '<script>alert("El nombre y apellido solo deben contener letras y espacios");history.go(-1);</script>';
        exit;
    }


    //DNI
    if (strlen($dni) < 7 || strlen($dni) > 8) {
        echo '<script>alert("El DNI ingresado no es válido");history.go(-1);</script>';
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE dni = $dni";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo '<script>alert("El DNI ingresado ya existe");history.go(-1);</script>';
        exit;
    }


    //EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("El correo ingresado no es válido");history.go(-1);</script>';
        exit;
    }

    if (strlen($email) > 100) {
        echo '<script>alert("El correo no puede tener más de 100 caracteres");history.go(-1);</script>';
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE email = $dni";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado)>0){
        echo '<script>alert("El correo ingresado ya existe");</script>';
    exit;
    }


    // CLAVE
    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d@#$%^&!*]+$/", $clave)) {
        echo '<script>alert("La contraseña debe contener al menos una letra y un número");history.go(-1);</script>';
        exit;
    }

    // Verificar si la contraseña ya existe
    $sql = "SELECT * FROM usuarios WHERE clave = ?";
    $stmt = mysqli_prepare($conexion, $sql); // Prepara la consulta

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $clave); // Vincula los parametros 'STRING' y el valor de $clave a $stmt.
        mysqli_stmt_execute($stmt); // Se ejecuta la consulta en la BDD con la contraseña

        $resultado = mysqli_stmt_get_result($stmt); // Obtiene el resultado de consulta preparada
        if (mysqli_num_rows($resultado) > 0) {
            echo '<script>alert("La contraseña que ingresaste ya existe");history.go(-1);</script>';
            exit;
        }

        mysqli_stmt_close($stmt);
    }

    // Cifrar la contraseña
    $clave_cifrada = password_hash($clave, PASSWORD_BCRYPT);


    //TIPO USUARIO
    if ($tipo_usuario == "-1") {
        echo '<script>alert("Seleccione un rol para el usuario");history.go(-1);</script>';
        exit;
    }


    //ESTADO
    if ($estado_usuario == "-1") {
        echo '<script>alert("Seleccione un estado para el usuario");history.go(-1);</script>';
        exit;
    }



    $sql = "INSERT INTO usuarios (nom_usuario, dni, email, clave, tipo_usuario, estado_usuario) VALUES (? , ? , ? , ? , ? , ?)";
    $stmt = mysqli_prepare($conexion, $sql); // Preparar la consulta

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sissii', $nom_usuario, $dni, $email, $clave_cifrada, $tipo_usuario, $estado_usuario);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        
        if ($stmt) {
            echo '<script>alert("Usuario registrado con éxito");window.location.href = "../login.php";</script>';


            //VERIFICAR TIPO DE USUARIO
        if ($tipo_usuario == 3){
            global $conexion;
            $sql_us = "SELECT MAX(cod_usuario) as cod_usuario FROM usuarios";
            $resultado_us = mysqli_query($conexion, $sql_us);
            $fila = mysqli_fetch_assoc($resultado_us);
            $cod_usuario = $fila['cod_usuario'];
        
        //CREAR CUENTA CORRIENTE 
        $sql_cc = "INSERT INTO cuenta_corriente (cod_usuario, cod_estado_cc) VALUES ($cod_usuario, 1)";
        $resultado_cc = mysqli_query($conexion, $sql_cc);
        //recibo el codigo de la cuenta corriente creada
        $cod_cc= mysqli_insert_id($conexion);
        
        
        }

        } else {
            echo '<script>alert("Error al registrarse");history.go(-1);</script>';
        }
    } else {
        echo '<script>alert("Error en la consulta SQL");history.go(-1);</script>';
        exit;
    }


}
mysqli_close($conexion);
?>