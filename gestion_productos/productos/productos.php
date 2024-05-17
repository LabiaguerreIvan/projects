<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/estilo.css">
    <title>Productos</title>
</head>
<body>
    <h1>Carga de Productos</h1>

    <main>
        <form method="post" action="guardar/guardar_productos.php" >
        <div class="eso">    
        <!-- <p>
                <label for="cod_producto">Código</label>
                <input type="number" name="cod_producto" id="cod_producto" placeholder="Ingrese un codigo para el producto">
            </p> -->
            <p>
                <label for="nom_producto">Nombre</label>
                <input type="text" name="nom_producto" id="nom_producto" placeholder="Ingrese un nombre para el producto">
            </p>
            <p>
                <label for="descolgable_marca">Marca</label>
                <select name="descolgable_marca[]" id="descolgable_marca">
                    <?php
                    include '../conexion.php';
                $sql= "SELECT * from marca";
                $resultado = mysqli_query($conexion, $sql);
                echo '<option value="-1">Seleccione una opcion</option>';
                if (mysqli_num_rows($resultado)>0){
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo '<option value='.$registro['cod_marca'].'>'.$registro['nom_marca'].'</option>';
                    }
                }
                mysqli_close($conexion);
                ?>
                </select>
            </p>
            <p>
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Ingrese un precio para el producto">
            </p>
            <p>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" placeholder="Indique una cantidad de stock para el producto">
            </p>
            <p>
                <label for="descolgable_estado">Estado</label>
                <select name="descolgable_estado[]" id="descolgable_estado">
                    <?php
                    include '../conexion.php';
            
                    $sql = "SELECT * from estado";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    echo '<option value="-1">Seleccione una opcion</option>';
                    if (mysqli_num_rows($resultado)>0){
                        while ($registro = mysqli_fetch_array($resultado)){
                            echo '<option value='.$registro['cod_estado'].'>'.$registro['nom_estado'].'</option>';
                        }
                    }
                    
                    mysqli_close($conexion);
                    ?>
                        </select>  
            </p>
            <p>
                <label for="descolgable_tipoproducto">Tipo de Producto</label>
                <select name="descolgable_tipoproducto[]" id="descolgable_tipoproducto">
                    <?php
                    include '../conexion.php';
                    
                    $sql = "SELECT * from tipo_producto where cod_tipo";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    echo '<option value="-1">Seleccione una opcion</option>';
                    if (mysqli_num_rows($resultado)>0){
                        while ($registro = mysqli_fetch_array($resultado)){
                            echo '<option value='.$registro['cod_tipo'].' >'.$registro['nom_tipo'].'</option>';
                        }
                    }
                    
                    mysqli_close($conexion);
                    ?>
                        </select>   
                    </p>
                    <p>
                        <label for="descolgable_um">Unidad de Medida</label>
                        <select name="descolgable_um[]" id="descolgable_um">
                            <?php
                            include '../conexion.php';
                            $sql= "SELECT * from unidad_medida";
                            $resultado= mysqli_query($conexion, $sql);
                            echo '<option value="-1">Seleccione una opcion</option>';
                            if (mysqli_num_rows($resultado)>0){
                                while ($registro = mysqli_fetch_array($resultado)){
                                    echo '<option value='.$registro['cod_um'].' >'.$registro['nom_um'].'</option>';
                                }
                            }
                            mysqli_close($conexion);
                            ?>
                        </select>
                    </p>
                    <input type="submit" value="Guardar" name="btn-producto" id="btn-producto">
            <a onclick="history.go(-1)" target="_blank"><input  type="button" value="Volver"></a>
            <a href="registros/registro_productos.php" target="_blank"><input class="listado" type="button" value="Listado"></a>

        </form>
    </main>
    <footer>&copy; Labiaguerre Ivan</footer>
</div>
</body>
</html>
