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
				<a href="<?php echo URL."noticia/nuevaNoticia"?>" id="nuevaentrada">Nueva noticia</a>
				<?php
						if(!isset($rs_noticia))
							echo "<p id='aviso'>Actualmente no hay noticias</p>";
						else{
							echo "<table><tr></td><td><p>Fecha</p></td><td><p>Noticia</p></td><td><p>¿Publicada?</p></td><td><p>¿Destacada?</p></td></tr>";
							while($resultado=mysql_fetch_array($rs_noticia)){
								extract($resultado);
								$Fecha_Noticia = date("d-m-Y");
								echo "<tr><td><p>".$Fecha_Noticia."</p></td><td><a href='".URL."noticia/muestraNoticia"
								.$ID_Noticia."'>".$Titulo_Noticia."</a></td>";
								echo "<td>";
								if($Publicada_Noticia=='1'){
									echo "<p><img src='".URL."assets/img/ok.png' class='yesno'></p>";
								}else{
									echo "<p><img src='".URL."assets/img/no.png' class='yesno'></p>";
								}
								echo "</td><td>";
								if($Destacada_Noticia=='1'){
									echo "<p><img src='".URL."assets/img/ok.png' class='yesno'></p>";
								}else{
									echo "<p><img src='".URL."assets/img/no.png' class='yesno'></p>";
								}
								echo "</td></tr>";
							}	
							echo "</table>";
						}
					?>
			</article>
		</section>
	</body>
</html>