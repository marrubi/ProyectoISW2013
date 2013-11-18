<!DOCTYPE html>
<html>
	<head>
		<title>Contacto</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylecont.css');?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/comp.png');?>">
	</head>
	<body>
		<header class="encabezado">
			<a href="<?php echo base_url();?>"><img border=0 src="<?php echo base_url('assets/img/logo.png');?>"/></a>
		</header>
				<section class="form">
					<form method="post" action="" id="contacto">
						<label class="titu"><b>Contacto</b></label><br /><br />
						<label class="lab">Ingrese los datos solicitados, para contactarse con un administrador</label><br/><br/>
						<label class="lab" for="nombre">Nombre</label>*<br/>
						<input type="text" class="box" name="nombre"><br/><br/>
						<label class="lab" for="correo">Correo</label>*<br/>
						<input type="password" class="box" name="correo"><br/><br/>
						<label class="lab" for="asunto">Asunto</label>*<br/>
						<input type="text" class="box" name="asunto"><br/><br/>
						<label class="lab" for="mensaje">Mensaje</label>*<br/>
						<textarea rows="4" cols="50" class="box2" name="mensaje"></textarea>
						<p id="ast">(   *   significa datos requeridos)</p>
						<br/><div id="center"><input type="submit" id="submit" value="Enviar"><br/><br/></div>
					</form>
				</section>
		<footer class="footer">
			<ul>
				<li><a href="<?php echo base_url('index.php/acerca_de');?>">Acerca del sitio</a></li>
				<li><a href="<?php echo base_url('index.php/contacto');?>">Contacto</a></li>
			</ul>
			<p>Dieciocho 161 - Santiago, Chile. Metro Moneda - Fono: 2787 7500</p>
		</footer>
	</body>
</html>