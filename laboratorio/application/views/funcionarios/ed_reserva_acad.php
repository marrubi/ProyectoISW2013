<!DOCTYPE html>
<html>
	<head>
		<title>Laboratorios</title>
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
				<article class="ventana-reserva">
					<div class="ventana-reserva-titulo">Editar Reserva</div>
					<?php 
						$atr = array(
							'class'=>'ventana-reserva-form',
						); 
						echo form_open('funcionario/validar_edit_reserva', $atr);
							echo form_hidden('id', $id);
							echo form_label('Rut Académico:','rutacad');
							echo "<br/>";
							echo form_input('rutacad',$rut_edit);
							echo "<br/>";
							echo form_error('rutacad');
							echo form_label('Asignatura:', 'asignatura');
							echo "<br/>";
							$asig = array(
								'1'=> 'Análisis de Algoritmos',
								'2'=> 'Arquitectura de Computadores',
								'3'=> 'Auditoría de Sistemas',
								'4'=> 'Bases de Datos',
								'5'=> 'Ciencias de la Computación',
								'6'=> 'Computación Paralela',
								'7'=> 'Desempeño de Sistemas Computacionales',
								'8'=> 'Estructura de Datos',
								'9'=> 'Estructuras Discretas',
								'10'=> 'Gestión de Personal Informático',
								'11'=> 'Gestión de Proyectos Informáticos',
								'12'=> 'Gestión Informática',
								'13'=> 'Gestión Financiera de TI',
								'14'=> 'Informática Industrial',
								'15'=> 'Ingeniería de Software',
								'16'=> 'Lenguajes de Programación',
								'17'=> 'Programación',
								'18'=> 'Optimización de Sistemas',
								'19'=> 'Organización de Computadores',
								'20'=> 'Sistemas de Información',
								'21'=> 'Sistemas Distribuidos',
								'22'=> 'Sistemas Integrados de Información',
								'23'=> 'Sistemas Operativos',
								'24'=> 'Taller de SIA',
								'25'=> 'Tecnología de Equipos',
								'26'=> 'Teoría de Autómatas',	
								'27'=> 'Electivo de Formación Especializada',
							);
							echo form_dropdown('Asignatura', $asig, $asignatura_edit);
							echo "<br/>";
							echo form_label('Laboratorio:','labacad');
							echo "<br/>";
							$labs = array(
								'1'=> 'Laboratorio 1',
								'2'=> 'Laboratorio 2',
								'3'=> 'Laboratorio 3',
								'4'=> 'Laboratorio 4',
								'5'=> 'Laboratorio 5',
								'6'=> 'Laboratorio 6',
							);
							echo form_dropdown('laboratorio', $labs, $laboratorio_edit);
							echo "<br/>";
							echo form_label('Fecha Destino:','fecha');
							echo "<br/>";
							echo "<input type='date' name='fec' value=".$fecha_edit." >";
							echo "<br/>";
							echo form_error('fec');
							echo form_label('Período:','periodo');
							echo "<br/>";
							$per = array(
								'1'=> 'I - Desde 8:15 Hasta 9:35',
								'2'=> 'II - Desde 9:35 Hasta 11:05',
								'3'=> 'III - Desde 11:15 Hasta 12:35',
								'4'=> 'IV - Desde 12:35 Hasta 14:05',
								'5'=> 'V - Desde 14:15 Hasta 15:35',
								'6'=> 'VI - Desde 15:45 Hasta 17:05',
								'7'=> 'VII - Desde 17:15 Hasta 18:35',
								'8'=> 'VIII - Desde 19:00 Hasta 20:30',
							);
							echo form_dropdown('periodo', $per, $periodo_edit);
							echo form_error('periodo');
							echo "<br/><br/>";

							$atr = array(
								'id'=>'submit',
								'name'=>'editar',
								'value'=>'Editar',
							);
							echo form_submit($atr);
						echo form_close();
					?>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>