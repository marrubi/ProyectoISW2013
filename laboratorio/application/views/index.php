<!DOCTYPE html>
<html>
	<head>
		<title>Administración Laboratorio UTEM</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleindex.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
		<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
	</head>
	<body>
		<div class="contenido-total">
			<header class="encabezado">
				<a class="image" href="<?php echo base_url();?>"><img alt="logoutem" src="<?php echo base_url('assets/img/logo2.jpg');?>"/></a>
				<img alt="logocna" src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
			</header>
			<section class="content">
				<article class="text">
					<h2>Bienvenidos al portal del laboratorio de la UTEM</h2>
					El acceso al sistema está restringido para funcionarios y administradores<br/>
					de la Escuela de Informática de la Universidad Tecnológica Metropolitana<br/>
					del Estado de Chile.<br/><br/>
					Ingrese Rut y Contraseña para iniciar sesión.
				</article>
				<article class="login">
				<div class="form">
					<?php echo form_open('index/validar') ?>
					<div id="contenido">
						<?php $lab = array('class'=>'lab',);
						  	  $box = array('name'=>'rut','class'=>'box');
						  	  $pass = array('name'=>'password','class'=>'box');
						  	  $submit = array('name'=>'submit', 'id'=>'submit','value'=>'Ingresar');
							  echo form_label('Rut','rut', $lab);
							  echo '<br/>';
							  echo form_input($box);
							  echo form_error('rut');
							  echo form_label('Password','password', $lab);
							  echo '<br/>';
							  echo form_password($pass);							  
							  echo form_error('password');
							  echo '<br/>';
							  echo '<div id="boton">';
							  echo form_submit($submit);
							  echo '</div><br/>';
						?>
					</div>
					<?php echo form_close() ?>
				</div>
				</article>
			</section>
			<footer class="footer">
				<ul>
					<li><a href="<?php echo base_url().'index.php/index/acercade';?>">Acerca del sitio</a></li>
				</ul>
				<br><p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>