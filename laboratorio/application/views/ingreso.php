<!DOCTYPE html>
<html>
	<head>
		<title>Perfil Funcionario</title>
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
				<img id="im2" src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
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
								<li><a href="">Académico</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<section class="pantalla">
					<?= form_open('funcionario/val_ing_al'); ?>
						<?= form_label('Rut','rut'); ?>
						<?= form_input('rut'); ?>

						<?= form_label('Laboratorio','lab'); ?>

						<?php

							$laboratorios = array(
								'1' => 'Laboratorio 1',
								'2' => 'Laboratorio 2',
								'3' => 'Laboratorio 3',
								'4' => 'Laboratorio 4',
								'5' => 'Laboratorio 5',
								'6' => 'Laboratorio 6',
								'7' => 'Laboratorio 7',
								'8' => 'Laboratorio 8',
							);
							echo form_dropdown("Laboratorio", $laboratorios);
						?>
						<?= "<br/>"?>
						<?= form_submit('enviar','Enviar') ?>
					<?= form_close(); ?>

					<?php
						if($equipos != false){
							echo "<table id='equipos'>";
							echo "<tr>";
							echo "<td class='td'>Referencia</td>"; 
							echo "<td class='td'>Serial</td>";
							echo "<td class='td'>Estado</td>";
							echo "<td class='td'>Disponibilidad</td>";
							echo "<td class='td'>Opción</td>";
							echo "</tr>";
							foreach($equipos as $row){					
								echo "<tr>";
								echo "<td>".$row['referencia']."</td>";
								echo "<td>".$row['serie']."</td>";
								if($row['estado-fk'] == '2'){
									echo "<td>Inhabilitado"."    |    "."<a href='#'>Habilitar</a></td>";
								}
								else{
									echo "<td>Habilitado"."    |    "."<a href='#'>Inhabilitar</a></td>";
								}
								if($row['uso-fk'] == '1'){
									echo "<td>Libre</td>";
								}
								else{
									echo "<td>Ocupado</td>";
								}
								echo "<td><input type='button' value='Agregar'/></td>";
								echo "</tr>";
							}
							echo "</table>";
						}
						else{
							echo "No se ha seleccionado opción";
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