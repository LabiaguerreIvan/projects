<?php
include '../../conexion.php';
$cod_marca = $_POST['cod_marca'];
$nom_marca = $_POST['nom_marca'];
$sql= "UPDATE marca SET nom_marca='$nom_marca' where cod_marca=$cod_marca";


$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro modificado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido modificar el registro");history.go(-1)</script>';
}

mysqli_close($conexion);
?>