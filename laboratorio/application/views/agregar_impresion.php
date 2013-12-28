<!DOCTYPE html>
<html>
	<head>
		<title>Agregar Impresión</title>
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
			</nav>
			<section class="content">
				<article class="ventana-agr-imp">
					<div class="ventana-agr-imp-titulo">Agregar Impresión</div>
					<?php 
						$atr = array(
							'class'=>'ventana-agr-imp-form',
						);
						$label = array('class'=>'lab');
						$submit = array('name'=>'submit', 'id'=>'submit','value'=>'Agregar');
					?>
					<?= form_open('funcionario/validar_agr_imp', $atr) ?>
						<?= form_label('Rut:','rutal') ?>
						<?= "<br/>"; ?>
						<?= form_input('rut',$rut_data) ?>
						<?= "<br/>"; ?>
						<?= form_error('rut') ?>
						<?= "<br/>"; ?>
						<?= form_label('Tamaño de Papel:','tipoh', $label) ?>
						<?= "<br/>"; ?>
						<?php 
							$hoja = array(
								'1'=>'Tamaño Oficio ó Folio - 21,59cm x 35,56cm',
								'2'=>'Tamaño Carta(Letter) - 21,59cm x 27,94cm',
								'3'=>'Otro Tipo',
							);
							echo form_dropdown("tipohoja", $hoja);
						?>
						<?= "<br/><br/>" ?>
						<?= form_label('Cantidad de Hojas:','hoj') ?>
						<?= "<br/>"; ?>
						<?= form_input('hojas',$canthojas_data) ?>
						<?= "<br/>"; ?>
						<?= form_error('hojas') ?>
						<?= "<br/>"; ?>
						<?='<div id="boton">' ?>
						<?= '<br/><br/>'; ?>
						<?= form_submit($submit) ?>
						<?= '</div>'; ?>
					<?= form_close() ?>
				</article>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>