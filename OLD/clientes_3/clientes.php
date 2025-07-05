<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();


if($_POST['opcion'] == 'buscar'){
		
		
	/* no devolver todas las filas de la consulta*/
	if ($_POST['nombre'] == 'ERROR'){
			
		echo '<article class="conten_producto">';
		echo '<span class="formato">'."Debes escribir un nombre de cliente.".'</span>';
		echo '<br>';
		echo '<span class="formato">'."Gracias.".'</span>';
		echo '</article>';
		
	}
	
	
	/* buscar el producto del campo de texto*/
	else{	

		$nombre = str_replace(" ", "%", utf8_decode($_POST['nombre']));
				
		$res = $bd -> query("SELECT * FROM TBL_CLIENTES WHERE NOMBRE 
							 LIKE '%".$nombre."%' ORDER BY NOMBRE ASC;");
		
		$key = -1;
		foreach ($res as $key => $value) {			
			
			/*se utiliza el método utf8_encode porque en muchas ocasiones los datos 
			devueltos de la base de datos tienen problemas con los acentos*/
			$id_cliente = $value['ID_CLIENTE'];
			$nombre = utf8_encode($value['NOMBRE']);
			$apellido_paterno = utf8_encode($value['APELLIDO_PATERNO']);			
						
			//echo '<a href=	'.'hacer_etiqueta.php?valor='.$id.' target="_blank" style="text-decoration:none">';
			echo '<article class="conten_producto">';
			echo '<span class="formato"> F: '.$nombre.'</span>';
			echo '<span class="descripcion">'.$apellido_paterno.'</span>';			
			echo '</a>';
			
			/*se cierra la etiqueta article para poder iniciar una nueva para el siguiente producto*/
			echo '</article></a>';
			

		}
		
		// por si no encuentra nada
		if ($key==-1){
			echo '<article class="conten_producto">';
			echo '<span class="formato">'."Cliente no encontrado.".'</span>';
			echo'<br>';
			echo '<span class="formato">'."Gracias.".'</span>';
			echo '</article>';
		}
		
		
	}
}
?>