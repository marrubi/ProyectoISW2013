<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleperf2.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
		<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
	</head>
	<body>
		<div class="contenedor-total">
			<header class="encabezado">
				<nav class="header">
					<ul>
						<li><a href="<?php echo base_url('index.php/administrador/logout')?>" class="submit">Cerrar Sesión</a></li>
					</ul>
				</nav>
				<a class="image" href="<?= base_url('index.php/administrador/index') ?>"><img src="<?php echo base_url('assets/img/logo2.jpg');?>"/></a>
				<img border=0 src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
			</header>
			<nav class="menu">
				<ul class="list-menu">
					<li><a href="">Laboratorios</a>
						<ul>
							<li><a href="<?= base_url('index.php/administrador/laboratorios')?>">Estado de Laboratorios</a></li>
						</ul>
					</li>
					<li><a href="">Impresiones</a>
						<ul>
							<li><a href="<?= base_url('index.php/administrador/impresiones')?>">Impresiones Realizadas</a></li>
							<li><a href="<?= base_url('index.php/administrador/impresora')?>">Estado de Impresora</a></li>
						</ul>
					</li>
					<li><a href="">Inventario</a>
						<ul>
							<li><a href="<?= base_url('index.php/administrador/inventario')?>">Estado de Inventario actual</a></li>
							<li><a href="<?= base_url('index.php/administrador/reporte_inventario')?>">Reporte de Inventario</a></li>

						</ul>
					</li>
					<li><a href="">Alumno</a>
						<ul>
							<li><a href="<?= base_url('index.php/administrador/alumnos')?>">Búsqueda de alumno</a></li>
							<li><a href="<?= base_url('index.php/administrador/mantencion_alumnos')?>">Mantención de alumnos</a></li>

						</ul>
					</li>
					<li><a href="">Reservas</a>
						<ul>
							<li><a href="<?= base_url('index.php/administrador/reservas'); ?>">Académico</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<section class="content">
				<article class="ventana-view-reserva">
					<div class="ventana-reserva-titulo">Lista de Alumnos</div>
					<?php
						if($alumnos){
							echo "<h3>Alumnos Registrados</h3>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>ID</td>";
							echo "<td class='td'>Rut</td>";
							echo "<td class='td'>Nombre</td>";
							echo "<td class='td'>Carrera</td>";
							echo "</tr>";
							foreach($alumnos as $row){
								echo "<tr>";
								echo "<td><a href='".base_url('index.php/administrador/perfil_alumno/'.$row['id_alum'])."'>".$row['id_alum']."</a></td>";
								echo "<td>".$row['rut']."</td>";
								echo "<td>".$row['nombre']."</td>";
								echo "<td>".$row['codigo']."</td>";
								echo "</tr>";
							}
							echo "</table>";
							echo "<br/>";
						}
						else{
							echo "<h3>No hay alumnos en la base de datos</h3>";
						}

						echo "<h3><a class='link-add' href='".base_url('index.php/administrador/generar_reporte')."'>Generar Reporte</a></h3>";
					?>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>