<!DOCTYPE html>
<?php
include '../../conexion.php';
    $cod_tipo = $_GET['cod'];
    $sql = "SELECT * FROM tipo_producto WHERE cod_tipo = $cod_tipo";
    $registro = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($registro);

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
    <h1>Modificar Tipo Producto</h1>
    <main>
        <form action="update_tipoproducto.php" method="POST">
    <p>
        <!-- <label for="cod_tipo">Código</label> -->
        <input type="hidden" name="cod_tipo" id="cod_tipo" value="<?php echo $_GET['cod'];?>">
    </p>
    <p>
        <label for="nom_tipo">Tipo de Producto</label>
        <input type="text" name="nom_tipo" id="nom_tipo" value="<?php echo $datos['nom_tipo']; ?>">
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
                if($datos['estado']==$registro['cod_estado']){
                    echo '<option value='.$registro['cod_estado'].' selected>'.$registro['nom_estado'].'</option>';
                }else{
                    echo '<option value="'.$registro['cod_estado'].'">'.$registro['nom_estado'].'</option>';
                }
            }
        }
        
        mysqli_close($conexion);
        ?>
            </select>   
        

        <input type="submit" value="Actualizar" name="btn-up-tipoproducto" id="btn-up-tipoproducto">
        <input class="volver" type="button" value="Volver" onclick="history.go(-1);">

    </form>
    </main>
</body>
</html>

