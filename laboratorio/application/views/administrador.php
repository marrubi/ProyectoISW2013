<!DOCTYPE html>
<html>
	<head>
		<title>Perfil Administrador</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleperf.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
		<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
	</head>
	<body>
		<div class="contenedor-total">
			<header class="encabezado">
				<nav class="header">
					<ul>
						<span>Hola <?= $rut?></span>
						<li><a href="<?php echo base_url('index.php/administrador/logout')?>">Cerrar Sesión</a></li>
					</ul>
				</nav>
				<a class="image"><img src="<?php echo base_url('assets/img/logo2.jpg');?>"/></a>
				<img id="im2" src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
			</header>
			<section class="content">
				<nav class="menu">
					<ul class="list-menu">
						<li><a href=""></a>
							<ul>
								<li></li>
							</ul>
						</li>
					</ul>
				</nav>
				<section class="pantalla">
				</section>
			</section>
			<footer class="footer">
				<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
			</footer>
		</div>
	</body>
</html>