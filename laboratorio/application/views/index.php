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
		<h1>Ingresando codigo nuevo como prueba</h1>
		<div class="contenido-total">
			<header class="encabezado">
				<ul class="enlaces">
					<li><a href="http://www.utem.cl">UTEM</a></li>
					<li><a href="http://informatica.utem.cl">INFORMÁTICA UTEM</a></li>
					<li><a href="http://postulacion.utem.cl">DIRDOC</a></li>
					<li><a href="http://reko.utem.cl">REKO</a></li>
					<li><a href="http://www.cftutem.cl">CFT UTEM</a></li>
					<li><a href="http://www.utemvirtual.cl">UTEMVirtual</a></li>
					<li><a href="http://www.facebook.com/universidadtecnologicametropolitana">FACEBOOK UTEM</a></li>
					<li><a href="http://bienestarestudiantil.blogutem.cl">BIENESTAR ESTUDIANTIL</a></li>
				</ul>
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
					<li><a href="<?php echo base_url().'index.php/index/acercade';?>">ACERCA DEL SITIO</a></li>
				</ul>
				<br><p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>