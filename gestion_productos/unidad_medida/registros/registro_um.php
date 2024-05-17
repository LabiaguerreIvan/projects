<!DOCTYPE html>
<html>
<head>
    <title>Tabla Unidad de Medida</title>
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
<h1>Listado Unidad de Medida</h1>
<table>
<?php
include '../../conexion.php';
    $sql = "SELECT * FROM unidad_medida";
//echo $sql;
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<tr><th>Codigo</th><th>Nombre</th><th>Abreviatura</th><th>Editar</th><th>Borrar</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['cod_um']."</td>";
        echo "<td>".$row['nom_um']."</td>";
        echo "<td>".$row['abrev']."</td>";
        echo '<td><a href="../editar/modulo_up_um.php?cod='.$row['cod_um'].'"><button>Editar</button></td>';
        echo '<td><a href="../borrar/borrar_um.php?cod='.$row['cod_um'].'"><button>Borrar</button></a></td>';
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