<?php
include '../../conexion.php';
$cod_marca = $_GET['cod'];

if($cod_marca<=0){
    echo 'ERROR';
    exit;
}
$sql="delete from marca where cod_marca=$cod_marca";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro borrado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido borrar el registro");history.go(-1)</script>';
}


mysqli_close($conexion);
?>