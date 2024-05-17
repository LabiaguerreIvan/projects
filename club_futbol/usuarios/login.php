<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Inicio de Sesion</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      height: 100%;
    }

    .form-signin {
      max-width: 360px;
      padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }
  </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <main class="form-signin w-100 m-auto">
    <form class="mt-2" action="actions/users.php" method="POST">
      <div class="py-5 text-center">
        <a href="../index.php"><img class="d-block mx-auto mb-4" src="../assets/icons/futbol.svg" width="72" height="57"></a>
        <h2>Iniciar Sesión</h2>
      </div>

      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@gmail.com">
        <label for="email">Email</label>
      </div>
      <div class="form-floating mt-2">
        <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
        <label for="clave">Contraseña</label>
      </div>

      <p>
      <h6>¿Aún no tienes una cuenta? <a href="registro.php">Registrate aqui</a></h6>
      </p>
      <hr>
      <button class="btn btn-primary w-100 py-2" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-body-secondary">&copy; Labiaguerre</p>
    </form>
  </main>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>