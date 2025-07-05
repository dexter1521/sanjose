<?php
	$ipC = $_SERVER['REMOTE_ADDR'];

	global $variable;
	
	$variable = 1;
	
	// solo la t800 y el cel motorola de ruben
	if ($ipC == "192.168.1.105" OR $ipC == "192.168.1.101" OR $ipC == "192.168.1.102"){	
		$variable = 1;
	
	}
	
	else{		
		$variable = 2;
	}
		
?>

<!DOCTYPE html>
<html lang="es">
<head>

	<title>PRECIOS ADMIN</title>
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
		
		
		<?php
			if ($variable == 1){
				echo '<div id="titulo"> PRECIOS ADMIN </div>';
			}
			
			else{
				echo '<div id="titulo"> PAGINA </div>';
			}
		?>
		
		
		<div id="encabezado">						
			
			<center>			
			<!-- VALIDACIONES DE IP -->
			<?php
				if ($variable == 1){
					echo'<div id="cont_buscar">';
					echo'<input type="search" id="campoBuscar" autofocus="true" placeholder="Buscar producto" onkeyup="buscar()" /></div>';
					echo '<button type="button" class="boton" onclick="buscar();">Buscar</button>';
					echo '<button type="button" class="boton" onclick="comodin();"> % </button>';
					echo '<button type="button" class="boton" onclick="limpiar();">Limpiar</button>';
				}
				
				else{					
					echo '<H3> EN CONSTRUCCION </H3>';					
				}
			?>
			
			</center>
		</div>
	</header>

	<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

	
</body>
</html>