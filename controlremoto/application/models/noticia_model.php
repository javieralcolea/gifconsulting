<?php
    class Noticia_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todasLasNoticias(){
			$query="SELECT * FROM noticias ORDER BY 1 DESC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay noticias";
				return $aviso;
			}
		}
		
		function eligeNoticia($id){
			$query="SELECT * FROM noticias WHERE ID_Noticia='".$id."'";
			return mysql_query($query);
		}
		
		function grabaNoticia($titulo,$textillo,$fecha,$publicar,$destacado){
			$fecha = date("Y-m-d");
			$data = array(
				'Titulo_Noticia'=>$titulo,
				'Texto_Noticia'=>$textillo,
				'Fecha_Noticia'=>$fecha,
				'Publicada_Noticia'=>$publicar,
				'Destacada_Noticia'=>$destacado
			);
			$this->db->insert('noticias',$data);
		}
		
		function modificaNoticia($id,$titulo,$textillo,$fecha,$publicar,$destacado){
			$data = array(
				'Titulo_Noticia'=>$titulo,
				'Texto_Noticia'=>$textillo,
				'Fecha_Noticia'=>$fecha,
				'Publicada_Noticia'=>$publicar,
				'Destacada_Noticia'=>$destacado
			);
			$this->db->update('noticias',$data,array('ID_Noticia'=> $id));
		}
		
		function borraNoticia($id){
			$this->db->delete('noticias',array('ID_Noticia'=> $id));
		}
    }
?>