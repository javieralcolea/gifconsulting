<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Gif Consulting</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/gif.css"; ?>">
		<script>
			function prueba(){
				var file = document.getElementById('archivo').value;
					var corta = file.split(".");
					var cortados = corta[corta.length-1];
					if(cortados != "xls" && cortados != "xlsx"){
						alert("El archivo introducido no tiene formato Excel");
					}
			}
		</script>
	</head>
	<body>
		<header>
			<?php $this->load->view('cabecera_empresa_vista'); ?>
		</header>
		<aside>
			<?php $this->load->view('lateral_empresa_vista'); ?>
		</aside>
		<section id="seccion">
			<fieldset id="campo3">
				<h1>Sube archivo</h1>
				<br>
				<?php echo form_open_multipart('upload/do_upload'); ?>
				<input type="file" name="archivo" id="archivo" >
				<br>
				<br>
				<input type="submit" name="aceptar" value="Aceptar" id="aceptar" onmouseover="prueba();" onfocus="prueba();" >
				<?php echo form_close(); ?>
			</fieldset>
		</section>
	</body>
</html>