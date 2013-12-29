<!DOCTYPE html>
<html>
	<head>
		<title>Impresiones</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleperf2.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
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
				<img border=0 src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
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
			</nav>
			<section class="content">
				<article class="ventana-imp">
					<div class="ventana-imp-titulo">Impresiones realizadas hoy</div>
					<?php
					if($impresiones){
						echo "<br/>";
						echo "<table>";
						echo "<tr>";
						echo "<td class='td'>Rut</td>";
						echo "<td class='td'>Nombre</td>";
						echo "<td class='td'>Carrera</td>";
						echo "<td class='td'>Hojas</td>";
						echo "<td class='td'>Tipo de Papel</td>";
						echo "<td class='td'>Fecha</td>";
						echo "<td class='td'>Hora</td>";
						echo "</tr>";
							
						foreach($impresiones as $row){
							echo "<tr>";
							foreach($alumnos as $row3){
								if($row3['id_alum'] == $row['alumno_fk']){
									echo "<td>".$row3['rut']."</td>";
									echo "<td>".$row3['nombre']."</td>";
									foreach($carreras as $row4){
										if($row4['id_carrera'] == $row3['carrera_fk']){
											echo "<td>".$row4['codigo']."</td>";
										}
									}
								}
							}
							echo "<td>".$row['n_hojas']."</td>";
							echo "<td>".$row['tipo_fk']."</td>";
							echo "<td>".$row['fecha']."</td>";
							echo "<td>".$row['hora']."</td>";
							echo "</tr>";
						}
						echo "</tr>";
						echo "</table>";
						echo "<br/>";
					}
					else{
						echo "<h2>No hay impresiones</h2>";
					}				
					?>
					<a class="link-add" href="ag_imp">Agregar Impresión</a>
					<br/>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>