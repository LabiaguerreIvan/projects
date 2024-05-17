<?php

include '../../conexion.php';
$cod_estado = $_GET['cod'];

if($cod_estado<=0){
    echo 'ERROR';
    exit;
}
$sql="delete from estado where cod_estado=$cod_estado";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro borrado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido borrar el registro");history.go(-1)</script>';
}


mysqli_close($conexion);
?>