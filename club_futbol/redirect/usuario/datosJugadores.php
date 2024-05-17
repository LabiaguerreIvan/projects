<?php
include '../../conexion.php';

$sql = "SELECT jugadores.*, 
                posicion.posicion, 
                pos.posicion AS posicion_alternativa, 
                extremidades.desc_extremidad AS pierna_habil, 
                extre.desc_extremidad AS mano_habil, 
                estado.estado, 
                usuarios.nom_usuario
        FROM jugadores
        INNER JOIN posicion ON jugadores.posicion = posicion.cod_posicion
        INNER JOIN posicion AS pos ON jugadores.posicion_alternativa = pos.cod_posicion
        INNER JOIN extremidades ON jugadores.pierna_habil = extremidades.cod_extremidad
        INNER JOIN extremidades AS extre ON jugadores.mano_habil = extre.cod_extremidad
        INNER JOIN estado ON jugadores.estado = estado.cod_estado
        INNER JOIN usuarios ON jugadores.dniUsuario = usuarios.dni";

$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$result = array();

while ($row = mysqli_fetch_assoc($resultado)) {
    $result[] = $row;
}

// Convierte los datos a JSON y los imprime
header('Content-Type: application/json');
echo json_encode($result);

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
