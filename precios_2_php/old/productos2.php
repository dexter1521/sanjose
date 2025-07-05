<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();

$ipC = $_SERVER['REMOTE_ADDR'];

// INVALIDAR POR EL MOMENTO
if (1==1){	

	if($_POST['opcion'] == 'buscar'){
			
			
		/* no devolver todas las filas de la consulta*/
		if ($_POST['nombre'] == 'ERROR'){
				
			echo '<article class="conten_producto">';
			echo '<span class="nombre">'."Producto no encontrado.".'</span>';			
			echo '<span class="nombre">'."Gracias.".'</span>';
			echo '</article>';			
		}
		
		/* limpiar consulta*/
		elseif ($_POST['nombre'] == 'LIMPIAR'){
				
			echo '<article class="conten_producto">';
			echo '<span class="nombre">'."Introduzca un nombre.".'</span>';			
			echo '<span class="nombre">'."Gracias.".'</span>';
			echo '</article>';			
		}
		
		
		/* buscar el producto del campo de texto*/
		else{	
			
			$nombre_producto_2 = str_replace(" ", "%", utf8_decode($_POST['nombre']));
			$test = utf8_decode($_POST['nombre']);
						
			$res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS WHERE NOMBRE_PRODUCTO 
								 LIKE '%".$nombre_producto_2."%' ORDER BY NOMBRE_PRODUCTO ASC;");
			
			//echo "SELECT * FROM QRY_REPORTE_PRECIOS_VENDEDOR WHERE NOMBRE_PRODUCTO 
			//					 LIKE '".$nombre_producto_2."%' ORDER BY NOMBRE_PRODUCTO ASC;";
			
			$key = -1;
			foreach ($res as $key => $value) {
				
				$id_producto = $value['ID_PRODUCTO'];
				$categoria = utf8_encode($value['CATEGORIA']);
				$nombre_producto = utf8_encode($value['NOMBRE_PRODUCTO']);
				$unidades = $value['UNIDAD'];
				$empaque = $value['EMPAQUE'];
				$obs = utf8_encode($value['OBSERVACIONES']);
				
				// OBTENER INFORMACION DE FACTURACION
				$sql = "SELECT FACTURAR, CODIGO_SAT, ULT_FECHA_FACT 
						FROM TBL_PRODUCTOS_FACTURADOS_2 
						WHERE ID_PRODUCTO= $id_producto limit 1";
				$resultado = $bd -> query($sql)->fetch_row();
				$facturar = $resultado[0];	
				$ult_fecha_fact = $resultado[2];	
			
				$date1 = new DateTime(date("Y-m-d"));
				$date2 = new DateTime($ult_fecha_fact);
				$diff = $date1->diff($date2);
				$diferencia = $diff->m; // diferencia de meses desde la ultima compra
				
				$cadena_fact = "-";
				
				// solo facturar aquellas productos con fecha de compra menor o igual a tres meses
				if ($diferencia <= 3){ 
					if ($facturar == "SI"){
						$codigo_sat = $resultado[1];
						$cadena_fact = $facturar. '-' .$codigo_sat;
					
					}
				
					elseif ($facturar == "NO"){
						$cadena_fact = "-";					
					}
				}
				
				$pru_1 = sprintf('$ %.2f', $value['PRU_1']);
				$pru_2 = sprintf('$ %.2f', $value['PRU_2']);
				$pru_3 = sprintf('$ %.2f', $value['PRU_3']);
				$pru_4 = sprintf('$ %.2f', $value['PRU_4']);
				
				$pt_1 = sprintf('$ %.2f', $value['PT_1']);
				$pt_2 = sprintf('$ %.2f', $value['PT_2']);
				$pt_3 = sprintf('$ %.2f', $value['PT_3']);
				$pt_4 = sprintf('$ %.2f', $value['PT_4']);
				
				$u_vta_1 = $value['U_VTA_1'];
				$u_vta_2 = $value['U_VTA_2'];
				$u_vta_3 = $value['U_VTA_3'];
				$u_vta_4 = $value['U_VTA_4'];
												
				/* concatenar precios, unidades y cantidades */
				
				//$L1 = "L1 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1;
				//$L2 = "L2 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1;
				//$L3 = "L3 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1;
				//$L4 = "L4 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1;
				$L1 = "L1 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1;
				$L2 = "L2 : " . $pt_2 . " / " . $u_vta_2 . " " . $unidades . " = " . $pru_2;
				$L3 = "L3 : " . $pt_3 . " / " . $u_vta_3 . " " . $unidades . " = " . $pru_3;
				$L4 = "L4 : " . $pt_4 . " / " . $u_vta_4 . " " . $unidades . " = " . $pru_4;
				
				//$ahorro_2 = number_format(($pru_1 * $u_vta_2) - ($pt_2), 2);
				//$ahorro_3 = number_format(($pru_1 * $u_vta_3) - ($pt_3), 2);
				//$ahorro_4 = number_format(($pru_1 * $u_vta_4) - ($pt_4), 2);
				
				/* unidad_menudeo */
				$unidad_men = $u_vta_1 . " " . $unidades;
												
				echo '<article class="conten_producto">';
				echo '<span class="categoria">'.$categoria.'</span>';								
				echo '<span class="nombre">'.$nombre_producto.'</span>';								
				echo '<span class="empaque">'.$empaque.'</span>';
				echo '<span class="L1">'.$L1.'</span>';				
				echo '<span class="L2">'.$L2.'</span>';				
				echo '<span class="L3">'.$L3.'</span>';				
				echo '<span class="L4">'.$L4.'</span>';
					
				echo '<span class="obs2">'.nl2br($obs).'</span>';				
				echo '<span class="facturar">'.$cadena_fact.'</span>';
				echo '</article></a>';
			}
			
			// por si no encuentra nada
			if ($key==-1){
				echo '<article class="conten_producto">';
				echo '<span class="nombre">'."Producto no encontrado.".'</span>';				
				echo '<span class="nombre">'."Gracias.".'</span>';
				echo '</article>';
			}
			
		}
	}
}

else{
	echo 'PRODUCTO NO ENCONTRADO';
	
}
?>
