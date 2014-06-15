<?php
    class Alarma_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		function todasAlarmas(){
			$query="SELECT a.Fecha_Alarma, a.Hora_Alarma, a.ID_Factura, b.Nombre_Usuario".
			" FROM alarma a, usuario b , factura_usuario c WHERE a.ID_Usuario=b.ID_Usuario".
			" AND b.ID_Usuario=c.ID_Usuario ORDER BY 1, 2";
			return mysql_query($query);
		}
		
		function verAlarma($id){
			$query = "SELECT * FROM alarma a, usuario b WHERE a.ID_Usuario=b.ID_Usuario AND ID_Alarma=".$id;
			return mysql_query($query);
		}
		
		function nuevaAlarma($factura, $usuario, $fecha, $hora, $comentario){
			$fecha = date("Y-m-d");
			$data = array(
				'ID_Factura' => $factura,
				'ID_Usuario' => $usuario,
				'Fecha_Peticion' => $fecha,
				'Hora_Peticion' => $hora,
				'Comentario_Peticion' => $comentario
			);
			$this->db->insert('peticion', $data);
		}
		
		function cambiaAlarma($id, $factura, $usuario, $fecha, $hora, $comentario){
			$data = array(
				'ID_Factura' => $factura,
				'ID_Usuario' => $usuario,
				'Fecha_Peticion' => $fecha,
				'Hora_Peticion' => $hora,
				'Comentario_Peticion' => $comentario
			);
			$this->db->update('peticion',$data,array('ID_Peticion'=> $id));
		}
		
		function borraAlarma($id){
			$this->db->delete('alarma',array('ID_Alarma'=> $id));
		}
    }
?>