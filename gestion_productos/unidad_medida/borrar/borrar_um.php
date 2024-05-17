<?php
include '../../conexion.php';
$cod_um = $_GET['cod'];

$sql="delete from unidad_medida where cod_um=$cod_um";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro borrado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido borrar el registro");history.go(-1)</script>';
}


mysqli_close($conexion);
?>