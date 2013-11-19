<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login | Laboratorio UTEM</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylelog.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
	</head>
	<body>
		<header class="encabezado">
			<a class="image" href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/img/logo.png');?>"/></a>
		</header>
		<section class="sect">
			<div class="form">
			<?php echo form_open(base_url().'index.php/login/validar'); ?>
				<div id="titulo">
					<label class="titu"><b>Iniciar Sesión</b></label>
				</div>
				<div id="contenido">
					<?php $lab = array('class'=>'lab',);
						  $box = array('name'=>'user','class'=>'box',);
						  $submit = array('name'=>'submit', 'id'=>'submit','value'=>'Iniciar Sesión');
							echo form_label('Usuario','user', $lab);
							echo '<br/>';
							echo form_input($box);
							echo form_error('user');
							echo form_label('Contraseña','password', $lab);
							echo '<br/>';
							echo form_password($box);
							echo form_error('password');
							echo '<br/>';
							echo '<div id="boton">';
							echo form_submit($submit);
							echo '</div><br/>';
					?>
				</div>
			<?php echo form_close(); ?>
			</div> 
		</section>
		<footer class="footer">
			<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>