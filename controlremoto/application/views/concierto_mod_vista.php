<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function modificar(){
				var sub = document.getElementById("texto").value.substring(0,3);
				if(sub != "<p>"){
					var texto = "<p>" + document.getElementById("texto").value + "</p>";
				texto = texto.replace(/\n/g, "<br>");
				document.getElementById("texto").value = texto;
				}
			}
		</script>
	</head>

	<body>
		<header>
			<h1>Concierto</h1>
		</header>
		<section id="sec">
			<?php echo form_open("concierto/actualizaConcierto"); ?>
				<fieldset>
					<?php 
						while($resultado=mysql_fetch_array($rs_concierto)){
								extract($resultado);
					?>
					<input type="hidden" value="<?php echo $ID_Concierto; ?>" name="id">
					<label for="fecha">Introduce la fecha</label>
					<br>
					<input type="date" id="fecha" name="fecha" value="<?php echo $Fecha_Concierto; ?>">
					<br><br>
					<label for="texto">Datos del concierto:</label>
					<textarea rows="20" id="texto" name="texto"><?php echo $Texto_Concierto; ?></textarea>
					<label for="entradas">Enlace venta entradas online:</label>
					<br>
					<input type="text" name="entradas" value="<?php echo $Entradas_Concierto; ?>">
					<br><br>
					<a href="<?php echo URL."concierto/todosConciertos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Modificar" name="aceptar" onclick="modificar();">
					<?php echo form_close(); ?>
					<?php echo form_open("concierto/conciertoBorra",array("onsubmit"=>"return confirm('¿Estás seguro?')")); ?>
					<input type="hidden" value="<?php echo $ID_Concierto; ?>" name="neoid">
					<input type="submit" value="Borrar" name="borrar" onclick="confirma();">
					<?php echo form_close(); ?>
					<?php } ?>
				</fieldset>
		</section>
	</body>
</html>