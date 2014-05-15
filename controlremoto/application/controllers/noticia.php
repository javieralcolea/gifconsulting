<?php
	class Noticia extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		function muestraNoticia($id){
			$this->load->model('noticia_model');
			$noticia=$this->noticia_model->eligeNoticia($id);
			$datos_noticia=array('rs_noticia'=>$noticia);
			$this->load->view('noticia_mod_vista', $datos_noticia);
		}
		
		public function todasNoticias(){
			$this->load->model('noticia_model');
			$noticia=$this->noticia_model->todasLasNoticias();
			if($noticia=="Actualmente no hay noticias"){
				$this->load->view('noticia_vista',$noticia);
			}else{
				$datos_noticia=array('rs_noticia'=>$noticia);
				$this->load->view('noticia_vista',$datos_noticia);
			}
			
		}
		
		function nuevaNoticia(){
			$this->load->view('noticia_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('noticia_model');
					$titulo = $this->input->post('titulo');
					$textillo = $this->input->post('textillo');
					$fecha = $this->input->post('fecha');
					$publicar = $this->input->post('publicar');
					$destacado = $this->input->post('destacado');
					$this->noticia_model->grabaNoticia($titulo,$textillo,$fecha,$publicar,$destacado);
					redirect('noticia/todasNoticias');
				}else{
					$this->load->view('noticia_vista');
				}
			}
			
		}
		
		function actualizanoticia(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('noticia_model');
					$id = $this->input->post('id');
					$titulo = $this->input->post('titulo');
					$textillo = $this->input->post('textillo');
					$fecha = $this->input->post('fecha');
					$publicar = $this->input->post('publicar');
					$destacado = $this->input->post('destacado');
					$this->noticia_model->modificaNoticia($id,$titulo,$textillo,$fecha,$publicar,$destacado);
					redirect('noticia/todasNoticias');
				}else{
					$this->load->view('noticia_vista');
				}	
			}
		
		}
		
		function noticiaBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('noticia_model');
					$id = $this->input->post('neoid');
					$this->noticia_model->borraNoticia($id);	
					redirect('noticia/todasNoticias');
				}
			}
				
		}
	}
?>