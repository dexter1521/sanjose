<?php

	$valor = $_GET["valor"];
			
	date_default_timezone_set("America/Mexico_City"); 
	include 'plantilla_inventario.php';
	
	require_once('BaseDatos.php');
	$bd = new BaseDatos();
	
	$pagina = 1;				
	$pdf = new PDF('P', 'mm', 'Letter');

	// CONSULTA POR DEFECTO
	$pdf->titulo_pdf = "ERROR DE INVENTARIO";		
	$query = "SELECT NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE 
	          FROM qry_reporte_precios 
			  WHERE 1=0";
	$resultado =  $bd -> query($query);
	
	
	// CONSULTAS PARA LOS INVENTARIOS
	if ($valor == 'COMPLETO'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO COMPLETO";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_REPORTE_PRECIOS2 
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
    elseif ($valor == 'ABARROTES'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO ABARROTES";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_ABARROTES
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
    
    elseif ($valor == 'DESECHABLES'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - DESECHABLES";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_DESECHABLES 
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
    
	elseif ($valor == 'BONI_LEON'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BONI - LEON - ROIME";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO,  EMPAQUE, ULTIMO_PROVEEDOR AS CATEGORIA
				  FROM QRY_INVENTARIO_BONI_BODEGON
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'CHILES_SEMILLAS'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO CHILES Y SEMILLAS";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA , EMPAQUE
				  FROM QRY_INVENTARIO_CHILES_SEMILLAS
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}	
	
	elseif ($valor == 'IDEAL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO IDEAL";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_IDEAL
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'MARU_JARCIERIA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO MARU JARCIERIA";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA , EMPAQUE
				  FROM QRY_INVENTARIO_MARU_JARCIERIA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'SAN_LUIS'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO SAN LUIS";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA , EMPAQUE
				  FROM QRY_INVENTARIO_SAN_LUIS 
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'MABEEL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BOTANA MABEEL";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_MABEEL
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'LALA_PATRONA_BIMBO'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO LALA / PATRONA";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_LALA_PATRONA_BIMBO
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'SAYES'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO SAYES";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_SAYES
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}	
	
	elseif ($valor == 'SCHETTINO'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BUENO / SCHETTINO";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA , EMPAQUE
				  FROM QRY_INVENTARIO_SCHETTINO
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'SURTIPAN'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO SURTIPAN";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_SURTIPAN
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
    
    elseif ($valor == 'MATERIA_PRIMA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO MATERIAS P";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA, EMPAQUE
				  FROM QRY_INVENTARIO_MATERIA_PRIMA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}    
	
	elseif ($valor == 'INIX'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO INIX";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_INIX
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'CELOFAN'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO CELOFAN";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_CELOFAN
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}	  
    
    elseif ($valor == 'BOTANAS_OTROS'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BOTANAS_OTROS";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_BOTANAS_OTROS
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
    elseif ($valor == 'CADEXA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO CAJAS DE PIZZA";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_CADEXA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}

	elseif ($valor == 'ALTENA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO CHILES Y CONDIMENTOS AZTECA";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, ULTIMO_PROVEEDOR AS CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_ALTENA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'COATEPEC'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO PLASTICOS DE COATEPEC";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_PLASTICOS_COATEPEC
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'MAXIMA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BOTANAS MAXIMA";	
		$query = "SELECT ID_PRODUCTO, CLAVE, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_MAXIMA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
    
    		
	$margen = -1;
	$linea = 6;
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	// encabezado del reporte
	$pdf->Image('img/LOGO_DEFINITIVO_color.jpg', 18, 9, 20 );
	$pdf->SetFont('Arial','B', 10);			
	$pdf->Cell(30);
	$pdf->Cell(168,6, utf8_decode('Fecha de realización del inventario:'), 1, 0, 'L');
	$pdf->Ln(6);
	
	$pdf->Cell(30);
	$pdf->Cell(84, 6, utf8_decode('Realizó:'), 1, 0, 'L');
		
	$pdf->Cell(84, 6, utf8_decode('Revisó:'),1,0,'L');
	$pdf->Ln(10);
	
	// titulo de las columnas
	$pdf->SetFillColor(190, 190, 190);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell($margen);
	$pdf->Cell(152, $linea, 'NOMBRE DEL PRODUCTO', 1, 0, 'C', 1);	
	$pdf->Cell(12, $linea, 'FTE', 1, 0, 'C', 1);
	$pdf->Cell(12, $linea, 'BOD', 1, 0, 'C', 1);
	$pdf->Cell(12, $linea, 'EST', 1, 0, 'C', 1);
	$pdf->Cell(12, $linea, 'PED', 1, 0, 'C', 1);
	$pdf->Ln($linea);
	
	// formato de las filas
	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(255, 255, 255);
	
	$subtitulo_antes = '';
	
	$i = 3;
	$filas_max = 37;
	$contador = 1;
	
	while($row = $resultado->fetch_assoc()){		
		
		// cuando se alcance el numero de filas maximo
		if ($i >= $filas_max){
			$pdf->AddPage();
			
			$pdf->SetFillColor(190, 190, 190);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell($margen);
			$pdf->Cell(152, $linea, 'NOMBRE DEL PRODUCTO', 1, 0, 'C', 1);			
			$pdf->Cell(12, $linea, 'FTE', 1, 0, 'C', 1);
			$pdf->Cell(12, $linea, 'BOD', 1, 0, 'C', 1);
			$pdf->Cell(12, $linea, 'EST', 1, 0, 'C', 1);
			$pdf->Cell(12, $linea, 'PED', 1, 0, 'C', 1);
			$pdf->Ln($linea);
			
			$pdf->SetFillColor(215, 215, 215);
			$pdf->Cell($margen);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(200, $linea,utf8_decode($subtitulo), 1, 0, 'C', 1);
			$pdf->Ln($linea);
			
			$i = 0;
		}
		
		// cuando cambia el subtitulo
		$subtitulo = utf8_encode($row['CATEGORIA']);
		if($subtitulo_antes != $subtitulo){ 
			$pdf->SetFillColor(215, 215, 215);
			$pdf->Cell($margen);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(200, $linea, utf8_decode($subtitulo), 1, 0, 'C', 1);
			//$pdf->Cell(180,$linea, utf8_decode($ultimo_proveedor),1,0,'C', 1);
			$pdf->Ln($linea);
			$i = $i + 1;
		}
		
		$subtitulo_antes = $subtitulo;		
		
		// filas generales
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell($margen);
		$pdf->Cell(9, $linea, $contador, 1, 0, 'R');
	
			
		
		$pdf->Cell(17, $linea, $row['CLAVE'], 1, 0, 'R');
		
		// normal
		$pdf->SetFillColor(255,255,255);
		
		$pdf->SetFont('Arial', '', 8);		
		$pdf->Cell(126, $linea, $row['NOMBRE_PRODUCTO'], 1, 0, 'L');
		
		$x = $pdf->getX();
		$y = $pdf->getY();
			
		$pdf->SetFont('Arial', 'B', 6);
		$tamano_cadena = $pdf->GetStringWidth($row['EMPAQUE']);
		$pdf->setXY(159-$tamano_cadena, $y+3);			
		$pdf->Write(0, $row['EMPAQUE']);		
		
		$pdf->setXY($x, $y);
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(12, $linea, ' ', 1, 0, 'C');
		$pdf->Cell(12, $linea, ' ', 1, 0, 'C');		
		$pdf->Cell(12, $linea, ' ', 1, 0, 'C');
		$pdf->Cell(12, $linea, ' ', 1, 0, 'C');
		$pdf->Ln($linea);
		
		$i = $i + 1;
		$contador = $contador + 1;
		
	}
	$pdf->Cell(10,$linea+20);
	$pdf->SetFont('Courier', 'B', 14); 
	$pdf->Ln($linea); 
	$pdf->Cell(100,$linea, "NO OLVIDAR ANOTAR PRODUCTOS QUE TIENEN EXISTENCIA" ,0,0,'L');
	$pdf->Ln($linea); 
	$pdf->Cell(100,$linea, "PERO ESTAN DETENIDOS POR EL MOMENTO" ,0,0,'L');
	$pdf->Ln($linea); 	
    
	if ($valor == 'DESECHABLES'){
        $linea = $linea * 1.5;
        $pdf->SetFont('Courier', 'B', 14);        
        $pdf->Cell(100,$linea, "CONTAR ROLLOS DE BOLSAS Y CAMISETAS DE USO INTERNO Y COLOCAR AQUI" ,0,0,'L');
	}
    
    else if ($valor == 'BOTANAS_OTROS'){
        $linea = $linea * 1.5;
        $pdf->SetFont('Courier', 'B', 12);        
        $pdf->Cell(100,$linea, "COLOCAR LAS PRESENTACIONES DE CAFE VICTORIA" ,0,0,'L');
        $pdf->Ln($linea);                
        $pdf->Cell(100,$linea, "FRASCOS VACIOS 100 GR   : ____________" ,0,0,'L');        
        $pdf->Ln($linea);
        $pdf->Cell(100,$linea, "FRASCOS VACIOS  50 GR   : ____________" ,0,0,'L');                    
    }
	
	elseif ($valor == 'CADEXA'){
        $linea = $linea * 1.5;
        $pdf->SetFont('Courier', 'B', 12);        
        $pdf->Cell(100,$linea, "PEDIR CAJAS Y BASES PARA ROSCA" ,0,0,'L');
        $pdf->Ln($linea);        
	}
    
    else if ($valor == 'CHILES_SEMILLAS'){
        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Ln($linea);
        $pdf->Cell(100,$linea, "VERIFICAR PENDIENTES PARA MOLER O ASOLEAR" ,0,0,'L');
        $pdf->SetFont('Courier', 'B', 10);        
        $pdf->Ln($linea);        
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "HOJA DE AGUACATE OLOROSO: _____________" ,0,0,'L');  
		$pdf->Ln($linea);
        $pdf->Cell(100,$linea, "PENDIENTES DE ASOLEAR: _____________" ,0,0,'L');        
        $pdf->Ln($linea);                
        $pdf->Cell(100,$linea, "POLVO DE SOYA TEXTURIZADA: _____________" ,0,0,'L');        
		$pdf->Ln($linea);        
		$pdf->Cell(100,$linea, "POLVO DE JAMAICA: _____________" ,0,0,'L');   		
		$pdf->Ln($linea);                
		$pdf->Cell(100,$linea, "POLVO O DESPICADO DE LAUREL _____________" ,0,0,'L');        
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "POLVO O DESPICADO DE OREGANO _____________" ,0,0,'L');   
		$pdf->Ln($linea); 
        $pdf->Cell(100,$linea, "SOBRANTE POLVO DE CLAVO ENTERO: _____________" ,0,0,'L');        		
		$pdf->Ln($linea);                
        $pdf->Cell(100,$linea, "SOBRANTE POLVO DE LAUREL ENTERO: _____________" ,0,0,'L');        
		$pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "SOBRANTE POLVO DE OREGANO ENTERO: _____________" ,0,0,'L');  
		$pdf->Ln($linea);
		$pdf->Cell(100,$linea, "SEMILLAS DE CHILES EN GENERAL: _____________" ,0,0,'L');        		
		$pdf->Ln($linea);
		$pdf->Cell(100,$linea, "SEMILLA DE CHILE CHILTEPIN: _____________" ,0,0,'L');               		
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "ARANDANOS: _____________" ,0,0,'L');
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "PISTACHE: _____________" ,0,0,'L');
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "CIRUELA CON HUESO: _____________" ,0,0,'L');
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "CIRUELA SIN HUESO: _____________" ,0,0,'L');
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "AVENA: _____________" ,0,0,'L');
		$pdf->Ln($linea); 
		$pdf->Cell(100,$linea, "ALGUN OTRO PRODUCTO DE ALTEÑA QUE VENDAN LOS CHILEROS: _____________" ,0,0,'L');
    }
    
	else if ($valor == 'JARCIERIA'){
        $linea = $linea * 1.5;
        $pdf->SetFont('Courier', 'B', 12);        
        $pdf->Cell(100,$linea, "TOTALES ADICIONALES" ,0,0,'L');
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "ESCOBAS, CEPILLOS Y MECHUDOS: ____________" ,0,0,'L');
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "BARROTES PARA VENTA: ____________" ,0,0,'L');
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "BARROTES PARA ESCOBAS: ____________" ,0,0,'L');
        $pdf->Ln($linea);        
    }
	
	else if ($valor == 'SAYES'){
        $linea = $linea * 1.5;
        $pdf->SetFont('Courier', 'B', 12);        
        $pdf->Cell(100,$linea, "DEVOLUCIONES" ,0,0,'L');
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "FLANES 90GR: ____________" ,0,0,'L');
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "ALGUNOS OTROS: ____________" ,0,0,'L');
        $pdf->Ln($linea);        
        $pdf->Cell(100,$linea, "GELATINAS Y MAS: ____________" ,0,0,'L');
        $pdf->Ln($linea);        
    }
    
	elseif ($valor == 'COATEPEC'){
        $linea = $linea * 3;
        $pdf->SetFont('Courier', 'B', 16);        
        $pdf->Cell(100,$linea, "INCLUIR CONTEOS DE TAPAS PARA CADA ENVASE" ,0,0,'L');
        $pdf->Ln($linea);        
	}
	
        
    $pdf->Output();        
?>
