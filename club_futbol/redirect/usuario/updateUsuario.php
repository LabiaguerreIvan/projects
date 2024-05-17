<?php
include '../../conexion.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $cod_usuario = $_POST['cod_usuario'];
    $dni = $_POST['dni'];
    $nom_usuario = $_POST['nom_usuario'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $estado_usuario = $_POST['estado_usuario'];

    // VALIDACIONES

    //NOMBRE
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

    //EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("El correo ingresado no es válido");history.go(-1);</script>';
        exit;
    }

    if (strlen($email) > 100) {
        echo '<script>alert("El correo no puede tener más de 100 caracteres");history.go(-1);</script>';
        exit;
    }

    if (empty($clave)) {
        echo '<script>alert("Ingrese su contraseña para guardar los cambios");history.go(-1);</script>';
        exit;
    }

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


    // Verificar la contraseña antes de realizar la actualización
    if (verificar_clave($cod_usuario, $clave)) {
        // Actualizar datos en la base de datos
        $sql_update = "UPDATE usuarios 
                        SET dni = ?, nom_usuario = ?, email = ?, tipo_usuario = ?, estado_usuario = ? 
                        WHERE cod_usuario = ?";

        $stmt_update = mysqli_prepare($conexion, $sql_update);

        if ($stmt_update) {
            mysqli_stmt_bind_param($stmt_update, 'isssii', $dni, $nom_usuario, $email, $tipo_usuario, $estado_usuario, $cod_usuario);
            $resultado_update = mysqli_stmt_execute($stmt_update);

            if ($resultado_update) {
                echo '<script>alert("Se han actualizado los datos del Usuario correctamente");history.go(-1);</script>';
            } else {
                echo '<script>alert("Error al actualizar los datos del Usuario");history.go(-1);</script>';
                exit();
            }
            mysqli_stmt_close($stmt_update);
        }
    } else {
        echo '<script>alert("Contraseña incorrecta");history.go(-1);</script>';
        exit();
    }
}

//  FUNCION PARA COMPARAR LA CLAVE INGRESADA CON LA ALMACENADA
function verificar_clave($cod_usuario, $clave)
{
    global $conexion;

    $sql = "SELECT clave FROM usuarios WHERE cod_usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $cod_usuario);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        // Verificar si se encontró un usuario con el código de usuario ingresado
        // Si se encuentra, se obtiene la contraseña cifrada desde la BDD
        if ($fila = mysqli_fetch_assoc($resultado)) {
            $clave_cifrada = $fila['clave'];

            // Comparar la contraseña ingresada con la almacenada
            if (password_verify($clave, $clave_cifrada)) {
                mysqli_stmt_close($stmt);
                return true;
            }
        }
        mysqli_stmt_close($stmt);
    }
    return false;
}
