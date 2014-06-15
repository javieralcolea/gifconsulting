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
			<?php
				if(!empty($rs_factura)){
					echo "<table id='tableuser'>";
					foreach($rs_factura as $fila){
						echo "<tr><td><p>".$fila->Fecha_Factura."</p></td><td><p>".$fila->Vencimiento_Factura.
						"</p></td><td><p>".$fila->Importe_Factura."</p></td><td><p>".$fila->Estado_Factura."
						</p></td><td><a href='".URL."factura/verFactura/".$fila->ID_Factura."'>Ir</a></td></tr>";
					}
					echo "</table>";
				}else{
					echo "<p class='centrado'>La búsqueda no ha generado ninguna factura</p>";
				}
			?>
		</section>
	</body>
</html>