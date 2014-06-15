<?php
    class Empresa_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		/**
		 * Muestra todas las empresas registradas
		 */
		function todasEmpresas(){
			$query = $this->db->get('empresa');
			return $query -> result();
		}
		
		/**
		 * Muestra la empresa solicitada
		 * $id: identificador de la empresa
		 */
		function estaEmpresa($cif){
			$query="SELECT * FROM empresa WHERE CIF_Empresa='".$cif."'";
			return mysql_query($query);
		}
		
		/**
		 * Acceso de las empresas
		 * $id, $clave
		 */
		function accesoEmp($id, $clave){
			$query="SELECT * FROM empresa WHERE Usuario_Empresa='".$id."' AND Clave_Empresa='".$clave."'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Contraseña o usuario incorrectos";
				return $resul;
			}
		}
		
		/*
		 * Graba una nueva empresa en la base de datos
		 * $cif,$razon,$calle,$num,$puerta,$provincia,$poblacion,$cp,$cuenta,$porcen,$forma,$dia,$calle2,$num2,
			$puerta2,$provincia2,$poblacion2,$cp2,$contacto1,$tlf1,$email1,$contacto2,$tlf2,$email2,$contacto3,$tlf3,$email3,$usuario_empresa,$clave_empresa
		 */
		function nuevaEmpresa($cif,$razon,$calle,$num,$puerta,$provincia,$poblacion,$cp,$cuenta,$porcen,$forma,$dia,$calle2,$num2,
			$puerta2,$provincia2,$poblacion2,$cp2,$contacto1,$tlf1,$email1,$contacto2,$tlf2,$email2,$contacto3,$tlf3,$email3,$usuario_empresa,$clave_empresa){
			$data = array(
				'CIF_Empresa' => $cif,
				'Razon_Social' => $razon,
				'Calle_Empresa' => $calle,
				'Numero_Calle' => $num,
				'Puerta_Empresa' => $puerta,
				'Provincia_Empresa' => $provincia,
				'Poblacion_Empresa' => $poblacion,
				'CP_Empresa' => $cp,
				'Cuenta_Empresa' => $cuenta,
				'Porcentaje_Empresa' => $porcen,
				'Forma_Pago' => $forma,
				'Dia_Pago' => $dia,
				'Calle_Pagare' => $calle2,
				'Numero_Pagare' => $num2,
				'Puerta_Pagare' => $puerta2,
				'Provincia_Pagare' => $provincia2,
				'Poblacion_Pagare' => $poblacion2,
				'CP_Pagare' => $cp2,
				'Contacto_1' => $contacto1,
				'TLF_Contacto_1' => $tlf1,
				'Email_Contacto_1' => $email1,
				'Contacto_2' => $contacto2,
				'TLF_Contacto_2' => $tlf2,
				'Email_Contacto_2' => $email2,
				'Contacto_3' => $contacto3,
				'TLF_Contacto_3' => $tlf3,
				'Email_Contacto_3' => $email3,
				'Usuario_Empresa' => $usuario_empresa,
				'Clave_Empresa' => $clave_empresa
			);
			$this->db->insert('empresa', $data);
		}
		
		/**
		 * Modifica una empresa
		 * $cif,$razon,$calle,$num,$puerta,$provincia,$poblacion,$cp,$cuenta,$porcen,$forma,$dia,$calle2,$num2,
			$puerta2,$provincia2,$poblacion2,$cp2,$contacto1,$tlf1,$email1,$contacto2,$tlf2,$email2,$contacto3,$tlf3,$email3,$usuario_empresa,$clave_empresa
		 */
		function modificaEmpresa($cif,$razon,$calle,$num,$puerta,$provincia,$poblacion,$cp,$cuenta,$porcen,$forma,$dia,$calle2,$num2,
			$puerta2,$provincia2,$poblacion2,$cp2,$contacto1,$tlf1,$email1,$contacto2,$tlf2,$email2,$contacto3,$tlf3,$email3,$usuario_empresa,$clave_empresa){
			$data = array(
				'CIF_Empresa' => $cif,
				'Razon_Social' => $razon,
				'Calle_Empresa' => $calle,
				'Numero_Calle' => $num,
				'Puerta_Empresa' => $puerta,
				'Provincia_Empresa' => $provincia,
				'Poblacion_Empresa' => $poblacion,
				'CP_Empresa' => $cp,
				'Cuenta_Empresa' => $cuenta,
				'Porcentaje_Empresa' => $porcen,
				'Forma_Pago' => $forma,
				'Dia_Pago' => $dia,
				'Calle_Pagare' => $calle2,
				'Numero_Pagare' => $num2,
				'Puerta_Pagare' => $puerta2,
				'Provincia_Pagare' => $provincia2,
				'Poblacion_Pagare' => $poblacion2,
				'CP_Pagare' => $cp2,
				'Contacto_1' => $contacto1,
				'TLF_Contacto_1' => $tlf1,
				'Email_Contacto_1' => $email1,
				'Contacto_2' => $contacto2,
				'TLF_Contacto_2' => $tlf2,
				'Email_Contacto_2' => $email2,
				'Contacto_3' => $contacto3,
				'TLF_Contacto_3' => $tlf3,
				'Email_Contacto_3' => $email3,
				'Usuario_Empresa' => $usuario_empresa,
				'Clave_Empresa' => $clave_empresa
			);
			$this->db->update('empresa',$data,array('CIF_Empresa'=> $cif));
		}
		
		/**
		 * Elimina una empresa de la base de datos
		 * $cif: cif de la empresa
		 */	
		function borraEmpresa($cif){
			$this->db->delete('empresa',array('CIF_Empresa'=>$cif));
		}
	}
?>