<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Tipo de Producto</title>
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
<h1>Listado Tipo de Producto</h1>
<table>
<?php
include '../../conexion.php';
    $sql = "SELECT *, estado.nom_estado FROM tipo_producto inner join estado on tipo_producto.estado=estado.cod_estado";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<tr><th>Codigo</th><th>Nombre</th><th>Estado</th><th>Editar</th><th>Borrar</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['cod_tipo']."</td>";
        echo "<td>".$row['nom_tipo']."</td>";
        echo "<td>".$row['nom_estado']."</td>";
        echo '<td><a href="../editar/modulo_up_tipoproducto.php?cod='.$row['cod_tipo'].'"><button>Editar</button></td>';
        echo '<td><a href="../borrar/borrar_tipoproducto.php?cod='.$row['cod_tipo'].'"><button>Borrar</button></a></td>';
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