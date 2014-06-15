<?php
    class Deudor_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Extrae todos lod deudores
		 */
		function todosDeudores(){
			$query="SELECT * FROM deudor ORDER BY CIF_Deudor";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Actualmente no hay deudores";
				return $resul;
			}
		}
		
		/**
		 * Extrae todas las provincias de la tabla deudor
		 */
		
		function provinciasDeudor(){
			$query="SELECT DISTINC Provincia_Deudor FROM deudor";
			return mysql_query($query);
		}
		
		/**
		 * Extrae todas las ciudades de la tabla deudor
		 */
		function ciudadesDeudor(){
			$query="SELECT DISTINC Ciudad_Deudor FROM deudor";
			return mysql_query($query);
		}
		
		
		/**
		 * Extrae todos los cp de la tabla deudor
		 */
		 
		function cpDeudor(){
			$query="SELECT DISTINC CP_Deudor FROM deudor";
			return mysql_query($query);
		}
		 
		/**
		 * Extrae todos los deudores de una empresa concreta
		 * $id: CIF de la empresa
		 */
		function todosDeudoresEmpresa($id){
			$query="SELECT DISTINCT CIF_Deudor FROM factura WHERE CIF_Empresa='".$id."'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Actualmente no hay deudores";
				return $resul;
			}
		}
		
		/**
		 * Extrae todos los deudores de una provincia concreta
		 * $provincia: provincia concreta
		 */
		function todosDeudoresProvincia($provincia){
			$query="SELECT DISTINCT CIF_Deudor FROM deudor WHERE Provincia_Deudor='".$provincia."'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Actualmente no hay deudores";
				return $resul;
			}
		}
		
		/**
		 * Extrae todos los deudores de una ciudad concreta
		 * $ciudad: ciudad concreta
		 */
		function todosDeudoresCiudad($ciudad){
			$query="SELECT DISTINCT CIF_Deudor FROM deudor WHERE Ciudad_Deudor='".$ciudad."'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Actualmente no hay deudores";
				return $resul;
			}
		}
		
		/**
		 * Extrae un deudor concreto
		 * $id: CIF del deudor
		 */
		function esteDeudor($id){
			$query="SELECT * FROM deudor WHERE CIF_Deudor='".$id."'";
			return mysql_query($query);
		}
		
		/**
		 * Modifica los datos de un deudor
		 * $id, $nombre, $provincia, $ciudad, $cp, $telefono, $contacto
		 */
		function modificaDeudor($id, $nombre, $provincia, $ciudad, $cp, $telefono, $contacto){
			$data = array(
				'CIF_Deudor' => $id,
				'Nombre_Deudor' => $nombre,
				'Provincia_Deudor' => $provincia,
				'Ciudad_Deudor' => $ciudad,
				'CP_Deudor' => $cp,
				'Telefono_Deudor' => $telefono,
				'Contacto_Deudor' => $contacto
			);
			$this->db->update('deudor',$data,array('CIF_Deudor'=> $id));
		}
		
		/**
		 * Graba un nuevo deudor
		 * $id, $nombre, $provincia, $ciudad, $cp, $telefono, $contacto
		 */
		function grabaDeudor($id, $nombre, $provincia, $ciudad, $cp, $telefono, $contacto){
			$data = array(
				'CIF_Deudor' => $id,
				'Nombre_Deudor' => $nombre,
				'Provincia_Deudor' => $provincia,
				'Ciudad_Deudor' => $ciudad,
				'CP_Deudor' => $cp,
				'Telefono_Deudor' => $telefono,
				'Contacto_Deudor' => $contacto
			);
			$this->db->insert('deudor',$data);
			
		}
    }
?>