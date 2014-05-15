<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function modificar(){
				var sub = document.getElementById("comentarios").value.substring(0,3);
				if(sub != "<p>"){
					var texto = "<p>" + document.getElementById("comentarios").value + "</p>";
				texto = texto.replace(/\n/g, "<br>");
				document.getElementById("comentarios").value = texto;
				}
			}
		</script>
	</head>
	<body>
		<header>
			<h1>Video</h1>
		</header>
		<section id="sec">
			<?php echo form_open("video/actualizaVideo"); ?>
				<fieldset>
					<?php 
						while($resultado=mysql_fetch_array($rs_video)){
								extract($resultado);
					?>
					<input type="hidden" value="<?php echo $ID_Video; ?>" name="id">
					<label for="nombre">Título del vídeo</label>
					<br>
					<input type="text" id="titulo" name="nombre" value="<?php echo $Titulo_Video; ?>" required>
					<br><br>
					<label for="tipo">Tipo de vídeo:</label>
					<select name="tipo" required>
						<option value="VI">Videoclip</option>
						<option value="CO">Concierto</option>
						<option value="EN">Entrevista</option>
					</select>
					<br><br>
					<label for="comentarios">Comentarios:</label>
					<br>
					<textarea rows="20" name="comentarios" id="comentarios"><?php echo $Comentarios_Video; ?></textarea>
					<br><br>
					<label for="enlace">Enlace:</label>
					<input type="text" name="enlace" class="inputtotal" value="<?php echo $Enlace_Video; ?>">
					<br><br>
					<div class="clr"></div>
					<a href="<?php echo URL."video/todosLosVideos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Aceptar" name="aceptar" onclick="modificar();">
					<?php echo form_close(); ?>
					<?php echo form_open("video/videoBorra",array("onsubmit"=>"return confirm('¿Estás seguro?')")); ?>
					<input type="hidden" value="<?php echo $ID_Video; ?>" name="neoid">
					<input type="submit" value="Borrar" name="borrar">
					<?php echo form_close(); ?>
					<?php } ?>
				</fieldset>
			
		</section>
	</body>
</html>