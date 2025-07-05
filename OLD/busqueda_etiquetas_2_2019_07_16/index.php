<!DOCTYPE html>
<html lang="es">
<head>
	<title>ETIQUETAS</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Consulta de productos">
	<meta name="keywords" content="tienda,semillas,productos">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="img/icono2.ico" type="image/x-icon">
	<script src="javascript/jquery-latest.js"></script>
	<script type='text/javascript' language="javascript">
	
	/* Funciones relativas al funcionamiento de la pagina */
	
		function buscar(){
			
			/*se almacena el contenido del input en una variable nombre*/
			var nombre = document.getElementById("campoBuscar").value;
			
			/*mediante el método post se llama al script php productos.php y 
			se le envían los parámetros buscar y nombre para que realice
			la consulta con la base de datos y muesttre los productos, 
			para ello los productos que devuelva el script productos.php, serán mostrados
			dentro de la etiqueta section con id contenedor*/
						
			/* Devolver la consulta solo si se escribe mas de un caracter*/
			if (nombre.length > 2){
				$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
			}
			
			/*En caso contrario devolver mensaje*/
			else{
				nombre = "ERROR";
				$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
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
		}
		
		// devuelve la lista rapida
		//function lista_rapida(){
			//nombre = "LISTA_RAPIDA";
			//$.post('productos.php',{'opcion':'buscar',nombre}, function(data){$("#contenedor").html(data);});
			
		//	window.open("/chiles_php/busqueda_etiquetas/test_pdf.php")
		//}
		
		/*);*/
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			BUSQUEDA DE ETIQUETAS PARA EMPAQUE
		</div>		
		
		<div id="encabezado">			
			<center>
			<div id="cont_buscar">	
				<input type="search" id="campoBuscar" autofocus="true" placeholder="Buscar producto" onkeyup="buscar()" /></div>
				<button type="button" class="boton" onclick="buscar();">Buscar</button> 
				<button type="button" class="boton" onclick="comodin();"> % </button> 
				<button type="button" class="boton" onclick="limpiar();">Limpiar</button> 			
			</center>
				
			</div>
			
		</div>
		
		<!--
		<footer>		
			<p id="textoPiePagina"> LISTA DE PRECIOS MAYOREO Y MENUDEO </p>
		</footer>
		-->
		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>