<?php
	class Empresa extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		/**
		 * Muestra todas las empresas registradas
		 */
		public function todasLasEmpresas(){
			$this->load->model('empresa_model');
			$empresa = $this->empresa_model->todasEmpresas();
			$datos_empresa = array('rs_empresas'=>$empresa);
			$this->load->view('empresas_vista',$datos_empresa);
		}
		
		/**
		 * Muestra el acceso para empresas
		 */ 
		public function accesoEmpresa(){
			$data['incorrecto'] = "";
			$this->load->view('acceso_empresa_vista',$data);
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('empresa_model');
					$id = addslashes($this->input->post('id'));
			    	$clave = addslashes($this->input->post('clave'));
					$empresa=$this->empresa_model->accesoEmp($id, $clave);
					if($empresa=="Contraseña o usuario incorrectos"){
						redirect('empresa/errorAccesoEmpresa');
					}else{
						$resultado=mysql_fetch_array($empresa);
						$this->session->set_userdata('cif',$resultado['CIF_Empresa']);
						redirect('empresa/vistaEmpresa');
					}
				}
			}		
		}
		
		/**
		 * Devuelve un mensaje en el acceso de la empresa si sus claves son incorrectas
		 */
		public function errorAccesoEmpresa(){
			$data['incorrecto'] = "Usuario o contraseña incorrectos";
			$this->load->view('acceso_empresa_vista',$data);
		}
		
		/**
		 * Vista que se muestra cuando el archivo ha sido subido con éxito
		 */
		public function exitoArchivoSubido(){
			$this->load->view('success_upload_view');
		}
		
		/**
		 * Accede a cada una de las empresas
		 * @ $cif: identificador de la empresa
		 */
		public function verEmpresa($cif){
			$this->load->model('empresa_model');
			$empresa = $this->empresa_model->estaEmpresa($cif);
			$datos_empresa = array('rs_empresas'=>$empresa);
			$this->load->view('empresa_mod_vista',$datos_empresa);
		}
		
		/**
		 * Permite a una empresa acceder a sus datos
		 * @ $cif: identificador de la empresa
		 */
		public function verDatosempresa($cif){
			$this->load->model('empresa_model');
			$empresa = $this->empresa_model->estaEmpresa($cif);
			$datos_empresa = array('rs_empresas'=>$empresa);
			$this->load->view('empresa_cambia_vista',$datos_empresa);
		}
		
		/**
		 * Graba una empresa el administrador
		 */
		public function nuevaEmpresa(){
			$this->load->view('grabaEmpresa_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('empresa_model');
				    $cif = addslashes($this->input->post('cif'));
					$razon = addslashes($this->input->post('razon'));
					$calle = addslashes($this->input->post('calle'));
					$num = addslashes($this->input->post('num'));
					$puerta = addslashes($this->input->post('puerta'));
					$provincia = addslashes($this->input->post('provincia'));
					$poblacion = addslashes($this->input->post('poblacion'));
					$cp = addslashes($this->input->post('cp'));
					$cuenta = addslashes($this->input->post('cuenta'));
					$porcen = $this->input->post('porcen');
					$forma = $this->input->post('forma');
					$dia = $this->input->post('dia');
					$calle2 = addslashes($this->input->post('calle2'));
					$num2 = addslashes($this->input->post('num2'));
					$puerta2 = addslashes($this->input->post('puerta2'));
					$provincia2 = addslashes($this->input->post('provincia2'));
					$poblacion2 = addslashes($this->input->post('poblacion2'));
					$cp2 = addslashes($this->input->post('cp2'));
					$contacto1 = addslashes($this->input->post('contacto1'));
					$tlf1 = $this->input->post('tlf1');
					$email1 = addslashes($this->input->post('email1'));
					$contacto2 = addslashes($this->input->post('contacto2'));
					$tlf2 = $this->input->post('tlf2');
					$email2 = addslashes($this->input->post('email2'));
					$contacto3 = addslashes($this->input->post('contacto3'));
					$tlf3 = $this->input->post('tlf3');
					$email3 = addslashes($this->input->post('email3'));
					$usuario_empresa = addslashes($this->input->post('usuario'));
					$clave_empresa = addslashes($this->input->post('clave'));
					$this->empresa_model->nuevaEmpresa($cif,$razon,$calle,$num,$puerta,$provincia,$poblacion,$cp,$cuenta,$porcen,$forma,$dia,$calle2,$num2,
					$puerta2,$provincia2,$poblacion2,$cp2,$contacto1,$tlf1,$email1,$contacto2,$tlf2,$email2,$contacto3,$tlf3,$email3,$usuario_empresa,$clave_empresa);
					redirect('empresa/todasLasEmpresas');
				}
			}
		}

		/**
		 * Cierra sesión la empresa
		 */
		public function cerrarSesion(){
			$this->session->sess_destroy();
			$data['incorrecto'] = "";
			$this->load->view('acceso_empresa_vista',$data);
		}
		
		/**
		 * Muestra la página principal de las empresas
		 */
		 
		 public function vistaEmpresa(){
		 	$this->load->view('main_empresa_vista');
		 }
		
		/**
		 * Modifica campos de empresas
		 */
		public function cambiaEmpresa(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('empresa_model');
				    $cif = addslashes($this->input->post('cif'));
					$razon = addslashes($this->input->post('razon'));
					$calle = addslashes($this->input->post('calle'));
					$num = addslashes($this->input->post('num'));
					$puerta = addslashes($this->input->post('puerta'));
					$provincia = addslashes($this->input->post('provincia'));
					$poblacion = addslashes($this->input->post('poblacion'));
					$cp = addslashes($this->input->post('cp'));
					$cuenta = addslashes($this->input->post('cuenta'));
					$porcen = $this->input->post('porcen');
					$forma = $this->input->post('forma');
					$dia = $this->input->post('dia');
					$calle2 = addslashes($this->input->post('calle2'));
					$num2 = addslashes($this->input->post('num2'));
					$puerta2 = addslashes($this->input->post('puerta2'));
					$provincia2 = addslashes($this->input->post('provincia2'));
					$poblacion2 = addslashes($this->input->post('poblacion2'));
					$cp2 = addslashes($this->input->post('cp2'));
					$contacto1 = addslashes($this->input->post('contacto1'));
					$tlf1 = $this->input->post('tlf1');
					$email1 = addslashes($this->input->post('email1'));
					$contacto2 = addslashes($this->input->post('contacto2'));
					$tlf2 = $this->input->post('tlf2');
					$email2 = addslashes($this->input->post('email2'));
					$contacto3 = addslashes($this->input->post('contacto3'));
					$tlf3 = $this->input->post('tlf3');
					$email3 = addslashes($this->input->post('email3'));
					$usuario_empresa = addslashes($this->input->post('usuario'));
					$clave_empresa = addslashes($this->input->post('clave'));
					$this->empresa_model->nuevaEmpresa($cif,$razon,$calle,$num,$puerta,$provincia,$poblacion,$cp,$cuenta,$porcen,$forma,$dia,$calle2,$num2,
					$puerta2,$provincia2,$poblacion2,$cp2,$contacto1,$tlf1,$email1,$contacto2,$tlf2,$email2,$contacto3,$tlf3,$email3,$usuario_empresa,$clave_empresa);
					redirect('empresa/todasLasEmpresas');
				}
			}
		}
		/**
		 * Elimina empresas registradas
		 * @ $id: identificador del usuario que se va a borrar 
		 */
		public function empresaBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('empresa_model');
					$cif = $this->input->post('neocif');
					$this->empresa_model->borraEmpresa($cif);	
					redirect('empresa/vistaEmpresa');
				}	
			}	
		}
		
	}
?>