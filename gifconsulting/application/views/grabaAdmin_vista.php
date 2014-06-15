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
				<?php echo form_open('usuario/grabaAdmin'); ?>
					<h1>Graba administrador</h1>
					<br>
					<table>
						<tr>
							<td><label for="usuario">Usuario*</label></td>
							<td><input type="text" name="usuario" required></td>
						</tr>
						<tr>
							<td><label for="clave">Contraseña*</label></td>
							<td><input type="password" name="clave" required></td>
							<input type="hidden" name="tipo" value="Admin">
						</tr>
						<tr>
							<td><label for="nombre">Nombre</label></td>
							<td><input type="text" name="nombre"></td>
						</tr>
						<tr>
							<td><label for="telefono">Teléfono</label></td>
							<td><input type="tel" name="telefono"></td>
						</tr>
						<tr>
							<td><label for="email">E-mail</label></td>
							<td><input type="email" name="email"></td>
						</tr>
						<tr>
							<td><label for="fax">Fax</label></td>
							<td><input type="tel" name="fax"></td>
						</tr>
						<tr>
							<td><p>*Obligatorios</p></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" value="Aceptar" name="aceptar"></td>
						</tr>
					</table>
				<?php echo form_close(); ?>
			</fieldset>
		</section>
	</body>
</html>