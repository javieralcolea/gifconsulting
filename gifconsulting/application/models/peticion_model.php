<?php
    class Peticion_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todasPeticiones(){
			$query = "SELECT a.Fecha_Peticion, a.Hora_Peticion, a.ID_Factura, b.Nombre_Usuario".
			" FROM peticion a, usuario b , factura_usuario c WHERE a.ID_Usuario=b.ID_Usuario".
			" AND b.ID_Usuario=c.ID_Usuario AND a.Solucionada_Peticion='false' ORDER BY 1, 2";
			return mysql_query($query);
		}
		
		function verPeticion($id){
			$query = "SELECT * FROM peticion a, usuario b WHERE a.ID_Usuario=b.ID_Usuario AND ID_Peticion='".$id."'";
			return mysql_query($query);
		}
		
		function todasPeticionesFactura($id){
			$query = "SELECT * FROM peticion WHERE ID_Factura='".$id."'";
			return mysql_query($query);
		}
		
		function nuevaPeticion($factura, $usuario, $fecha, $hora, $comentario, $solucionada){
			$fecha = date("Y-m-d");
			$data = array(
				'ID_Factura' => $factura,
				'ID_Usuario' => $usuario,
				'Fecha_Peticion' => $fecha,
				'Hora_Peticion' => $hora,
				'Comentario_Peticion' => $comentario,
				'Solucionada_Peticion' => $solucionada
			);
			$this->db->insert('peticion', $data);
		}
		
		function cambiaPeticion($id, $factura, $usuario, $fecha, $hora, $comentario, $solucionada){
			$data = array(
				'ID_Factura' => $factura,
				'ID_Usuario' => $usuario,
				'Fecha_Peticion' => $fecha,
				'Hora_Peticion' => $hora,
				'Comentario_Peticion' => $comentario,
				'Solucionada_Peticion' => $solucionada
			);
			$this->db->update('peticion',$data,array('ID_Peticion'=> $id));
		}
    }
?>