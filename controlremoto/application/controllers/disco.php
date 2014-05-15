<?php
	class Disco extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todosLosDiscos(){
			$this->load->model('disco_model');
			$disco=$this->disco_model->todosDiscos();
			if($disco=="Actualmente no hay discos"){
				$this->load->view('disco_vista',$disco);
			}else{
				$datos_discos=array('rs_disco'=>$disco);
				$this->load->view('disco_vista',$datos_discos);
			}
		}
		
		function muestraDisco($id){
			$this->load->model('disco_model');
			$disco=$this->disco_model->eligeDisco($id);
			$datos_disco=array('rs_disco'=>$disco);
			$this->load->view('disco_mod_vista', $datos_disco);
		}
		
		function nuevoDisco(){
			$this->load->view('disco_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('disco_model');
					$nombre = $this->input->post('nombre');
					$anio = $this->input->post('anio');
					$caratula = $this->input->post('caratula');
					$comentarios = $this->input->post('comentarios');
					$foto = $this->input->post('foto');
					$spotify = $this->input->post('spotify');
					$itunes = $this->input->post('itunes');
					$disco = $this->disco_model->grabaDisco($nombre,$anio,$caratula,$comentarios,$foto,$spotify,$itunes);
					redirect('disco/todosLosDiscos');
				}
			}
			
		}
		
		function actualizaDisco(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('disco_model');
					$id = $this->input->post('id');
					$nombre = $this->input->post('nombre');
					$anio = $this->input->post('anio');
					$caratula = $this->input->post('caratula');
					$comentarios = $this->input->post('comentarios');
					$foto = $this->input->post('foto');
					$spotify = $this->input->post('spotify');
					$itunes = $this->input->post('itunes');
					$this->disco_model->modificaDisco($id,$nombre,$anio,$caratula,$comentarios,$foto,$spotify,$itunes);
				}	
			}
		}
		
		function discoBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('disco_model');
					$id = $this->input->post('neoid');
					$this->disco_model->borraCancionesDisco($id);
					$this->disco_model->borraDisco($id);
					redirect('disco/todosLosDiscos');	
				}	
			}
		}
	}
?>