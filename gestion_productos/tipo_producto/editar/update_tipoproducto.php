<?php
include '../../conexion.php';
$cod_tipo = $_POST['cod_tipo'];
$nom_tipo = $_POST['nom_tipo'];
$estado = $_POST['descolgable_estado'];

$sql= "UPDATE tipo_producto SET nom_tipo ='$nom_tipo', estado = $estado[0] where cod_tipo = $cod_tipo";

$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro modificado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido modificar el registro");history.go(-1)</script>';
}

mysqli_close($conexion);
?>