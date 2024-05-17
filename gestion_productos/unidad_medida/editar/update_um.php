<?php
include '../../conexion.php';
$cod_um = $_POST['cod_um'];
$nom_um = $_POST['nom_um'];
$abrev = $_POST['abrev'];

$sql= "UPDATE unidad_medida SET nom_um='$nom_um', abrev= '$abrev' where cod_um=$cod_um";

$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script>alert("Registro actualizado con exito");history.go(-1)</script>';
    }else{
    echo '<script>alert("No se ha podido actualizado el registro");history.go(-1)</script>';
    }
    
mysqli_close($conexion);
?>