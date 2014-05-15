<?php
    class Imagen_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todasImagenes(){
			$query="SELECT * FROM imagenes ORDER BY ID_Galeria ASC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay imágenes";
				return $aviso;
			}
		}
		
		function todasImagenesGaleria($id){
			$query="SELECT * FROM imagenes a, galerias b WHERE a.ID_Galeria=b.ID_Galeria AND a.ID_Galeria='".$id."' ORDER BY 1 ASC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay imágenes";
				return $aviso;
			}
		}
		
		function eligeImagen($id){
			$query="SELECT * FROM imagenes WHERE ID_Imagen='".$id."'";
			return mysql_query($query);
		}
		
		function grabaImagen($galeria,$nombre,$alt){
			$data=array(
				'ID_Galeria'=>$galeria,
				'Nombre_Imagen'=>$nombre,
				'Alt_Imagen'=>$alt
			);
			return $this->db->insert('imagenes',$data);
		}
		
		function modificaImagen($id,$galeria,$nombre,$alt){
			$data=array(
				'ID_Galeria'=>$galeria,
				'Nombre_Imagen'=>$nombre,
				'Alt_Imagen'=>$alt
			);
			return $this->db->update('imagenes',$data,array('ID_Imagen',$id));
		}
		
		function borraImagen($id){
			$query="SELECT Nombre_Imagen FROM imagenes WHERE ID_Imagen='".$id."'";
			$resultado=mysql_query($query);
			while($row=mysql_fetch_array($resultado)){
				extract($row);
				$file='assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$Nombre_Imagen;
				unlink($file);
			}
			$this->db->delete('imagenes',array('ID_Imagen'=> $id));
		}
		
    }
?>