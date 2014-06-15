<?php
	class Upload extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('excel');
			$this->load->helper('array');
		}
	
		/**
		 * Sube archivo excel, lo lee y lo graba en la bade de datos
		 */
		function do_upload(){
			$config['upload_path'] = 'assets'.DIRECTORY_SEPARATOR.'files';
			$config['allowed_types'] = '*';
			$config['max_size']	= 0;
			$config['max_width']  = 0;
			$config['max_height']  = 0;
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('archivo')){
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('upload_view', $error);
				}
				else{
					$data = $this->upload->data();
					$file = $data['file_name'];
					$objReader = PHPExcel_IOFactory::createReader('Excel2007');
					$objReader->setReadDataOnly(true);
					$objPHPExcel = $objReader->load('assets'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.$file);
					$objWorksheet = $objPHPExcel->getActiveSheet();
					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
					$this->load->model('objetoFactura_model');
					for ($row = 2; $row <= $highestRow; ++$row) {
						for ($col = 0; $col <= $highestColumnIndex; ++$col) {
						    $campo1 = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
							$campo2 = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
							$campo3 = $objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
							$campo4 = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
							$fecha1 = $objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
							$timestamp = PHPExcel_Shared_Date::ExcelToPHP($fecha1);
							$campo5 = date("Y-m-d",$timestamp);
							$fecha2 = $objWorksheet->getCellByColumnAndRow(5, $row)->getValue();
							$timestamp2 = PHPExcel_Shared_Date::ExcelToPHP($fecha2);
							$campo6 = date("Y-m-d",$timestamp2);
							$campo7 = $objWorksheet->getCellByColumnAndRow(6, $row)->getValue();
							$campo8 = $objWorksheet->getCellByColumnAndRow(7, $row)->getValue();
							$campo9 = $objWorksheet->getCellByColumnAndRow(8, $row)->getValue();
							$campo10 = $objWorksheet->getCellByColumnAndRow(9, $row)->getValue();
							$campo11 = $objWorksheet->getCellByColumnAndRow(10, $row)->getValue();
							$campo12 = $objWorksheet->getCellByColumnAndRow(11, $row)->getValue();
							$campo13 = $objWorksheet->getCellByColumnAndRow(12, $row)->getValue();
							$this->objetoFactura_model->grabaObjeto($campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $campo8, $campo9, $campo10,
									$campo11, $campo12, $campo13);				
					 	}
					}
					if($this->db->_error_message()){
						$this->load->view('error_upload_view');
					}
					$fichero = 'assets'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.$file;
					unlink($fichero);
					redirect('empresa/exitoArchivoSubido');
				}
			
			
		}
	}	
	
?>