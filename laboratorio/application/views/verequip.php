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
			<a class="image"><img src="<?php echo base_url('assets/img/logo2.jpg');?>"/></a>
			<img border=0 src="<?php echo base_url('assets/img/logo-estatales2.jpg');?>"/>
		</header>
		<section class="content">
			<nav class="menu">
				<ul class="list-menu">
					<li><a href="">Laboratorios</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/verLabs')?>">Estado de Laboratorios</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/1')?>">Laboratorio 1</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/2')?>">Laboratorio 2</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/3')?>">Laboratorio 3</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/4')?>">Laboratorio 4</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/5')?>">Laboratorio 5</a></li>
							<li><a href="<?= base_url('index.php/funcionario/verEq/6')?>">Laboratorio 6</a></li>
						</ul>
					</li>
					<li><a href="">Impresiones</a>
						<ul>
							<li><a href="<?= base_url('index.php/funcionario/imp')?>">Impresiones Realizadas</a></li>
							<li><a href="<?= base_url('index.php/funcionario/ag_imp')?>">Agregar Impresión</a></li>
						</ul>
					</li>
					<li><a href="">Inventario</a>
						<li><a href="<?= base_url('index.php/funcionario/estadoInventario')?>">Estado de Inventario</a></li>
						<li><a href="<?= base_url('index.php/funcionario/prestamoInventario')?>">Agregar Préstamo de Inventario</a></li>
					</li>
			</nav>
			<section class="pantalla">
				<?php
					if($equipos == false){
						echo "<div class='centrar-mensaje'>No hay equipos disponibles</div>";
					}
					else{
						echo "<table>";
						echo "<tr>";
						echo "<td class='td'>Referencia</td>"; 
						echo "<td class='td'>Serial</td>";
						echo "<td class='td'>Estado</td>";
						echo "<td class='td'>Disponibilidad</td>";
						echo "</tr>";
						foreach($equipos as $row){					
							echo "<tr>";
							echo "<td>".$row['referencia']."</td>";
							echo "<td>".$row['serie']."</td>";
							if($row['estado-fk'] == '2'){
								echo "<td>Inhabilitado"."    |    "."<a href='#'>Habilitar</a></td>";
							}
							else{
								echo "<td>Habilitado"."    |    "."<a href='#'>Inhabilitar</a></td>";
							}
							if($row['uso-fk'] == '1'){
								echo "<td>Libre</td>";
							}
							else{
								echo "<td>Ocupado</td>";
							}
							echo "</tr>";
						}
						echo "</table>";
						echo "<br/><br/>";
						echo "<table>";
						echo "<tr>";
						echo "<td class='td'>Total Disponibles</td>";
						echo "<td class='td'>Total Ocupados</td>"; 
						echo "<td class='td'>Total Habilitados</td>";
						echo "<td class='td'>Total Inhabilitados</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>".$sumadisponibles."</td>";
						echo "<td>".$sumanodisponibles."</td>"; 
						echo "<td>".$sumahabilitados."</td>";
						echo "<td>".$sumainhabilitados."</td>";
						echo "</tr>";
						echo "</table>";
					}
				?>
			</section>
		</section>
		<footer class="footer">
			<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>