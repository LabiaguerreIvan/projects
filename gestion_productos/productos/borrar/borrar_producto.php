<?php
include '../../conexion.php';
$cod_producto = $_GET['cod'];

if($cod_producto<=0){
    echo 'cartel';
    exit;
}
$sql="delete from producto where cod_producto=$cod_producto";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro borrado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido borrar el registro");history.go(-1)</script>';
}


mysqli_close($conexion);
?>