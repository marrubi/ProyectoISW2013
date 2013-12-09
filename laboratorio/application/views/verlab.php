<!DOCTYPE html>
<html>
	<head>
		<title>Laboratorios</title>
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
					<?php
						if($laboratorios == false){
							echo "<div class='centrar-mensaje'>No hay laboratorios disponibles</div>";
						}
						else{
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>Laboratorio</td>";
							echo "<td class='td'>Estado</td>";
							echo "</tr>";
							foreach($laboratorios as $row){
								echo "<tr>";
								echo "<td>".$row['nombre']."</td>";
								if($row['estado'] == '0'){
									echo "<td>Inhabilitado"."    |    "."<a href='#'>Habilitar</a></td>";
								}
								else{
									echo "<td>Habilitado"."    |    "."<a href='#'>Inhabilitar</a></td>";
								}
								echo "</tr>";
							}
							echo "</table>";
						}					
					?>
				</section>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>