<?php
	class Concierto extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todosConciertos(){
			$this->load->model('concierto_model');
			$concierto=$this->concierto_model->todosLosConciertos();
			if($concierto=="Actualmente no hay conciertos"){
				$this->load->view('concierto_vista',$concierto);
			}else{
				$datos_conciertos=array('rs_concierto'=>$concierto);
				$this->load->view('concierto_vista',$datos_conciertos);
			}
		}
		
		function muestraConcierto($id){
			$this->load->model('concierto_model');
			$concierto=$this->concierto_model->eligeConcierto($id);
			$datos_concierto=array('rs_concierto'=>$concierto);
			$this->load->view('concierto_mod_vista', $datos_concierto);
		}
		
		function nuevoConcierto(){
			$this->load->view('concierto_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('concierto_model');
					$fecha = $this->input->post('fecha');
					$texto = $this->input->post('texto');
					$entradas = $this->input->post('entradas');
					$articulo = $this->concierto_model->grabaConcierto($fecha,$texto,$entradas);
					redirect('concierto/todosConciertos');
				}
			}	
			
		}
		
		function actualizaConcierto(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('concierto_model');
					$id = $this->input->post('id');
					$fecha = $this->input->post('fecha');
					$texto = $this->input->post('texto');
					$entradas = $this->input->post('entradas');
					$this->concierto_model->modificaConcierto($id,$fecha,$texto,$entradas);
					redirect('concierto/todosConciertos');
				}	
			}	
		}
		
		function conciertoBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('concierto_model');
					$id = $this->input->post('neoid');
					$this->concierto_model->borraConcierto($id);	
					redirect('concierto/todosConciertos');
				}	
			}	
		}
	}
?>