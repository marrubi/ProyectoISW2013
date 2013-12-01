<!DOCTYPE html>
<html>
	<head>
		<title>Perfil Funcionario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleperf.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
		<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
	</head>
	<body>
		<header class="encabezado">
			<nav class="header">
				<ul>
					Bienvenido <?php echo $nombre.'!'; ?><li><a href="<?php echo base_url('index.php/funcionario/logout')?>">Cerrar Sesión</a></li>
				</ul>
			</nav>
			<a class="image"><img src="<?php echo base_url('assets/img/logo2.png');?>"/></a>
		</header>
		<section class="content">
			<nav class="menu">
				<ul class="list-menu">
					<li><a href="#">Laboratorios</a>
						<ul>
							<li><a href="#">Laboratorio 1</a></li>
							<li><a href="#">Laboratorio 2</a></li>
							<li><a href="#">Laboratorio 3</a></li>
							<li><a href="#">Laboratorio 4</a></li>
							<li><a href="#">Laboratorio 5</a></li>
							<li><a href="#">Laboratorio 6</a></li>
						</ul>
					</li>
					<li><a href="#">Impresiones</a>
						<ul>
							<li><a href="#">Agregar Impresión</a></li>
						</ul>
					</li>
					<li><a href="#">Préstamo de equipos</a>
						<ul>
							<li><a href="#">Ingresar Préstamo</a></li>
							<li><a href="#">Ver equipos</a></li>
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
	</body>
</html>