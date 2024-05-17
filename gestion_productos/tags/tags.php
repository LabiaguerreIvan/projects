<?php
if ($_SESSION["autendicado"]){
    //habilitar el modulo para el usuario logueado
}else{
    //redireccionar a logout para finalizar la sesion
}

//logout
session_star();
unset($_SESSION["autenticado"]);
session_destroy();


//abrir la conexion a la bdd
$conexion = mysqli_connect("localhost", "root","", "nombre_bdd");
if (!$conexion){
    echo 'CONEXION CON LA BDD NO ESTABLECIDA';
    exit;
}
//conexion
include 'conexion.php';


//declaro variables
$cod_producto = $_POST['cod_producto'];
$nom_producto = $_POST['nom_producto'];
$cod_marca = $_POST['cod_marca'];
$cod_precio = $_POST['cod_precio'];
$cod_stock = $_POST['cod_stock'];
$cod_medida = $_POST['cod_medida'];
$cod_tipoproducto = $_POST['cod_tipoproducto'];
$cod_estado = $_POST['cod_estado'];

//armar la query: insert
$sql = "INSERT INTO producto (cod_producto, nom_producto) VALUES ()";

//ejecutar la query  sobre la bdd
$resultado = mysqli_query($conexion, $sql);

//verificar/controlar el resultado de la ejecucion
//dar feedback al usuario
if($resultado){
    echo '<script> alert("Los datos se cargaron correctamente");</script>';    
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>'; 
}


//validacion numerica
if(!($numero_camiseta >= 1 && $numero_camiseta <= 25)){
    echo '<script>alert("Seleccione un numero de camiseta valido");history.go(-1);</script>';
    exit();
}

//cerrar la conexion
mysqli_close($conexion);

//moverse entre archivos (regresar o avanzar)
'<script>history.go(-1);</script>';
'<script>window.location"nombredelarchivo";</script>';



|| strlen($cod_producto) <= 0

//validaciones
if ($txtnombre == "" ){
    echo "El nombre ingresado no es válido";
    echo '<a href= "index.html">Volver</a>';
}


//funcion para validacion de dni//
if (strlen($dni) >=7 && strlen($dni) <=8)
echo "El dni ingresado no es valido"
exit;

//funciones de agregado
select SUM(total=comprobantes)as total from comprobantes

//validacion dni
if ($dni<=0 || $dni>10000000){
    echo "El dni ingresado no es valido";
    echo '<a href="index.html">Volver</a>';
}

//consultar datos
$sql = "SELECT * FROM unidad_medida where cod_um = $cod_um";
$datos = mysqli_query($conexion, $sql);
if (mysqli_num_rows($datos)>0) {
    echo '<script>alert("Error, el codigo ingresado ya existe");history.go(-1);</script>';
    mysqli_close($conexion);
    exit;
}

//consulta de campos con inner join
select * from tipo_producto inner join producto on producto.cod_tipo= tipo_producto.cod_tipo

//insertar datos
$sql = "INSERT INTO unidad_medida(cod_um, nom_um, abrev) VALUES ($cod_um, '$nom_um', '$abrev')";
$resultado = mysqli_query($conexion, $sql);
if($resultado){
    echo '<script> alert("Los datos se cargaron correctamente");history.go(-1);</script>';
}else{
    echo '<script> alert("ERROR AL CARGAR LOS DATOS");history.go(-1);</script>';
}

?>