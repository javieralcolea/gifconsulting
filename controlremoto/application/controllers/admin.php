<?php
	class Admin extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function login(){
			$this->load->view('registro_vista');
			$this->form_validation->set_rules('id','Usuario','required');
			$this->form_validation->set_rules('clave','Contraseña','required');
			$this->form_validation->set_message('required','Debe rellenar todos los campos');
			if($this->form_validation->run() === true){	
		        $this->load->model('admin_model');
		        $id = addslashes($this->input->post('id'));
		        $clave = addslashes($this->input->post('clave'));
				$admin=$this->admin_model->registroAdmin($id, $clave);
				if($admin=="Contraseña o usuario incorrectos"){
					redirect('admin/errorAcceso');
				}else{
					$resultado=mysql_fetch_array($admin);
					$this->session->set_userdata('id',$resultado['ID_Admin']);
					$this->session->set_userdata('clave',$resultado['Clave_Admin']);
					redirect('admin/vistaAdmin');
				}
				
		    }
		}
		
		public function errorAcceso(){
			$this->load->view('incorrecto_vista');
		}
		
		public function cerrar_sesion(){
			$this->session->sess_destroy();
			$this->load->view('registro_vista');
		}
			
		public function vistaAdmin(){
			$this->load->model('articulo_model');
			/*$articulo=$this->articulo_model->todosArticulos();
			if($articulo=="Actualmente no hay artículos"){
				$this->load->view('admin_vista',$articulo);
			}else{
				$datos_articulo=array('rs_articulo'=>$articulo);
				$this->load->view('admin_vista',$datos_articulo);
			}*/
			$this->load->library('pagination');
			$opciones = array();
  			$desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$opciones['per_page'] = 5;
		    $opciones['base_url'] = URL.'/admin/vistaAdmin';
		    $opciones['total_rows'] = $this->articulo_model->numArticulos();
		    $opciones['uri_segment'] = 3;
			$this->pagination->initialize($opciones);
			$data['lista'] = $this->articulo_model->getTodosArticulos($opciones['per_page'],$desde);
   			$data['paginacion'] = $this->pagination->create_links();
			$this->load->view('admin_vista',$data);
			
		}	
	}
?>