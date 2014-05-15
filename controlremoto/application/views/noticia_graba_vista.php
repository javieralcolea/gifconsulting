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
					document.getElementById("textillo").value+=texto;
				}
			}
			function ver(){
				var texto = "<p>" + document.getElementById("textillo").value + "</p>";
				texto = texto.replace(/\n/g, "<br>");
				var ventana = window.open("","","width=200,height=100");
				ventana.document.write(texto);
			}
			function modificar(){
				var texto = "<p>" + document.getElementById("textillo").value + "</p>";
				texto = texto.replace(/\n/g, "<br>");
				document.getElementById("textillo").value = texto;
			}
		</script>
	</head>

	<body>
		<header>
			<h1>Noticia</h1>
		</header>
		<section id="sec">
			<?php echo form_open("noticia/nuevaNoticia"); ?>
				<fieldset>
					<label for="titulo">Título</label>
					<br>
					<input type="text" id="titulo" name="titulo" required>
					<br>
					<button type="button" id= "botoncete" onclick="ver();">HTML</button>
					<div class="custom-input-file">
						<input type="file" id="archivo" class="input-file">
					    <img src="<?php echo URL."assets/img/index-img-icon.png"?>" class="imgfile">
					</div>
					<div class="clr"></div>
					<label for="contenido">Asunto:</label>
					<br>
					<textarea rows="20" id="textillo" onfocus="cambiar();" name="textillo"></textarea>
					<br>
					<label for="fecha">Introduce la fecha</label>
					<br>
					<input type="date" id="fecha" name="fecha">
					<br><br>
					<label for="publicar">¿Publicar?</label>
					<input type="radio" name="publicar" value="1" required><label>Sí</label>
					<input type="radio" name="publicar" value="0"><label>No</label><br>
					<label for="destacado">¿Destacada?</label>
					<input type="radio" name="destacado" value="1" required><label>Sí</label>
					<input type="radio" name="destacado" value="0"><label>No</label>
					<br><br>
					<a href="<?php echo URL."noticia/todasNoticias"; ?>" id="volver">Volver</a>
					<input type="submit" id="aceptar" name="aceptar" value="Aceptar"  onclick="modificar();">
				</fieldset>
			<?php echo form_close(); ?>
		</section>
	</body>
</html>