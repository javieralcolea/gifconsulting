<?php
if(!empty($rs_peticion)){
	foreach($rs_peticion as $fila){
		echo "<option><a href='".URL/peticion/estaPeticion/$fila->ID_Peticion."'>".$fila->Fecha_Peticion."</a></option>";
	}
}
?>