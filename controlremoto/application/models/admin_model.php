<?php
    class Admin_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function registroAdmin($id, $clave){
			$query="SELECT * FROM admin WHERE ID_Admin='".$id."' AND Clave_Admin='".$clave."'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Contraseña o usuario incorrectos";
				return $resul;
			}
		}
    }
?>