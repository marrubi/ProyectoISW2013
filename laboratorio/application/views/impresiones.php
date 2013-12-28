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
						Bienvenido <li><a href="<?php echo base_url('index.php/funcionario/logout')?>">Cerrar Sesión</a></li>
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
			</nav>
			<section class="content">
				<article class="ventana-imp">
					<div class="ventana-imp-titulo">Consultar por intervalos de tiempo</div>
					<?php 
						$atr = array(
							'class'=>'ventana-imp-form',
						);
						echo form_open('funcionario/validar_fechas_impresiones', $atr);
							echo form_label('Desde:','fecha1');
							echo "<input type='date' name='fechadesde' value=".$desde.">";
							echo form_label('Hasta:','fecha2');
							echo "<input type='date' name='fechahasta' value=".$hasta.">";
							echo "<br/>";
							echo form_error('fechadesde');
							echo form_error('fechahasta');
							echo "<br/>";
							$atr = array(
								'id'=>'submit',
								'name'=>'consultar',
								'value'=>'Consultar',
							);
							echo form_submit($atr);
						echo form_close();
					?>
					<?php
						if($impresiones != false){
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
					?>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>