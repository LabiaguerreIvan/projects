<!DOCTYPE html>
<?php
    include '../../conexion.php';
    $cod_producto = $_GET['cod'];
    $sql = "SELECT * FROM producto WHERE cod_producto = $cod_producto"; 
    $registro= mysqli_query($conexion, $sql);
    $datos= mysqli_fetch_assoc($registro);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilo/estilo.css">
    <title>Modificar</title>
</head>
<body>
    <h1>Modificar Producto</h1>
    <main>
        <form action="update_productos.php" method="POST">
    <p>
        <!-- <label for="cod_producto">Código</label> -->
        <input type="hidden" name="cod_producto" id="cod_producto" value="<?php echo $_GET['cod']; ?>">
    </p>
    <p>
        <label for="nom_producto">Nombre</label>
        <input type="text" name="nom_producto" id="nom_producto" value="<?php echo $datos['nom_producto']; ?>">
            </p>
            <p>
                <label for="descolgable_marca">Marca</label>
                <select name="descolgable_marca[]" id="descolgable_marca">
                    <?php
                    include '../../conexion.php';
                $sql= "SELECT * from marca";
                $resultado = mysqli_query($conexion, $sql);

                echo '<option value="-1">Seleccione una opcion</option>';
                
                if (mysqli_num_rows($resultado)>0){
                    while ($registro = mysqli_fetch_array($resultado)){
                        if($datos['marca']==$registro['cod_marca']){
                            echo '<option value='.$registro['cod_marca'].' selected>'.$registro['nom_marca'].'</option>';

                        }else{    
                        echo '<option value='.$registro['cod_marca'].'>'.$registro['nom_marca'].'</option>';
                        }
                    }
                }
                mysqli_close($conexion);
                ?>
                </select>
            </p>
            <p>
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" value="<?php echo $datos['precio']; ?>">
            </p>
            <p>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="<?php echo $datos['stock'];?>">
            </p>
            <p>
                <label for="descolgable_estado">Estado</label>
                <select name="descolgable_estado[]" id="descolgable_estado">
                    <?php
                    include '../../conexion.php';
                    $sql = "SELECT * from estado";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    echo '<option value="-1">Seleccione una opcion</option>';
                    if (mysqli_num_rows($resultado)>0){
                        while ($registro = mysqli_fetch_array($resultado)){
                            if ($datos['estado']==$registro['cod_estado']){
                                echo '<option value='.$registro['cod_estado'].' selected>'.$registro['nom_estado'].'</option>';
                            }else{
                            echo '<option value="'.$registro['cod_estado'].'">'.$registro['nom_estado'].'</option>';
                        }
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
                    include '../../conexion.php';
                    $sql = "SELECT * from tipo_producto";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    echo '<option value="-1">Seleccione una opcion</option>';
                    if (mysqli_num_rows($resultado)>0){
                        while ($registro = mysqli_fetch_array($resultado)){
                            if ($datos['tipoproducto']==$registro['cod_tipo']){
                                echo '<option value='.$registro['cod_tipo'].' selected>'.$registro['nom_tipo'].'</option>';
                            }else{
                            echo '<option value='.$registro['cod_tipo'].'>'.$registro['nom_tipo'].'</option>';
                        }
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
                            include '../../conexion.php';
                            $sql= "SELECT * from unidad_medida";
                            $resultado= mysqli_query($conexion, $sql);

                            echo '<option value="-1">Seleccione una opcion</option>';
                            if (mysqli_num_rows($resultado)>0){
                                while ($registro = mysqli_fetch_array($resultado)){
                                    if($datos['unidad_medida']==$registro['cod_um']){
                                    echo '<option value='.$registro['cod_um'].' selected>'.$registro['nom_um'].'</option>';
                                }else{
                                    echo '<option value='.$registro['cod_um'].'>'.$registro['nom_um'].'</option>';    
                                }
                            }
                        }
                            mysqli_close($conexion);
                            ?>
                        </select>
                    </p>

        <input type="submit" value="Actualizar" name="btn-up-producto" id="btn-up-producto">
        <input class="volver" type="button" value="Volver" onclick="history.go(-1);">

    </form>
    </main>
</body>
</html>

