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
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">		
		<div id="titulo">PENDIENTES </div>
		<div id="encabezado">									
        </div>            
		</div>
	</header>

	<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">    



<?php

require_once('BaseDatos.php');
$bd = new BaseDatos();


$res = $bd -> query("SELECT * FROM QRY_LISTA_RAPIDA_PENDIENTES;");
$key = -1;
echo '<table class="blueTable">';
echo '<thead>';
echo '<tr>';
echo '<th>PENDIENTES DE LA LISTA RAPIDA</th>';
echo '</tr>';            
echo '</thead>';
echo '<tbody>';


foreach ($res as $key => $value) {    

    $nombre_producto = utf8_encode($value['PRODUCTO']);    
    echo '<tr>';    
    echo '<td>';
    echo '<span class="nombre">'.$nombre_producto.'</span>';
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
