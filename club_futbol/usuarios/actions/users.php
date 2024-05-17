<?php
session_start();
include '../../conexion.php';

// VALIDACIÓN DE LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    global $conexion;

    $sql = "SELECT usuarios.*, tipo_usuarios.desc_tipo_usuario
            FROM usuarios
            INNER JOIN tipo_usuarios ON usuarios.tipo_usuario = tipo_usuarios.cod_tipo_usuario
            WHERE usuarios.email = ?";

    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        // Verificar si se encontró un usuario con el correo electrónico ingresado
        if ($fila = mysqli_fetch_assoc($resultado)) {
            $tipo_usuario = $fila['tipo_usuario'];
            $clave_cifrada = $fila['clave'];

            // Comparar la contraseña ingresada con la almacenada
            if (password_verify($clave, $clave_cifrada)) {
                // Establecer variables de sesión comunes a todos los usuarios
                $_SESSION['active'] = true;
                $_SESSION['usuario'] = $fila;

                // Determinar el tipo de usuario y redireccionar
                switch ($tipo_usuario) {
                    case 1:
                        // Administrador
                        header("Location: /TP6/redirect/administrador/index-administrador.php");
                        exit();
                        break;

                    case 2:
                        // Empleado
                        header("Location: /TP6/redirect/empleado/index-empleado.php");
                        exit();
                        break;

                    case 3:
                        // Usuario
                        header("Location: /TP6/redirect/usuario/index-usuario.php");
                        exit();
                        break;

                    default:
                        echo "No permitir usuario";
                        exit();
                }
            }
        }

        mysqli_stmt_close($stmt);
    }

    // Credenciales inválidas, mostrar mensaje de error
    echo '<script>alert("Credenciales inválidas");history.go(-1);</script>';
    exit();
}



//TRAER DATOS DE LA BDD PARA LA DATATABLE
$sql = "SELECT usuarios.*, estado_usuarios.desc_estado_usuario AS estado_usuario, tipo_usuarios.desc_tipo_usuario AS tipo_usuario
FROM usuarios
INNER JOIN estado_usuarios ON usuarios.estado_usuario = estado_usuarios.cod_estado_usuario
INNER JOIN tipo_usuarios ON usuarios.tipo_usuario = tipo_usuarios.cod_tipo_usuario";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $users = array(); 

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $cod_usuario = $fila['cod_usuario'];
        $dni = $fila['dni'];
        $nom_usuario = $fila['nom_usuario'];
        $email = $fila['email'];
        $estado_usuario = $fila['estado_usuario'];
        $tipo_usuario = $fila['tipo_usuario'];

        $users[] = array(
            "cod_usuario" => $cod_usuario,
            "dni" => $dni,
            "nom_usuario" => $nom_usuario,
            "email" => $email,
            "estado_usuario" => $estado_usuario,
            "tipo_usuario" => $tipo_usuario,
        );
    }

    // Convierte los datos a JSON y los imprime
    header('Content-Type: application/json');
    echo json_encode($users);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}


// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>