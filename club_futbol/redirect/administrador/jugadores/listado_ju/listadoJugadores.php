<?php
session_start();

if (isset($_SESSION['usuario'])) {
	$datos_usuario = $_SESSION['usuario'];
} else {
	header("Location: /TP6/usuarios/logout.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tabla Jugadores</title>

	<!-- Extencion para "DataTable" -->
	<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.6.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

	<!-- Extenciones para estilos generales -->
	<link rel="stylesheet" href="/TP6/css/normalize.css">
	<link rel="stylesheet" href="/TP6/css/sweetalert2.css">
	<link rel="stylesheet" href="/TP6/css/material.min.css">
	<link rel="stylesheet" href="/TP6/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="/TP6/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="/TP6/css/main.css">

	<!-- SweetAlert -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

	<style>
		.table {
			padding-top: 1em;
			width: 100%;
			height: 100px;
		}

		.table thead {
			height: 3em;
			background-color: #fd7e14;
			color: white;
		}

		.table th {
			padding: 10px;
		}

		.table tbody tr:nth-child(odd) {
			/* nth-child: Esta es la parte principal del seudoselector y establece que se seleccionarán elementos basados en su posición o índice dentro del elemento contenedor. Puedes pensar en ello como "elementos en la posición n".
			(odd): Aquí, "(odd)" especifica qué elementos se deben seleccionar. En este caso, "odd" significa "impares". Por lo tanto, :nth-child(odd) seleccionará todos los elementos que se encuentren en posiciones impares dentro de su elemento contenedor. */
			background-color: #f2f2f2;
		}

		.table td {
			padding: 8px;
		}
	</style>
</head>

<body>
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles" style="background-color:#fd7e14">
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
							<div class="mdl-tooltip" for="notifications">Notificaciones</div>
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
					Tabla de registros - Jugadores</p>
			</div>
		</section>
		<div class="mdl-tabs__tab-bar">
			<a href="../altaJugador.php" class="mdl-tabs__tab">NUEVO</a>
			<a href="#tabListProducts" class="mdl-tabs__tab is-active">LISTADO</a>
		</div>

		<form>
			<!-- LISTADO -->
			<div class="mdl-tabs__panel is-active" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

						<!-- LISTADO -->
						<div>
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table id="jugadores" name="jugadores" class="table" style="width:100%">
											<thead>
												<tr>
													<th>Código</th>
													<th>DNI</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Fecha&nbsp;Nacimiento</th>
													<th>Posicion</th>
													<th>Posicion&nbsp;Alternativa</th>
													<th>Pierna&nbsp;Habil</th>
													<th>Mano&nbsp;Habil</th>
													<th>Estado</th>
													<th>Numero&nbsp;Camiseta</th>
													<th>Telefono</th>
													<th>Correo</th>
													<th>Tutor&nbsp;a&nbsp;Cargo</th>
													<th>Opciones</th>
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
				</div>
			</div>
		</form>
	</section>


</body>

<!-- Extenciones para "DataTable" -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Biblioteca de "jQuery" facilita el manejo DOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<!-- "pdfmake" Biblioteca para crear PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<!--"vfs_fonts.js" Complemento necesario para crear PDF-->
<script src="https://cdn.datatables.net/v/bs4-4.6.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
<!-- "DataTable" -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<!-- "bootstrap" Complemento visual -->

<!-- Extenciones para funcionalidades generales -->
<script src="/TP6/js/material.min.js"></script>
<script src="/TP6/js/sweetalert2.min.js"></script>
<script src="/TP6/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Extencion para "iconos" -->
<script src="https://kit.fontawesome.com/f0d1b5e3e0.js" crossorigin="anonymous"></script>

<!-- Extenciones para funcionalidades propias -->
<script src="/TP6/js/main.js"></script>
<script src="/TP6/js/datos.js" type="application/javascript"></script>


</html>
