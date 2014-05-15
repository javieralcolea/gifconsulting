<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">

	</head>

	<body>
		<header>
			<h1>Bienvenido al administrador de Control Remoto</h1>
		</header>
		<section>
			<aside>
				<div id="asideh">
					<?php
						$this->load->view('lateral_vista');
					?>
				</div>
			</aside>
			<article>
				<a href="<?php echo URL."video/nuevoVideo"?>" id="nuevaentrada">Nuevo vídeo</a>
				<?php
						if(!isset($rs_video))
							echo "<p id='aviso'>Actualmente no hay vídeos</p>";
						else{
							echo "<table><tr><td><p>ID</p></td><td><p>Título</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_video)){
								extract($resultado);
								echo "<tr><td><p>".$ID_Video."</p></td><td><a href='".URL."video/muestraVideo/"
								.$ID_Disco."'>".$titulo_Video."</a></td></tr>";
							}	
							echo "</table>";
						}
					?>
			</article>
		</section>
	</body>
</html>