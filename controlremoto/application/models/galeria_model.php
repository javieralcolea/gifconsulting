<?php
    class Galeria_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todasLasGalerias(){
			$query="SELECT * FROM galerias ORDER BY Fecha_Galeria DESC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay galerías";
				return $aviso;
			}
		}
		
		function eligeGaleria($id){
			$query="SELECT * FROM galerias WHERE ID_Galeria='".$id."'";
			return mysql_query($query);
		}
		
		function grabaGaleria($fecha,$descripcion){
			$fecha = date("Y-m-d");
			$data = array(
				'Fecha_Galeria'=>$fecha,
				'Descripcion_Galeria'=>$descripcion
			);
			$this->db->insert('galerias',$data);
		}
		
		function modificaGaleria($id,$fecha,$descripcion){
			$data = array(
				'Fecha_Galeria'=>$fecha,
				'Descripcion_Galeria'=>$descripcion
			);
			$this->db->update('galerias',$data,array('ID_Galeria'=> $id));
		}
		
		function borraGaleria($id){
			$this->db->delete('galerias',array('ID_Galeria'=> $id));
		}
		
		function borraImagenesGaleria($id){
			$query="SELECT Nombre_Imagen FROM imagenes WHERE ID_Galeria='".$id."'";
			$resultado=mysql_query($query);
			while($row=mysql_fetch_array($resultado)){
				extract($row);
				$file='assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$Nombre_Imagen;
				unlink($file);
			}
			$this->db->delete('imagenes',array('ID_Galeria'=> $id));
		}
    }
?>