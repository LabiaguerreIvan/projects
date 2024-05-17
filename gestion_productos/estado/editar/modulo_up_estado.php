<!DOCTYPE html>
<?php
    include '../../conexion.php';
    $cod_estado = $_GET['cod'];
    
    $sql = "SELECT nom_estado FROM estado WHERE cod_estado = $cod_estado";
    $registro = mysqli_query($conexion, $sql);
    $nom_estado = mysqli_fetch_assoc($registro);

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
    <h1>Modificar Estado</h1>
    <main>
        <form action="update_estado.php" method="POST">
    <p>
        <!-- <label for="cod_estado">Código</label> -->
        <input type="hidden" name="cod_estado" id="cod_estado" value="<?php echo $_GET['cod'];?>">
    </p>
    <p>
        <label for="nom_estado">Descripción</label>
        <input type="text" name="nom_estado" id="nom_estado" value="<?php echo $nom_estado['nom_estado'];?>">
    </p>
        <input type="submit" value="Actualizar" name="btn-up-tipoproducto" id="btn-up-tipoproducto">
        <input class="volver" type="button" value="Volver" onclick="history.go(-1);">

    </form>
    </main>
</body>
</html>

