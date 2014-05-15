<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function modificar(){
				if(document.getElementById("comentarios").value != ""){
					var texto = "<p>" + document.getElementById("comentarios").value + "</p>";
					texto = texto.replace(/\n/g, "<br>");
					document.getElementById("comentarios").value = texto;
				}
			}
		</script>
	</head>

	<body>
		<header>
			<h1>Vídeo</h1>
		</header>
		<section id="sec">
			<?php echo form_open("video/nuevoVideo"); ?>
				<fieldset>
					<label for="nombre">Título del vídeo</label>
					<br>
					<input type="text" id="titulo" name="nombre" required>
					<br><br>
					<label for="tipo">Tipo de vídeo:</label>
					<select name="tipo">
						<option value="VI">Videoclip</option>
						<option value="CO">Concierto</option>
						<option value="EN">Entrevista</option>
					</select>
					<br><br>
					<label for="comentarios">Comentarios:</label>
					<br>
					<textarea rows="20" name="comentarios" id="comentarios"></textarea>
					<br><br>
					<label for="enlace">Enlace:</label>
					<input type="text" name="enlace" class="inputtotal">
					<br><br>
					<div class="clr"></div>
					<a href="<?php echo URL."video/todosLosVideos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Aceptar" name="aceptar" onclick="modificar();">
				</fieldset>
			<?php echo form_close(); ?>
		</section>
	</body>
</html>