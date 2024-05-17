<?php
include '../../../../conexion.php';

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

//dni
if (strlen($dni) < 7 || strlen($dni) > 8) {
    echo '<script>alert("Ingrese un DNI válido");history.go(-1);</script>';
    exit();
}

//dni
$sql = "SELECT * FROM jugadores WHERE dni = $dni";
$resultado = mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
    echo '<script>alert("El DNI ingresado ya existe");history.go(-1);</script>';
    exit();
}

//posicion
if ($posicion == $posicion_alternativa) {
    echo '<script>alert("No se puede repetir la posicion del jugador");history.go(-1);</script>';
    exit();
}

//dniUsuario
if($dniUsuario == ""){
    echo '<script>alert("Seleccione un tutor para el jugador");history.go(-1);</script>';
    exit();    
}


//save data
$sql = "INSERT INTO jugadores (dniUsuario, dni, nombre, apellido, fecha_nacimiento, posicion, posicion_alternativa, pierna_habil, mano_habil, estado, numero_camiseta, telefono_emergencia, email_contacto) 
        VALUES (
            (SELECT dni FROM usuarios WHERE dni = $dniUsuario), 
            $dni, 
            '$nombre', 
            '$apellido', 
            '$fecha_nacimiento', 
            $posicion[0], 
            $posicion_alternativa[0], 
            $pierna_habil[0], 
            $mano_habil[0], 
            $estado[0], 
            $numero_camiseta, 
            $telefono_emergencia, 
            '$email_contacto'
        )";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo '<script>alert("Se han guardado los datos correctamente");history.go(-1);</script>';
    exit();
} else {
    echo '<script>alert("Error al cargar los datos");history.go(-1);</script>';
}
mysqli_close($conexion);
?>