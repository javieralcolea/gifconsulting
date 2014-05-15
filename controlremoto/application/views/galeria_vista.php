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
				<a href="<?php echo URL."galeria/nuevaGaleria"?>" id="nuevaentrada">Nueva galería</a>
				<?php
						if(!isset($rs_galeria))
							echo "<p id='aviso'>Actualmente no hay galerías</p>";
						else{
							echo "<table><tr><td><p>Año</p></td><td><p>Descripción</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_galeria)){
								extract($resultado);
								echo "<tr><td><p>".$Fecha_Galeria."</p></td><td><a href='".URL."galeria/muestraGaleria/"
								.$ID_Galeria."'>".$Descripcion_Galeria."</a></td><td><a href='"
								.URL."/imagen/todasLasImagenesGaleria/".$ID_Galeria.
								"'><img src='".URL."assets/img/lista.png' class='lista'></a></td></tr>";
							}	
							echo "</table>";
						}
					?>
			</article>
		</section>
	</body>
</html>