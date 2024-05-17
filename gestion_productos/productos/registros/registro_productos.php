<!DOCTYPE html>
<html>
<head>
    <title>Tabla Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #C0C7E4;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<main>
<h1>Listado de Productos</h1>
<table>
<?php
include '../../conexion.php';
    $sql = "SELECT producto.*,marca.nom_marca, estado.nom_estado, tipo_producto.nom_tipo, unidad_medida.nom_um, unidad_medida.abrev FROM producto 
    inner join marca on producto.marca=marca.cod_marca 
    inner join estado on producto.estado=estado.cod_estado 
    inner join tipo_producto on producto.tipoproducto=tipo_producto.cod_tipo 
    inner join unidad_medida on producto.unidad_medida=unidad_medida.cod_um";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<tr>
    <th>Codigo</th>
    <th>Nombre</th>
    <th>Marca</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Estado</th>
    <th>Tipo Producto</th>
    <th>Unidad de Medida</th>
    <th>Editar</th>
    <th>Borrar</th>
    </tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['cod_producto']."</td>";
        echo "<td>".$row['nom_producto']."</td>";
        echo "<td>".$row['nom_marca']."</td>";
        echo "<td>".$row['precio']."</td>";
        echo "<td>".$row['stock']."</td>";
        echo "<td>".$row['nom_estado']."</td>";
        echo "<td>".$row['nom_tipo']."</td>";
        echo "<td>".$row['abrev']."</td>";
        echo '<td><a href="../editar/modulo_up_productos.php?cod='.$row['cod_producto'].'"><button>Editar</button></td>';
        echo '<td><a href="../borrar/borrar_producto.php?cod='.$row['cod_producto'].'"><button>Borrar</button></a></td>';
        echo "</tr>";
    
    }
} else {
    echo "No se encontraron resultados";
}

mysqli_close($conexion);
?>

</table>
</main>
</body>
</html>