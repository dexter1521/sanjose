<?php
	$ipC = $_SERVER['REMOTE_ADDR'];

	global $variable;
	
	$variable = 1;
	
	// solo para ciertos equipos
	if ($ipC == "192.168.1.105" OR $ipC == "192.168.1.101" OR $ipC == "192.168.1.102" or
	    $ipC == "192.168.1.120" OR $ipC == "192.168.1.106" OR $ipC == "192.168.1.127" or
	    $ipC == "192.168.1.128" OR $ipC == "192.168.1.146" OR $ipC == "192.168.1.122" or
        $ipC == "192.168.1.136" OR $ipC == "192.168.1.146" OR $ipC == "192.168.1.128"){	
		$variable = 1;	
	}
	
	else{		
		$variable = 2;
	}
		
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>FORMATOS DE RECURSOS HUMANOS</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Consulta de productos">
	<meta name="keywords" content="tienda,semillas,productos">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    
    
    
	<link rel="shortcut icon" href="img/icono2.ico" type="image/x-icon">
	<script src="javascript/jquery-latest.js"></script>
	<script type='text/javascript' language="javascript">
        
    var script = document.createElement('script'); 
    var version = Date.time();
    script.src = "common.js?v="+version; 
    document.head.appendChild(script) 
        
	/* Funciones relativas al funcionamiento de la pagina */
		
		
		// abrir un archivo en pdf
		function abrir_formato(valor){
			window.open('/recursos_humanos/formatos_hechos.php?valor='+valor)
		}
        
		function abrir_areas(){
			//window.open('/recursos_humanos/AREAS_TIENDA.png')
            window.open('/recursos_humanos/cargar_imagenes.php')
        }
        
        function abrir_comidas(){		
            
            window.open('/recursos_humanos/horario_comidas.php');
            window.location.reload();
        }
        
        
        
	</script>
	<link rel="stylesheet" media="all" href="estilos.css" type="text/css" />
</head>
<body>
<!--ENCABEZADO DE LA PAGINA, campo buscar-->
	<header id="portada">
		
		<div id="titulo"> 
			FORMATOS PARA RECURSOS HUMANOS DE CHILES Y SEMILLAS SAN JOSE
		</div>
		
		<!------------------------------------------------------------->
						
		<div id="subtitulo"> 
			RECURSOS HUMANOS
		</div>
		
		<!---
		<button type="button" class="boton" onclick="abrir_formato('JUSTIFICACIONES');">
			FALTAS / RETARDOS
		</button>
		--->		
		
		<button type="button" class="boton" onclick="abrir_formato('REPORTE_INCIDENCIA');">
			REPORTE DE INCIDENCIA
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('BECARIOS');">
			REGISTRO BECARIOS
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('HORARIO_COMIDAS');">
			HORARIOS DE COMIDA
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('ROL_AYUDANTES');">
            ROL DE AYUDANTES
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('ROLES_GENERALES');">
            ROL GENERAL
		</button>
                
        <button type="button" class="boton" onclick="abrir_formato('AREAS');">
			AREAS
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('MUEBLE_CHILES');">
            MUEBLE CHILES
		</button>      
                
        <button type="button" class="boton" onclick="abrir_formato('USO_ESCALERAS');">
			USO DE ESCALERAS
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('META_EMPAQUE');">
			META EMPAQUE
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('SUPERVISION');">
			SUPERVISION
		</button>
        
        <button type="button" class="boton" onclick="abrir_formato('SUPERVISION_DIARIA');">
			SUPERVISION DIARIA
		</button>
		
		<button type="button" class="boton" onclick="abrir_formato('CAP_NUEVO_INGRESO');">
			CAP. NUEVO INGRESO
		</button>
		
 		<button type="button" class="boton" onclick="abrir_formato('ROL_LIMPIEZA');">
			ROL DE LIMPIEZA
		</button>       
		

		
        
                
        
		<!---------------------------------------------------
		<button type="button" class="boton" onclick="abrir_formato('RETARDOS_PERSONAL');">
			RETARDOS PERSONAL
		</button>
				
		<button type="button" class="boton" onclick="abrir_formato('RETARDOS_BECARIOS');">
			RETARDOS BECARIOS
		</button>	
		
		------------------------------------------------------------->
		
		
		
	</header>
<!--CONTENIDO DE LA PAGINA, productos mostrados-->
	<section id="contenedor">
	</section>

</body>
</html>