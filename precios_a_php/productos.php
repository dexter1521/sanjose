<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();

$ipC = $_SERVER['REMOTE_ADDR'];

// solo la t800 y el cel motorola de ruben
if ($ipC == "192.168.1.105" OR $ipC == "192.168.1.102"){	


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
			
			//$res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS WHERE NOMBRE_PRODUCTO 
			//					 LIKE '".utf8_decode($_POST['nombre'])."%' ORDER BY NOMBRE_PRODUCTO ASC;");
								 
			//$nombre_producto_2 = str_replace(" ", "%", utf8_decode($_POST['nombre']));
            $nombre_producto_2 = utf8_decode($_POST['nombre']);
			
			//$res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS2 WHERE NOMBRE_PRODUCTO 
			//					 LIKE '%".$nombre_producto_2."%' ORDER BY NOMBRE_PRODUCTO ASC;");
            if (substr($nombre_producto_2, -1) == " "){
                $nombre_producto_2 = substr_replace($nombre_producto_2 ,"",-1);                    
            }
                
            $str_arr = explode (" ", $nombre_producto_2); 
            $msg = "";
                
            for ($i = 0; $i < count($str_arr); $i++) {
                $msg = $msg."+".$str_arr[$i]." ";                
            }
                
            $res = $bd -> query("SELECT * FROM QRY_REPORTE_PRECIOS2 ".
                                "WHERE CLAVE LIKE '".$nombre_producto_2."'".
								" OR CODIGO_BAR LIKE '".$nombre_producto_2."'".
                                " OR NOMBRE_PRODUCTO LIKE '%".str_replace(" ", "%",$nombre_producto_2)."%'".
                                " ORDER BY NOMBRE_PRODUCTO ASC;");
			$key = -1;
			foreach ($res as $key => $value) {
				
				$id_producto = $value['ID_PRODUCTO'];				
				$categoria = utf8_encode($value['CATEGORIA']);
				$nombre_producto = utf8_encode($value['NOMBRE_PRODUCTO']);
				$unidades = $value['UNIDAD'];
				$empaque = $value['EMPAQUE'];
				$clave = $value['CLAVE'];	
				$obs = utf8_encode($value['OBSERVACIONES']);
				
				// OBTENER INFORMACION DE FACTURACION
				$sql = "SELECT FACTURAR, CODIGO_SAT FROM TBL_PRODUCTOS_FACTURADOS_2 WHERE ID_PRODUCTO= $id_producto limit 1";
				$resultado = $bd -> query($sql)->fetch_row();
				
				$cadena_fact = '';
				if (!(empty($resultado))) {
				
					$facturar = $resultado[0];
					$codigo_sat = $resultado[1];
					$cadena_fact = $facturar. '-' .$codigo_sat;
				}
				
				//$pr_t = $value['PR_T'];
				$pr_t = sprintf('$ %.2f', $value['PR_T']);
				$pq_t = $value['PQ_T'];
				$pr_u = sprintf('$ %.2f', $value['PR_U']);								
				
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
				
				$gan_1 = sprintf('%.2f', $value['GAN_1']*100);
				$gan_2 = sprintf('%.2f', $value['GAN_2']*100);
				$gan_3 = sprintf('%.2f', $value['GAN_3']*100);
				$gan_4 = sprintf('%.2f', $value['GAN_4']*100);
				
				$ultimo_proveedor = $value['ULTIMO_PROVEEDOR'];				
				$obs_admin = $value['OBS_ADMIN'];
								
				/* concatenar precios, unidades y cantidades */
				$COSTO =  'PR_T : ' .$pr_t . " / " . $pq_t . ' ' . $unidades .' = ' . $pr_u;
				
				$L1 = "L1 : " . $pt_1 . " / " . $u_vta_1 . " " . $unidades . " = " . $pru_1 . ' ('.$gan_1.'%)';	$L2 = "L2 : " . $pt_2 . " / " . $u_vta_2 . " " . $unidades . " = " . $pru_2 . ' ('.$gan_2.'%)';
				$L3 = "L3 : " . $pt_3 . " / " . $u_vta_3 . " " . $unidades . " = " . $pru_3 . ' ('.$gan_3.'%)';
				$L4 = "L4 : " . $pt_4 . " / " . $u_vta_4 . " " . $unidades . " = " . $pru_4 . ' ('.$gan_4.'%)';
								
				/* unidad_menudeo */
				$unidad_men = $u_vta_1 . " " . $unidades;
												
				echo '<article class="conten_producto">';				
				echo '<span class="categoria">'.$categoria.'</span>';
				echo '<span class="nombre">'.$nombre_producto.'</span>';
				echo '<span class="empaque">'.$empaque.'</span>';
				echo '<span class="ult_prov">'.$ultimo_proveedor.'</span>';				
				echo '<span class="costo">'.$COSTO.'</span>';				
				echo '<span class="L1">'.$L1.'</span>';				
				echo '<span class="L2">'.$L2.'</span>';				
				echo '<span class="L3">'.$L3.'</span>';				
				echo '<span class="L4">'.$L4.'</span>';
					
				echo '<span class="obs2">'.nl2br($obs).'</span>';
				
				echo '<span class="obs_admin">'.nl2br($obs_admin).'</span>';
				echo '<span class="facturar">'.$cadena_fact.'</span>';
				echo '<span class="categoria"> SAIT [ '.$clave.' ]</span>';
				
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
