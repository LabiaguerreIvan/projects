<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/estilo.css">
    <title>Tipo de Producto</title>
</head>
<body>
    <h1>Tipos de Productos</h1>
    <main>
        <form action="guardar/guardar_tipoproducto.php" method="POST">
    <!-- <p>
        <label for="cod_tipo">Código</label>
        <input type="number" name="cod_tipo" id="cod_tipo" placeholder="Ingrese un código para el tipo de producto">
    </p> -->
    <p>
        <label for="nom_tipo">Tipo de Producto</label>
        <input type="text" name="nom_tipo" id="nom_tipo" placeholder="Ingrese un tipo de producto">
    </p>
    <p>
        <label for="descolgable">Estado</label>
        <select name="descolgable[]" id="descolgable">
        <?php
        include '../conexion.php';

        $sql = "SELECT * from estado";
        $resultado = mysqli_query($conexion, $sql);
        
        echo '<option value="-1">Seleccione una opcion</option>';
        if (mysqli_num_rows($resultado)>0){
            while ($registro = mysqli_fetch_array($resultado)){
                echo '<option value="'.$registro['cod_estado'].'">'.$registro['nom_estado'].'</option>';
            }
        }
        
        mysqli_close($conexion);
        ?>
            </select>   
        
        <input type="submit" value="Guardar" name="btn-tipoproducto" id="btn-tipoproducto">
        <a onclick="history.go(-1);" target="_blank"><input class="volver" type="button" value="Volver"></a>
        <a href="registros/registro_tipoproducto.php" target="_blank"><input class="listado" type="button" value="Listado"></a>
    
    
    </form>
    </main>
    <footer>&copy;Labiaguerre Ivan</footer>
</body>
</html>