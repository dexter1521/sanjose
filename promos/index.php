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
		
        var script = document.createElement('script'); 
        var version = Date.time();
        script.src = "common.js?v="+version; 
        document.head.appendChild(script) 
        
        
		// abrir un archivo en pdf
		function abrir_formato(valor){
			window.open('/promos/formatos_hechos.php?valor='+valor)
		}
                
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			PROMOCIONES Y OFERTA	
		</div>	
		
		<!------------------------------------------------------------->
				
		<button type="button" class="boton" onclick="abrir_formato('PROMOS');">
			PROMOS
		</button>
		
				
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>