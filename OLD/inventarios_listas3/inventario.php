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
	if ($valor == 'GENERAL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO GENERAL";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_REPORTE_PRECIOS_VENDEDOR 
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'ABARROTES_DESECHABLES'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO ABARR Y DESECH";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_ABARROTES_DESECHABLES 
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
		
	elseif ($valor == 'ABARROTES_GRAL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO ABARROTES GRAL";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_ABARROTES
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	//---
	elseif ($valor == 'DESECHABLES_GRAL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO DESECHABLES GRAL";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_DESECHABLES
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
		
	elseif ($valor == 'ALVISAR'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO ALVISAR";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_ALVISAR
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'ARERO'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO ARERO";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_ARERO
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'RYR'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO JCJA RYR";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_RYR
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	
	elseif ($valor == 'BONI_BODEGON'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BONI";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_BONI_BODEGON
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'CAFE_VICTORIA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO CAFE VICTORIA";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_CAFE_VICTORIA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'CHILES_SEMILLAS'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO CHILES Y SEMILLAS";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_CHILES_SEMILLAS
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'DOBAR'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO DOBAR";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_DOBAR
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'IDEAL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO IDEAL";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_IDEAL
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'JARCIERIA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO JARCIERIA";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_JARCIERIA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'MABEEL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO BOTANA MABEEL";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_MABEEL
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'LALA_PATRONA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO LALA / PATRONA";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_LALA_PATRONA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'SAYES'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO SAYES";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_SAYES
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'MAXIMA_RIVERA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO MAXIMA / RIVERA";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_MAXIMA_RIVERA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'LALA'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO LALA";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_LALA
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'DEIMAN'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO DEIMAN";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_DEIMAN
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'SCHETTINO'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO SCHETTINO";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_SCHETTINO
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'MATERIAS_PRIMAS'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO MATERIAS PRIMAS";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_MATERIAS_PRIMAS
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'INIX'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO INIX";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_INIX
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	elseif ($valor == 'INTERFLEX'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - INVENTARIO INTERFLEX";	
		$query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR
				  FROM QRY_INVENTARIO_CELOFAN
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
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell($margen);
		$pdf->Cell(9, $linea, $contador, 1, 0, 'R');
		
		//http://chilessanjose:8080/formatos2/inventario.php?valor=ABARROTES_GRAL
		
		// facturacion
		$pdf->SetFont('Arial', 'B', 6);
		//$cadena_fact = $row['ULT_FACT_HACE'].'M'.$row['CANT_FACT'].$row['UNID_FACT'];
		$cadena_fact = '-';
		
		// OBTENER INFORMACION DE FACTURACION
		$id_producto = $row['ID_PRODUCTO'];
		$sql = "SELECT CANTIDAD, UNIDAD, ULT_FECHA_FACT FROM TBL_PRODUCTOS_FACTURADOS_2 WHERE ID_PRODUCTO= $id_producto limit 1";
		$resultado_2 = $bd -> query($sql)->fetch_row();
		$cantidad = $resultado_2[0];
		$unidad = $resultado_2[1];
		
		if ($unidad == '-'){
			$unidad = '';
		}
		
		$ult_fecha_fact = date('Y-m-d', strtotime($resultado_2[2]));
		
		$date1 = date('Y-m-d');
		$intervalo = date_diff(date_create($date1), date_create($ult_fecha_fact), 1);
		$test1 = $intervalo->format("%mM");
		$test2 = $intervalo->format("%R%aD");
			
		
		$cadena_fact = $cantidad. $unidad.$test1;//.' '.$test2;
				
		if (strlen($cadena_fact) <= 4) {
			$cadena_fact = 'SF';
		}
		
		$pdf->Cell(17, $linea, $cadena_fact, 1, 0, 'R');
				
		
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
	
	$pdf->Output();
?>
