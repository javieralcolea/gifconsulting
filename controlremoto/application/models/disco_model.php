<?php
    class Disco_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todosDiscos(){
			$query="SELECT * FROM discos ORDER BY Anio_Disco DESC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay discos";
				return $aviso;
			}
		}
		
		function eligeDisco($id){
			$query="SELECT * FROM discos WHERE ID_Disco='".$id."'";
			return mysql_query($query);
		}
		
		function grabaDisco($nombre,$anio,$caratula,$comentarios,$foto,$spotify,$itunes){
			$data = array(
				'Nombre_Disco'=>$nombre,
				'Anio_Disco'=>$anio,
				'Caratula_Disco'=>$caratula,
				'Comentarios_Disco'=>$comentarios,
				'Foto_Disco'=>$foto,
				'Spotify_Disco'=>$spotify,
				'Itunes_Disco'=>$itunes
			);
			return $this->db->insert('discos',$data);
		}
		
		function modificaDisco($id,$nombre,$anio,$caratula,$comentarios,$foto,$spotify,$itunes){
			$data = array(
				'Nombre_Disco'=>$nombre,
				'Anio_Disco'=>$anio,
				'Caratula_Disco'=>$caratula,
				'Comentarios_Disco'=>$comentarios,
				'Foto_Disco'=>$foto,
				'Spotify_Disco'=>$spotify,
				'Itunes_Disco'=>$itunes
			);
			$this->db->update('discos',$data,array('ID_Disco'=> $id));
		}
		
		function borraDisco($id){
			$this->db->delete('discos',array('ID_Disco'=> $id));
		}
		
		function borraCancionesDisco($id){
			$this->db->delete('canciones',array('ID_Disco'=> $id));
		}
    }
?>