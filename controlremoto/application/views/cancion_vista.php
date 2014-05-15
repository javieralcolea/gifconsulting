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
				<?php
						if(!isset($rs_cancion))
							echo "<p id='aviso'>Actualmente no hay canciones</p>";
						else{
							echo "<table><tr><td><p>Disco</p></td><td><p>Número</p></td><td><p>Título</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_cancion)){
								extract($resultado);
								echo "<tr><td><p>".$Nombre_Disco."</p></td><td><p>".$Num_Cancion."</p></td><td><a href='".URL."cancion/muestraCancion/"
								.$ID_Cancion."'>".$Titulo_Cancion."</a></td></tr>";
							}	
							echo "</table>";
						}
					?>
			</article>
		</section>
	</body>
</html>