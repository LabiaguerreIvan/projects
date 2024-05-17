<?php
include '../../conexion.php';

//declaracion de variables
// $cod_um = $_POST['cod_um'];
$nom_um = $_POST['nom_um'];
$abrev = $_POST['abrev'];

//consultar datos
// $sql = "SELECT * FROM unidad_medida where cod_um = $cod_um";
// $datos = mysqli_query($conexion, $sql);
// if (mysqli_num_rows($datos)>0) {
//     echo '<script>alert("Error, el codigo ingresado ya existe");history.go(-1);</script>';
//     mysqli_close($conexion);
//     exit;
// }


if($nom_um == ""){
    echo '<script>alert("Ingrese una unidad de medida valida");history.go(-1);</script>';
    exit;
}

if($abrev==""){
    echo '<script>alert("Ingrese una abreviatura valida");history.go(-1);</script>';
    exit;
}
//insertar datos
$sql = "INSERT INTO unidad_medida(nom_um, abrev) VALUES ('$nom_um', '$abrev')";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script> alert("Los datos se cargaron correctamente");history.go(-1);</script>';
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>';
}



mysqli_close($conexion);
?>