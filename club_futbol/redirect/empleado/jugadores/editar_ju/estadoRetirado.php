<?php
include '../../../../conexion.php';
$cod_jugador = $_GET['cod_jugador'];

$sql = "UPDATE jugadores SET estado=3 WHERE cod_jugador = $cod_jugador";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $response = array('success' => true, 'message' => 'Se ha cambiado el estado del Jugador con éxito');
} else {
    $response = array('success' => false, 'message' => 'No se ha podido cambiar el estado');
}

header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($conexion);
?>
