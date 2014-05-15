<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
	</head>

	<body>
		<header>
			<h1>Imagen</h1>
		</header>
		<section id="sec">
				<fieldset id="field">
					<?php echo form_open_multipart('upload/do_upload'); ?>
					<input type="file" name="filename">
					<br><br>
					<input type="submit" name="subir" id="aceptar" value="Subir">
					<a href="<?php echo URL."imagen/todasLasImagenes"; ?>" id="volver">Volver</a>
					<?php echo form_close(); ?>
				</fieldset>
		</section>
	</body>
</html>