<?php
include '../../../../conexion.php';
$cod_usuario = $_GET['cod_usuario'];

$sql = "UPDATE usuarios SET estado_usuario=2 WHERE cod_usuario = $cod_usuario";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $response = array('success' => true, 'message' => 'Se ha cambiado el estado del Usuario con éxito');
} else {
    $response = array('success' => false, 'message' => 'No se ha podido cambiar el estado');
}

header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($conexion);
?>
