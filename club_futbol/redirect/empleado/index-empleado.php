<!DOCTYPE html>
<?php
session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
    $datos = $_SESSION['usuario'];
} else {
    header("Location: /TP6/usuarios/logout.php");
    exit();
}
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INICIO</title>

    <!-- Extencionces para estilos generales CSS-->
    <link rel="stylesheet" href="/TP6/css/normalize.css">
    <link rel="stylesheet" href="/TP6/css/sweetalert2.css">
    <link rel="stylesheet" href="/TP6/css/material.min.css">
    <link rel="stylesheet" href="/TP6/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/TP6/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/TP6/css/main.css">

    <!-- Extencion para bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Extencionces para estilos generales JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/TP6/js/material.min.js"></script>
    <script src="/TP6/js/sweetalert2.min.js"></script>
    <script src="/TP6/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/TP6/js/main.js"></script>
</head>

<body>
    <!-- navLateral -->
    <section class="full-width navLateral">
        <div class="full-width navLateral-bg btn-menu"></div>
        <div class="full-width navLateral-body">
            <div class="full-width navLateral-body-logo text-center tittles bg-info">
                <i class="zmdi zmdi-close btn-menu"></i> Panel de Control
            </div>
            <figure class="full-width navLateral-body-tittle-menu">
                <div>
                    <img src="/TP6/assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
                </div>
                <figcaption>
                    <span>
                        <br>
                        <?php
                        if (isset($datos['nom_usuario'])) {
                            echo $datos['nom_usuario'];
                        } else {
                            echo "Nombre de Usuario Desconocido";
                        }
                        ?>
                        <br>
                        <small>
                            <?php
                            if (isset($datos['desc_tipo_usuario'])) {
                                echo $datos['desc_tipo_usuario'];
                            } else {
                                echo "Tipo de Usuario Desconocido";
                            }
                            ?>
                        </small>
                    </span>

                </figcaption>
            </figure>
            <nav class="full-width">
                <ul class="full-width list-unstyle menu-principal">
                    <li class="full-width">
                        <a href="/TP6/redirect/administrador/index-administrador.php" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-view-dashboard"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                INICIO
                            </div>
                        </a>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="#!" class="full-width btn-subMenu">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-case"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                ADMINISTRACION
                            </div>
                            <span class="zmdi zmdi-chevron-left"></span>
                        </a>
                        <ul class="full-width menu-principal sub-menu-options">

                            <li class="full-width divider-menu-h"></li>
                            <li class="full-width">
                                <a href="#!" class="full-width btn-subMenu">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-face"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        USUARIOS
                                    </div>
                                    <span class="zmdi zmdi-chevron-left"></span>
                                </a>
                                <ul class="full-width menu-principal sub-menu-options">
                                    <li class="full-width">
                                        <a href="/TP6/redirect/administrador/usuarios/altaUsuario.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-account"></i>
                                            </div>
                                            <div class="navLateral-body-cr">
                                                NUEVO USUARIO
                                            </div>
                                        </a>
                                    </li>
                                    <li class="full-width">
                                        <a href="/TP6/redirect/administrador/usuarios/listado_us/listadoUsuarios.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="navLateral-body-cr">
                                                LISTADO DE USUARIOS
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="full-width">
                                <a href="#!" class="full-width btn-subMenu">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-face"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        JUGADORES
                                    </div>
                                    <span class="zmdi zmdi-chevron-left"></span>
                                </a>
                                <ul class="full-width menu-principal sub-menu-options">
                                    <li class="full-width">
                                        <a href="/TP6/redirect/administrador/jugadores/altaJugador.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-account"></i>
                                            </div>
                                            <div class="navLateral-body-cr">
                                                NUEVO JUGADOR
                                            </div>
                                        </a>
                                    </li>
                                    <li class="full-width">
                                        <a href="/TP6/redirect/administrador/jugadores/listado_ju/listadoJugadores.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="navLateral-body-cr">
                                                LISTADO DE JUGADORES
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                    </li>

                </ul>
            </nav>
        </div>
    </section>
    <!-- pageContent -->
    <section class="full-width pageContent bg-body-secondary">
        <!-- navBar -->
        <div class="full-width navBar">
            <div class="full-width navBar-options">
                <i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>
                <div class="mdl-tooltip" for="btn-menu">Ocultar / Mostrar MENU</div>
                <nav class="navBar-options-list">
                    <ul class="list-unstyle">
                        <li class="btn-Notification" id="notifications">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="mdl-tooltip" for="notifications">Notificationes</div>
                        </li>
                        <li class="btn-exit" id="btn-exit">
                            <i class="zmdi zmdi-power"></i>
                            <div class="mdl-tooltip" for="btn-exit">Salir</div>
                        </li>
                        <li class="text-condensedLight noLink"><small><?php echo $datos['nom_usuario'] ?></small></li>
                        <li class="noLink">
                            <figure>
                                <img src="/TP6/assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
                            </figure>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <section class="full-width header-well">
            <div class="full-width header-well-icon">
                <i class="zmdi zmdi-washing-machine"></i>
            </div>
            <div class="full-width header-well-text">
                <p class=""><b>Modulo de Inicio</b></p>
            </div>
        </section>

        <div class="mdl-tabs__panel is-active" id="tabNewProduct">
            <div class="mdl-grid ">
                <div class="mdl-cell mdl-cell--12-col ">
                    <div class="full-width panel mdl-shadow--2dp ">

                        <div class="full-width panel-content bg-light-subtle">
                            <form method="POST" action="usuarios/editar_us/updateUsuario.php">
                                <!-- INFORMACIÓN BASICA -->
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--12-col">
                                        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
                                            &nbsp; DATOS DEL USUARIO</legend><br>
                                    </div>

                                    <!-- CODIGO -->
                                    <input type="hidden" name="cod_usuario" value="<?php echo $datos['cod_usuario']; ?>">



                                    <!-- DNI -->
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="dni" name="dni" value="<?php echo $datos['dni']; ?>">
                                            <label class="mdl-textfield__label" for="dni">DNI</label>
                                            <span class="mdl-textfield__error">DNI invalido</span>
                                        </div>
                                    </div>

                                    <!-- NOMBRE -->
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" pattern="/^[a-zA-Z-áéíóúÁÉÍÓÚ ]+$/" id="nom_usuario" name="nom_usuario" value="<?php echo $datos['nom_usuario']; ?>">
                                            <label class="mdl-textfield__label" for="nom_usuario">Nombre</label>
                                            <span class="mdl-textfield__error">Ingrese un nombre válido</span>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="email" id="email" name="email" value="<?php echo $datos['email']; ?>">
                                            <label class="mdl-textfield__label" for="email">Correo</label>
                                            <span class="mdl-textfield__error">Dirección de correo invalida</span>
                                        </div>
                                    </div>

                                    <!-- PASSWORD -->
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="password" id="clave" name="clave">
                                            <label class="mdl-textfield__label" for="clave">Contraseña</label>
                                        </div>
                                    </div>

                                    <!-- TIPO USUARIO -->
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <select class="mdl-textfield__input" id="tipo_usuario" name="tipo_usuario">
                                            <?php
                                            include '../../conexion.php';
                                            $sql = "SELECT * from tipo_usuarios";
                                            $resultado = mysqli_query($conexion, $sql);
                                            echo '<option value="-1">Rol del Usuario</option>';
                                            if (mysqli_num_rows($resultado) > 0) {
                                                while ($registro = mysqli_fetch_array($resultado)) {
                                                    $selected = ($registro['cod_tipo_usuario'] == $datos['tipo_usuario']) ? 'selected' : '';
                                                    echo '<option value="' . $registro['cod_tipo_usuario'] . '" ' . $selected . '>' . $registro['desc_tipo_usuario'] . '</option>';
                                                }
                                            }
                                            mysqli_close($conexion);
                                            ?>
                                        </select>
                                    </div>

                                    <!-- ESTADO -->
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <select class="mdl-textfield__input" id="estado_usuario" name="estado_usuario" value="<?php echo $datos['estado_usuario']; ?>">
                                            <?php
                                            include '../../conexion.php';
                                            $sql = "SELECT * from estado_usuarios";
                                            $resultado = mysqli_query($conexion, $sql);
                                            echo '<option value="-1">Estado</option>';
                                            if (mysqli_num_rows($resultado) > 0) {
                                                while ($registro = mysqli_fetch_array($resultado)) {
                                                    $selected = ($registro['cod_estado_usuario'] == $datos['estado_usuario']) ? 'selected' : '';
                                                    echo '<option value="' . $registro['cod_estado_usuario'] . '" ' . $selected . '>' . $registro['desc_estado_usuario'] . '</option>';
                                                }
                                            }
                                            mysqli_close($conexion);
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-success" id="btn-guardar">
                                        <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                                    </button>
                                <p class="mdl-tooltip" for="btn-guardar" id="btn-guardar">Guardar
                                </p>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


<!-- Extencion para bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Extencion para "iconos" -->
<script src="https://kit.fontawesome.com/f0d1b5e3e0.js" crossorigin="anonymous"></script>


</html>