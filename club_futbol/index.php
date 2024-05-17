<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="px-4 py-5 my-5 text-center">
  <a href="../index.php"><img class="d-block mx-auto mb-4" src="assets/icons/futbol.svg" width="72" height="57"></a>
    <h1 class="display-5 fw-bold text-body-emphasis">Club de Futbol "Kairo"</h1>
    <div class="col-lg-6 mx-auto">
  <hr>
      <p class="lead mb-4">Bienvenido a la aplicación de gestión para el club de futbol "Kairo"</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="usuarios/login.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Iniciar Sesión</button></a>
        <a href="usuarios/registro.php"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Registrese</button></a>
      </div>
    </div>
  </div>

  <footer class="fixed-bottom text-center">
    <p>&copy; 2023 Labiaguerre Ivan</p>
  </footer>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>