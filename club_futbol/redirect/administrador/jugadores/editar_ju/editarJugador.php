<!DOCTYPE html>
<?php
session_start();
include '../../../../conexion.php';
if (isset($_SESSION['usuario'])) {
	$datos_usuario = $_SESSION['usuario'];
} else {
	header("Location: /TP6/usuarios/logout.php");
	exit();
}

$cod_jugador = $_GET['cod_jugador'];
$sql = "SELECT * FROM jugadores WHERE cod_jugador = $cod_jugador";
$registro = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_assoc($registro);

?>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Jugadores</title>

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
			<div class="full-width navLateral-body-logo bg-success text-center tittles">
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
						if (isset($datos_usuario['nom_usuario'])) {
							echo $datos_usuario['nom_usuario'];
						} else {
							echo "Nombre de Usuario Desconocido";
						}
						?>
						<br>
						<small>
							<?php
							if (isset($datos_usuario['desc_tipo_usuario'])) {
								echo $datos_usuario['desc_tipo_usuario'];
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
	<section class="full-width pageContent">
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
						<li class="text-condensedLight noLink"><small><?php echo $datos_usuario['nom_usuario'] ?></small></li>
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
				<p class="text-condensedLight">
					Módulo de edicion - Jugadores</p>
			</div>
		</section>
		<!-- <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect"> -->
		<div class="mdl-tabs__tab-bar">
			<a href="../altaJugador.php" class="mdl-tabs__tab is-active">NUEVO</a>
			<a href="../listado_ju/listadoJugadores.php" class="mdl-tabs__tab">LISTADO</a>
		</div>
		<!-- </div> -->

		<div class="mdl-tabs__panel is-active" id="tabNewProduct">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-success text-center tittles">
							Editar Jugador
						</div>
						<div class="full-width panel-content">
							<form method="POST" action="updateJugador.php">
								<!-- INFORMACIÓN BASICA -->
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--12-col">
										<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
											&nbsp; INFORMACIÓN BÁSICA</legend><br>
									</div>

									<!-- CODIGO -->
									<input type="hidden" name="cod_jugador" value="<?php echo $datos['cod_jugador']; ?>">


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
											<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>">
											<label class="mdl-textfield__label" for="nombre">Nombre</label>
											<span class="mdl-textfield__error">Ingrese un nombre válido</span>
										</div>
									</div>

									<!-- APELLIDO -->
									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="apellido" name="apellido" value="<?php echo $datos['apellido']; ?>">
											<label class="mdl-textfield__label" for="apellido">Apellido</label>
											<span class="mdl-textfield__error">Ingrese un apellido válido</span>
										</div>
									</div>

									<!-- FECHA -->
									<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
										<label for="fecha_nacimiento">Fecha de Nacimiento</label><br>
										<input type="date" class="mdl-textfield__input" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $datos['fecha_nacimiento']; ?>" required>
									</div>

									<!-- USUARIO -->

									<div class="mdl-textfield mdl-js-textfield ">
										<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#usuarios">Tutor a Cargo</button>

										<input type="hidden" id="dniUsuario" name="dniUsuario" value="">

										<!-- Modal -->
										<div class="modal fade" id="usuarios" tabindex="-1" aria-labelledby="usuarios" aria-hidden="true">
											<div class="modal-dialog modal-xl">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="usuarios">Seleccione un Usuario</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- LISTADO -->
														<div>
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table id="users" name="users" class="table  table-striped" style="width:100%">
																			<thead>
																				<tr>
																					<th>DNI</th>
																					<th>Nombre</th>
																					<th>Correo</th>
																					<th>Estado</th>
																					<th></th>
																				</tr>
																			</thead>
																			<tbody>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-8 col-sm-6">
															<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">DNI seleccionado: <?php echo $datos['dniUsuario']; ?></div>
														</div>
														<div class="col-4 col-sm-6">
															<div class="p-3 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-3">Nuevo DNI: <span id="dniSeleccionado"></span></div>
														</div>
													</div>

													<div class="modal-footer mt-4">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
														<button id="btnGuardar" type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#usuarios">Guardar</button>
													</div>

												</div>
											</div>
										</div>
									</div>


									<!-- FICHA TECNICA -->
									<div class="mdl-cell mdl-cell--12-col">
										<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
											&nbsp; FICHA TÉCNICA</legend><br>
									</div>

									<div class="mdl-cell mdl-cell--12-col">

										<!-- POSICION -->
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="posicion">Posición</label>
											<select class="mdl-textfield__input" id="posicion" name="posicion" value="<?php echo $datos['posicion']; ?>">
												<?php
												include '../../../../conexion.php';
												$sql = "SELECT * from posicion";
												$resultado = mysqli_query($conexion, $sql);

												echo '<option value="-1">Posición</option>';

												if (mysqli_num_rows($resultado) > 0) {
													while ($registro = mysqli_fetch_array($resultado)) {
														if ($datos['posicion'] == $registro['cod_posicion']) {
															echo '<option value=' . $registro['cod_posicion'] . ' selected>' . $registro['posicion'] . '</option>';
														} else {
															echo '<option value=' . $registro['cod_posicion'] . '>' . $registro['posicion'] . '</option>';
														}
													}
												}
												mysqli_close($conexion);
												?>
											</select>
										</div>

										<!-- POSICION ALTERNATIVA -->
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="posicion_alterantiva">Posición Alternativa</label>
											<select class="mdl-textfield__input" id="posicion_alternativa" name="posicion_alternativa" value="<?php echo $datos['posicion_alternativa']; ?>">
												<?php
												include '../../../../conexion.php';
												$sql = "SELECT * from posicion";
												$resultado = mysqli_query($conexion, $sql);
												echo '<option value="-1">Posición Alternativa</option>';
												if (mysqli_num_rows($resultado) > 0) {
													while ($registro = mysqli_fetch_array($resultado)) {
														if ($datos['posicion_alternativa'] == $registro['cod_posicion']) {
															echo '<option value=' . $registro['cod_posicion'] . ' selected>' . $registro['posicion'] . '</option>';
														} else {
															echo '<option value="' . $registro['cod_posicion'] . '">' . $registro['posicion'] . '</option>';
														}
													}
												}
												mysqli_close($conexion);
												?>
											</select>
										</div>

										<!-- PIERNA HABIL -->
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="pierna_habil">Pierna Hábil</label>
											<select class="mdl-textfield__input" id="pierna_habil" name="pierna_habil" value="<?php echo $datos['pierna_habil'] ?>">
												<?php
												include '../../../../conexion.php';

												$sql = "SELECT * FROM extremidades";
												$resultado = mysqli_query($conexion, $sql);

												echo '<option value="-1">Seleccione una opción</option>';
												if ($registro = mysqli_num_rows($resultado) > 0) {
													while ($registro = mysqli_fetch_array($resultado)) {
														if ($datos['pierna_habil'] == $registro['cod_extremidad']) {
															echo '<option value=' . $registro['cod_extremidad'] . ' selected>' . $registro['desc_extremidad'] . '</option>';
														} else {
															echo '<option value=' . $registro['cod_extremidad'] . '>' . $registro['desc_extremidad'] . '</option>';
														}
													}
												}
												mysqli_close($conexion);
												?>
											</select>
										</div>

										<!-- MANO HABIL -->
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="mano_habil">Mano Hábil</label>
											<select class="mdl-textfield__input" id="mano_habil" name="mano_habil" value="<?php echo $datos['mano_habil'] ?>">
												<?php
												include '../../../../conexion.php';

												$sql = "SELECT * FROM extremidades";
												$resultado = mysqli_query($conexion, $sql);

												echo '<option value="-1">Seleccione una opción</option>';
												if ($registro = mysqli_num_rows($resultado) > 0) {
													while ($registro = mysqli_fetch_array($resultado)) {
														echo '<option value="' . $registro['cod_extremidad'] . '" selected>' . $registro['desc_extremidad'] . '</option>';
													}
												}
												mysqli_close($conexion);
												?>
											</select>
										</div>

										<!-- ESTADO -->
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="estado">Estado</label>
											<select class="mdl-textfield__input" id="estado" name="estado" value="<?php echo $datos['estado'] ?>">
												<?php
												include '../../../../conexion.php';

												$sql = "SELECT * FROM estado";
												$resultado = mysqli_query($conexion, $sql);

												echo '<option value="-1">Estado</option>';
												if ($registro = mysqli_num_rows($resultado) > 0) {
													while ($registro = mysqli_fetch_array($resultado)) {
														echo '<option value=' . $registro['cod_estado'] . ' selected>' . $registro['estado'] . '</option>';
													}
												}
												mysqli_close($conexion);
												?>
											</select>
										</div>

										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="numero_camiseta" name="numero_camiseta" min="1" max="25" value="<?php echo $datos['numero_camiseta'] ?>">
											<label class="mdl-textfield__label" for="numero_camiseta">Número de Camiseta</label>
											<span class="mdl-textfield__error">Numero inválido</span>
										</div>
									</div>

									<!-- CONTACTO -->
									<div class="mdl-cell mdl-cell--12-col">
										<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
											&nbsp; CONTACTO</legend><br>
									</div>

									<!-- TELEFONO -->
									<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="telefono_emergencia" name="telefono_emergencia" value="<?php echo $datos['telefono_emergencia'] ?>">
											<label class="mdl-textfield__label" for="telefono_emergencia">Telefono</label>
											<span class="mdl-textfield__error">Número Invalido</span>
										</div>
									</div>

									<!-- CORREO -->
									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="email" id="email_contacto" name="email_contacto" value="<?php echo $datos['email_contacto'] ?>">
											<label class="mdl-textfield__label" for="email_contacto">Correo</label>
											<span class="mdl-textfield__error">Dirección de correo inválida</span>
										</div>
									</div>

								</div>
								<p class="text-center">
									<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-success" id="btn-editarJugador">
										<i class="fa-solid fa-user-pen" style="color: #ffffff;"></i>
									</button>
								<p class="mdl-tooltip" for="btn-editarJugador" id="btn-editarJugador">Editar Jugador
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
<script src="/TP6/js/users.js"></script>

<!-- Extencion para bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Extencion para "iconos" -->
<script src="https://kit.fontawesome.com/f0d1b5e3e0.js" crossorigin="anonymous"></script>

<!-- Extenciones para "DataTable" -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4-4.6.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>

</html>