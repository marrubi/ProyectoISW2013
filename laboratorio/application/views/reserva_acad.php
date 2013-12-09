<!DOCTYPE html>
<html>
	<head>
		<title>Reservas Académicos</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleperf.css');?>">
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
			<section class="content">
				<nav class="menu">
					<ul class="list-menu">
						<li><a href="">Laboratorios</a>
							<ul>
								<li><a href="<?= base_url('index.php/funcionario/verLabs')?>">Estado de Laboratorios</a></li>
								<li><a href="<?= base_url('index.php/funcionario/verEq/1')?>">Laboratorio 1</a></li>
								<li><a href="<?= base_url('index.php/funcionario/verEq/2')?>">Laboratorio 2</a></li>
								<li><a href="<?= base_url('index.php/funcionario/verEq/3')?>">Laboratorio 3</a></li>
								<li><a href="<?= base_url('index.php/funcionario/verEq/4')?>">Laboratorio 4</a></li>
								<li><a href="<?= base_url('index.php/funcionario/verEq/5')?>">Laboratorio 5</a></li>
								<li><a href="<?= base_url('index.php/funcionario/verEq/6')?>">Laboratorio 6</a></li>
							</ul>
						</li>
						<li><a href="">Impresiones</a>
							<ul>
								<li><a href="">Impresiones Realizadas</a></li>
								<li><a href="#">Agregar Impresión</a></li>
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
								<li><a href="">Académico</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<section class="pantalla">
					<h3>Reservas Realizadas</h3>
					<?php
						if($reservas == false){
							echo "<div class='centrar-mensaje'>No hay reservas pedidas</div>";
						}
						else{
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>Académico</td>";
							echo "<td class='td'>Estado</td>";
							echo "<td class='td'>Período</td>";
							echo "<td class='td'>Desde</td>";
							echo "<td class='td'>Hasta</td>";
							echo "<td class='td'>Editar</td>";
							echo "<td class='td'>Eliminar</td>";
							echo "</tr>";
							$cont = 1;
							foreach($reservas as $row){
								echo "<tr>";
								echo "<td>".$row['academico-fk']."</td>";
								if($row['estado'] == '0'){
									echo "<td>Activa</td>";
								}
								else{
									echo "<td>Anulada</td>";
								}
								echo "<td>Periodo</td>";
								echo "<td>Desde</td>";
								echo "<td>Hasta</td>";
								echo "<td><a href='edit_reservas'>Editar</a></td>";
								echo "<td><a href=''>Eliminar</a></td>";
								echo "</tr>";
								$cont++;
							}
							echo "</table>";
						}					
					?>
					<br/><br/>
					<a class="link-add" href="<?= base_url('index.php/funcionario/add_reservas'); ?>">Nueva Reserva</a>
				</section>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>