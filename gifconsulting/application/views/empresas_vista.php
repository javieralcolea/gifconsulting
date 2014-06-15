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
			<a href="<?php echo URL."empresa/nuevaEmpresa"; ?>" class='nuevous'>Nueva empresa</a>
			<?php
				if(!empty($rs_empresas)){
					echo "<table id='tableuser'>";
					echo "<tr><td><p>CIF</p></td><td><p>Razón social</p></td><td><p>Teléfono</p></td><td><p>E-mail</p></td></tr>";
					foreach($rs_empresas as $fila){
						echo "<tr><td><a href='".URL."empresa/verEmpresa/".$fila->CIF_Empresa."'>".$fila->CIF_Empresa.
						"</a></td><td><p>".$fila->Razon_Social."</p></td><td><p>"
						.$fila->TLF_Contacto_1."</p></td><td><p>".$fila->Email_Contacto_1."</p></td></tr>";
					}
					echo "</table>";
				}else{
					echo "<br><br><br><p class='centrado'>Actualmente no hay empresas registradas</p>";
				}
			?>
		</section>
	</body>
</html>