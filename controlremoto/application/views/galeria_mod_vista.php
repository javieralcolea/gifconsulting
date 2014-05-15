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
			<?php echo form_open("galeria/actualizaGaleria"); ?>
				<fieldset>
					<?php 
						while($resultado=mysql_fetch_array($rs_galeria)){
								extract($resultado);
					?>
					<input type="hidden" value="<?php echo $ID_Galeria; ?>" name="id">
					<label for="fecha">Introduce la fecha</label>
					<br>
					<input type="text" name="fecha" value="<?php echo $Fecha_Galeria; ?>">
					<br><br>
					<label for="descripcion">Descripción:</label>
					<br>
					<input type="text" name="descripcion" value="<?php echo $Descripcion_Galeria; ?>">
					<br><br>
					<a href="<?php echo URL."galeria/todasGalerias"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Modificar" name="aceptar">
					<?php echo form_close(); ?>
					<?php echo form_open("galeria/galeriaBorra",array("onsubmit"=>"return confirm('Se borrarán la galería y todas las fotos que contiene.\n¿Estás seguro?')")); ?>
					<input type="hidden" value="<?php echo $ID_Galeria; ?>" name="neoid">
					<input type="submit" value="Borrar" name="borrar" onclick="confirma();">
					<?php echo form_close(); ?>
					<?php } ?>
				</fieldset>
		</section>
	</body>
</html>