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
				<a href="<?php echo URL."disco/nuevoDisco"?>" id="nuevaentrada">Nuevo disco</a>
				<?php
						if(!isset($rs_disco))
							echo "<p id='aviso'>Actualmente no hay discos</p>";
						else{
							echo "<table><tr><td><p>Año</p></td><td><p>Título</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_disco)){
								extract($resultado);
								echo "<tr><td><p>".$Anio_Disco."</p></td><td><a href='".URL."disco/muestraDisco/"
								.$ID_Disco."'>".$Nombre_Disco."</a></td><td><a href='".URL.
								"cancion/nuevaCancion/".$ID_Disco."'><img src='".URL."/assets/img/add.png' class='lista'></a></td><td><a href='"
								.URL."/cancion/todasLasCancionesDisco/".$ID_Disco.
								"'><img src='".URL."assets/img/lista.png' class='lista'></a></td></tr>";
							}	
							echo "</table>";
						}
					?>
			</article>
		</section>
	</body>
</html>