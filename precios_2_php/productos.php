<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Call JS Function</title>
        <script type="text/javascript">
        
            function jsFunction(clave, nombre_producto){
                
                //var aux = test + '\r\n' + test2;                
                var aux = nombre_producto;            
                
                if (aux != null) {                    
                    var dummy = document.createElement("textarea");
                    document.body.appendChild(dummy);                    
                    dummy.value = aux;
                    dummy.select();
                    document.execCommand("copy");
                    document.body.removeChild(dummy); var dummy = document.createElement("textarea");
                    document.body.appendChild(dummy);
                    dummy.value = aux;
                    dummy.select();
                    document.execCommand("copy");
                    document.body.removeChild(dummy);                    
                    alert ('\r\n' + aux + " Copiado ");
                }
            }
            
            function jsFunction2(test){
                    alert (test + " prompt ");
            }    
            
                
            
            
        </script>
    </head>
<body>

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
				$vta_min = utf8_encode($value['VTA_MIN']);
				//$tot_vta_min = $vta_min * $value['PRU_1'];	
				$msgaux = 'Vta. Min. ';
				
				if ($vta_min == 1) {	
					//echo 'vta_min'.$vta_min;
					$msgaux = "";					
					$aux_vta_min2 = "";					
					$aux_vta_min3 = "";
				}
				
				else {
					// formato de venta minima
					$aux_vta_min = "$ ".number_format($value['PRU_1'] * $vta_min,2, '.', ',');				
					if ($unidades == "KG"){
						//$aux_vta_min2 = number_format($vta_min,3,'.',',').' '.$unidades.' = '.$aux_vta_min.'\r\n';                    
						$aux_vta_min2 = number_format($vta_min,3,'.',',').' '.$unidades.' = '.$aux_vta_min;
						$aux_vta_min3 = number_format($vta_min,3,'.',',').' '.$unidades.' = '.$aux_vta_min;                    
					}
					
					else{
						//$aux_vta_min2 = $vta_min.' '.$unidades.' = '.$aux_vta_min.'\r\n';                  
						$aux_vta_min2 = $vta_min.' '.$unidades.' = '.$aux_vta_min;
						$aux_vta_min3 = $vta_min.' '.$unidades.' = '.$aux_vta_min;
					}
				}
				
				$pru_1 = "$ ". number_format($value['PRU_1'], 2, '.', ',');				
				$pru_2 = "$ ". number_format($value['PRU_2'], 2, '.', ',');				
				$pru_3 = "$ ". number_format($value['PRU_3'], 2, '.', ',');				
				$pru_4 = "$ ". number_format($value['PRU_4'], 2, '.', ',');
				
				$pt_1 = "$ ". number_format($value['PT_1'], 2, '.', ',');				
				$pt_2 = "$ ". number_format($value['PT_2'], 2, '.', ',');				
				$pt_3 = "$ ". number_format($value['PT_3'], 2, '.', ',');				
				$pt_4 = "$ ". number_format($value['PT_4'], 2, '.', ',');
				
				$u_vta_1 = $value['U_VTA_1'];
				$u_vta_2 = $value['U_VTA_2'];
				$u_vta_3 = $value['U_VTA_3'];
				$u_vta_4 = $value['U_VTA_4'];
				
				$precio_1 = $pru_1 . " " . $unidades;
				$precio_2 = $pru_2 . " por " . $u_vta_2. " " . $unidades." = ".$pt_2;
				$precio_3 = $pru_3 . " por " . $u_vta_3. " " . $unidades." = ".$pt_3;
				$precio_4 = $pru_4 . " por " . $u_vta_4. " " . $unidades." = ".$pt_4;
				
				$pre_1 = $precio_1.'\r\n';
				$pre_2 = $precio_2.'\r\n';
				$pre_3 = $precio_3.'\r\n';
				$pre_4 = $precio_4.'\r\n';
				
			    If ($pru_1 == $pru_2) {
					$precio_2 = "";
					$pre_2 = "";
				}

				If ($pru_2 == $pru_3) {
					$precio_3 = "";
					$pre_3 = "";
				}
				
				If ($pru_3 == $pru_4) {
					$precio_4 = "";
					$pre_4 = "";
				}
				
				If(strlen($obs)<=2){
					$obs =  "";
				}
				
				$msg = '\r\n'."*Precios sujetos a cambio sin previo aviso*".'\r\n';
				
				
				$clave2 = "C-".$clave;
				$cadena = $precio_1."<br><br>".						  
						  (strlen($aux_vta_min3)>0 ? $msgaux.$aux_vta_min3."<br><br>":"").
						  $precio_2.(strlen($precio_2)>0 ? "<br><br>":"").
						  $precio_3.(strlen($precio_3)>0 ? "<br><br>":"").
						  $precio_4.(strlen($precio_4)>0 ? "<br><br>":"").						  
						  nl2br($obs);
				
				
				$obs2 = str_replace(array("\r\n", ""), '\n', $obs);
								
				echo '<article class="conten_producto">';					
				echo '<span class="clave">C- '.$clave.'</span>';
				echo '<span ondblclick="jsFunction('.$clave.',\''.'*'.$nombre_producto.'* ('.$clave2.')\r\n'
																     .$pre_1																	 
																	 .(strlen($aux_vta_min2)>0 ? $msgaux.$aux_vta_min2.'\r\n':'')
																	 .$pre_2
																	 .$pre_3
																	 .$pre_4
																	 .$obs2
																	 .$msg.'\')"/span>';
				
				echo '<span class="nombre">'.$nombre_producto.'</span>';
				echo '<span class="empaque"> EMPAQUE [ '.$empaque.' ]</span>';
				echo '<span class="L1">'.$cadena.'</span>';					
				
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
