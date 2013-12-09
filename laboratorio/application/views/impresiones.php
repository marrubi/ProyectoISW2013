<!DOCTYPE html>
<html>
	<head>
		<title>Impresiones</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleperf.css');?>">
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
				</nav>
				<section class="pantalla">
					<article id="ventana-form">
					<?php 
						$titulolabel = array('class'=>'titulo-form');
						$label = array('class'=>'lab');
						$input = array('name'=>'inicio','class'=>'box','type'=>'date');
						$input2 = array('name'=>'fin','class'=>'box','type'=>'date');
						$submit = array('name'=>'submit', 'id'=>'submit','value'=>'Consultar');
					?>
					<?= form_open('funcionario/validar_agr') ?>
						<!-- Aquí se debe implementar dos DateTimePicker(!!!JQUERY!!!!)(Para indicar intervalos de tiempo), un cuadro de Rut, un Filtro, y un Botón-->
						<?= form_label('Seleccione intervalos:','titulo-form',$titulolabel);?>
						<?="<br/><br/>"?>
						<?= form_label('Desde','desde',$label)?>
						<?= form_input($input); ?>
						<?= form_label('Hasta','hasta',$label)?>
						<?= form_input($input2); ?>
						<?= "<br/><br/>"?>
						<?= form_submit($submit) ?>
						<?= '</div><br/>'; ?>
					<?= form_close() ?>
					</article>
				</section>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>