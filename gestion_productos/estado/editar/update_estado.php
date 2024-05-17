<?php
include '../../conexion.php';
$cod_estado = $_POST['cod_estado'];
$nom_estado = $_POST['nom_estado'];
$sql= "UPDATE estado SET nom_estado='$nom_estado' where cod_estado=$cod_estado";

$resultado = mysqli_query($conexion, $sql);

if($resultado){
echo '<script>alert("Registro modificado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido modificar el registro");history.go(-1)</script>';
}

mysqli_close($conexion);
?>