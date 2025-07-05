<!DOCTYPE html>
<html lang="es">
<head>
	<title>CALENDARIOS MENSUALES PARA USOS GENERALES</title>
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
    
		
		// Hacer un CALENDARIO en PDF		
		function hacer_calendario(mes){
			var anio = document.getElementById("anio").value;
			var titulo2 = document.getElementById("titu").value;
			window.open('/calendarios/generar_calendario.php?valor=' + anio + '_' + mes + '_' + titulo2);
			
		}		
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			CALENDARIOS MENSUALES			
		</div>	
		<div id="subtitulo"> ESCRIBA EL AÑO Y EL TITULO DEL CALENDARIO </div>	
			
		<div id="encabezado">									
			<center>			
				<div id="cont_anio">					 
					 <input value ="" type="text" id="anio" autofocus="true" placeholder="Escriba el año"/>
				</div>
				
				<div id="cont_titulo">					 
					  <input value ="" type="text" id="titu" autofocus="true" placeholder="Escriba el titulo"/>
				</div>
			</div>		
		</div>
		
		
		
		<!------------------------------------------------------------->
		<div id="subtitulo"> 
			SELECCIONE EL MES
		</div>
		
		<button type="button" class="boton" onclick="hacer_calendario('1');">
			ENERO
		</button>
		
		<button type="button" class="boton" onclick="hacer_calendario('2');">
			FEBRERO
		</button>			
		
		<button type="button" class="boton" onclick="hacer_calendario('3');">
			MARZO
		</button>
		
		<button type="button" class="boton" onclick="hacer_calendario('4');">
			ABRIL
		</button>

		<button type="button" class="boton" onclick="hacer_calendario('5');">
			MAYO
		</button>
			
		<button type="button" class="boton" onclick="hacer_calendario('6');">
			JUNIO
		</button>
						
		<button type="button" class="boton" onclick="hacer_calendario('7');">
			JULIO
		</button>
			
		<button type="button" class="boton" onclick="hacer_calendario('8');">
			AGOSTO
		</button>
			
		<button type="button" class="boton" onclick="hacer_calendario('9');">
			SEPTIEMBRE
		</button>
			
		<button type="button" class="boton" onclick="hacer_calendario('10');">
			OCTUBRE
		</button>
			
		<button type="button" class="boton" onclick="hacer_calendario('11');">
			NOVIEMBRE
		</button>
			
		<button type="button" class="boton" onclick="hacer_calendario('12');">
			DICIEMBRE
		</button>
			
		
		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>