<?php
include '../../conexion.php';

// //declaracion de variables
// $cod_marca = $_POST['cod_marca'];
$nom_marca = $_POST['nom_marca'];

//consultar datos
// $sql = "SELECT * FROM marca where cod_marca = $cod_marca";
// $datos = mysqli_query($conexion, $sql);
// if (mysqli_num_rows($datos)>0) {
//     echo '<script>alert("Error, el codigo ingresado ya existe");history.go(-1);</script>';
//     mysqli_close($conexion);
//     exit;
// }


if($nom_marca == ""){
    echo '<script>alert("Ingrese una marca");history.go(-1);</script>';
    exit;
}

//insertar datos
$sql = "INSERT INTO marca( nom_marca) VALUES ('$nom_marca')";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script> alert("Los datos se cargaron correctamente");history.go(-1);</script>';
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>';
}



mysqli_close($conexion);
?>