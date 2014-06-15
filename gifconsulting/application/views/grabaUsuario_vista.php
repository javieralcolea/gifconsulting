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
			<fieldset id="campo3">
				<h1>Nuevo usuario</h1>
				<br>
				<?php echo form_open('usuario/grabaUsuario'); ?>
				<table>
					<tr>
						<td><label for="usuario">Usuario*</label></td>
						<td><input type="text" name="usuario" class="inputtotal" required></td>
					</tr>
					<tr>
						<td><label for="clave">Clave*</label></td>
						<td><input type="password" name="clave" class="inputtotal" required></td>
					</tr>
					<tr>
						<td><label for="tipo">Tipo*</label></td>
						<td><select name="tipo" required>
							<option value="Admin">Administrador</option>
							<option value="Normal">Normal</option>
						</select></td>
					</tr>
					<tr>
						<td><label for="nombre">Nombre</label></td>
						<td><input type="text" name="nombre" class="inputtotal"></td>
					</tr>
					<tr>
						<td><label for="telefono">Teléfono</label></td>
						<td><input type="tel" name="telefono" class="inputtotal"></td>
					</tr>
					<tr>
						<td><label for="email">E-mail</label></td>
						<td><input type="email" name="email" class="inputtotal"></td>
					</tr>
					<tr>
						<td><label for="fax">Fax</label></td>
						<td><input type="tel" name="fax" class="inputtotal"></td>
					</tr>
					<tr>
						<td></td><td><input type="submit" name="aceptar" value="Aceptar"></td>
					</tr>
				</table>
				<p>* Campos obligatorios</p>
			</fieldset>
		</section>
	</body>
</html>