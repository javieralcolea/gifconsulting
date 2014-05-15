<?php
	class Video extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function todosLosVideos(){
			$this->load->model('video_model');
			$video=$this->video_model->todosVideos();
			if($video=="Actualmente no hay vídeos"){
				$this->load->view('video_vista',$video);
			}else{
				$datos_videos=array('rs_video'=>$video);
				$this->load->view('video_vista',$datos_videos);
			}
		}
		
		function muestraVideo($id){
			$this->load->model('video_model');
			$disco=$this->video_model->eligevideo($id);
			$datos_video=array('rs_video'=>$video);
			$query=$this->db->get('tipos_video');
			$datos_video['tipos']=$query->result();
			$this->load->view('video_mod_vista', $datos_video);
		}
		
		function nuevoVideo(){
			$this->load->view('video_graba_vista');
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('video_model');
					$nombre = $this->input->post('nombre');
					$tipo = $this->input->post('tipo');
					$enlace = $this->input->post('enlace');
					$comentarios = $this->input->post('comentarios');
					$this->video_model->grabaVideo($nombre,$tipo,$enlace,$comentarios);
					redirect('video/todosLosVideos');
				}
			}
			
		}
		
		function actualizaVideo(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('video_model');
					$id = $this->input->post('id');
					$nombre = $this->input->post('nombre');
					$tipo = $this->input->post('tipo');
					$enlace = $this->input->post('enlace');
					$comentarios = $this->input->post('comentarios');
					$this->video_model->modificaVideo($id,$nombre,$tipo,$enlace,$comentarios);
					redirect('video/todosLosVideos');
				}
			}
				
		}
		
		function videoBorra(){
			if($this->input->post('borrar')){
				if($this->form_validation->run() === false){
					$this->load->model('video_model');
					$id = $this->input->post('neoid');
					$disco = $this->video_model->borraVideo($id);	
					redirect('video/todosLosVideos');
				}
			}		
		}
	}
?>