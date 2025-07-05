<!DOCTYPE html>
<html lang="es">
<head>
	<title>FORMATOS DE CHECKLIST</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Consulta de productos">
	<meta name="keywords" content="tienda,semillas,productos">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="img/icono2.ico" type="image/x-icon">
	<script src="javascript/jquery-latest.js"></script>
	<script type='text/javascript' language="javascript">
	
	/* Funciones relativas al funcionamiento de la pagina */		
		
		// abrir un archivo en pdf
		function abrir_formato(valor){
			window.open('/formatos_checklist/formatos_hechos.php?valor='+valor)
		}
		
		// abrir pagina		
		function abrir_pagina(valor){
			window.open('/pendientes/pendientes.php?valor='+valor)
			
		}
        
        // abrir pagina		
		function lista_rapida_pendientes(){
			window.open('/pendientes/lista_rapida_pendientes.php')
			
		}
        
		
		// abrir pagina		
		function abrir_mytinydo(){
			window.open('/mytinytodo//?pda')
			
		}
		
		// abrir empaque		
		function abrir_empaque(){
			window.open('/pendientes/empaque.php')
			
		}
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			LISTAS DE PENDIENTES Y AGENDA DE ACTIVIDADES	
		</div>	
		
		<!------------------------------------------------------------->
		<div id="subtitulo"> 
			LISTAS DE PENDIENTES
		</div>
		
		<button type="button" class="boton" onclick="lista_rapida_pendientes();">
			LISTA RAPIDA
		</button>
		
		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>