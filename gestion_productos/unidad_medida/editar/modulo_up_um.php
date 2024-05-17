<!DOCTYPE html>
<?php
include '../../conexion.php';

    $cod_um = $_GET['cod'];
    $sql = "SELECT nom_um, abrev FROM unidad_medida WHERE cod_um = $cod_um";
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
    <h1>Modificar Unidad de Medida</h1>
    <main>
        <form action="update_um.php" method="POST">
    <p>
        <!-- <label for="cod_tipo">Código</label> -->
        <input type="hidden" name="cod_um" id="cod_um" value="<?php echo $_GET['cod'];?>">
    </p>
    <p>
        <label for="nom_um">Unidad de Medida</label>
        <input type="text" name="nom_um" id="nom_um" value="<?php echo $datos['nom_um'];?>">
    </p>
    <p>
        <label for="abrev">Abreviatura</label>
        <input type="text" name="abrev" id="abrev" value="<?php echo $datos['abrev'];?>">
    </p>    

        <input type="submit" value="Actualizar" name="btn-up-um" id="btn-up-um">
        <input class="volver" type="button" value="Volver" onclick="history.go(-1);">

    </form>
    </main>
</body>
</html>

