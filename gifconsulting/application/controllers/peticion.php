<?php
	class Peticion extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		/**
		 * Devuelve todas las líneas de gestión
		 */
		public function todasLasPeticiones(){
			$this->load->model('peticion_model');
			$peticion = $this->peticion_model->todasPeticiones();
			$datos_peticion = array('rs_peticion'=>$peticion);
			$this->load->view('peticion_vista',$datos_peticion);
		}
		
		/**
		 * Devuelve todas las líneas de gestión de una factura concreta
		 * $id: id de la factura
		 */
		public function todasPeticionesFactura($id){
			$this->load->model('peticion_model');
			$peticion = $this->peticion_model->peticionesFactura($id);
			$datos_peticion = array('rs_peticion'=>$peticion);
			$this->load->view('peticiones_factura_vista',$datos_peticion);
		}
		
		/**
		 * Muestra una línea de gestión
		 * $id: id de la línea de gestión
		 */
		public function estaPeticion($id){
			$this->load->model('peticion_model');
			$peticion = $this->peticion_model->verPeticion($id);
			$datos_peticion = array('rs_peticion'=>$peticion);
			$this->load->view('peticion_mod_vista',$datos_peticion);
		}
		
		/**
		 * Graba una línea de gestión
		 * $idfactura: id de la factura a la que pertenece
		 */
		public function grabaPeticion($idfactura){
			$this->load->view('peticion_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('peticion_model');
					$factura = $idfactura;
					$usuario = $this->session->userdata('id');
					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$comentario = $this->input->post('comentario');
					$solucionada = 'false';
					$this->peticion_model->nuevaPeticion($factura, $usuario, $fecha, $hora, $comentario, $solucionada);
				}	
			}
		}
		
		/**
		 * Modifica una línea de gestión
		 */
		public function modificaPeticion(){
			$this->load->view('peticion_mod_vista');
			if($this->input->post('modificar')){
				if($this->form_validation->run() === false){
					$this->load->model('peticion_model');
					$id = $this->input->post('id');
					$factura = $this->input->post('factura');
					$usuario = $this->input->post('usuario');
					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$comentario = $this->input->post('comentario');
					$solucionada = $this->input->post('solucionada');
					$this->peticion_model->cambiaPeticion($id, $factura, $usuario, $fecha, $hora, $comentario, $solucionada);
				}	
			}
		}	
	}
?>