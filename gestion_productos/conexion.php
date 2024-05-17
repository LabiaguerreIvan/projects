<?php
$conexion = mysqli_connect("localhost", "root","", "bdd1");

if (!$conexion){
    echo 'NO SE HA PODRIDO ESTABLECER LA CONEXION CON LA BASE DE DATOS';
    exit;
}

?>