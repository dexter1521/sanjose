<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();


if($_POST['opcion'] == 'buscar'){
		
		
	/* no devolver todas las filas de la consulta*/
	if ($_POST['nombre'] == 'ERROR'){
			
		echo '<article class="conten_producto">';
		echo '<span class="formato">'."Debes escribir un nombre de producto.".'</span>';
		echo '<br>';
		echo '<span class="formato">'."Gracias.".'</span>';
		echo '</article>';
		
	}
	
	
	/* buscar el producto del campo de texto*/
	else{	

		$nombre_producto = str_replace(" - ", "%", utf8_decode($_POST['nombre']));
		$nombre_producto = str_replace(" ", "%", utf8_decode($nombre_producto));
				
		$res = $bd -> query("SELECT * FROM TBL_ETIQUETAS_PRODUCTOS WHERE NOMBRE_PRODUCTO 
							 LIKE '%".$nombre_producto."%' ORDER BY NOMBRE_PRODUCTO ASC;");
		
		$key = -1;
		foreach ($res as $key => $value) {			
			
			/*se utiliza el método utf8_encode porque en muchas ocasiones los datos 
			devueltos de la base de datos tienen problemas con los acentos*/
			$id = $value['ID'];
			$formato = utf8_encode($value['FORMATO']);
			$nombre_producto_2 = utf8_encode($value['NOMBRE_PRODUCTO']);			
			/*$nombre_producto_2 = str_replace(" ", "%20", utf8_encode($value['NOMBRE_PRODUCTO']));*/
			
			echo '<a href=	'.'hacer_etiqueta.php?valor='.$id.' target="_blank" style="text-decoration:none">';
			echo '<article class="conten_producto">';
			echo '<span class="formato"> F: '.$formato.'</span>';
			echo '<span class="descripcion">'.$nombre_producto_2.'</span>';			
			echo '</a>';
			
			/*se cierra la etiqueta article para poder iniciar una nueva para el siguiente producto*/
			echo '</article></a>';
			

		}
		
		// por si no encuentra nada
		if ($key==-1){
			echo '<article class="conten_producto">';
			echo '<span class="formato">'."Producto no encontrado.".'</span>';
			echo'<br>';
			echo '<span class="formato">'."Gracias.".'</span>';
			echo '</article>';
		}
		
		
	}
}
?>