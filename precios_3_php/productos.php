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
            
            function jsFunction2(test, test2){
                    alert (test + '\r\n' + test2 + " prompt ");
            }                             
            
        </script>
    </head>
<body>

<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();
$ipC = $_SERVER['REMOTE_ADDR'];

// Check if the "mobile" word exists in User-Agent 
/*
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
 
if($isMob){ 
	$tipo = 'MOVIL'; 
}

else{ 
	$tipo = 'ESCRITORIO'; 
}
*/

//por el momento se queda asi
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
								    LIKE '%".$nombre_producto_2."%' OR CLAVE LIKE '".$nombre_producto_2."' OR CODIGO_BAR LIKE '".$nombre_producto_2."' ORDER BY NOMBRE_PRODUCTO ASC;");	               
			}					
	              
            echo '<table class="blueTable">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>NOMBRE DEL PRODUCTO</th>';
            echo '<th>CLAVES</th>';
            echo '<th>EMPAQUE</th>';            
            echo '<th>UNID</th>';            
            echo '<th>LISTA 1</th>';
            echo '<th>LISTA 2</th>';
            echo '<th>LISTA 3</th>';
            echo '<th>LISTA 4</th>';            
            echo '</tr>';            
            echo '</thead>';
            echo '<tbody>';
            
			$key = -1;
			foreach ($res as $key => $value) {
				
				$id_producto = $value['ID_PRODUCTO'];
				$categoria = utf8_encode($value['CATEGORIA']);
				$nombre_producto = utf8_encode($value['NOMBRE_PRODUCTO']);
				$unidades = $value['UNIDAD'];
				$empaque = $value['EMPAQUE'];
                
				$obs = utf8_encode($value['OBSERVACIONES']);
                $obs = nl2br($value['OBSERVACIONES']);
                //$obs = str_replace(array("\r", "\n"), "\n", $obs);
                
				$codigo_bar = utf8_encode($value['CODIGO_BAR']);
				$clave = utf8_encode($value['CLAVE']);
				$iva = utf8_encode($value['IMPUESTO_1']);
				$ieps  = utf8_encode($value['IMPUESTO_2']);
                $vta_min = utf8_encode($value['VTA_MIN']);
                $pru_1 = $value['PRU_1'];
                $aux_vta_min = "$ ".number_format($pru_1 * $vta_min,2, '.', ',');
                
				$msgaux = 'Vta. Min. ';
				
				if ($vta_min == 1) {	
					//echo 'vta_min'.$vta_min;
					$msgaux = "";
					$aux_vta_min2 = "";
				}
				
				else {
					// formato de venta minima
					$aux_vta_min = "$ ".number_format($value['PRU_1'] * $vta_min,2, '.', ',');				
					if ($unidades == "KG"){
						$aux_vta_min2 = number_format($vta_min,3,'.',',').' '.$unidades.' = '.$aux_vta_min.'\r\n';                    
					}
					
					else{
						$aux_vta_min2 = $vta_min.' '.$unidades.' = '.$aux_vta_min.'\r\n';                  
					}
				}
				
                $pru_1 = "$ ".number_format($value['PRU_1'], 2, '.', ',');
                $pru_2 = "$ ".number_format($value['PRU_2'], 2, '.', ',');
                $pru_3 = "$ ".number_format($value['PRU_3'], 2, '.', ',');
                $pru_4 = "$ ".number_format($value['PRU_4'], 2, '.', ',');
				
				//$pt_1 = sprintf('$ %.2f', $value['PT_1']);                
                $pt_1 = "$ ".number_format($value['PT_1'], 2, '.', ',');
                $pt_2 = "$ ".number_format($value['PT_2'], 2, '.', ',');
                $pt_3 = "$ ".number_format($value['PT_3'], 2, '.', ',');
                $pt_4 = "$ ".number_format($value['PT_4'], 2, '.', ',');				
				
				$u_vta_1 = $value['U_VTA_1'];
				$u_vta_2 = $value['U_VTA_2'];
				$u_vta_3 = $value['U_VTA_3'];
				$u_vta_4 = $value['U_VTA_4'];
                                
                $precio_1 = "Por *". $u_vta_1. " ". $unidades. "* a razón de *" .$pru_1 ."*".'\r\n';
                $precio_2 = "Por *". $u_vta_2. " ". $unidades. "* a razón de *" .$pru_2 ." = ".$pt_2.'*'.'\r\n';
                $precio_3 = "Por *". $u_vta_3. " ". $unidades. "* a razón de *" .$pru_3 ." = ".$pt_3.'*'.'\r\n';   
                $precio_4 = "Por *". $u_vta_4. " ". $unidades. "* a razón de *" .$pru_4 ." = ".$pt_4.'*'.'\r\n';
								
                if ($pru_1 == $pru_2) {
                    //echo $clave.' 2 = 3 ';
                    $precio_2 = "";
                }

                if ($pru_2 == $pru_3) {
                    //echo $clave.' 2 = 3 ';
                    $precio_3 = "";
                }
                
                if ($pru_3 == $pru_4) {
                    //echo $clave.' 2 = 3 ';
                    $precio_4 = "";
                }
                                
                echo '<tr>';                                                                       
				       $msg = '\r\n'."*Precios sujetos a cambio sin previo aviso*".'\r\n';
                echo '<td style="width: 550px" ondblclick="jsFunction('.$clave.',\''
                                                                       .'*'.$nombre_producto.'*'.' (C-'.$clave.')\r\n'
                                                                       .$precio_1.$msgaux.$aux_vta_min2.$precio_2.$precio_3.$precio_4.$msg.'\')">'; 
                    
                //echo '<td style="width: 500px" ondblclick="jsFunction3('.$clave.',\')">';
                echo '<span class="nombre">'.$nombre_producto.'</span>';
				
				If ($vta_min == 1) {	
					echo '';
				}
				
				else {
					echo '<span class="vta_min"> V_MIN '.$aux_vta_min2.'</span>';
				}
                
				
				if (strlen($obs)>1) {
                    echo '<span class="obs2">'.$obs.'</span>';                      
                }
                echo '</td>';
                                
                echo '<td style="width: 250px;">';
                echo '<span class="codigos"> SAIT : '.$clave.'</span><br>';                
                if (strlen($codigo_bar)>2) {
                    echo '<span class="codigos"> C1 : '.$codigo_bar.'</span>';
                }
                echo '</td>';                
                
                echo '<td style="width: 100px;">';    
                echo '<span class="empaque">'.$empaque.'</span>';                      
                echo '</td>';
                
                echo '<td style="width: 80px;">';                
                echo '<span class="unidad">'.$unidades.'</span>'; 
                echo '</td>';
                
                //echo '<td style="width: 250px" ondblclick="jsFunction2('.$clave.',\''.$nombre_producto.'\')">';
                echo '<td style="width: 200px;">';
                echo '<span class="precio">'.$pru_1.'</span>';                 
                echo '<span class="cantidad"> '.$u_vta_1.' '.$unidades.'</span>';                
                echo '</td>';
                
                echo '<td style="width: 400px;">';
                echo '<span class="precio">'.$pru_2.'</span>';                 
                echo '<span class="cantidad"> Por '.$u_vta_2.' '.$unidades.' = '.$pt_2.'</span>';
                echo '</td>';
                
                echo '<td style="width: 400px;">';
                echo '<span class="precio">'.$pru_3.'</span>';                                 
                echo '<span class="cantidad"> Por '.$u_vta_3.' '.$unidades.' = '.$pt_3.'</span>';
                echo '</td>';
                
                echo '<td style="width: 400px;">';
                echo '<span class="precio">'.$pru_4.'</span>';                                 
                echo '<span class="cantidad"> Por '.$u_vta_4.' '.$unidades.' = '.$pt_4.'</span>';
                echo '</td>';
                
                echo '</tr>';	
                
              
			}
            
            echo '</tbody>';
            echo '</table>';
			
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
	echo '<article class="conten_producto">';	
	echo '<span class="nombre">'."Gracias.".'</span>';
	echo '</article>';	
}
?>
