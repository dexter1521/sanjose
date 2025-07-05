<!DOCTYPE html>
<html lang="es">
<head>

	<title>PRECIOS CHILES</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Consulta de productos">
	<meta name="keywords" content="tienda,semillas,productos">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="img/icono2.ico" type="image/x-icon">
	<script src="javascript/jquery-latest.js"></script>
	<script type='text/javascript' language="javascript">
    </script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
	
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar
	<header id="portada">		
		<div id="titulo">PENDIENTES LISTA RAPIDA </div>
		<div id="encabezado">									
        </div>            
		</div>
	</header>
-->
	<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">    



<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();


$res = $bd -> query("SELECT * FROM QRY_LISTA_RAPIDA_PRECIOS ORDER BY FECHA_PENDIENTE ASC;");
$row_cnt = $res->num_rows;

$key = -1;
echo '<table class="blueTable">';
echo '<thead>';
echo '<tr>';
echo '<th><span class="nombre2">LISTA RAPIDA '.$row_cnt.' EN ESPERA</th></span>';
echo '</tr>';            
echo '</thead>';
echo '<tbody>';

foreach ($res as $key => $value) {    

    $nombre_producto = utf8_encode($value['PRODUCTO']);    
	$precio = utf8_encode($value['PRECIO']);    
	$fecha_pendiente = utf8_encode($value['FECHA_PENDIENTE']);    
    echo '<tr>';    
    echo '<td>';
    echo '<span class="nombre">'.$nombre_producto.'</span>';
	echo '<span class="precio">'.$precio.'</span>';
	echo '<br>';
	echo '<span class="fecha">'.$fecha_pendiente.'</span>';	
    echo '</td>';
    echo '</tr>';

}

echo '</tbody>';
echo '</table>';

// por si no encuentra nada
if ($key==-1){
    echo '<article class="conten_producto">';
    echo '<span class="nombre">'."Sin Pendientes de Lista Rapida".'</span>';				
    echo '<span class="nombre">'."Gracias.".'</span>';
    echo '</article></a>';
}			
		

?>

	</section>

	
</body>
</html>
