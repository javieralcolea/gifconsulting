<?php
    class Factura_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Busca facturas a partir del filtro si existen líneas de gestión
		 * $empresa,$deudor,$numfac,$provincia,$ciudad,$cp,$cif,$fechafac1,$fechafac2,$ven1,$ven2,$cobro1,$cobro2,
			$importe1,$importe2,$estado,$tipo,$peticiones1,$peticiones2
		 */
		function filtroFacturas($empresa,$deudor,$numfac,$provincia,$ciudad,$cp,$cif,$fechafac1,$fechafac2,$ven1,$ven2,$cobro1,$cobro2,
			$importe1,$importe2,$estado,$tipo,$peticiones1,$peticiones2){
				$this->db->select('Fecha_Factura,Vencimiento_Factura,Importe_Factura,Estado_Factura,ID_Factura');
			$this->db->from('factura');
			$this->db->join('deudor','deudor.CIF_Deudor=factura.CIF_Deudor');
			$this->db->join('empresa','empresa.CIF_Empresa=factura.CIF_Empresa');
			$this->db->join('factura_usuario','factura.ID_Factura=factura_usuario.ID_Factura');
			$this->db->join('peticion','peticion.ID_Factura=factura_usuario.ID_Factura');
			if(!empty($empresa))
				$this->db->where('Razon_Social',$empresa);
			if(!empty($deudor))
				$this->db->where('Nombre_Deudor',$deudor);
			if(!empty($numfac))
				$this->db->where('Numero_Factura',$numfac);
			if(!empty($provincia))
				$this->db->where('Provincia_Deudor',$provincia);
			if(!empty($ciudad))
				$this->db->where('Ciudad_Deudor',$ciudad);
			if(!empty($cp))
				$this->db->where('CP_Deudor',$cp);
			if(!empty($cif))
				$this->db->where('CIF_Deudor',$cif);
			if(!empty($fechafac1)){
				$this->db->where("Fecha_Factura between $fechafac1 and $fechafac2");
			}
			if(!empty($ven1)){
				$this->db->where("Vencimiento_Factura between $ven1 and $ven2");
			}
			if(!empty($cobro1)){
				$this->db->where("Cobro_Factura between $cobro1 and $cobro2");
			}
			if(!empty($importe1)){
				$array = array('Importe_Factura >='=>$importe1,'Importe_Factura <='=>$importe2);
				$this->db->where($array);
			}
			if(!empty($estado))
				$this->db->where('Estado_Factura',$estado);
			if(!empty($tipo))	
				$this->db->where('Tipo_Factura',$tipo);	
			if(!empty($peticiones1))
				$this->db->where("Fecha_Peticion between $peticiones1 and $peticiones2");
			$query=$this->db->get();		
			return $query->result();
		}
		
		/**
		 * Busca facturas a partir del filtro si no existen líneas de gestión
		 * $empresa,$deudor,$numfac,$provincia,$ciudad,$cp,$cif,$fechafac1,$fechafac2,$ven1,$ven2,$cobro1,$cobro2,
			$importe1,$importe2,$estado,$tipo
		 */
		function filtrodos($empresa,$deudor,$numfac,$provincia,$ciudad,$cp,$cif,$fechafac1,$fechafac2,$ven1,$ven2,$cobro1,$cobro2,
			$importe1,$importe2,$estado,$tipo){
			$this->db->select('Fecha_Factura,Vencimiento_Factura,Importe_Factura,Estado_Factura,ID_Factura');
			$this->db->from('factura');
			$this->db->join('deudor','deudor.CIF_Deudor=factura.CIF_Deudor');
			$this->db->join('empresa','empresa.CIF_Empresa=factura.CIF_Empresa');
			if(!empty($empresa))
				$this->db->where('Razon_Social',$empresa);
			if(!empty($deudor))
				$this->db->where('Nombre_Deudor',$deudor);
			if(!empty($numfac))
				$this->db->where('Numero_Factura',$numfac);
			if(!empty($provincia))
				$this->db->where('Provincia_Deudor',$provincia);
			if(!empty($ciudad))
				$this->db->where('Ciudad_Deudor',$ciudad);
			if(!empty($cp))
				$this->db->where('CP_Deudor',$cp);
			if(!empty($cif))
				$this->db->where('factura.CIF_Deudor',$cif);
			if(!empty($fechafac1)){
				$this->db->where("Fecha_Factura between $fechafac1 and $fechafac2");
			}
			if(!empty($ven1)){
				$this->db->where("Vencimiento_Factura between $ven1 and $ven2");
			}
			if(!empty($cobro1)){
				$this->db->where("Cobro_Factura between $cobro1 and $cobro2");
			}
			if(!empty($importe1)){
				$array = array('Importe_Factura >='=>$importe1,'Importe_Factura <='=>$importe2);
				$this->db->where($array);
			}
			if(!empty($estado))
				$this->db->where('Estado_Factura',$estado);
			if(!empty($tipo))	
				$this->db->where('Tipo_Factura',$tipo);	
			$query=$this->db->get();		
			return $query->result();
		}
		
		/**
		 * Mueve las columnas de las facturas seleccionadas
		 * $query,$col1,$asc1,$col2,$asc2,$col3,$asc3,$col4,$asc4
		 */
		function moverColumnas($query,$col1,$asc1,$col2,$asc2,$col3,$asc3,$col4,$asc4){
			$consulta = $query." ORDER BY ".$col1." ".$asc1.", ".$col2." ".$asc2.", ".$col3." ".$asc3.", ".$col4." ".$asc4;
			return mysql_query($consulta);
		}
		
		/**
		 * Muestra la factura seleccionada
		 * $id: identificador de la factura
		 */
		function estaFactura($id){
			$query = "SELECT * FROM factura a, empresa b, deudor c WHERE a.CIF_Empresa=b.CIF_Empresa AND a.CIF_Deudor=c.CIF_Deudor ".
			"AND a.ID_Factura='".$id."'";
			return mysql_query($query);
		}
		
		/**
		 * Graba una factura
		 * $deudor,$empresa,$num,$importe,$pendiente,$tipo,$fecha,$venci,$cobro,$tipo,$estado
		 */
		function grabaFactura($deudor,$empresa,$num,$importe,$pendiente,$tipo,$fecha,$venci,$cobro,$pago,$estado){
			$fecha = date_format($fecha, "Y-m-d");
			$venci = date_ormat($venci, "Y-m-d");
			$data = array(
				'CIF_Deudor' => $deudor,
				'CIF_Empresa' => $empresa,
				'Numero_Factura' => $num,
				'Importe_Factura' => $importe,
				'Imp_Pend_Factura' => $pendiente,
				'Tipo_Factura' => $tipo,
				'Fecha_Factura' => $fecha,
				'Vencimiento_Factura' => $venci,
				'Cobro_Factura' => $cobro,
				'Tipo_Pago' => $pago,
				'Estado_Factura' => $estado
			);
			$this->db->insert('factura', $data);
		}
		
		/**
		 * Modifica una factura
		 * $id,$deudor,$empresa,$num,$importe,$pendiente,$tipo,$fecha,$venci,$cobro,$tipo,$estado
		 */
		function modificaFactura($id,$deudor,$empresa,$num,$importe,$pendiente,$tipo,$fecha,$venci,$cobro,$pago,$estado){
			$fecha = date_format($fecha, "Y-m-d");
			$venci = date_format($venci, "Y-m-d");
			$data = array(
				'ID_Factura' => $id,
				'CIF_Deudor' => $deudor,
				'CIF_Empresa' => $empresa,
				'Numero_Factura' => $num,
				'Importe_Factura' => $importe,
				'Imp_Pend_Factura' => $pendiente,
				'Tipo_Factura' => $tipo,
				'Fecha_Factura' => $fecha,
				'Vencimiento_Factura' => $venci,
				'Cobro_Factura' => $cobro,
				'Tipo_Pago' => $pago,
				'Estado_Factura' => $estado
			);
			$this->db->update('factura',$data,array('ID_Factura'=> $id));
		}
		
		/**
		 * Modifica una factura recibida desde un archivo de Excel
		 * $num,$fecha,$venci,$importe,$tipo
		 */
		function modificaDesdeExcel($num,$fecha,$venci,$importe,$tipo){
			$fecha = date_format($fecha, "Y-m-d");
			$venci = date_format($venci, "Y-m-d");
			$data = array(
				'Numero_Factura' => $num,
				'Importe_Factura' => $importe,
				'Fecha_Factura' => $fecha,
				'Vencimiento_Factura' => $venci,
				'Tipo_Pago' => $tipo
			);
			$this->db->update('factura',$data,array('Numero_Factura'=> $num));
		}
    }
?>