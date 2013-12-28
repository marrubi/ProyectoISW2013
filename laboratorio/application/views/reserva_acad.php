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
				<a class="image"><img src="<?php echo base_url('assets/img/logo2.jpg');?>"/></a>
				<img border=0 src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
			</header>
			<nav class="menu">
				<ul class="list-menu">
					<li><a href="">Laboratorios</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/laboratorios')?>">Estado de Laboratorios</a></li>
							<li><a href="<?= base_url('index.php/funcionario/equipos/1')?>">Laboratorio 1</a></li>
							<li><a href="<?= base_url('index.php/funcionario/equipos/2')?>">Laboratorio 2</a></li>
							<li><a href="<?= base_url('index.php/funcionario/equipos/3')?>">Laboratorio 3</a></li>
							<li><a href="<?= base_url('index.php/funcionario/equipos/4')?>">Laboratorio 4</a></li>
							<li><a href="<?= base_url('index.php/funcionario/equipos/5')?>">Laboratorio 5</a></li>
							<li><a href="<?= base_url('index.php/funcionario/equipos/6')?>">Laboratorio 6</a></li>
						</ul>
					</li>
					<li><a href="">Impresiones</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/imp')?>">Impresiones Realizadas</a></li>
							<li><a href="<?= base_url('index.php/funcionario/ag_imp')?>">Agregar Impresión</a></li>
						</ul>
					</li>
					<li><a href="">Inventario</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/estadoInventario')?>">Estado de Inventario</a></li>
							<li><a href="<?= base_url('index.php/funcionario/prestamoInventario')?>">Agregar Préstamo de Inventario</a></li>
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
							<li><a href="<?= base_url('index.php/funcionario/ver_reservas'); ?>">Académico</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<section class="content">
				<h3>Reservas Realizadas</h3>
				<?php
					if($reservas == false){
						echo "<div class='centrar-mensaje'>No hay reservas pedidas</div>";
					}
					else{
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
							echo "<td>".$row['fecha_sol']."</td>";
							echo "<td>".$row['lab_fk']."</td>";
							echo "<td>".$row['periodo_fk']."</td>";
							foreach($asignaturas as $rs){
								if($row['asignatura_fk'] == $rs['id_asig']){
									echo "<td>".$rs['nombre']."</td>";
								}
							}
							
							echo "<td><a href='edit_reserva/".$row['id_res']."'>Editar</a></td>";
							echo "<td><a href='del_reserva/".$row['id_res']."'>Eliminar</a></td>";
							echo "</tr>";
							$cont++;
						}
						echo "</table>";
						echo "<br/>";
					}					
				?>
				<a class="link-add" href="<?= base_url('index.php/funcionario/add_reservas'); ?>">Nueva Reserva</a>
				<br/><br/>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>