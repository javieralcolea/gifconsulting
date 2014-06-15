<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Gif Consulting</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/gif.css"; ?>">
		<script>
			function mostrar(){
				if(document.getElementById("forma").value == "Pagare"){
					document.getElementById("ocultouno").style.display = "table-row";
					document.getElementById("ocultodos").style.display = "table-row";
				}else{
					document.getElementById("ocultouno").style.display = "none";
					document.getElementById("ocultodos").style.display = "none";
				}
			}
		</script>
	</head>
	<body>
		<header>
			<?php $this->load->view('cabecera_vista'); ?>
		</header>
		<section>
			<fieldset id="campo4">
				<?php echo form_open('empresa/nuevaEmpresa'); ?>
					<h1>Nueva empresa</h1>
					<br>
					<table>
						<tr>
							<td><label for="cif">CIF*</label></td>
							<td><input type="text" name="cif" required></td>
							<td><label for="razon">Razón social*</label></td>
							<td><input type="text" name="razon" required></td>
							<td><label for="calle">Calle</label></td>
							<td><input type="text" name="calle"></td>
							<td><label for="num">Número</label></td>
							<td><input type="text" name="num"></td>
						</tr>
						<tr>
							<td><label for="puerta">Puerta</label></td>
							<td><input type="text" name="puerta"></td>
							<td><label for="provincia">Provincia*</label></td>
							<td><input type="text" name="provincia" required></td>
							<td><label for="poblacion">Población*</label></td>
							<td><input type="text" name="poblacion" required></td>
							<td><label for="cp">Código postal</label></td>
							<td><input type="text" name="cp"></td>
						</tr>
						<tr>
							<td><label for="cuenta">Número cuenta</label></td>
							<td><input type="text" name="cuenta" max="20" min="20"></td>
							<td><label for="porcen">Porcentaje</label></td>
							<td><input type="number" name="porcen" step="0.01" min="0"></td>
							<td><label for="contacto1">Contacto 1</label></td>
							<td><input type="text" name="contacto1"></td>
							<td><label for="tlf1">Teléfono 1</label></td>
							<td><input type="tel" name="tlf1"></td>
							
						</tr>
						<tr>
							<td><label for="email1">Email 1</label></td>
							<td><input type="email" name="email1"></td>
							<td><label for="contacto2">Contacto 2</label></td>
							<td><input type="text" name="contacto2"></td>
							<td><label for="tlf2">Teléfono 2</label></td>
							<td><input type="tel" name="tlf2"></td>
							<td><label for="email2">Email 2</label></td>
							<td><input type="email" name="email2"></td>
						</tr>
						<tr>
							<td><label for="contacto3">Contacto 3</label></td>
							<td><input type="text" name="contacto3"></td>
							<td><label for="tlf1">Teléfono 3</label></td>
							<td><input type="tel" name="tlf3"></td>
							<td><label for="email3">Email 3</label></td>
							<td><input type="email" name="email3"></td>
							<td><label for="forma">Forma de pago</label></td>
							<td>
								<select name="forma" id="forma" onclick="mostrar();">
									<option value="Adelantado">Adelantado</option>
									<option value="Letra de cambio">Letra de cambio</option>
									<option value="Pagare">Pagaré</option>
									<option value="Cheque">Cheque</option>
									<option value="Transferencia">Transferencia</option>
									<option value="Domiciliado">Domiciliado</option>
									<option value="Confirming">Confirming</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="dia">Día de pago</label></td>
							<td><input type="number" name="dia" min="0" max="31" step="1"></td>
						</tr>
								<tr id="ocultouno">
									<td><label for="calle2">Calle pagaré</label></td>
									<td><input type="text" name="calle2"></td>
									<td><label for="num2">Número pagaré</label></td>
									<td><input type="text" name="num2"></td>
									<td><label for="puerta2">Puerta pagaré</label></td>
									<td><input type="text" name="puerta2"></td>
									<td><label for="provincia2">Provincia pagaré</label></td>
									<td><input type="text" name="provincia2"></td>
								</tr>
								<tr id="ocultodos">
									<td><label for="poblacion2">Población pagaré</label></td>
									<td><input type="text" name="poblacion2"></td>
								</tr>
						<tr>
							<td><label for="usuario">Usuario</label></td>
							<td><input type="text" name="usuario"></td>
							<td><label for="clave">Clave</label></td>
							<td><input type="text" name="clave"></td>
						</tr>
						<tr>
							<td><input type="submit" value="Aceptar" name="aceptar"></td>
						</tr>
					</table>
					<p>* Campos Obligatorios</p>
				<?php echo form_close(); ?>
			</fieldset>
		</section>
	</body>
</html>