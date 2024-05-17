<?php
include '../../conexion.php';

//declaracion de variables
$cod_producto = $_POST['cod_producto'];
$nom_producto = $_POST['nom_producto'];
$marca = $_POST['descolgable_marca'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$estado = $_POST['descolgable_estado'];
$tipo_producto = $_POST['descolgable_tipoproducto'];
$unidad_medida = $_POST['descolgable_um'];

$sql = "UPDATE producto SET nom_producto='$nom_producto', marca = $marca[0], precio = $precio, stock = $stock , estado = $estado[0], tipoproducto = $tipo_producto[0], unidad_medida = $unidad_medida[0] WHERE cod_producto = $cod_producto";


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
$resultado = mysqli_query($conexion, $sql);
if($resultado){
echo '<script>alert("Registro modificado con exito");history.go(-1)</script>';
}else{
echo '<script>alert("No se ha podido modificar el registro");history.go(-1)</script>';
}

mysqli_close($conexion);
?>