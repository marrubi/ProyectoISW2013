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
					Bienvenido <li><a href="<?php echo base_url('index.php/funcionario/logout')?>">Cerrar Sesión</a></li>
				</ul>
			</nav>
			<a class="image"><img src="<?php echo base_url('assets/img/logo2.png');?>"/></a>
		</header>
		<section class="content">
			<nav class="menu">
				<ul class="list-menu">
					<li><a href="<?= base_url('index.php/funcionario/verLabs')?>">Laboratorios</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/verEq/1')?>">Laboratorio 1</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/2')?>">Laboratorio 2</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/3')?>">Laboratorio 3</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/4')?>">Laboratorio 4</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/5')?>">Laboratorio 5</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/6')?>">Laboratorio 6</a></li>
						</ul>
					</li>
					<li><a href="#">Impresiones</a>
						<ul>
							<li><a href="#">Agregar Impresión</a></li>
						</ul>
					</li>
					<li><a href="<?= base_url('index.php/funcionario/verInventario')?>">Préstamo de inventario</a>
					</li>
					<li><a href="#">Equipos</a>
						<ul>
							<li><a href="#">Estado</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<section class="pantalla">
				<table>
					<tr>
						<td class="td">Laboratorio</td>
						<td class="td">Estado</td>
					</tr>
					<?php foreach($laboratorios as $row): ?>
					<?= "<tr>";?>
					<?= "<td>".$row['nombre']."</td>";?>
					<?php 
						if($row['estado'] == '0'){
							echo "<td>Inhabilitado"."    |    "."<a href='#'>Habilitar</a></td>";

						}
						else{
							echo "<td>Habilitado"."    |    "."<a href='#'>Inhabilitar</a></td>";
						}
					?>
					<?= "</tr>"; ?>

					<?php endforeach ?>	
				</table>	
			</section>
		</section>
		<footer class="footer">
			<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>