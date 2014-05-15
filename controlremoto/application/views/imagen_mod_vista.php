<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
	</head>

	<body>
		<header>
			<?php while($resultado=mysql_fetch_array($rs_imagen)){
				extract($resultado);
			?>
			<h1>Imagen</h1>
		</header>
		<section id="sec">
				<fieldset id="field">
					<?php echo form_open('imagen/actualizaImagen'); ?>
					<img src="<?php echo URL."/assets/img/".$Nombre_Imagen; ?>">
					<br><br>
					<label for="name">Nombre de la imagen:</label>
					<br>
					<input type="text" name="nombre" class="inputtotal" value="<?php echo $Nombre_Imagen; ?>">
					<br><br>
					<label for="alt">Texto alternativo:</label>
					<br>
					<input type="text" name="alt" class="inputtotal" value="<?php echo $Alt_Imagen; ?>">
					<br><br>
					<input type="submit" id="aceptar" name="aceptar" value="Modificar">
					<a href="<?php echo URL."imagen/todasLasImagenes"; ?>" id="volver">Volver</a>
					<?php echo form_close(); ?> 
					<?php echo form_open("imagen/imagenBorra",array("onsubmit"=>"return confirm('¿Estás seguro?')")); ?>
					<input type="hidden" value="<?php echo $ID_Imagen; ?>" name="neoid">
					<input type="submit" value="Borrar" name="borrar">
					<?php echo form_close(); ?>
					<?php echo form_open("imagen/imagenPortada"); ?>
					<input type="hidden" value="<?php echo $ID_Imagen; ?>" name="portadaid">
					<input type="submit" value="Establecer como imagen de inicio" name="portada">
					<?php echo form_close(); ?>
				</fieldset>
				<?php } ?>
		</section>
	</body>
</html>