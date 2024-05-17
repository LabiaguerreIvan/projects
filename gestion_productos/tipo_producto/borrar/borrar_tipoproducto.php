<?php
include '../../conexion.php';
$cod_tipo = $_GET['cod'];


$sql="delete from tipo_producto where cod_tipo=$cod_tipo";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro borrado con exito");window.location="../registros/registro_tipoproducto.php"</script>';
}else{
echo '<script>alert("No se ha podido borrar el registro");window.location="../registros/registro_tipoproducto.php"</script>';
}


mysqli_close($conexion);
?>