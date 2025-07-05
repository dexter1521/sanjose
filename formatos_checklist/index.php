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
			window.open('/formatos_checklist/formatos_hechos.php?valor='+valor)
		}
                
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			FORMATOS VARIOS DE CHECKLIST Y OTROS	
		</div>	
		
		<!------------------------------------------------------------->
		<div id="subtitulo"> 
			REGISTROS
		</div>
		
		<button type="button" class="boton" onclick="abrir_formato('DEGUSTACIONES');">
			DEGUSTACIONES
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('GENERICO');">
			GENERICO
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('CHECKLIST_SEMANAL');">
			CHECKLIST SEMANAL 
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('CHECKLIST_GENERICO');">
			CHECKLIST GENERICO 
		</button>		
		
		<button type="button" class="boton" onclick="abrir_formato('CHECKLIST_EMPAQUE');">
			CHECKLIST EMPAQUE 
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('CHECKLIST_ACTIVIDAD');">
            CHECKLIST ACTIVIDAD
		</button>
        				
		<button type="button" class="boton" onclick="abrir_formato('PRODUC_ORDEN_LIMP');">
			PRODUC / ORDEN / LIMP
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('AGENDA_SEMANAL');">
			AGENDA SEMANAL
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('AGENDA_SEMANAL2');">
			AGENDA SEMANAL 2
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('DESPENSAS');">
			DESPENSAS
		</button>        
        
        <button type="button" class="boton" onclick="abrir_formato('ETIQUETAS_IMAGENES');">
            CATALOGO DE ETIQUETAS
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('BOLSAS_AUT_EMPAQUE');">
            BOLSAS AUTORIZADAS EMPAQUE
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('ROL_LIMPIEZA');">
            ROL DE LIMPIEZA
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('ESPECIAS_1_KG');">
            ESPECIAS DE 1 KG
		</button>


		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>