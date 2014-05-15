<?php
	class Cancion extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todasLasCanciones(){
			$this->load->model('cancion_model');
			$cancion=$this->cancion_model->todasCanciones();
			if($cancion=="Actualmente no hay canciones"){
				$this->load->view('cancion_vista',$cancion);
			}else{
				$datos_canciones=array('rs_cancion'=>$cancion);
				$this->load->view('cancion_vista',$datos_canciones);
			}
		}
		
		public function todasLasCancionesDisco($id){
			$this->load->model('cancion_model');
			$cancion=$this->cancion_model->todasCancionesDisco($id);
			if($cancion=="Actualmente no hay canciones"){
				$this->load->view('cancion_disco_vista',$cancion);
			}else{
				$datos_canciones=array('rs_cancion'=>$cancion);
				$this->load->view('cancion_disco_vista',$datos_canciones);
			}
		}
		
		function muestraCancion($id){
			$this->load->model('cancion_model');
			$cancion=$this->cancion_model->eligeCancion($id);
			$datos_cancion=array('rs_cancion'=>$cancion);
			$this->load->view('cancion_mod_vista', $datos_cancion);
		}
		
		function nuevaCancion($disco){
			$this->load->view('cancion_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('cancion_model');
					$Num_Cancion = $this->input->post('Num_Cancion');
					$Titulo_Cancion = $this->input->post('Titulo_Cancion');
					$Letra_Cancion = $this->input->post('Letra_Cancion');
					$Enlace_Cancion = $this->input->post('Enlace_Cancion');
					$this->cancion_model->grabaCancion($disco,$Num_Cancion,$Titulo_Cancion,$Letra_Cancion,$Enlace_Cancion);
				}
			}
			
		}
		
		function actualizaCancion(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('cancion_model');
					$id = $this->input->post('id');
					$Num_Cancion = $this->input->post('Num_Cancion');
					$Titulo_Cancion = $this->input->post('Titulo_Cancion');
					$Letra_Cancion = $this->input->post('Letra_Cancion');
					$Enlace_Cancion = $this->input->post('Enlace_Cancion');
					$this->cancion_model->modificaCancion($id,$Num_Cancion,$Titulo_Cancion,$Letra_Cancion,$Enlace_Cancion);
					redirect('disco/todosLosDiscos');
				}
			}	
		}
		
		function cancionBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('cancion_model');
					$id = $this->input->post('neoid');
					$this->cancion_model->borraCancion($id);	
					redirect('disco/todosLosDiscos');
				}
			}	
		}
	}
?>