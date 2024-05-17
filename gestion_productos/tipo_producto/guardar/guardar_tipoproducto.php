<?php
include '../../conexion.php';

// //declaracion de variables
// $cod_tipo = $_POST['cod_tipo'];
$nom_tipo = $_POST['nom_tipo'];
$estado = $_POST['descolgable'];

//traer datos de "GUARDAR"
if(isset($_POST['btn-tipoproducto'])){
//consultar datos
// $sql = "SELECT * FROM tipo_producto where cod_tipo = $cod_tipo";
// $datos = mysqli_query($conexion, $sql);
// if (mysqli_num_rows($datos)>0) {
//     echo '<script>alert("Error, el codigo ingresado ya existe");history.go(-1);</script>';
//     mysqli_close($conexion);
//     exit;
// }

//insertar datos
$sql = "INSERT INTO tipo_producto(nom_tipo, estado) VALUES ('$nom_tipo', $estado[0])";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script> alert("Los datos se han guardado correctamente");history.go(-1);</script>';
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>';
    }
}

mysqli_close($conexion);
?>