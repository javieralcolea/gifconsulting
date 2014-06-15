<?php
	class ObjetoFactura extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			/*$this->load->library('excel');
			$this->load->library('upload');*/
		}
	
		function do_upload(){
			$config['upload_path'] = 'assets'.DIRECTORY_SEPARATOR.'img';
			$config['allowed_types'] = 'xls|xlsx';
			$config['max_size']	= 0;
			$config['max_width']  = 0;
			$config['max_height']  = 0;
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('filename')){
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('upload_view', $error);
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					
				}
			
			
		}
	}	
	
?>