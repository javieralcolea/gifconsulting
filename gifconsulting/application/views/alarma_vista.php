<?php
if(isset($rs_alarma)){
foreach($rs_alarma as $fila){
	echo "<a href='alarma/estaAlarma/".$fila->ID_Alarma."'>".$fila->Fecha_Alarma." | ".$fila->Hora_Alarma." | ".
	$fila->ID_Factura." | ".$fila->Nombre_Usuario."</a><br>";
	}
}else{
	echo "<p class='centrado'>Actualmente no hay alarmas</p>";
}
?>