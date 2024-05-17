<?php
include '../../conexion.php';

//declaracion de variables
$cod_estado = $_POST['cod_estado'];
$nom_estado = $_POST['nom_estado'];

//consultar datos
$sql = "SELECT * FROM estado where cod_estado = $cod_estado";
$datos = mysqli_query($conexion, $sql);
if (mysqli_num_rows($datos)>0) {
    echo '<script>alert("Error, el codigo ingresado ya existe");history.go(-1);</script>';
    mysqli_close($conexion);
    exit;
}

if ($nom_estado == ""){
    echo '<script>alert("Ingrese un estado");history.go(-1);</script>';
    exit;
}

//insertar datos
$sql = "INSERT INTO estado(cod_estado, nom_estado) VALUES ($cod_estado, '$nom_estado')";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script> alert("Los datos se cargaron correctamente");history.go(-1);</script>';
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>';
}



mysqli_close($conexion);
?>