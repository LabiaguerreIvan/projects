<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Estado</title>
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
<h1>Tabla de Estado</h1>
<table>
<?php
include '../../conexion.php';
    $sql = "SELECT * FROM estado";
//echo $sql;
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<tr><th>Codigo</th><th>Descripción Estado</th><th>Editar</th><th>Borrar</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['cod_estado']."</td>";
        echo "<td>".$row['nom_estado']."</td>";
        echo '<td><a href="../editar/modulo_up_estado.php?cod='.$row['cod_estado'].'"><button>Editar</button></td>';
        echo '<td><a href="../borrar/borrar_estado.php?cod='.$row['cod_estado'].'"><button>Borrar</button></a></td>';
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