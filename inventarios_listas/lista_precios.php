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
	if ($valor == 'LISTA_GENERAL'){
		$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - LISTA GENERAL DE PRECIOS";	
		$query = "SELECT NOMBRE_PRODUCTO, CATEGORIA, EMPAQUE, ULTIMO_PROVEEDOR, UNIDAD, 
				  PRU_1, U_VTA_1, PRU_2, U_VTA_2, PRU_3, U_VTA_3
				  FROM QRY_REPORTE_PRECIOS2
				  ORDER BY CATEGORIA ASC, NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					
	}
	
	$margen = 5;
	$linea = 6;
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	// encabezado del reporte
	$pdf->Image('img/LOGO_DEFINITIVO_color.jpg', 18, 9, 20 );
	$pdf->SetFont('Arial','B', 12);			
	$pdf->Cell(30);
	$pdf->Cell(160,6, utf8_decode('MAYOREO Y MENUDEO'),0,0,'C');
	$pdf->Ln(7);
	$pdf->Cell(30);
	$pdf->Cell(160,6, utf8_decode('L1: MENUDEO    L2: MEDIO MAYOREO    L3: MAYOREO'),0,0,'C');
	$pdf->Ln(7);
	
	
	// titulo de las columnas
	$pdf->SetFillColor(190, 190, 190);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell($margen);
	$pdf->Cell(122,$linea,'NOMBRE DEL PRODUCTO',1,0,'C',1);	
	$pdf->Cell(22,$linea,'L1',1,0,'C',1);
	$pdf->Cell(24,$linea,'L2',1,0,'C',1);
	$pdf->Cell(25,$linea,'L3',1,0,'C',1);
	$pdf->Ln($linea);
	
	// formato de las filas
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255,255,255);
	
	$subtitulo_antes = '';
	
	$i = 3;
	$filas_max = 37;
	$contador = 1;
	
	while($row = $resultado->fetch_assoc()){		
		
		// cuando se alcance el numero de filas maximo
		if ($i >= $filas_max){
			$pdf->AddPage();
			
			$pdf->SetFillColor(190, 190, 190);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell($margen);
			$pdf->Cell(122,$linea,'NOMBRE DEL PRODUCTO',1,0,'C',1);			
			$pdf->Cell(22,$linea,'L1',1,0,'C',1);
			$pdf->Cell(24,$linea,'L2',1,0,'C',1);
			$pdf->Cell(25,$linea,'L3',1,0,'C',1);
			$pdf->Ln($linea);
			
			$i = 0;
		}
		
		// cuando cambia el subtitulo
		$subtitulo = utf8_encode($row['CATEGORIA']);
		if($subtitulo_antes != $subtitulo){ 
			$pdf->SetFillColor(215, 215, 215);
			$pdf->Cell($margen);
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(193, $linea, utf8_decode($subtitulo),1,0,'C', 1);
			$pdf->Ln($linea);
			$i = $i + 1;
		}
		
		$subtitulo_antes = $subtitulo;		
		
		// filas generales
		$pdf->SetFont('Arial','B',7);
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell($margen);
		$pdf->Cell(9, $linea, $contador, 1, 0, 'R');
		
		
		$pdf->SetFillColor(255,255,255);
		
		$pdf->SetFont('Arial','',8);		
		$pdf->Cell(113, $linea, $row['NOMBRE_PRODUCTO'] ,1,0,'L');
		
		$x = $pdf->getX();
		$y = $pdf->getY();
			
		$pdf->SetFont('Arial','B',6);
		$tamano_cadena = $pdf->GetStringWidth($row['EMPAQUE']);
		$pdf->setXY(135-$tamano_cadena, $y+3);			
		$pdf->Write(0, $row['EMPAQUE']);		
		
		
		$L1 = '$'.$row['PRU_1']. '  ('.$row['U_VTA_1'].' '.$row['UNIDAD'].')';
		$L2 = '$'.$row['PRU_2']. '  ('.$row['U_VTA_2'].' '.$row['UNIDAD'].')';
		$L3 = '$'.$row['PRU_3']. '  ('.$row['U_VTA_3'].' '.$row['UNIDAD'].')';
		
		$pdf->setXY($x, $y);
		$pdf->SetFont('Arial','',7.5);		
		$pdf->Cell(22, $linea, $L1,1,0,'R');
		$pdf->Cell(24, $linea, $L2,1,0,'R');		
		$pdf->Cell(25, $linea, $L3,1,0,'R');
		$pdf->Ln($linea);
		
		$i = $i + 1;
		$contador = $contador + 1;
		
	}
	
	$pdf->Output();
?>
