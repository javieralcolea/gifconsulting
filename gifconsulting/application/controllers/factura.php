<?php
	class Factura extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		/**
		 * Accede a cada una de las facturas
		 * @ $cif: identificador de la factura
		 */
		public function verFactura($id){
			$this->load->model('factura_model');
			$factura = $this->factura_model->estaFactura($id);
			$datos_factura = array('rs_factura'=>$factura);
			$this->load->view('factura_mod_vista',$datos_factura);
		}
		
		/**
		 * Modifica una factura
		 */
		public function cambiaFactura(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
					$this->load->model('factura_model');
					$id = $this->input->post('id');
					$deudor = $this->input->post('deudor');
					$empresa = $this->input->post('empresa');
					$num = $this->input->post('num');
					$importe = $this->input->post('importe');
					$pendiente = $this->input->post('pendiente');
					$tipo = $this->input->post('tipo');
					$fecha = $this->input->post('fecha');
					$venci = $this->input->post('venci');
					$cobro = $this->input->post('cobro');
					$pago = $this->input->post('pago');
					$estado = $this->input->post('estado');
					$this->factura_model->modificaFactura($id,$deudor,$empresa,$num,$importe,$pendiente,$tipo,$fecha,$venci,$cobro,$pago,$estado);
				}	
			}
		}
		
		/**
		 * Muestra el filtro de facturas
		 */
		public function filtroVista(){
			$this->db->select('Provincia_Deudor');
			$query = $this->db->get('deudor');
			$datos['provincias'] = $query->result();
			$this->db->select('Ciudad_Deudor');
			$query2 = $this->db->get('deudor');
			$datos['ciudades'] = $query2->result();
			$this->db->select('CP_Deudor');
			$query3 = $this->db->get('deudor');
			$datos['cp'] = $query3->result();
			$this->db->select('Razon_Social');
			$query4 = $this->db->get('empresa');
			$datos['empresa'] = $query4->result();
			$this->load->view('filtro_vista',$datos);
		}
		
		/**
		 * Genera listados de facturas según los criterios elegidos
		 */
		 public function filtradoFacturas(){
			if($this->input->post('aceptar')){
				if($this->form_validation->run() === false){
		 			$this->load->model('factura_model');
					$empresa = $this->input->post('empresa');
					$deudor = $this->input->post('deudor');
					$numfac = $this->input->post('numfac');
					$provincia = $this->input->post('provincia');
					$ciudad = $this->input->post('ciudad');
					$cp = $this->input->post('cp');
					$cif = $this->input->post('cif');
					$fechafac1 = $this->input->post('fechafac1');
					$fechafac2 = $this->input->post('fechafac2');
					$ven1 = $this->input->post('ven1');
					$ven2 = $this->input->post('ven2');
					$cobro1 = $this->input->post('cobro1');
					$cobro2 = $this->input->post('cobro2');
					$importe1 = $this->input->post('importe1');
					$importe2 = $this->input->post('importe2');
					$estado = $this->input->post('estado');
					$tipo = $this->input->post('tipo');
					$peticiones1 = $this->input->post('peticiones1');
					$peticiones2 = $this->input->post('peticiones2');
					if($this->input->post('peticiones1'))
						$factura = $this->factura_model->filtroFacturas($empresa,$deudor,$numfac,$provincia,$ciudad,$cp,$cif,$fechafac1,$fechafac2,$ven1,$ven2,$cobro1,$cobro2,
					$importe1,$importe2,$estado,$tipo,$peticiones1,$peticiones2);
					else
						$factura = $this->factura_model->filtrodos($empresa,$deudor,$numfac,$provincia,$ciudad,$cp,$cif,$fechafac1,$fechafac2,$ven1,$ven2,$cobro1,$cobro2,
					$importe1,$importe2,$estado,$tipo);
					$datos_factura = array('rs_factura'=>$factura);
					$this->load->view('listado_facturas_vista',$datos_factura);
				}
			}		
		 }
		
	}
?>