<?php
	$ipC = $_SERVER['REMOTE_ADDR'];

	global $variable;
	
	$variable = 1;
	
	// solo para ciertos equipos
	if ($ipC == "192.168.1.105" OR $ipC == "192.168.1.101" OR $ipC == "192.168.1.102" or
	    $ipC == "192.168.1.120" OR $ipC == "192.168.1.106" OR $ipC == "192.168.1.127" or
	    $ipC == "192.168.1.136" OR $ipC == "192.168.1.146" OR $ipC == "192.168.1.122" or
        $ipC == "192.168.1.110" OR $ipC == "192.168.1.146" OR $ipC == "192.168.1.128"){	
		$variable = 1;	
	}
	
	else{		
		$variable = 2;
	}
	
	// Check if the "mobile" word exists in User-Agent 
	$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
 
	if($isMob){ 
		$tipo = 2; // celular
	}

	else{ 
		$tipo = 3; // escritorio
	}
		
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title> SISTEMAS CHILES SAN JOSE </title>
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
    
				
		function abrir_pagina(valor){
			window.open(valor)
		}
		
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			SISTEMAS DE <br><br> CHILES SAN JOSE
		</div>	
        
		<?php
			//tipo = 2 celular
			if ($tipo == 2){
        echo '<button type="button" class="boton" onclick="abrir_pagina(\'precios_2_php\');">';				
			}
			
			//tipo = 3 desktop
			elseif ($tipo == 3){
        echo '<button type="button" class="boton" onclick="abrir_pagina(\'precios_3_php\');">';				
			}			
		?>	
				
		<!--<button type="button" class="boton" onclick="abrir_pagina(\'precios_3_php\');">-->
			<img src="img/formatos.png" width="40" height="40" align="absmiddle">		
			PRECIOS
		</button>	
			
		<button type="button" class="boton" onclick="abrir_pagina('inventarios_listas');">
			<img src="img/formatos.png" width="40" height="40" align="absmiddle">		
			INVENTARIOS Y LISTAS
		</button>	

		
		<button type="button" class="boton" onclick="abrir_pagina('');">	
			<img src="img/recetas.png" width="40" height="50" align="absmiddle">		
			RECETAS
		</button>
			
		<?php
			//echo $variable;
			if ($variable == 1){
        echo '<button type="button" class="boton" onclick="abrir_pagina(\'recursos_humanos\');">';
				echo '<img src="img/recursos_humanos.png" width="50" height="50" align="absmiddle">';
				echo 'RECURSOS HUMANOS';
				echo '</button>';	
			}
		?>	
		
<!--		
		<button type="button" class="boton" onclick="abrir_pagina('recursos_humanos');">	
			<img src="img/recursos_humanos.png" width="50" height="50" align="absmiddle">		
			RECURSOS HUMANOS
		</button>
	-->	
		<button type="button" class="boton" onclick="abrir_pagina('formatos_checklist');">	
			<img src="img/checklist.png" width="40" height="45" align="absmiddle">		
			FORMATOS DE CHECKLIST
		</button>
		
		<button type="button" class="boton" onclick="abrir_pagina('mytinytodo');">	
			<img src="img/pendientes.png" width="40" height="45" align="absmiddle">		
			LISTAS DE PENDIENTES
		</button>
		
		<button type="button" class="boton" onclick="abrir_pagina('facturacion');">	
			<img src="img/facturacion.png" width="40" height="45" align="absmiddle">		
			FACTURACION
		</button>
		
		<button type="button" class="boton" onclick="abrir_pagina('promos');">	
			<img src="img/formatos.png" width="40" height="45" align="absmiddle">		
			PROMOS
		</button>
		
		<button type="button" class="boton" onclick="abrir_pagina('/lista_rapida/lista_rapida_pendientes.php');">	
			<img src="img/formatos.png" width="40" height="45" align="absmiddle">		
			LISTA RAPIDA
		</button>

		<button type="button" class="boton" onclick="abrir_pagina('PLANOS.PDF');">	
			<img src="img/formatos.png" width="40" height="45" align="absmiddle">		
			PLANOS
		</button>

		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>