<!DOCTYPE html>
<html>
	<head>
		<title>Laboratorio UTEM</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleindex.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.10.2.min.js');?>"></script>
	</head>
	<body>
		<header class="encabezado">
			<nav class="header">
				<ul>
					<li><a href="<?php echo base_url('index.php/login');?>">Iniciar Sesión</a></li>
				</ul>
			</nav>
			<a href="<?php echo base_url();?>"><img id="image" border=0 src="<?php echo base_url('assets/img/logo.png');?>"/></a>
		</header>
		<section class="content">
				<h1>Aquí irá una galería de fotos rotantes</h1>
				<h5>El laboratorio perteneciente a la Escuela de Informática
					de la Universidad Tecnológica Metropolitana del Estado de Chile,
					tiene como misión, ayudar a profesores y alumnos</h5>
		</section>
		<footer class="footer">
			<ul>
				<li><a href="<?php echo base_url('index.php/acerca_de');?>">Acerca del sitio</a></li>
				<li><a href="<?php echo base_url('index.php/contacto');?>">Contacto</a></li>
			</ul>
			<br><p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>