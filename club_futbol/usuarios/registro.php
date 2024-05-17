<?php
session_start();

// Verificar si hay una sesión activa
if (isset($_SESSION['active'])) {
    // Si hay una sesión activa, redirigir a otra página (puedes elegir la que desees)
    header("Location: /TP6/usuarios/login.php");
    exit();
}

// Resto del código de 'registro.php'
// ...

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    body {
      height: 100%;
    }

    .form-signin {
      max-width: 330px;
      padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }
  </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <form class="form-signin w-100 m-auto" action="actions/action_registerUser.php" method="POST">

    <div class="text-center">
      <a href="../index.php"><img class="d-block mx-auto mb-4" src="../assets/icons/futbol.svg" width="72" height="57"></a>
      <h2>Registrarse</h2>
    </div>

    <div class="row g-3 mt-4">
      <!-- NAME -->
      <div class="col-12">
        <label for="nom_usuario" class="form-label">Nombre y Apellido</label>
        <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" required>
      </div>


      <!-- DNI -->
      <div class="col-12">
        <label for="dni" class="form-label">DNI</label>
        <input type="number" class="form-control" type="number" id="dni" name="dni" required>
      </div>


      <!-- CORREO -->
      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>


      <!-- PASSWORD -->
      <div class="col-12">
        <label for="clave" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="clave" id="clave" required>
      </div>
      <!-- <div class="col-12">
      <label for="confirmar_clave" class="form-label">Confirmar Contraseña</label>
      <input type="password" class="form-control" id="confirmar_clave" name="confirmar_clave" required>
    </div> -->


      <!-- TIPO USUARIO -->

      <div class="col-md-7">
        <label for="tipo_usuario" class="form-label">Rol del Usuario</label>
        <select class="form-select" name="tipo_usuario" id="tipo_usuario" required>
          <?php
          include '../conexion.php';

          $sql = "SELECT * FROM tipo_usuarios";
          $resultado = mysqli_query($conexion, $sql);

          echo '<option value="-1" selected>Seleccione...</option>';
          if (mysqli_num_rows($resultado) > 0) {
            while ($datos = mysqli_fetch_array($resultado)) {
              echo '<option value=' . $datos['cod_tipo_usuario'] . '> ' . $datos['desc_tipo_usuario'] . ' </option>';
            }
          }
          ?>
        </select>
      </div>


      <!-- ESTADO -->
      <div class="col-md-5">
        <label for="estado_usuario" class="form-label">Estado</label>
        <select class="form-select" id="estado_usuario" name="estado_usuario" required>
          <?php
          include '../conexion.php';
          $sql = "SELECT * from estado_usuarios";
          $resultado = mysqli_query($conexion, $sql);
          echo '<option value="-1" selected>Seleccione...</option>';
          if (mysqli_num_rows($resultado) > 0) {
            while ($datos = mysqli_fetch_array($resultado)) {
              echo '<option value=' . $datos['cod_estado_usuario'] . '>' . $datos['desc_estado_usuario'] . '</option>';
            }
          }
          mysqli_close($conexion);
          ?>
        </select>
      </div>
    </div>

    <hr>

    <div class="col-12">
      <input class="btn btn-primary w-100 py-2" type="submit" id="btnSaveUser" name="btnSaveUser" value="Guardar">
      &nbsp;
      <a href="../index.php"><input class="btn btn-secondary w-100 py-2" value="Volver"></a>
    </div>
    
    <p class="mt-5 mb-3 text-body-secondary">&copy; Labiaguerre</p>

  </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>