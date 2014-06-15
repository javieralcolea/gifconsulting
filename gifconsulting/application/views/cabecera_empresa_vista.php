<img src="<?php echo URL."assets/img/gif.png"; ?>"/>
<?php
	if($this->session->userdata('cif')){
		echo "<p>Estás conectado como <b>".$this->session->userdata('cif')."</b></p>";
	}

?>
<div class="clr"></div>