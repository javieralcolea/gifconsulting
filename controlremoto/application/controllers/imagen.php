<?php
	class Imagen extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todasLasImagenes(){
			$this->load->model('imagen_model');
			$imagen=$this->imagen_model->todasImagenes();
			if($imagen=="Actualmente no hay imágenes"){
				$this->load->view('imagen_vista',$imagen);
			}else{
				$datos_imagen=array('rs_imagen'=>$imagen);
				$this->load->view('imagen_vista',$datos_imagen);
			}
		}
		
		public function todasLasImagenesGaleria($id){
			$this->load->model('imagen_model');
			$imagen=$this->imagen_model->todasImagenesGaleria($id);
			if($imagen=="Actualmente no hay imágenes"){
				$this->load->view('imagen_galeria_vista',$imagen);
			}else{
				$datos_imagenes=array('rs_imagen'=>$imagen);
				$this->load->view('imagen_galeria_vista',$datos_imagenes);
			}
		}
		
		function muestraImagen($id){
			$this->load->model('imagen_model');
			$imagen=$this->imagen_model->eligeImagen($id);
			$datos_imagen=array('rs_imagen'=>$imagen);
			$this->load->view('imagen_mod_vista', $datos_imagen);
		}
		
		function imagenPortada(){
			if($this->input->post('portada')){
				if($this->form_validation->run() === false){
					$this->load->model('imagen_model');
					$id = $this->input->post('portadaid');
					$imagen=$this->imagen_model->eligeImagen($id);
					$datos_imagen=array('rs_imagen'=>$imagen);
					// Modificar el archivo de vista:
					$this->load->view('imagen_mod_vista', $datos_imagen);
					redirect('imagen/todasLasImagenes');
				}
			}		
		}
		
		function nuevaImagen(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('imagen_model');
					$nombre = $this->input->post('nombre');
					$alt = $this->input->post('alt');
					$galeria = $this->input->post('galeria');
					$imagen = $this->imagen_model->grabaImagen($galeria,$nombre,$alt);
					redirect('imagen/todasLasImagenes');
				}
			}
		}
		
		function actualizaImagen(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('imagen_model');
					$id = $this->input->post('id');
					$nombre = $this->input->post('nombre');
					$alt = $this->input->post('alt');
					$this->imagen_model->modificaImagen($id,$nombre,$alt);
				}
			}		
		}		
		
		function imagenBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('imagen_model');
					$id = $this->input->post('neoid');
					$this->imagen_model->borraImagen($id);	
					redirect('imagen/todasLasImagenes');
				}	
			}	
		}
	}
?>