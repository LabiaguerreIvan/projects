<?php
include '../../conexion.php';

//declaracion de variables
// $cod_producto = $_POST['cod_producto'];
$nom_producto = $_POST['nom_producto'];
$marca = $_POST['descolgable_marca'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$estado = $_POST['descolgable_estado'];
$tipo_producto = $_POST['descolgable_tipoproducto'];
$unidad_medida = $_POST['descolgable_um'];

// //consultar datos
// $sql = "SELECT * FROM producto where cod_producto = $cod_producto";
// $datos = mysqli_query($conexion, $sql);
// if (mysqli_num_rows($datos)>0) {
//     echo '<script>alert("Error, el codigo ingresado ya existe");history.go(-1);</script>';
//     mysqli_close($conexion);
//     exit;
// }

//validaciones
if($nom_producto==""){
    echo '<script>alert("Ingrese un nombre para el producto");history.go(-1);</script>';    
    exit;
}


if($precio==""){
    echo '<script> alert("Indique el precio del producto");history.go(-1);</script>';
    exit;
}

if($stock==""){
    echo '<script> alert("Indique el stock del producto");history.go(-1);</script>';
    exit;
}

if($marca[0]==-1){
    echo '<script> alert("Seleccione una Marca valida");history.go(-1);</script>';
    exit;
}

if($estado[0]==-1){
    echo '<script> alert("Seleccione un Estado valido");history.go(-1);</script>';
    exit;
}

if($tipo_producto[0]==-1){
    echo '<script> alert("Seleccione un Tipo de Producto valido");history.go(-1);</script>';
    exit;
}

if($unidad_medida[0]==-1){
    echo '<script> alert("Seleccione una Unidad de Medida valida");history.go(-1);</script>';
    exit;
}


//insertar datos
$sql = "INSERT INTO producto ( nom_producto, marca, precio, stock, estado, tipoproducto, unidad_medida) VALUES ('$nom_producto', $marca[0], $precio, $stock, $estado[0], $tipo_producto[0], $unidad_medida[0])";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script> alert("Los datos se cargaron correctamente");history.go(-1);</script>';
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>';
}



mysqli_close($conexion);
?>
