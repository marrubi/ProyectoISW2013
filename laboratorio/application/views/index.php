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
		<header class="encabezado">
			<a class="image" href="<?php echo base_url();?>"><img border=0 src="<?php echo base_url('assets/img/logo2.png');?>"/></a>
			<img border=0 src="<?php echo base_url('assets/img/logo-estatales2.png');?>"/>
		</header>
		<section class="content">
			<article class="text">
				<h2>Bienvenidos al portal del laboratorio de la UTEM</h2>
				El acceso al sistema está restringido para estudiantes, académicos,<br/>
				funcionarios y administradores de la Escuela de Informática de la<br/>
				Universidad Tecnológica Metropolitana del Estado de Chile.<br/><br/>
				Ingrese Usuario y Contraseña para iniciar.
			</article>
			<article class="login">
			<div class="form">
				<?php echo form_open('index/validar') ?>
				<div id="contenido">
					<?php $lab = array('class'=>'lab',);
					  	  $box = array('name'=>'rut','class'=>'box',);
					  	  $pass = array('name'=>'password','class'=>'box',);
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
			</div>
			</article>
		</section>
		<footer class="footer">
			<ul>
				<li><a href="<?php echo base_url('index.php/acerca_de');?>">Acerca del sitio</a></li>
			</ul>
			<br><p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>