<?php
	$ipC = $_SERVER['REMOTE_ADDR'];

	global $variable;
	
	$variable = 0;
	
	// solo la t800 y el cel motorola de ruben
	if ($ipC == "192.168.1.100" OR $ipC == "192.168.1.101"){	
		$variable = 1;
	
	}
	
	else{		
		$variable = 2;
	}
?>

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
	
	/* Funciones relativas al funcionamiento de la pagina */
    
  
	
	 $(document).on("keypress", "input", function(e){
        if(e.which == 13){            
			var nombre = document.getElementById("campoBuscar").value;						
			$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
			document.getElementById("campoBuscar").value = '';
        }
    });
	
		function buscar(){
			
			var nombre = document.getElementById("campoBuscar").value;			
			if (nombre.length > 3){
				$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
			}
			else{
				nombre = "ERROR";
				$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
			}
		}		
		
		function enter_espacio(str) {
			if (str.indexOf(' ') !== -1) 
				{
					return true
				} 
			else 
			{
				return false
			}
		}
		
		
		// concatear un % para la consulta en mysql
		function comodin(){
			var nombre=document.getElementById("campoBuscar").value;
			nombre = nombre + '%';
			document.getElementById("campoBuscar").value = nombre;
		}
		
		// borra la caja de texto		
		function limpiar(){
			document.getElementById("campoBuscar").value = '';
			nombre = "LIMPIAR";
			$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});			
		}
		
		// devuelve la lista rapida
		function lista_rapida(){
			nombre = "LISTA_RAPIDA";
			$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
			
		}
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
	
</head>
<body>

	
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">		
		<div id="titulo"> CHILES Y SEMILLAS SAN JOSE </div>
		<div id="encabezado">									
			<center>			
				<div id="cont_buscar">
				<input type="search" id="campoBuscar" autofocus="true" placeholder="Buscar producto"/></div>
				<button type="button" class="boton" onclick="buscar();">Buscar</button>
				<button type="button" class="boton" onclick="comodin();"> % </button>
				<button type="button" class="boton" onclick="limpiar();">Limpiar</button>
			</center>
			</div>
		</div>
	</header>

	<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

	
</body>
</html>