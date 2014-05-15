<?php
	foreach($galerias as $galeria){
		echo "<option value='".$galeria->ID_Galeria."'>".$galeria->Fecha_Galeria."/".$galeria->Descripcion_Galeria."</option>";
	}
?>