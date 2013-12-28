<!DOCTYPE html>
<html>
	<head>
		<title>Perfil Funcionario</title>
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
				<img id="im2" src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
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
				<article class="ventana-imp">
					<div class="ventana-imp-titulo"><?php echo $titulo?></div>
					<div class="center">
					<?php
						$atr = array(
								'class'=>'padding',
						);
						if($switch == "1"){
							echo "<div class='center2'>";
							echo form_open('funcionario/val_ing_al');
							echo form_label('Rut: ','rut');
							echo form_input('rut');
							echo form_submit('enviar','Enviar');
							echo form_error('rut');
							echo form_close();
							echo "</div>";
						}

						if($switch == "2"){
							echo "<br/>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>Rut Alumno</td>";
							echo "<td class='td'>Nombre Alumno</td>";
							echo "<td class='td'>Carrera Alumno</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>".$rutAlumno."</td>";
							echo "<td>".$nombreAlumno."</td>";
							echo "<td>".$carreraAlumno."</td>";
							echo "</tr>";
							echo "</table>";
							echo "<br/>";
							echo "<div class='center2'>";
							echo form_open('funcionario/val_lab_ing'); 
							echo form_hidden('rut',$rutAlumno);
							echo form_label('Laboratorio: ','laboratorio');
							$array = array(
								'1' => 'Laboratorio 1',
								'2' => 'Laboratorio 2'
							);
							echo form_dropdown('laboratorio',$array); 
							echo form_submit('enviar','Enviar'); 
							echo form_error('rut'); 
							echo form_close();
							echo "</div>";
						}

						if($switch == "3"){
							echo "<br/>";
							echo "<table>";
							echo "<tr>";
							echo "<td class='td'>Rut Alumno</td>";
							echo "<td class='td'>Nombre Alumno</td>";
							echo "<td class='td'>Carrera Alumno</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>".$rutAlumno."</td>";
							echo "<td>".$nombreAlumno."</td>";
							echo "<td>".$carreraAlumno."</td>";
							echo "</tr>";
							echo "</table>";
							echo "<br/>";
							echo "<div class='center2'>";
							echo form_open('funcionario/val_lab_ing'); 
							echo form_hidden('rut',$rutAlumno);
							echo form_label('Laboratorio: ','laboratorio');
							$array = array(
								'1' => 'Laboratorio 1',
								'2' => 'Laboratorio 2'
							);
							echo form_dropdown('laboratorio',$array); 
							echo form_submit('enviar','Enviar'); 
							echo form_error('rut'); 
							echo form_close();
							echo "</div>";
							echo "<br/>";
							if($equipos){
								echo "<table>";
								echo "<tr>";
								echo "<td class='td'>Referencia</td>";
								echo "<td class='td'>Serie Equipo</td>";
								echo "<td class='td'>Estado Equipo</td>";
								echo "<td class='td'>Asignar</td>";
								echo "</tr>";
								foreach($equipos as $row){
									echo "<tr>";
									echo "<td>".$row['referencia']."</td>";
									echo "<td>".$row['serie']."</td>";
									if($row['uso-fk'] == 1)
										echo "<td>Disponible</td>";
									echo "<td><a href='asignar_equipo/".$row['id_eq']."/".$rutAlumno."'>Asignar</a></td>";
									echo "</tr>";						
								}
							}
							else{
								echo "<h2>No hay equipos disponibles</h2>";
							}
							echo "</table>";

						}
					?>
					</div>
					<?php

					?>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>