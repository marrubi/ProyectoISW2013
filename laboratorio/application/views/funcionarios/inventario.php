<!DOCTYPE html>
<html>
	<head>
		<title>Inventario</title>
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
						<li><a href="<?php echo base_url('index.php/funcionario/logout')?>" class="submit">Cerrar Sesión</a></li>
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
							<li><a href="<?= base_url('index.php/funcionario/inventario')?>">Inventario Disponible</a></li>
							<li><a href="<?= base_url('index.php/funcionario/prestado')?>">Inventario Prestado</a></li>
							<li><a href="<?= base_url('index.php/funcionario/estadoInventario')?>">Estado de Inventario</a></li>
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
					<div class="ventana-reserva-titulo">Inventario disponible</div>
					<?php

						if($herramientas){
							echo "<br/>";
							echo "<br/>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>ID</td>";
							echo "<td class='td'>Serie</td>";
							echo "<td class='td'>Modelo</td>";
							echo "<td class='td'>Marca</td>";
							echo "<td class='td'>Tipo de Artículo</td>";
							echo "<td class='td'>Prestar</td>";
							echo "</tr>";
							foreach($herramientas as $row){
								echo "<tr>";
								echo "<td>".$row['id_herramienta']."</td>";
								echo "<td>".$row['n_inventario']."</td>";
								echo "<td>".$row['modelo']."</td>";
								echo "<td>".$row['marca']."</td>";
								echo "<td>".$row['nombre']."</td>";
								echo "<td><a href='".base_url('index.php/funcionario/prestar/'.$row['id_herramienta'])."'>Prestar</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							echo "<br/>";
							if($paso2){
								$submit = array(
									'class'=>'submit',
									'name'=>'prestar',
									'value'=>'Prestar'
								);
								echo "<br/>";
								echo "<h3>Artículo seleccionado</h3>";
								echo "<table>";
								echo "<tr>";
								echo "<td class='td'>ID</td>";
								echo "<td class='td'>Serie</td>";
								echo "<td class='td'>Marca</td>";
								echo "<td class='td'>Modelo</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td>".$herramienta_escogida['id']."</td>";
								echo "<td>".$herramienta_escogida['serie']."</td>";
								echo "<td>".$herramienta_escogida['marca']."</td>";
								echo "<td>".$herramienta_escogida['modelo']."</td>";
								echo "</tr>";
								echo "</table>";
								echo "<div class='center2'>";
								echo form_open('funcionario/validar_prestacion');
								echo "<br/>";
								echo form_hidden('id',$herramienta_escogida['id']);
								echo "<h3>Rut del profesor asignado</h3>";
								echo form_label("Rut: ");
								echo form_input('rut');
								echo form_submit($submit);
								echo "<br/>";
								echo form_error('rut');
								echo form_close();
								echo "</div>";

							}
						}
						else{
							echo "<br/>";
							echo "<h2>No hay herramientas disponible</h2>";
							echo "<br/>";
						}
					?>
					<br/>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>