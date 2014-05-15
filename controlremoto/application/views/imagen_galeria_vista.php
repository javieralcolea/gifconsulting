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
						if(!isset($rs_imagen))
							echo "<p id='aviso'>Actualmente no hay imágenes</p>";
						else{
							while($resultado=mysql_fetch_array($rs_imagen)){
								extract($resultado);
								echo "<a href='".URL."imagen/muestraImagen/".$ID_Imagen."'><img src='".URL."assets/img/"
								.$Nombre_Imagen."' alt='".$Alt_Imagen."' class='altstyle'></a>";
							}	
							
						}
					?>
			</article>
		</section>
	</body>
</html>