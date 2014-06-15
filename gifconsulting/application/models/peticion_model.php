<?php
    class Peticion_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Muestra todas las líneas de gestión que no han sido resueltas
		 */
		function todasPeticiones(){
			$query = "SELECT a.Fecha_Peticion, a.Hora_Peticion, a.ID_Factura, b.Nombre_Usuario".
			" FROM peticion a, usuario b , factura_usuario c WHERE a.ID_Usuario=b.ID_Usuario".
			" AND b.ID_Usuario=c.ID_Usuario AND a.Solucionada_Peticion='false' ORDER BY 1, 2";
			return mysql_query($query);
		}
		
		/**
		 * Muestra línea de gestión
		 * $id: id de la línea concreta
		 */
		function verPeticion($id){
			$query = "SELECT * FROM peticion a, usuario b WHERE a.ID_Usuario=b.ID_Usuario AND ID_Peticion='".$id."'";
			return mysql_query($query);
		}
		
		/**
		 * Devuelve todas las líneas de gestión de una factura concreta
		 * $id: id de la factura
		 */
		function peticionesFactura($id){
			$query = "SELECT * FROM peticion WHERE ID_Factura='".$id."'";
			return mysql_query($query);
		}
		
		/**
		 * Graba una nueva línea de gestión
		 * $factura, $usuario, $fecha, $hora, $comentario, $solucionada
		 */
		function nuevaPeticion($factura, $usuario, $fecha, $hora, $comentario, $solucionada){
			$query = "SELECT * FROM factura_usuario WHERE ID_Factura='".$factura."' AND ID_Usuario='".$usuario."'";
			$resul = mysql_query($query);
			if(mysql_num_rows($resul) < 1){
				$datos = array(
					'ID_Factura' => $factura,
					'ID_Usuario' => $usuario
				);
				$this->db->insert('factura_usuario',$datos);
			}
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
		
		/**
		 * Modifica una línea de gestión ya existente
		 * $id, $factura, $usuario, $fecha, $hora, $comentario, $solucionada
		 */
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