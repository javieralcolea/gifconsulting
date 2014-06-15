<?php
    class Usuario_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Acceso del administrador
		 * $id: identificador del administrador
		 * $clave: contraseña del administrador
		 */
		function accesoAdmin($id, $clave){
			$query="SELECT * FROM usuario WHERE Usuario_Usuario='".$id."' AND Clave_Usuario='".$clave."' AND Tipo_Usuario='Admin'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Contraseña o usuario incorrectos";
				return $resul;
			}
		}
		
		/**
		 * Acceso de usuario normal
		 * $id: identificador del usuario
		 * $clave: contraseña del usuario
		 */
		function accesoUsuario($id, $clave){
			$query="SELECT * FROM usuario WHERE Usuario_Usuario='".$id."' AND Clave_Usuario='".$clave."'";
			$resul=mysql_query($query);
			if(mysql_num_rows($resul)>0){
				return mysql_query($query);
			}else{
				$resul="Contraseña o usuario incorrectos";
				return $resul;
			}
		}
		
		/**
		 * Solicita todos los usuarios registrados
		 */
		function todosUsuarios(){
			$query = $this->db->get('usuario');
			return $query -> result();
		}
		
		/**
		 * Solicita un usuario concreto
		 * $id: identificador del usuario solicitado
		 */
		function esteUsuario($id){
			$query="SELECT * FROM usuario WHERE ID_Usuario=".$id;
			return mysql_query($query);
		}
		
		/**
		 * Graba nuevo usuario
		 * $usuario, $clave, $tipo, $nombre, $telefono, $email, $fax
		 */
		function nuevoUsuario($usuario, $clave, $tipo, $nombre, $telefono, $email, $fax){
			$data = array(
				'Usuario_Usuario' => $usuario,
				'Clave_Usuario' => $clave,
				'Tipo_Usuario' => $tipo,
				'Nombre_Usuario' => $nombre,
				'Telefono_Usuario' => $telefono,
				'Email_Usuario' => $email,
				'Fax_Usuario' => $fax
			);
			$this->db->insert('usuario', $data);
		}
		
		/**
		 * Modifica un usuario
		 * $id, $usuario, $clave, $tipo, $nombre, $telefono, $email, $fax
		 */
		function cambiaUsuario($id, $usuario, $clave, $tipo, $nombre, $telefono, $email, $fax){
			$data = array(
				'Usuario_Usuario' => $usuario,
				'Clave_Usuario' => $clave,
				'Tipo_Usuario' => $tipo,
				'Nombre_Usuario' => $nombre,
				'Telefono_Usuario' => $telefono,
				'Email_Usuario' => $email,
				'Fax_Usuario' => $fax
			);
			$this->db->update('usuario',$data,array('ID_Usuario'=> $id));
		}
		
		/**
		 * Elimina un usuario de la base de datos
		 * $id: identificador del usuario a eliminar
		 */
		function borraUsuario($id){
			$this->db->delete('usuario',array('ID_Usuario'=> $id));
		}
    }
?>