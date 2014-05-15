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
			<h1>Disco</h1>
		</header>
		<section id="sec">
			<?php echo form_open("disco/actualizaDisco"); ?>
				<fieldset>
					<?php 
						while($resultado=mysql_fetch_array($rs_disco)){
								extract($resultado);
					?>
					<input type="hidden" value="<?php echo $ID_Disco; ?>" name="id">
					<label for="nombre">Nombre del disco</label>
					<br>
					<input type="text" id="titulo" name="nombre" value="<?php echo $Nombre_Disco; ?>">
					<br><br>
					<label for="anio">Año: </label><input type="number" name="anio" value="<?php echo $Anio_Disco; ?>">
					<br><br>
					<label for="caratula">Carátula: </label>
					<div class="custom-input-file">
						<input type="file" id="archivo" class="input-file">
					    <img src="<?php echo URL."assets/img/index-img-icon.png"; ?>" class="imgfile">
					</div>
					<input type="text" name="caratula" class="inputtotal" id="caratula" value="<?php echo $Caratula_Disco; ?>" onfocus="cambiar();">	
					<div class="clr"></div>
					<br>
					<label for="comentarios">Comentarios:</label>
					<br>
					<textarea rows="20" name="comentarios" id="comentarios"><?php echo $Comentarios_Disco; ?></textarea>
					<br><br>
					<label for="foto">Foto complementaria: </label>
					<div class="custom-input-file">
						<input type="file" id="archivodos" class="input-file">
					    <img src="<?php echo URL."assets/img/index-img-icon.png"; ?>" class="imgfile">
					</div>
					<input type="text" id="foto" name="foto" class="inputtotal" value="<?php echo $Foto_Disco; ?>" onfocus="cambiardos();">
					<br><br>
					<label for="spotfy">Enlace a Spotify:</label>
					<br>
					<input type="text" name="spotify" class="inputtotal" value="<?php echo $Spotify_Disco; ?>">
					<br><br>
					<label for="itunes">Enlace a iTunes</label>
					<br>
					<input type="text" name="itunes" class="inputtotal" value="<?php echo $Itunes_Disco; ?>">
					<br><br>
					<a href="<?php echo URL."disco/todosLosDiscos"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" value="Aceptar" name="aceptar" onclick="modificar();">
					<?php echo form_close(); ?>
					<?php echo form_open("disco/discoBorra",array("onsubmit"=>"return confirm('¿Estás seguro?')")); ?>
					<input type="hidden" value="<?php echo $ID_Disco; ?>" name="neoid">
					<input type="submit" value="Borrar" name="borrar">
					<?php echo form_close(); ?>
					<?php } ?>
				</fieldset>
			
		</section>
	</body>
</html>