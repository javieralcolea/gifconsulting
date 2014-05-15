<?php
    class Cancion_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todasCanciones(){
			$query="SELECT * FROM canciones a, discos b WHERE a.ID_Disco=b.ID_Disco ORDER BY b.ID_Disco, a.Num_Cancion ASC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay canciones";
				return $aviso;
			}
		}
		
		function todasCancionesDisco($id){
			$query="SELECT * FROM canciones a, discos b WHERE a.ID_Disco=b.ID_Disco AND a.ID_Disco='".$id."' ORDER BY Num_Cancion ASC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay canciones";
				return $aviso;
			}
		}
		
		function eligeCancion($id){
			$query="SELECT * FROM canciones WHERE ID_Cancion='".$id."'";
			return mysql_query($query);
		}
		
		function grabaCancion($disco,$Num_Cancion,$Titulo_Cancion,$Letra_Cancion,$Enlace_Cancion){
			$data=array(
				'ID_Disco'=>$disco,
				'Num_Cancion'=>$Num_Cancion,
				'Titulo_Cancion'=>$Titulo_Cancion,
				'Letra_Cancion'=>$Letra_Cancion,
				'Enlace_Cancion'=>$Enlace_Cancion
			);
			return $this->db->insert('canciones',$data);
		}
		
		function modificaCancion($id,$Num_Cancion,$Titulo_Cancion,$Letra_Cancion,$Enlace_Cancion){
			$data=array(
				'Num_Cancion'=>$Num_Cancion,
				'Titulo_Cancion'=>$Titulo_Cancion,
				'Letra_Cancion'=>$Letra_Cancion,
				'Enlace_Cancion'=>$Enlace_Cancion
			);
			return $this->db->update('canciones',$data,array('ID_Cancion'=>$id));
		}
		
		function borraCancion($id){
			$this->db->delete('canciones',array('ID_Cancion'=> $id));
		}
		
    }
?>