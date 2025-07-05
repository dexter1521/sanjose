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
			echo '<span class="nombre">'."Cliente no encontrado.".'</span>';			
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
			
			$nombre_cliente_2 = str_replace(" ", "%", utf8_decode($_POST['nombre']));
			$test = utf8_decode($_POST['nombre']);
						
			$res = $bd -> query("SELECT * FROM TBL_CLIENTES WHERE NOMBRE 
								 LIKE '%".$nombre_cliente_2."%' ORDER BY NOMBRE ASC;");
			
			$key = -1;
			foreach ($res as $key => $value) {
				
				$id_cliente = $value['ID_CLIENTE'];
				$nombre = $value['NOMBRE'];
				$apellido_paterno = utf8_encode($value['APELLIDO_PATERNO']);
				$apellido_materno = utf8_encode($value['APELLIDO_MATERNO']);
				$empresa = $value['EMPRESA'];
				$RFC = $value['RFC'];
				$TEL_1 = $value['TEL_1'];
				$CEL_1 = $value['CEL_1'];
				$TEL_2 = $value['TEL_2'];
				$CEL_2 = $value['CEL_2'];
				$email = $value['EMAIL'];
				$obs = utf8_encode($value['OBSERVACIONES']);
				
				echo '<article class="conten_producto">';
				echo '<span class="categoria">'.$nombre.'</span>';								
				echo '<span class="nombre">'.$apellido_paterno.'</span>';								
				echo '<span class="empaque">'.$apellido_materno.'</span>';
				echo '<span class="L1">'.$empresa.'</span>';				
				echo '<span class="L1">'.$TEL_1.'</span>';
				echo '<span class="L1">'.$CEL_1.'</span>';
				echo '<span class="L1">'.$TEL_2.'</span>';
				echo '<span class="L2">'.$CEL_2.'</span>';									
				echo '<span class="obs2">'.nl2br($obs).'</span>';								
				echo '</article></a>';
			}
			
			// por si no encuentra nada
			if ($key==-1){
				echo '<article class="conten_producto">';
				echo '<span class="nombre">'."Cliente no encontrado.".'</span>';				
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
