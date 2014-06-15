<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Gif Consulting</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/gif.css"; ?>">
		
	</head>
	<body>
		<header>
			<img src="<?php echo URL."assets/img/gif.png"; ?>" />
		</header>
		<section>
			<fieldset id="campo1">
				<?php echo form_open('usuario/index'); ?>
					<h1>Acceso administrador</h1>
					<br>
					<table>
						<tr>
							<td><label for="id">Usuario</label></td>
							<td><input type="text" name="id" required></td>
						</tr>
						<tr>
							<td><label for="clave">Contraseña</label></td>
							<td><input type="password" name="clave" required></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" value="Aceptar" name="aceptar1"></td>
						</tr>
					</table>
					<?php 
						if($incorrecto != ""){
							echo "<br><p id='incorrecto'>".$incorrecto."</p>";
						}
					?>
				<?php echo form_close(); ?>
			</fieldset>
			<fieldset id="campo2">
				<?php echo form_open('usuario/index'); ?>
					<h1>Acceso usuario</h1>
					<br>
					<table>
						<tr>
							<td><label for="id2">Usuario</label></td>
							<td><input type="text" name="id2" required></td>
						</tr>
						<tr>
							<td><label for="clave2">Contraseña</label></td>
							<td><input type="password" name="clave2" required></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" value="Aceptar" name="aceptar2"></td>
						</tr>
					</table>
					<?php 
						if($incorrectodos != ""){
							echo "<br><p id='incorrecto'>".$incorrectodos."</p>";
						}
					?>
				<?php echo form_close(); ?>
			</fieldset>
		</section>
	</body>
</html>