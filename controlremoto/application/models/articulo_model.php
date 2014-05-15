<?php
    class Articulo_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todosArticulos(){
			$query="SELECT * FROM articulos ORDER BY Fecha_Articulo DESC";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return $resul;
			}else{
				$aviso="Actualmente no hay artículos";
				return $aviso;
			}
		}
		
		function numArticulos(){
			return $this->db->count_all('articulos');
		}
		
		function getTodosArticulos($limit,$start){
			$this->db->order_by("Fecha_Articulo", "desc"); 
			$this->db->limit($limit,$start);
		    $resultado = $this->db->get('articulos');
		    return $resultado->result();
		}
		
		function eligeArticulo($id){
			$query="SELECT * FROM articulos WHERE ID_Articulo='".$id."'";
			return mysql_query($query);
		}
		
		function grabaArticulo($titulo,$textillo,$fecha,$publicar){
			$fecha = date("Y-m-d");
			$data = array(
				'Titulo_Articulo'=>$titulo,
				'Texto_Articulo'=>$textillo,
				'Fecha_Articulo'=>$fecha,
				'Publicado_Articulo'=>$publicar
			);
			$this->db->insert('articulos',$data);
		}
		
		function modificaArticulo($id,$titulo,$textillo,$fecha,$publicar){
			$data = array(
				'Titulo_Articulo'=>$titulo,
				'Texto_Articulo'=>$textillo,
				'Fecha_Articulo'=>$fecha,
				'Publicado_Articulo'=>$publicar
			);
			$this->db->update('articulos',$data,array('ID_Articulo'=> $id));
		}
		
		function borraArticulo($id){
			$this->db->delete('articulos',array('ID_Articulo'=> $id));
		}
    }
?>