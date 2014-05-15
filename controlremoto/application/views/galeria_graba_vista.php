<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
	</head>
	<body>
		<header>
			<h1>Galería</h1>
		</header>
		<section id="sec">
			<?php echo form_open("galeria/nuevaGaleria"); ?>
				<fieldset>
					<label for="fecha">Introduce la fecha:</label>
					<br>
					<input type="text" name="fecha">
					<br><br>
					<label for="texto">Descripción:</label>
					<br>
					<input type="text" name="descripcion" class="inputtotal">
					<br><br>
					<a href="<?php echo URL."galeria/todasGalerias"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Aceptar" name="aceptar">
				</fieldset>
			<?php echo form_close(); ?>
		</section>
	</body>
</html>