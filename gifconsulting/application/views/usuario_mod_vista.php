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
				<?php echo form_open('usuario/modificaUsuario'); ?>
				<?php
					while($resultado=mysql_fetch_array($rs_usuarios)){
						extract($resultado);
						echo "<input type='hidden' name='id' value='".$ID_Usuario."'>";
				?>
				<table>
					<tr>
						<td><label for="usuario">Usuario*</label></td>
						<td><input type="text" name="usuario" class="inputtotal" required value="<?php echo $Usuario_Usuario;?>"></td>
					</tr>
					<tr>
						<td><label for="clave">Clave*</label></td>
						<td><input type="password" name="clave" class="inputtotal" required value="<?php echo $Clave_Usuario; ?>"></td>
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
						<td><input type="text" name="nombre" class="inputtotal" value="<?php echo $Nombre_Usuario; ?>"></td>
					</tr>
					<tr>
						<td><label for="telefono">Teléfono</label></td>
						<td><input type="tel" name="telefono" class="inputtotal" value="<?php echo $Telefono_Usuario; ?>"></td>
					</tr>
					<tr>
						<td><label for="email">E-mail</label></td>
						<td><input type="email" name="email" class="inputtotal" value="<?php echo $Email_Usuario; ?>"></td>
					</tr>
					<tr>
						<td><label for="fax">Fax</label></td>
						<td><input type="tel" name="fax" class="inputtotal" value="<?php echo $Fax_Usuario; ?>"></td>
					</tr>
					<tr>
						<td><input type="submit" name="aceptar" value="Modificar"></td>
						<?php echo form_close(); ?>
						<?php echo form_open('usuario/usuarioBorra',array("onsubmit"=>"return confirm('Vas a eliminar este usuario. \\n¿Estás seguro?')")); ?>
						<input type="hidden" name="neoid" value="<?php echo $ID_Usuario; ?>">
						<td><input type="submit" name="borrar" value="Eliminar"></td>
						<?php echo form_close(); ?>
						<td><a href="<?php echo URL."usuario/todosLosUsuarios"; ?>" id='volver'>Volver</a></td>
					</tr>
					<?php
						}
						?>
				</table>
				<p>* Campos obligatorios</p>
			</fieldset>
		</section>
	</body>
</html>