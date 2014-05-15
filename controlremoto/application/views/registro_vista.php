<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Admin - Control Remoto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/control.css"?>">
	</head>
	<body id="bodylogin">
		<fieldset id="registrofield">
			<?php
				if(!isset($this->session->userdata['id'])){
						echo form_open('admin/login');
			?>
			<h1 id="h1login">Accede a tu cuenta</h1>
				<br>
				<table>
					<tr>
						<td><label for="id">Usuario</label></td>
						<td><input type="text" name="id"></td>
					</tr>
					<tr>
						<td><label for="clave">Clave</label></td>
						<td><input type="password" name="clave"></td>
					</tr>	
					<tr>
						<td><input type="submit" value="Aceptar"></td>
						<!-- Falta añadir la ruta al enlace -->
						<td><a href="" id="volverin">Volver</a></td>
					</tr>
				</table>
				<?php	
						echo form_close();
					}else{
						echo "<table><tr><td><h1 id='h1logof'>Ya estás registrado</h1></td><tr>";
						echo "<td><a href='".URL."admin/cerrar_sesion' id='volver'>Cerrar sesión</a></td></tr></table>";
					}
					
				?>
		</fieldset>
	</body>
</html>