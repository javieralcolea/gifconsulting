<?php
	class galeria extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		function muestraGaleria($id){
			$this->load->model('galeria_model');
			$galeria=$this->galeria_model->eligeGaleria($id);
			$datos_galeria=array('rs_galeria'=>$galeria);
			$this->load->view('galeria_mod_vista', $datos_galeria);
		}
		
		public function todasGalerias(){
			$this->load->model('galeria_model');
			$galeria=$this->galeria_model->todasLasGalerias();
			if($galeria=="Actualmente no hay galerías"){
				$this->load->view('galeria_vista',$galeria);
			}else{
				$datos_galeria=array('rs_galeria'=>$galeria);
				$this->load->view('galeria_vista',$datos_galeria);
			}
			
		}
		
		function nuevaGaleria(){
			$this->load->view('galeria_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('galeria_model');
					$fecha = $this->input->post('fecha');
					$descripcion = $this->input->post('descripcion');
					$this->galeria_model->grabaGaleria($fecha,$descripcion);
					redirect('galeria/todasGalerias');
				}else{
					$this->load->view('galeria_vista');
				}
			}
			
		}
		
		function actualizaGaleria(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('galeria_model');
					$id = $this->input->post('id');
					$fecha = $this->input->post('fecha');
					$descripcion = $this->input->post('descripcion');
					$this->galeria_model->modificaGaleria($id,$fecha,$descripcion);
					redirect('galeria/todasGalerias');
				}else{
					$this->load->view('galeria_vista');
				}	
			}
		
		}
		
		function galeriaBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('galeria_model');
					$id = $this->input->post('neoid');
					$this->galeria_model->borraImagenesGaleria($id);
					$this->galeria_model->borraGaleria($id);
					redirect('galeria/todasGalerias');	
				}	
			}
		}
	}
?>