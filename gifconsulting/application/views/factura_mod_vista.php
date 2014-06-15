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
		<section>
			<fieldset id="campo7">
				<?php echo form_open('factura/cambiaFactura'); ?>
					<?php
						while($resultado=mysql_fetch_array($rs_factura)) {
							extract($resultado);
						?>
						<input type="hidden" name="id" value="<?php echo $ID_Factura; ?>">
						<table>
							<tr>
								<td><label for="empresa">Empresa</label></td>
								<td><input type="text" name="empresa" value="<?php echo $Razon_Social; ?>"></td>
								<td><label for="datos">Datos</label></td>
								<td><select>
									<option></option>
									<option>CIF: <?php echo $CIF_Empresa; ?></option>
									<option>Nº cuenta: <?php echo $Cuenta_Empresa; ?></option>
									<option>Dirección envío pagarés: 
										<?php echo $Calle_Pagare.", ".$Numero_Pagare.", ".$Puerta_Pagare.", ".
										$Poblacion_Pagare.", ".$Provincia_Pagare.", ".$CP_Pagare;?></option>
								</select></td>
							</tr>
						
							<tr>
								<td><label>Deudor</label></td>
								<td><input type="text" value="<?php echo $Nombre_Deudor; ?>"</td>
								<td><label for="deudor">CIF Deudor</label></td>
								<td><input type="text" name="deudor" value="<?php echo $CIF_Deudor; ?>"</td>
							</tr>
							<tr>
								<td><label for="num">Número de factura</label></td>
								<td><input type="text" name="num" value="<?php echo $Numero_Factura; ?>"</td>
								<td><label for="importe">Importe</label></td>
								<td><input type="number" name="importe"  step="0.01" min="0" value="<?php echo $Importe_Factura; ?>"</td>
							</tr>
							<tr>
								<td><label for="pendiente">Importe pendiente</label></td>
								<td><input type="number" name="pendiente" value="<?php echo $Imp_Pend_Factura; ?>"</td>
								<td><label for="tipo">Tipo de factura</label></td>
								<td><input type="text" name="tipo" value="<?php echo $Tipo_Factura; ?>"</td>
							</tr>
							<tr>
								<td><label for="fecha">Fecha factura</label></td>
								<td><input type="date" name="fecha" value="<?php echo $Fecha_Factura; ?>"></td>
								<td><label for="venci">Fecha vencimiento</label></td>
								<td><input type="date" name="venci" value="<?php echo $Vencimiento_Factura; ?>"></td>
							</tr>
							<tr>
								<td><label for="cobro">Fecha de cobro</label></td>
								<td><input type="date" name="cobro" value="<?php echo $Cobro_Factura; ?>"></td>
								<td><label for="pago">Tipo de pago</label></td>
								<td>
									<select name="pago">
									<option value="<?php echo $Tipo_Pago; ?>"><?php echo $Tipo_Pago; ?></option>
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
								<td><label for="estado">Estado factura</label></td>
								<td><select name="estado">
									<option value="<?php echo $Estado_Factura; ?>"><?php echo $Estado_Factura; ?></option>
									<option value="Cobrada">Cobrada</option>
									<option value="Pendiente">Pendiente de cobro</option>
									<option value="Impagada">Impagada</option>
									<option value="Abogados">Abogados</option>
									<option value="Incobrable">Incobrable</option>
									<option value="Concurso">Concurso acreedores</option>
									<option value="Ilocalizable">Ilocalizable</option>
									<option value="Devuelta">Devuelta</option>
									<option value="Anulada">Anulada</option>
								</select></td>
							</tr>
						<?php	
						}
						?>
						<tr>
							<td><select>
								<option>Alarmas</option>
							</select></td>
							<td><a href="" id="volver">Nueva alarma</a></td>
							<td><select>
								<option>Líneas de gestión</option>
								<?php
									$this->load->view('peticiones_factura_vista');
								?>
							</select></td>
							<td><a href="" id="volver">Nueva línea de gestión</a></td>
						</tr>
						<tr>
							<td><input type="submit" value="Aceptar" name="aceptar"></td>
						</tr>
					</table>
				<?php echo form_close(); ?>
			</fieldset>
		</section>
	</body>
</html>