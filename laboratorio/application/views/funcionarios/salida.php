<!DOCTYPE html>
<html>
	<head>
		<title>Salida Alumno</title>
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
						<li><a href="<?php echo base_url('index.php/funcionario/logout')?>">Cerrar Sesión</a></li>
					</ul>
				</nav>
				<a class="image" href="<?= base_url('index.php/funcionario/index') ?>"><img src="<?php echo base_url('assets/img/logo2.jpg');?>"/></a>
				<img id="im2" src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
			</header>
			<nav class="menu">
				<ul class="list-menu">
					<li><a href="">Laboratorios</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/laboratorios')?>">Estado de Laboratorios</a></li>
						</ul>
					</li>
					<li><a href="">Impresiones</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/impresiones')?>">Impresiones Realizadas</a></li>
							<li><a href="<?= base_url('index.php/funcionario/impresora')?>">Estado de Impresora</a></li>
						</ul>
					</li>
					<li><a href="">Inventario</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/estadoInventario')?>">Estado de Inventario</a></li>
							<li><a href="<?= base_url('index.php/funcionario/prestamoInventario')?>">Prestar Herramienta de Inventario</a></li>
						</ul>
					</li>
					<li><a href="">Alumno</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/ingresoAlumno')?>">Ingreso de alumno</a></li>
							<li><a href="<?= base_url('index.php/funcionario/salidaAlumno')?>">Salida de alumno</a></li>
						</ul>
					</li>
					<li><a href="">Reservas</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/reservas'); ?>">Académico</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<section class="content">
				<article class="ventana-imp">
					<div class="ventana-imp-titulo">Salida de alumnos</div>
					<?php
						$atrsubmit = array(
								'id'=>'sub',
								'name'=>'consultar',
								'value'=>'Consultar',
							);
						echo "<div class='center3'>";
						echo form_open('funcionario/validar_salida');
						echo form_label('Rut: ','rut');
						echo form_input('rut');
						echo form_submit($atrsubmit);
						echo form_error('rut');
						echo form_close();
						echo "</div>";
						if($noingresos){
							if($nodisponible){
								echo "<table>";
								echo "<tr>";
								echo "<td class='td'>Equipo</td>";
								echo "<td class='td'>Serial</td>";
								echo "<td class='td'>Rut Alumno</td>";
								echo "<td class='td'>Nombre Alumno</td>";
								echo "<td class='td'>Liberar</td>";
								echo "</tr>";
								foreach($nodisponible as $row){
									echo "<tr>";
									echo "<td>".$row['equipo-fk']."</td>";
									foreach($equipos as $row2){
										if($row2['id_eq'] == $row['equipo-fk']){
											echo "<td>".$row2['serie']."</td>";
										}
									}
									echo "<td>".$alumnos['rut']."</td>";
									echo "<td>".$alumnos['nombre']."</td>";
									
									echo "<td><a href='liberar/".$row['id']."'>Liberar</a></td>";
									echo "</tr>";
								}
								echo "</table>";
								echo "<br/>";
							}
							else{
								echo "<h3>No hay equipo asignado al alumno ingresado</h3>";
								echo "<br/>";
							}
						}
						else{
							echo "<h3>Alumnos dentro del laboratorio</h3>";
							echo "<table>";
								echo "<tr>";
								echo "<td class='td'>Equipo</td>";
								echo "<td class='td'>Serial</td>";
								echo "<td class='td'>Rut Alumno</td>";
								echo "<td class='td'>Nombre Alumno</td>";
								echo "</tr>";
								foreach($nodisponible as $row){
									echo "<tr>";
									echo "<td>".$row['equipo-fk']."</td>";
									foreach($equipos as $row2){
										if($row2['id_eq'] == $row['equipo-fk']){
											echo "<td>".$row2['serie']."</td>";
										}
									}
									foreach($alumnos as $row3){
										if($row3['id_alum'] == $row['alumno-fk']){
											echo "<td>".$row3['rut']."</td>";
											echo "<td>".$row3['nombre']."</td>";
										}
									}
									echo "</tr>";
								}
							echo "</table>";
							echo "<br/>";
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