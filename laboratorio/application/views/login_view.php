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
			<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/img/logo.png');?>"/></a>
		</header>
		<section class="form">
			<div class="formulcont">
				<?= form_open(base_url().'index.php/login/validar'); ?>
					<div class="formultit">
						<b>Iniciar Sesión</b>
					</div><br/>
					<?= form_label('Usuario','user',array('class'=>'lab')); ?><br/>
					<?= form_input('user','','class="box"'); ?><br/>
					<?= form_label('Contraseña','password',array('class'=>'lab')); ?><br/>
					<?= form_password('password','','class="box"'); ?><br/>
				<?= form_close(); ?>
			</div>	
		</section>
		<footer class="footer">
			<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>