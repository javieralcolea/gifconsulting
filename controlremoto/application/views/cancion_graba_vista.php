<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function modificar(){
				if(document.getElementById("Letra_Cancion").value != ""){
					var texto = "<p>" + document.getElementById("Letra_Cancion").value + "</p>";
					texto = texto.replace(/\n/g, "<br>");
					document.getElementById("Letra_Cancion").value = texto;
				}
			}
		</script>
	</head>

	<body>
		<header>
			<h1>Canción</h1>
		</header>
		<section id="sec">
			<?php echo form_open("cancion/nuevaCancion/".$this->uri->segment(3)); ?>
				<fieldset>
					<label for="Num_Cancion">Nº canción:</label>
					<br>
					<input type="number" name="Num_Cancion" required>
					<br><br>
					<label for="Titulo_Cancion">Título:</label>
					<br>
					<input type="text" name="Titulo_Cancion" class="inputtotal">
					<br><br>
					<label for="Letra_Cancion">Letra</label>
					<br>
					<textarea rows="20" id="Letra_Cancion" onfocus="cambiar();" name="Letra_Cancion"></textarea>
					<br><br>
					<label for="Enlace_Cancion">Enlace:</label>
					<br>
					<input type="text" name="Enlace_Cancion" class="inputtotal">
					<br><br>
					<a href="<?php echo URL."disco/todosLosDiscos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" name="aceptar" value="Aceptar"  onclick="modificar();">
				</fieldset>
			<?php echo form_close(); ?>
		</section>
	</body>
</html>