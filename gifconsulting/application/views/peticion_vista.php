<?php
if(isset($rs_peticion)){
foreach($rs_peticion as $fila){
	echo "<a href='peticion/estaPeticion/".$fila->ID_Peticion."'>".$fila->Fecha_Peticion." | ".$fila->Hora_Peticion." | ".
	$fila->ID_Factura." | ".$fila->Nombre_Usuario."</a><br>";
	}
}else{
	echo "<p class='centrado'>Actualmente no hay líneas de gestión abiertas</p>";
}
?>