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
				$this->load->view('lateral_admin_vista');
			?>
		</aside>
		<section id="seccion">
			<a href="<?php echo URL."usuario/grabaUsuario"; ?>" class='nuevous'>Nuevo usuario</a>
			<?php
				echo "<table id='tableuser'>";
				echo "<tr><td><p>ID</p></td><td><p>Nombre</p></td><td><p>Tipo</p></td><td><p>Teléfono</p></td><td><p>E-mail</p></td></tr>";
				foreach($rs_usuarios as $fila){
					echo "<tr><td><a href='".URL."usuario/verUsuario/".$fila->ID_Usuario."'>".$fila->ID_Usuario.
					"</a></td><td><p>".$fila->Nombre_Usuario."</p></td><td><p>".$fila->Tipo_Usuario.
					"</p></td><td><p>".$fila->Telefono_Usuario."</p></td><td><p>".$fila->Email_Usuario."</p></td></tr>";
				}
				echo "</table>";
			?>
		</section>
	</body>
</html>