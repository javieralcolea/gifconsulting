<?php
    class Concierto_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todosLosConciertos(){
			$query="SELECT * FROM conciertos ORDER BY 1 DESC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay conciertos";
				return $aviso;
			}
		}
		
		function eligeConcierto($id){
			$query="SELECT * FROM conciertos WHERE ID_Concierto='".$id."'";
			return mysql_query($query);
		}
		
		function grabaConcierto($fecha,$texto,$entradas){
			$fecha = date("Y-m-d");
			$data = array(
				'Fecha_Concierto'=>$fecha,
				'Texto_Concierto'=>$texto,
				'Entradas_Concierto'=>$entradas
			);
			$this->db->insert('conciertos',$data);
		}
		
		function modificaConcierto($id,$fecha,$texto,$entradas){
			$data = array(
				'Fecha_Concierto'=>$fecha,
				'Texto_Concierto'=>$texto,
				'Entradas_Concierto'=>$entradas
			);
			$this->db->update('conciertos',$data,array('ID_Concierto'=> $id));
		}
		
		function borraConcierto($id){
			$this->db->delete('conciertos',array('ID_Concierto'=> $id));
		}
    }
?>