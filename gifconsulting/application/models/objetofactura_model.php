<?php
    class ObjetoFactura_model extends CI_Model{
    	
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Graba el archivo excel en la base de datos
		 * $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $campo8, $campo9, $campo10, $campo11, $campo12, $campo13
		 */
		function grabaObjeto($campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $campo8, $campo9, $campo10,
		$campo11, $campo12, $campo13){
			$query="SELECT * FROM factura WHERE Numero_Factura='".$campo4."';";
			$resul=mysql_query($query); 
			if(mysql_num_rows($resul)>0){
				$this->actualizaFactura($campo7, $campo5, $campo6, $campo8, $campo4);
				
			}else{
				$query2="SELECT * FROM deudor WHERE CIF_Deudor='".$campo3."';";
				$resul2=mysql_query($query2); 
				if(mysql_num_rows($resul2)<1){
					$this->grabaDeudor($campo3, $campo2, $campo9, $campo10, $campo11, $campo13, $campo12);
					
				}
				$this->grabaFactura($campo3, $campo1, $campo4, $campo7, $campo5, $campo6, $campo8);
				
			}
			
		}
		
		/**
		 * Actualiza factura desde excel en la base de datos
		 */
		function actualizaFactura($campo7, $campo5, $campo6, $campo8, $campo4){
			$datos = array(
					'Importe_Factura' => $campo7,
					'Fecha_Factura' => $campo5,
					'Vencimiento_Factura' => $campo6,
					'Tipo_Pago' => $campo8
				);
				$this->db->update('factura',$datos,array('Numero_Factura'=> $campo4));
		}
		
		/**
		 * Graba deudor desde excel en la base de datos
		 */
		function grabaDeudor($campo3, $campo2, $campo9, $campo10, $campo11, $campo13, $campo12){
			$datos2 = array(
						'CIF_Deudor' => $campo3,
						'Nombre_Deudor' => $campo2,
						'Provincia_Deudor' => $campo9,
						'Ciudad_Deudor' => $campo10,
						'CP_Deudor' => $campo11,
						'Telefono_Deudor' => $campo13,
						'Contacto_Deudor' => $campo12
					);
					$this->db->insert('deudor',$datos2);
		}
		
		/**
		 * Graba factura desde excel en la base de datos
		 */
		function grabaFactura($campo3, $campo1, $campo4, $campo7, $campo5, $campo6, $campo8){
			$datos3 = array(
					'CIF_Deudor' => $campo3,
					'CIF_Empresa' => $campo1,
					'Numero_Factura'=> $campo4,
					'Importe_Factura' => $campo7,
					'Fecha_Factura' => $campo5,
					'Vencimiento_Factura' => $campo6,
					'Tipo_Pago' => $campo8	
				);
				$this->db->insert('factura',$datos3);
		}
    }
?>