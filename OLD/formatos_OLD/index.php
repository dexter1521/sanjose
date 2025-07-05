<!DOCTYPE html>
<html lang="es">
<head>
	<title>FORMATOS</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Consulta de productos">
	<meta name="keywords" content="tienda,semillas,productos">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="img/icono2.ico" type="image/x-icon">
	<script src="javascript/jquery-latest.js"></script>
	<script type='text/javascript' language="javascript">
	
	/* Funciones relativas al funcionamiento de la pagina */
		
		// Hacer un INVENTARIO en PDF		
		function hacer_inventario(valor){
			window.open('/formatos/inventario.php?valor='+valor)
		}
		
		// Hacer listas de precios en PDF		
		function hacer_lista_precios(valor){
			window.open('/formatos/lista_precios.php?valor='+valor)
		}
		
		// abrir un archivo en pdf
		function abrir_formato(valor){
			window.open('/formatos/pdf/'+valor)
		}
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			FORMATOS PARA IMPRESION DE CHILES Y SEMILLAS SAN JOSE
		</div>
		
		<!------------------------------------------------------------->
		<div id="subtitulo"> 
			INVENTARIOS
		</div>
		
		<button type="button" class="boton" onclick="hacer_inventario('GENERAL');">
			GENERAL
		</button>
		
		<button type="button" class="boton" onclick="hacer_inventario('ABARROTES_DESECHABLES');">
			ABARR Y DESECH
		</button>
			
		
		<button type="button" class="boton" onclick="hacer_inventario('ARERO');">
			ARERO
		</button>
		<!--
		<button type="button" class="boton" onclick="hacer_inventario('DESECHABLES_GRAL');">
			DESECHABLES GRAL
		</button>
		-->
		<button type="button" class="boton" onclick="hacer_inventario('ALVISAR');">
			ALVISAR
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('BONI_BODEGON');">
			BONI Y BODEGON
		</button>
						
		<button type="button" class="boton" onclick="hacer_inventario('CAFE_VICTORIA');">
			CAFE VICTORIA
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('CHILES_SEMILLAS');">
			CHILES Y SEMILLAS
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('DOBAR');">
			DOBAR
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('IDEAL');">
			IDEAL
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('JARCIERIA');">
			JARCIERIA
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('MABEEL');">
			MABEEL
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('PATRONA');">
			PATRONA
		</button>
			
		<button type="button" class="boton" onclick="hacer_inventario('SAYES');">
			SAYES
		</button>
			
		<!------------------------------------------------------------->
				
		<div id="subtitulo"> 
			LISTAS DE PRECIOS
		</div>
		
		<button type="button" class="boton" onclick="hacer_lista_precios('LISTA_GENERAL');">
			PRECIOS GENERAL
		</button>
		
		
		<!------------------------------------------------------------->
		<div id="subtitulo"> 
			REGISTROS
		</div>
		
		<button type="button" class="boton" onclick="abrir_formato('registro_degustaciones.pdf');">
			DEGUSTACIONES
		</button>
		
		<!------------------------------------------------------------->
						
		<div id="subtitulo"> 
			RECURSOS HUMANOS
		</div>
		
		<button type="button" class="boton" onclick="hacer_formato('falta_ret');">
			FALTAS / RETARDOS
		</button>
		
		<button type="button" class="boton" onclick="hacer_formato('permiso');">
			PERMISOS
		</button>
		
		<!------------------------------------------------------------->
		
		
		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>