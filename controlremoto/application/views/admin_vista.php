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
				<a href="<?php echo URL."articulo/nuevoArticulo"?>" id="nuevaentrada">Nuevo artículo</a>
			<!--	<?php
						if(!isset($rs_articulo))
							echo "<p id='aviso'>Actualmente no hay artículos</p>";
						else{
							echo "<table><tr></td><td><p>Fecha</p></td><td><p>Artículo</p></td><td><p>¿Publicado?</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_articulo)){
								extract($resultado);
								$Fecha_Articulo = date("d-m-Y");
								echo "<tr><td><p>".$Fecha_Articulo."</p></td><td><a href='".URL."articulo/muestraArticulo/"
								.$ID_Articulo."'>".$Titulo_Articulo."</a></td>";
								echo "<td>";
								if($Publicado_Articulo=='1'){
									echo "<p><img src='".URL."assets/img/ok.png' class='yesno'></p>";
								}else{
									echo "<p><img src='".URL."assets/img/no.png' class='yesno'></p>";
								}
								echo "</td><tr>";
							}	
							echo "</table>";
						}
					?>-->
					<?php
						echo "<table><tr></td><td><p>Fecha</p></td><td><p>Artículo</p></td><td><p>¿Publicado?</p></td></tr>";
						foreach($lista as $fila){
							$date = new DateTime($fila->Fecha_Articulo);
							echo "<tr><td><p>".$date->format('d-m-Y')."</p></td><td><a href='".URL."articulo/muestraArticulo/"
								.$fila->ID_Articulo."'>".$fila->Titulo_Articulo."</a></td>";
							echo "<td>";
							if($fila->Publicado_Articulo=='1'){
								echo "<p><img src='".URL."assets/img/ok.png' class='yesno'></p>";
							}else{
								echo "<p><img src='".URL."assets/img/no.png' class='yesno'></p>";
							}
							echo "</td><tr>";
						}	
						echo "</table>";
						echo "<div class='paginacion'>".$paginacion."</div>";
						?>
			</article>
		</section>
	</body>
</html>