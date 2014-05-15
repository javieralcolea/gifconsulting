<?php
    class Video_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todosVideos(){
			$query="SELECT * FROM videos ORDER BY 1 DESC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay vídeos";
				return $aviso;
			}
		}
		
		function eligeVideo($id){
			$query="SELECT * FROM videos WHERE ID_Video='".$id."'";
			return mysql_query($query);
		}
		
		function grabaVideo($nombre,$tipo,$enlace,$comentarios){
			$data=array(
				'Titulo_Video'=>$nombre,
				'Tipo_Video'=>$tipo,
				'Enlace_Video'=>$enlace,
				'Comentarios_Video'=>$comentarios
			);
			return $this->db->insert('videos',$data);
		}
		
		function modificaVideo($id,$nombre,$tipo,$enlace,$comentarios){
			$data=array(
				'Titulo_Video'=>$nombre,
				'Tipo_Video'=>$tipo,
				'Enlace_Video'=>$enlace,
				'Comentarios_Video'=>$comentarios
			);
			return $this->db->update('videos',$data,array('ID_Video'=> $id));
		}
		
		function borraVideo($id){
			$this->db->delete('videos',array('ID_Video'=> $id));
		}
    }
?>