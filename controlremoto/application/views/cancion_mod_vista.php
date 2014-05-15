<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function modificar(){
				var sub = document.getElementById("Letra_Cancion").value.substring(0,3);
				if(sub != "<p>"){
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
			<?php echo form_open("cancion/actualizaCancion"); ?>
				<fieldset>
					<?php 
						while($resultado=mysql_fetch_array($rs_cancion)){
								extract($resultado);
					?>
					<input type="hidden" value="<?php echo $ID_Cancion; ?>" name="id">
					<label for="Num_Cancion">Nº canción:</label>
					<br>
					<input type="number" name="Num_Cancion" value="<?php echo $Num_Cancion; ?>" required>
					<br><br>
					<label for="Titulo_Cancion">Título:</label>
					<br>
					<input type="text" name="Titulo_Cancion" class="inputtotal" value="<?php echo $Titulo_Cancion; ?>">
					<br><br>
					<label for="Letra_Cancion">Letra</label>
					<br>
					<textarea rows="20" id="Letra_Cancion" onfocus="cambiar();" name="Letra_Cancion"><?php echo $Letra_Cancion; ?></textarea>
					<br><br>
					<label for="Enlace_Cancion">Enlace:</label>
					<br>
					<input type="text" name="Enlace_Cancion" class="inputtotal" value="<?php echo $Enlace_Cancion; ?>">
					<br><br>
					<a href="<?php echo URL."disco/todosLosDiscos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" name="aceptar" value="Modificar"  onclick="modificar();">
					<?php echo form_close(); ?>
					<?php echo form_open("cancion/cancionBorra", array("onsubmit"=>"return confirm('¿Estás seguro?')")); ?>
					<input type="hidden" value="<?php echo $ID_Cancion; ?>" name="neoid">
					<input type="submit" value="Borrar" name ="borrar">
					<?php echo form_close(); ?>
				</fieldset>
			<?php
						}
			?>
		</section>
	</body>
</html>