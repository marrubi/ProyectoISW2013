<!DOCTYPE html>
<html>
	<head>
		<title>Perfil Alumno</title>
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
					<div class="ventana-reserva-titulo">Perfil del Alumno</div>
					<?php
						if($alumno){
							echo "<h3>Datos del Alumno</h3>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>ID</td>";
							echo "<td class='td'>Rut</td>";
							echo "<td class='td'>Nombre</td>";
							echo "<td class='td'>Carrera</td>";
							echo "</tr>";
							foreach($alumno as $row){
								echo "<tr>";
								echo "<td>".$row['id_alum']."</td>";
								echo "<td>".$row['rut']."</td>";
								echo "<td>".$row['nombre']."</td>";
								echo "<td>".$row['codigo']."</td>";
								echo "</tr>";
							}
							echo "</table>";
							echo "<br/>";
						}
						else{
							echo "<h3>Alumno no existe en la base de datos</h3>";
						}
						if($asignaturas){
							echo "<h3>Asignaturas Asociadas</h3>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>Codigo</td>";
							echo "<td class='td'>Nombre Asignatura</td>";
							echo "<td class='td'>Semestre</td>";
							echo "<td class='td'>Año</td>";
							echo "<td class='td'>Sección</td>";
							echo "</tr>";
							foreach($asignaturas as $row){
								echo "<tr>";
								echo "<td>".$row['codigo']."</td>";
								echo "<td>".$row['nombre_asignatura']."</td>";
								echo "<td>".$row['semestre']."</td>";
								echo "<td>".$row['anio']."</td>";
								echo "<td>".$row['seccion']."</td>";
								echo "</tr>";
							}
							echo "</table>";
							echo "<br/>";
						}
						else{
							echo "<h3>El alumno no presenta asignaturas asociadas</h3>";
						}
						if($visitas){
							if($visitasmes){
								echo "<h3>Cantidad de visitas al laboratorio</h3>";
								echo "<table>";
								echo "<tr>";
								echo "<td class='td'>Visitas totales</td>";
								echo "<td class='td'>Visitas en el mes</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td>".$visitas."</td>";
								echo "<td>".$visitasmes."</td>";
								echo "</tr>";
								echo "</table>";
								echo "<br/>";
							}
							else{
								echo "<h3>Cantidad de visitas al laboratorio</h3>";
								echo "<table>";
								echo "<tr>";
								echo "<td class='td'>Visitas totales</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td>".$visitas."</td>";
								echo "</tr>";
								echo "</table>";
								echo "<br/>";

								echo "<h3>No registra visitas en el mes</h3>";
							}
						}
						else{
							echo "<h3>El alumno no ha visitado el laboratorio</h3>";
						}
					?>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>