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
			<?php
				$this->load->view('lateral_admin_vista');
			?>
		</aside>
		<section id="seccion">
			<p class="centrado">El archivo no se ha cargado correctamente.<br>Revise el orden de los datos antes de volver a intentarlo.</p> 
		</section>
	</body>
</html>