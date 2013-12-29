<!DOCTYPE html>
<html>
	<head>
		<title>Reservas Académicos</title>
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
				</ul>
			</nav>
			<section class="content">
				<article class="ventana-view-reserva">
					<div class="ventana-reserva-titulo">Reservas solicitadas</div>
					<?php
						if($reservas == false){
							echo "<div class='centrar-mensaje'>No hay reservas pedidas</div>";
						}
						else{
							echo "<br/>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>Rut</td>";
							echo "<td class='td'>Nombre Académico</td>";
							echo "<td class='td'>Fecha Solicitada</td>";
							echo "<td class='td'>Laboratorio</td>";
							echo "<td class='td'>Periodo</td>";
							echo "<td class='td'>Asignatura</td>";
							echo "<td class='td'>Editar</td>";
							echo "<td class='td'>Eliminar</td>";
							echo "</tr>";
							$cont = 1;
							foreach($reservas as $row){
								echo "<tr>";
								foreach($academicos as $rw){
									if($row['academico_fk'] == $rw['id_profesor']){
										echo "<td>".$rw['rut']."</td>";
										echo "<td>".$rw['nombre']."</td>";
									}
								}
								echo "<td>".$row['fecha_dest']."</td>";
								echo "<td>".$row['lab_fk']."</td>";
								echo "<td>".$row['periodo_fk']."</td>";
								foreach($asignaturas as $rs){
									if($row['asignatura_fk'] == $rs['id_asig']){
										echo "<td>".$rs['nombre']."</td>";
									}
								}
								
								echo "<td><a href='edit_reserva/".$row['id_res']."' >Editar</a></td>";
								echo "<td><a href='del_reserva/".$row['id_res']."' >Eliminar</a></td>";
								echo "</tr>";
								$cont++;
							}
							echo "</table>";
							echo "<br/>";
						}					
					?>
					<a class="link-add" href="<?= base_url('index.php/funcionario/add_reservas'); ?>">Nueva Reserva</a>
					<br/>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>