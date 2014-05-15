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
				<a href="<?php echo URL."concierto/nuevoConcierto"?>" id="nuevaentrada">Nuevo concierto</a>
				<?php
						if(!isset($rs_concierto))
							echo "<p id='aviso'>Actualmente no hay conciertos</p>";
						else{
							echo "<table><tr><td><p>ID</p></td><td><p>Fecha</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_concierto)){
								extract($resultado);
								echo "<tr><td><p>".$ID_Concierto."</p></td><td><a href='".URL."concierto/muestraConcierto/"
								.$ID_Concierto."'>".$Fecha_Concierto."</a></td></tr>";
							}	
							echo "</table>";
						}
					?>
			</article>
		</section>
	</body>
</html>