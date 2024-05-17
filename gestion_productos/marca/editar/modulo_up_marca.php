<!DOCTYPE html>

<?php
    include '../../conexion.php';
    $cod_marca = $_GET['cod'];

    $sql = "SELECT nom_marca FROM marca WHERE cod_marca = $cod_marca"; 
    $registro = mysqli_query($conexion, $sql);
    $nom_marca = mysqli_fetch_assoc($registro);
    
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
    <h1>Modificar Marca</h1>
    <main>
        <form action="update_marca.php" method="POST">
    <p>
        <!-- <label for="cod_marca">Código</label> -->
        <input type="hidden" name="cod_marca" id="cod_marca" value="<?php echo $_GET['cod']; ?>">
    </p>
    <p>
        <label for="nom_marca">Marca</label>
        <input type="text" name="nom_marca" id="nom_marca" value="<?php echo $nom_marca['nom_marca']; ?>" value='' >
    </p>
    

        <input type="submit" value="Actualizar" name="btn-up-marca" id="btn-up-marca">
        <input class="volver" type="button" value="Volver" onclick="history.go(-1);">

    </form>
    </main>
</body>
</html>

