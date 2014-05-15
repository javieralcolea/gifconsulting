<?php
	class Articulo extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		function muestraArticulo($id){
			$this->load->model('articulo_model');
			$articulo=$this->articulo_model->eligeArticulo($id);
			$datos_articulo=array('rs_articulo'=>$articulo);
			$this->load->view('articulo_mod_vista', $datos_articulo);
		}
		
		function nuevoArticulo(){
			$this->load->view('articulo_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('articulo_model');
					$titulo = $this->input->post('titulo');
					$textillo = $this->input->post('textillo');
					$fecha = $this->input->post('fecha');
					$publicar = $this->input->post('publicar');
					$destacado = $this->input->post('destacado');
					$this->articulo_model->grabaArticulo($titulo,$textillo,$fecha,$publicar,$destacado);
					redirect('admin/vistaAdmin');
				}else{
					$this->load->view('admin_vista');
				}
			}
			
		}
		
		function actualizaArticulo(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('articulo_model');
					$id = $this->input->post('id');
					$titulo = $this->input->post('titulo');
					$textillo = $this->input->post('textillo');
					$fecha = $this->input->post('fecha');
					$publicar = $this->input->post('publicar');
					$destacado = $this->input->post('destacado');
					$this->articulo_model->modificaArticulo($id,$titulo,$textillo,$fecha,$publicar,$destacado);
					redirect('admin/vistaAdmin');
				}else{
					$this->load->view('admin_vista');
				}	
			}
		
		}
		
		function articuloBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('articulo_model');
					$id = $this->input->post('neoid');
					$this->articulo_model->borraArticulo($id);	
					redirect('admin/vistaAdmin');
				}
			}
				
		}
	}
?>