<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function modificar(){
				var texto = "<p>" + document.getElementById("texto").value + "</p>";
				texto = texto.replace(/\n/g, "<br>");
				document.getElementById("texto").value = texto;
			}
		</script>
	</head>
	<body>
		<header>
			<h1>Concierto</h1>
		</header>
		<section id="sec">
			<?php echo form_open("concierto/nuevoConcierto"); ?>
				<fieldset>
					<label for="fecha">Introduce la fecha</label>
					<br>
					<input type="date" id="fecha" name="fecha">
					<br><br>
					<label for="texto">Datos del concierto:</label>
					<textarea rows="20" id="texto" name="texto"></textarea>
					<label for="entradas">Enlace venta entradas online:</label>
					<br>
					<input type="text" name="entradas">
					<br><br>
					<a href="<?php echo URL."concierto/todosConciertos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Aceptar" name="aceptar" onclick="modificar();">
				</fieldset>
			<?php echo form_close(); ?>
		</section>
	</body>
</html>