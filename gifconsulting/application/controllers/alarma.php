<?php
	class Alarma extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todasLasAlarmas(){
			$this->load->model('alarma_model');
			$alarma = $this->alarma_model->todasAlarmas();
			$datos_alarma = array('rs_alarma'=>$alarma);
			$this->load->view('alarma_vista',$datos_alarma);
		}
		
		public function estaAlarma($id){
			$this->load->model('alarma_model');
			$alarma = $this->alarma_model->verAlarma($id);
			$datos_alarma = array('rs_alarma'=>$alarma);
			$this->load->view('alarma_mod_vista',$datos_alarma);
		}
		
		public function grabaAlarma($idfactura){
			$this->load->view('alarma_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('alarma_model');
					$factura = $idfactura;
					$usuario = $this->input->post('usuario');
					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$comentario = $this->input->post('comentario');
					$this->alarma_model->nuevaAlarma($factura, $usuario, $fecha, $hora, $comentario);
				}	
			}
		}
		
		public function modificaAlarma(){
			$this->load->view('alarma_mod_vista');
			if($this->input->post('modificar')){
				if($this->form_validation->run() === false){
					$this->load->model('alarma_model');
					$id = $this->input->post('id');
					$factura = $this->input->post('factura');
					$usuario = $this->session->userdata('id');
					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$comentario = $this->input->post('comentario');
					$this->alarma_model->cambiaAlarma($id, $factura, $usuario, $fecha, $hora, $comentario);
				}	
			}
		}

		public function eliminaAlarma($id){
			$this->load->view('alarma_mod_vista');
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('alarma_model');
					$this->alarma_model->borraAlarma($id);
				}
			}		
		}	
	}
?>