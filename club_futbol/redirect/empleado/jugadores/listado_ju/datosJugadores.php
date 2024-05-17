<?php
include '../../../../conexion.php';

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

if ($resultado) {
  $result = array(); // Crear un array para almacenar los datos transformados

  while ($row = mysqli_fetch_assoc($resultado)) {
  

    $cod_jugador = $row['cod_jugador'];
    $dni = $row['dni'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $posicion = $row['posicion'];
    $posicion_alternativa = $row['posicion_alternativa'];
    $pierna_habil = $row['pierna_habil'];
    $mano_habil = $row['mano_habil'];
    $estado = $row['estado'];
    $numero_camiseta = $row['numero_camiseta'];
    $telefono_emergencia = $row['telefono_emergencia'];
    $email_contacto = $row['email_contacto'];
    $dniUsuario = $row['nom_usuario'];
    

    // Añadir los datos transformados al array
    $result[] = array(
      "cod_jugador" => $cod_jugador,
      "dni" => $dni,
      "nombre" => $nombre,
      "apellido" => $apellido,
      "fecha_nacimiento" => $fecha_nacimiento,
      "posicion" => $posicion,
      "posicion_alternativa" => $posicion_alternativa,
      "pierna_habil" => $pierna_habil,
      "mano_habil" => $mano_habil,
      "estado" => $estado,
      "numero_camiseta" => $numero_camiseta,
      "telefono_emergencia" => $telefono_emergencia,
      "email_contacto" => $email_contacto,
      "dniUsuario" => $dniUsuario
    );
  }

  // Convierte los datos a JSON y los imprime
  header('Content-Type: application/json');
  echo json_encode($result);
} else {
  echo "Error en la consulta: " . mysqli_error($conexion);
}



// Cierra la conexión a la base de datos
mysqli_close($conexion);
