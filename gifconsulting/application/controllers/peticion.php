<?php
	class Peticion extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todasLasPeticiones(){
			$this->load->model('peticion_model');
			$peticion = $this->peticion_model->todasPeticiones();
			$datos_peticion = array('rs_peticion'=>$peticion);
			$this->load->view('peticion_vista',$datos_peticion);
		}
		
		public function estaPeticion($id){
			$this->load->model('peticion_model');
			$peticion = $this->peticion_model->verPeticion($id);
			$datos_peticion = array('rs_peticion'=>$peticion);
			$this->load->view('peticion_mod_vista',$datos_peticion);
		}
		
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
					$this->alarma_model->cambiaAlarma($id, $factura, $usuario, $fecha, $hora, $comentario, $solucionada);
				}	
			}
		}	
	}
?>