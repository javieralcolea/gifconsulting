<?php
	class Usuario extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		/**
		 * Acceso a la aplicación. Pide las claves. Si no existe usuario administrador, envía a página donde se crea
		 */
		public function index(){
			$query = "SELECT * FROM usuario WHERE Tipo_Usuario='Admin'";
			$resul = mysql_query($query);
			if(mysql_num_rows($resul)>0){
				$data['incorrecto'] = "";
				$data['incorrectodos'] = "";
				$this->load->view('acceso_vista',$data);
				if($this->input->post('aceptar1')){
					if($this->form_validation->run() === false){	
			        $this->load->model('usuario_model');
			        $id = addslashes($this->input->post('id'));
			    	$clave = addslashes($this->input->post('clave'));
					$admin=$this->usuario_model->accesoAdmin($id, $clave);
					if($admin=="Contraseña o usuario incorrectos"){
						redirect('usuario/errorAccesoAdmin');
					}else{
						$resultado=mysql_fetch_array($admin);
						$this->session->set_userdata('id',$resultado['Usuario_Usuario']);
						$this->session->set_userdata('nombre',$resultado['Nombre_Usuario']);
						redirect('usuario/vistaAdmin');
					}
			    }
				}
				if($this->input->post('aceptar2')){
					if($this->form_validation->run() === false){	
			        $this->load->model('usuario_model');
			        $id = addslashes($this->input->post('id2'));
			    	$clave = addslashes($this->input->post('clave2'));
					$admin=$this->usuario_model->accesoUsuario($id, $clave);
					if($admin=="Contraseña o usuario incorrectos"){
						redirect('usuario/errorAccesoUsuario');
					}else{
						$resultado=mysql_fetch_array($admin);
						$this->session->set_userdata('id',$resultado['Usuario_Usuario']);
						$this->session->set_userdata('nombre',$resultado['Nombre_Usuario']);
						redirect('usuario/vistaUsuario');
					}
			    }
				}
				
			}else{
				redirect('usuario/grabaAdmin');
			}
			
		}
		
		/**
		 * Accede a la página de inicio del administrador
		 */
		public function vistaAdmin(){
			$this->load->view('admin_vista');
		}
		
		/**
		 * Accede a la página de inicio del usuario normal
		 */
		public function vistaUsuario(){
			$this->load->view('usuario_vista');
		}
		
		/**
		 * Graba el usuario administrador 
		 */
		public function grabaAdmin(){
			$this->load->view('grabaAdmin_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('usuario_model');
				    $usuario = addslashes($this->input->post('usuario'));
					$clave = addslashes($this->input->post('clave'));
					$tipo = $this->input->post('tipo');
					$nombre = addslashes($this->input->post('nombre'));
					$telefono = $this->input->post('telefono');
					$email = addslashes($this->input->post('email'));
					$fax = $this->input->post('fax');
					$this->usuario_model->nuevoUsuario($usuario, $clave, $tipo, $nombre, $telefono, $email, $fax);
					$this->session->set_userdata('id',$usuario);
					$this->session->set_userdata('nombre',$nombre);
					redirect('usuario/vistaAdmin');
				}
			}
		}
		
		/**
		 * Accede a cada uno de los usuarios
		 * @ $id: identificador del usuario
		 */
		public function verUsuario($id){
			$this->load->model('usuario_model');
			$usuario = $this->usuario_model->esteUsuario($id);
			$datos_usuario = array('rs_usuarios'=>$usuario);
			$this->load->view('usuario_mod_vista',$datos_usuario);
		}
		
		/**
		 * Graba un usuario normal
		 */
		public function grabaUsuario(){
			$this->load->view('grabaUsuario_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('usuario_model');
				    $usuario = addslashes($this->input->post('usuario'));
					$clave = addslashes($this->input->post('clave'));
					$tipo = $this->input->post('tipo');
					$nombre = addslashes($this->input->post('nombre'));
					$telefono = $this->input->post('telefono');
					$email = addslashes($this->input->post('email'));
					$fax = $this->input->post('fax');
					$this->usuario_model->nuevoUsuario($usuario, $clave, $tipo, $nombre, $telefono, $email, $fax);
					redirect('usuario/todosLosUsuarios');
				}
			}
		}
		
		/**
		 * Modifica campos de usuarios
		 */
		public function modificaUsuario(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('usuario_model');
					$id = $this->input->post('id');
				    $usuario = addslashes($this->input->post('usuario'));
					$clave = addslashes($this->input->post('clave'));
					$tipo = $this->input->post('tipo');
					$nombre = addslashes($this->input->post('nombre'));
					$telefono = $this->input->post('telefono');
					$email = addslashes($this->input->post('email'));
					$fax = $this->input->post('fax');
					$this->usuario_model->cambiaUsuario($id, $usuario, $clave, $tipo, $nombre, $telefono, $email, $fax);
					redirect('usuario/todosLosUsuarios');
				}
			}
		}
		
		/**
		 * Elimina usuarios
		 * @ $id: identificador del usuario que se va a borrar 
		 */
		public function usuarioBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('usuario_model');
					$id = $this->input->post('neoid');
					$this->usuario_model->borraUsuario($id);	
					redirect('usuario/todosLosUsuarios');
				}	
			}	
		}
		
		/**
		 * Devuelve un mensaje en el acceso del administrador si sus claves son incorrectas
		 */
		public function errorAccesoAdmin(){
			$data['incorrecto'] = "Usuario o contraseña incorrectos";
			$data['incorrectodos'] = "";
			$this->load->view('acceso_vista',$data);
		}
		
		/**
		 * Devuelve un mensaje en el acceso del usuario normal si sus claves son incorrectas
		 */
		public function errorAccesoUsuario(){
			$data['incorrecto'] = "";
			$data['incorrectodos'] = "Usuario o contraseña incorrectos";
			$this->load->view('acceso_vista',$data);
		}
		
		/**
		 * Cierra sesión
		 */
		public function cerrarSesion(){
			$this->session->sess_destroy();
			$this->load->view('acceso_vista');
		}
		
		/**
		 * Muestra todos los usuarios registrados
		 */	
		public function todosLosUsuarios(){
			$this->load->model('usuario_model');
			$usuario = $this->usuario_model->todosUsuarios();
			$datos_usuario = array('rs_usuarios'=>$usuario);
			$this->load->view('todosusuarios_vista',$datos_usuario);
		}
	}
?>