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
			</nav>
			<section class="content">
				<article class="ventana-agr-imp">
					<div class="ventana-agr-imp-titulo">Agregar Impresión</div>
					<?php
					if($maximo_imp > 0){
						$atr = array(
							'class'=>'ventana-agr-imp-form',
						);
						$label = array('class'=>'lab');
						$submit = array('name'=>'submit', 'id'=>'submit','value'=>'Agregar');
						echo  form_open('funcionario/validar_agr_imp', $atr);
						echo form_label('Rut:','rutal');
						echo "<br/>";
						echo form_input('rut',$rut_data);
						echo "<br/>";
						echo form_error('rut');
						echo "<br/>";
						echo form_label('Tamaño de Papel:','tipoh', $label);
						echo "<br/>"; 

						$hoja = array(
							'1'=>'Tamaño Oficio ó Folio - 21,59cm x 35,56cm',
							'2'=>'Tamaño Carta(Letter) - 21,59cm x 27,94cm',
							'3'=>'Otro Tipo',
						);
						echo form_dropdown("tipohoja", $hoja);

						echo "<br/><br/>";
						echo form_label('Cantidad de Hojas:','hoj');
						echo "<br/>";
						echo form_input('hojas',$canthojas_data);
						echo form_label('(Máximo: '.$maximo_imp.' hojas)');
						echo form_error('hojas');
						echo "<br/>";
						echo "<div id='boton'>";
						echo "<br/><br/>";
						echo form_submit($submit);
						echo "</div>";
						echo form_close();
					}
					else{
						echo "<h3>La cantidad de hojas disponibles es 0</h3>";
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