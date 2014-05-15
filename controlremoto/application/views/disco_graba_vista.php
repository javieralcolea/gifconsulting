<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
		<script>
			function cambiar(){
				if(document.getElementById("archivo").value!=""){
					var archivo=document.getElementById("archivo").value;
					document.getElementById("archivo").value="";
					var texto="<img src='"+archivo+"'>";
					texto = texto.replace("C:\\fakepath\\","http://localhost/controlremoto/assets/img/");
					document.getElementById("caratula").value+=texto;
				}
			}
			function cambiardos(){
				if(document.getElementById("archivodos").value!=""){
					var archivo=document.getElementById("archivodos").value;
					document.getElementById("archivodos").value="";
					var texto="<img src='"+archivo+"'>";
					texto = texto.replace("C:\\fakepath\\","http://localhost/controlremoto/assets/img/");
					document.getElementById("foto").value+=texto;
				}
			}
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
			<h1>Disco</h1>
		</header>
		<section id="sec">
			<?php echo form_open("disco/nuevoDisco"); ?>
				<fieldset>
					<label for="nombre">Nombre del disco</label>
					<br>
					<input type="text" id="titulo" name="nombre" required>
					<br><br>
					<label for="anio">Año: </label><input type="number" name="anio" required>
					<br><br>
					<label for="caratula">Carátula: </label>
					<div class="custom-input-file">
						<input type="file" id="archivo" class="input-file">
					    <img src="<?php echo URL."assets/img/index-img-icon.png"; ?>" class="imgfile">
					</div>
					<input type="text" name="caratula" id="caratula" class="inputtotal" onfocus="cambiar();">	
					<div class="clr"></div>
					<br>
					<label for="comentarios">Comentarios:</label>
					<br>
					<textarea rows="20" name="comentarios" id="comentarios"></textarea>
					<br><br>
					<label for="foto">Foto complementaria: </label>
					<div class="custom-input-file">
						<input type="file" id="archivodos" class="input-file">
					    <img src="<?php echo URL."assets/img/index-img-icon.png"; ?>" class="imgfile">
					</div>
					<input type="text" id="foto" name="foto" class="inputtotal" onfocus="cambiardos();">
					<br><br>
					<label for="spotfy">Enlace a Spotify:</label>
					<br>
					<input type="text" name="spotify" class="inputtotal">
					<br><br>
					<label for="itunes">Enlace a iTunes</label>
					<br>
					<input type="text" name="itunes" class="inputtotal">
					<br><br>
					<a href="<?php echo URL."disco/todosLosDiscos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Aceptar" name="aceptar" onclick="modificar();">
				</fieldset>
			<?php echo form_close(); ?>
		</section>
	</body>
</html>