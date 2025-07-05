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
            //$nombre_producto_2 = utf8_decode($_POST['nombre']);
			
			// CASO SE INTRODUCE CODIGO
			if (is_numeric($nombre_producto_2)) {				
			
				$res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS2 WHERE CLAVE LIKE '".$nombre_producto_2.
								    "' OR CODIGO_BAR LIKE '".$nombre_producto_2."'ORDER BY NOMBRE_PRODUCTO ASC;");
			}

			// CASO SE INTRODUCE LETRAS Y NUMEROS
			else{
				$res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS2 WHERE NOMBRE_PRODUCTO 
								    LIKE '%".$nombre_producto_2."%' OR CLAVE LIKE '".$nombre_producto_2."'ORDER BY NOMBRE_PRODUCTO ASC;");	
                /*
                if (substr($nombre_producto_2, -1) == " "){
                    $nombre_producto_2 = substr_replace($nombre_producto_2 ,"",-1);                    
                }
                
                $str_arr = explode (" ", $nombre_producto_2); 
                $msg = "";
                
                for ($i = 0; $i < count($str_arr); $i++) {
                    $msg = $msg."+".$str_arr[$i]." ";                
                }
                
				$res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS2 ".
                                    " WHERE MATCH (NOMBRE_PRODUCTO) AGAINST ('".$msg."' IN BOOLEAN MODE)".
                                    " ORDER BY NOMBRE_PRODUCTO ASC;");
                */
			}		
			
			
			$key = -1;
			foreach ($res as $key => $value) {
				
				$id_producto = $value['ID_PRODUCTO'];
				$categoria = utf8_encode($value['CATEGORIA']);
				$nombre_producto = utf8_encode($value['NOMBRE_PRODUCTO']);
				$unidades = $value['UNIDAD'];
				$empaque = $value['EMPAQUE'];
				$obs = utf8_encode($value['OBSERVACIONES']);
				$codigo_bar = utf8_encode($value['CODIGO_BAR']);
				$clave = utf8_encode($value['CLAVE']);
				$iva = utf8_encode($value['IMPUESTO_1']);
				$ieps  = utf8_encode($value['IMPUESTO_2']);
				
				// OBTENER INFORMACION DE FACTURACION
				$sql = "SELECT FACTURAR, CODIGO_SAT, ULT_FECHA_FACT, IMP_16, IMP_8
						FROM TBL_PRODUCTOS_FACTURADOS_2 
						WHERE ID_PRODUCTO= $id_producto limit 1";
				$resultado = $bd -> query($sql)->fetch_row();
				$facturar = $resultado[0];	
				$ult_fecha_fact = $resultado[2];		
				//$imp16 = $resultado[3];
				//$imp8 = $resultado[4];
			
				$date1 = new DateTime(date("Y-m-d"));
				$date2 = new DateTime($ult_fecha_fact);
				$diff = $date1->diff($date2);
				$diferencia = $diff->m; // diferencia de meses desde la ultima compra
				
				$cadena_fact = "-";
				
				// solo facturar aquellas productos con fecha de compra menor a tres meses
				if ($diferencia <= 4){ 
					if ($facturar == "SI"){
						$codigo_sat = '[ SAT '.$resultado[1].' ] [ IVA '.$iva.'% ] [ IEPS '.$ieps.'% ]';
						$cadena_fact = $codigo_sat;
					
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
				
				//$L1 = "L1 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1;
				//$L2 = "L2 : " . $pt_2 . " / " . $u_vta_2 . " " . $unidades . " = " . $pru_2;
				//$L3 = "L3 : " . $pt_3 . " / " . $u_vta_3 . " " . $unidades . " = " . $pru_3;
				//$L4 = "L4 : " . $pt_4 . " / " . $u_vta_4 . " " . $unidades . " = " . $pru_4;
				
				$L1 = "[ L1 ]  Por " . $u_vta_1 . " ". $unidades." a razon de  " . $pru_1 . " = " . $pt_1;
				$L2 = "[ L2 ] A partir de " . $u_vta_2 . " ". $unidades." le sale en:  " . $pru_2 . " = " . $pt_2 ;
				$L3 = "[ L3 ] A partir de " . $u_vta_3 . " ". $unidades." le sale en:  " . $pru_3 . " = " . $pt_3 ;
				$L4 = "[ L4 ] A partir de " . $u_vta_4 . " ". $unidades." le sale en:  " . $pru_4 . " = " . $pt_4 ;
				
				
				/* unidad_menudeo */
				$unidad_men = $u_vta_1 . " " . $unidades;
												
				echo '<article class="conten_producto">';	
				echo '<span class="categoria">'.$categoria.'</span>';												
				echo '<span class="nombre">'.$nombre_producto.'</span>';
				echo '<span class="empaque"> EMPAQUE [ '.$empaque.' ]</span>';
				echo '<span class="L1">'.$L1.'</span>';				
				echo '<span class="L2">'.$L2.'</span>';				
				echo '<span class="L3">'.$L3.'</span>';				
				echo '<span class="L4">'.$L4.'</span>';
					
				echo '<span class="obs2">'.nl2br($obs).'</span>';	
				echo '<br>';				
				
				echo '<span class="empaque"><h1>COD_BAR [ '.$codigo_bar.' ] <br>   CLAVE [ '.$clave.' ]</h1></span>';																																				
				echo '<br>';
				echo '<span class="facturar">'.$cadena_fact.'</span>';
				echo '<br>';
				echo '</article>';
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
