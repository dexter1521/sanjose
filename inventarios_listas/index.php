<!DOCTYPE html>
<html lang="es">
<head>
	<title>INVENTARIOS Y LISTAS</title>
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
    
    
		
		// Hacer un INVENTARIO en PDF		
		function hacer_inventario(valor){
			window.open('/inventarios_listas/inventario.php?valor='+valor)
		}
		
		// Hacer listas de precios en PDF		
		function hacer_lista_precios(valor){
			window.open('/inventarios_listas/lista_precios.php?valor='+valor)
		}
		
		// abrir un archivo en pdf
		function abrir_formato(valor){
			window.open('/inventarios_listas/formatos_hechos.php?valor='+valor)
		}
		
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			INVENTARIOS Y LISTAS DE PRECIOS DE CHILES Y SEMILLAS SAN JOSE			
		</div>
		
		<!------------------------------------------------------------->
		<div id="subtitulo"> 
			INVENTARIOS
		</div>
		
		<button type="button" class="boton" onclick="hacer_inventario('COMPLETO');">
			COMPLETO
		</button>	

        <button type="button" class="boton" onclick="hacer_inventario('ABARROTES');">
			ABARROTES
		</button>
        
        <button type="button" class="boton" onclick="hacer_inventario('DESECHABLES');">
			DESECHABLES
		</button>            
		
		<button type="button" class="boton" onclick="hacer_inventario('BONI_LEON');">
			BONI - LEON - ROIME
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('CHILES_SEMILLAS');">
			CHILES Y SEMILLAS
		</button>	

        <button type="button" class="boton" onclick="hacer_inventario('BOTANAS_OTROS');">
			BOTANAS Y OTROS
		</button>
		
		<button type="button" class="boton" onclick="hacer_inventario('MAXIMA');">
			MAXIMA
		</button>
		
					
		<button type="button" class="boton" onclick="hacer_inventario('IDEAL');">
			IDEAL
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('MARU_JARCIERIA');">
			MARU
		</button>
		
		<button type="button" class="boton" onclick="hacer_inventario('SAN_LUIS');">
			SAN LUIS
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('MABEEL');">
			MABEEL
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('LALA_PATRONA_BIMBO');">
			LALA / PATRONA
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('SAYES');">
			SAYES
		</button>
		
		<button type="button" class="boton" onclick="hacer_inventario('CELOFAN');">
			CELOFAN
		</button>
		
		<button type="button" class="boton" onclick="hacer_inventario('SCHETTINO');">
			BUENO / SCHETTINO
		</button>
				
		<button type="button" class="boton" onclick="hacer_inventario('SURTIPAN');">
			SURTIPAN
		</button>
        
        <button type="button" class="boton" onclick="hacer_inventario('MATERIA_PRIMA');">
			MATERIA PRIMA
		</button>
        		
		<button type="button" class="boton" onclick="hacer_inventario('INIX');">
			INIX
		</button>
        
        <button type="button" class="boton" onclick="hacer_inventario('CADEXA');">
			CADEXA
		</button>	    
	
		<button type="button" class="boton" onclick="abrir_formato('PAPELERIA');">
			PAPELERIA
		</button> 
		
		<button type="button" class="boton" onclick="hacer_inventario('COATEPEC');">
			PLAST COATEPEC
		</button> 

		<button type="button" class="boton" onclick="hacer_inventario('ALTENA');">
			ALTENA / CIMARRON
		</button>
			
		<!------------------------------------------------------------->
				
		<div id="subtitulo"> 
			LISTAS DE PRECIOS
		</div>
		
		<button type="button" class="boton" onclick="hacer_lista_precios('LISTA_GENERAL');">
			PRECIOS GENERAL
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('EMPAQUE_VASOS');">
			EMPAQUE VASOS
		</button>
	

	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>