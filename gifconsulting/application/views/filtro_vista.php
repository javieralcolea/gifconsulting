<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Gif Consulting</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL."assets/css/gif.css"; ?>">
		<script src="<?php echo URL."assets/js/jquery-2.1.1.min.js"; ?>"></script>
		<script>
			function controlar(){
				if(document.getElementById("fechafac1").value != "" && document.getElementById("fechafac2").value == "")
					alert("Por favor, rellena la fecha de la última factura que deseas ver");
				if(document.getElementById("fechafac1").value == "" && document.getElementById("fechafac2").value != "")	
					alert("Por favor, rellena la fecha de la primera factura que deseas ver");
				if(document.getElementById("ven1").value != "" && document.getElementById("ven2").value == "")
					alert("Por favor, rellena la última fecha de vencimiento");
				if(document.getElementById("ven1").value == "" && document.getElementById("ven2").value != "")	
					alert("Por favor, rellena la primera fecha de vencimiento");
				if(document.getElementById("cobro1").value != "" && document.getElementById("cobro2").value == "")
					alert("Por favor, rellena la última fecha de cobro");
				if(document.getElementById("cobro1").value == "" && document.getElementById("cobro2").value != "")	
					alert("Por favor, rellena la primera fecha de cobro");
				if(document.getElementById("importe1").value != "" && document.getElementById("importe2").value == "")
					alert("Por favor, rellena la última cifra de importe");
				if(document.getElementById("importe1").value == "" && document.getElementById("importe2").value != "")	
					alert("Por favor, rellena la primera cifra de importe");
				if(document.getElementById("peticiones1").value != "" && document.getElementById("peticiones2").value == "")
					alert("Por favor, rellena la última fecha de líneas de gestión");
				if(document.getElementById("peticiones2").value == "" && document.getElementById("peticiones2").value != "")	
					alert("Por favor, rellena la primera fecha de líneas de gestión");
			}
		</script>
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
		<section>
			<fieldset id="campo5">
				<?php echo form_open('factura/filtradoFacturas'); ?>
					<h1>Facturas</h1>
					<br>
					<table>
						<tr>
							<td><label for="empresa">Empresa</label></td>
							<td>
								<select name="empresa">
									<option value=""></option>
									<?php
										foreach($empresa as $provincia){
										echo "<option value='".$provincia->Razon_Social."'>".$provincia->Razon_Social."</option>";
									}
									?>
								</select>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td><label for="deudor">Nombre del cliente</label></td>
							<td><input type="text" name="deudor"></td>
							<td><label for="numfac">Número de factura</label></td>
							<td><input type="text" name="numfac"></td>
						</tr>
					</table>
					<table>
						<tr>
							<td><label for="provincia">Provincia</label></td>
							<td><select name="provincia" id="provincia">
								<option value=""></option>
								<?php
									foreach($provincias as $provincia){
										echo "<option value='".$provincia->Provincia_Deudor."'>".$provincia->Provincia_Deudor."</option>";
									}
								?>
							</select></td>
							<td><label for="ciudad">Ciudad</label></td>
							<td><select name="ciudad" id="ciudad">
								<option value=""></option>
								<?php
									foreach($ciudades as $provincia){
										echo "<option value='".$provincia->Ciudad_Deudor."'>".$provincia->Ciudad_Deudor."</option>";
									}
								?>
							</select></td>
							<td><label for="cp">CP</label></td>
							<td><select name="cp" id="cp">
								<option value=""></option>
								<?php
									foreach($cp as $provincia){
										echo "<option value='".$provincia->CP_Deudor."'>".$provincia->CP_Deudor."</option>";
									}
								?>
							</select></td>
						</tr>
						<tr>
							<td><label for="cif">CIF cliente</label></td>
							<td><input type="text" name="cif"></td>
						</tr>
					</table>
					<table>
						<tr>
							<td><p>Fecha factura</p></td>
							<td><label for="fechafac1">De</label></td>
							<td><input type="date" name="fechafac1" id="fechafac1"></td>
							<td><label for="fechafac2">A</label></td>
							<td><input type="date" name="fechafac2" id="fechafac2"></td>
						</tr>
						<tr>
							<td><p>Fecha vencimiento</p></td>
							<td><label for="ven1">De</label></td>
							<td><input type="date" name="ven1" id="ven1"></td>
							<td><label for="ven2">A</label></td>
							<td><input type="date" name="ven2" id="ven2"></td>
						</tr>
						<tr>
							<td><p>Fecha cobro</p></td>
							<td><label for="cobro1">De</label></td>
							<td><input type="date" name="cobro1" id="cobro1"></td>
							<td><label for="cobro2">A</label></td>
							<td><input type="date" name="cobro2" id="cobro2"></td>
						</tr>
						<tr>
							<td><p>Importe factura</p></td>
							<td><label for="importe1">De</label></td>
							<td><input type="number" name="importe1" step="0.01" min="0" id="importe1"></td>
							<td><label for="importe2">A</label></td>
							<td><input type="number" name="importe2" step="0.01" min="0" id="importe2"></td>
						</tr>
					</table>
					<table>
						<tr>
							<td><label for="estado">Estado factura</label></td>
							<td>
								<select name="estado">
									<option value=""></option>
									<option value="Cobrada">Cobrada</option>
									<option value="Pendiente">Pendiente de cobro</option>
									<option value="Impagada">Impagada</option>
									<option value="Abogados">Abogados</option>
									<option value="Incobrable">Incobrable</option>
									<option value="Concurso">Concurso acreedores</option>
									<option value="Ilocalizable">Ilocalizable</option>
									<option value="Devuelta">Devuelta</option>
									<option value="Anulada">Anulada</option>
								</select>
							</td>
							<td><label for="tipo">Forma de pago</label></td>
							<td>
								<select name="tipo">
									<option value=""></option>
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
					</table>
					<table>
						<tr>
							<td><p>Líneas de gestión</p></td>
							<td><label for="peticiones1">De</label></td>
							<td><input type="date" name="peticiones1" id="peticiones1"></td>
							<td><label for="peticiones2">A</label></td>
							<td><input type="date" name="peticiones2" id="peticiones2"></td>
						</tr>
						<tr>
							<td><input type="submit" name="aceptar" value="Aceptar" onmouseover="controlar();"></td>
						</tr>
					</table>
				<?php echo form_close(); ?>
			</fieldset>
		</section>
	</body>
</html>