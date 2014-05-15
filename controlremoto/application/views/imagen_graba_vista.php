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
					<?php echo form_open('imagen/nuevaImagen/'); ?>
					<label for="name">Nombre de la imagen:</label>
					<br>
					<input type="text" name="nombre" class="inputtotal" value="<?php echo $upload_data['file_name']; ?>">
					<br><br>
					<label for="alt">Texto alternativo:</label>
					<br>
					<input type="text" name="alt" class="inputtotal">
					<br><br>
					<label for="galeria">Selecciona galería:</label>
					<select name="galeria">
						<?php
							$this->load->view('todas_galerias_view');
						?>
					</select>
					<br><br>
					<input type="submit" id="aceptar" name="aceptar" value="Subir">
					<a href="<?php echo URL."imagen/todasLasImagenes"; ?>" id="volver">Volver</a>
					<?php echo form_close(); ?> 
				</fieldset>
		</section>
	</body>
</html>