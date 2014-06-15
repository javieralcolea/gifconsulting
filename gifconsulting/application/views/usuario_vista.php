<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Gif Consulting</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/gif.css"; ?>">
		
	</head>
	<body>
		<header>
			<?php $this->load->view('cabecera_vista'); ?>
		</header>
		<aside>
			<?php
				$this->load->view('lateral_usuario_vista');
			?>
		</aside>
		<section id="seccion">
			<div id="secuno">
				<h1>Alarmas</h1>
				<?php
					$this->load->view('alarma_vista');
				?>
			</div>
			<div id="secdos">
				<h1>Líneas de gestión</h1>
				<?php
					$this->load->view('peticion_vista');
				?>
			</div>
		</section>
	</body>
</html>