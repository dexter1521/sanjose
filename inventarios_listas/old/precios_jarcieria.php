<?php

	//$valor = $_GET["valor"];
			
	date_default_timezone_set("America/Mexico_City"); 
	include 'plantilla_inventario.php';
	
	require_once('BaseDatos.php');
	$bd = new BaseDatos();
	
	$pagina = 1;				
	$pdf = new PDF('P', 'mm', 'Letter');
	
	$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - LISTA DE PRECIOS DE JARCIERIA";	
	$query = "SELECT NOMBRE_PRODUCTO, PRU_1, OBSERVACIONES
			  FROM QRY_PRECIOS_JARCIERIA
			  ORDER BY NOMBRE_PRODUCTO ASC";
		$resultado =  $bd -> query($query);					

	$margen = 5;
	$linea = 6;
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	// encabezado del reporte
	//$pdf->Image('img/LOGO_DEFINITIVO_color.jpg', 18, 9, 20 );
	//$pdf->SetFont('Arial','B', 12);			
	//$pdf->Cell(30);
	//$pdf->Ln($linea);
	//$pdf->Ln($linea);
	//$pdf->Ln($linea);
	
	
	// titulo de las columnas
	
	
	$pdf->SetFillColor(190, 190, 190);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell($margen);
	$pdf->Cell(100,$linea,'NOMBRE DEL PRODUCTO',1,0,'C',1);	
	$pdf->Cell(30,$linea,'PRECIO',1,0,'C',1);
	$pdf->Cell(60,$linea,'OBSERVACIONES',1,0,'C',1);
	$pdf->Ln($linea);
	
	// formato de las filas
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255,255,255);
	
	$subtitulo_antes = '';
	
	$i = 3;
	$filas_max = 39;
	$contador = 1;
	
	while($row = $resultado->fetch_assoc()){		
		
		// cuando se alcance el numero de filas maximo
		if ($i >= $filas_max){
			$pdf->AddPage();
			
			$pdf->SetFillColor(190, 190, 190);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell($margen);
			$pdf->Cell(100,$linea,'NOMBRE DEL PRODUCTO',1,0,'C',1);	
			$pdf->Cell(30,$linea,'PRECIO',1,0,'C',1);
			$pdf->Cell(60,$linea,'OBSERVACIONES',1,0,'C',1);
			$pdf->Ln($linea);
			
			$i = 0;
		}
		
		
		// filas generales
		$pdf->SetFont('Arial','B',7);
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell($margen);
		$pdf->Cell(9, $linea, $contador, 1, 0, 'R');
		
		
		$pdf->SetFillColor(255,255,255);
		
		$pdf->SetFont('Arial','',9);		
		$pdf->Cell(91, $linea, $row['NOMBRE_PRODUCTO'] ,1,0,'L');
		
		//$pdf->Cell(22, $linea, $row['PRU_1'],0,0,'R');
		
		
		
		$pdf->Cell(30, $linea, $row['PRU_1'],1,0,'R');
		
		$x = $pdf->getX();
		$y = $pdf->getY();
		
		$pdf->setXY($x, $y);	
		$tamano_cadena = $pdf->GetStringWidth($row['PRU_1']);		
		$pdf->setXY(115, $y+3);			
		$pdf->Write(0, '$');
		
		$pdf->setXY($x, $y);		
		$pdf->Cell(60, $linea, $row['OBSERVACIONES'],1,0,'R');		
		$pdf->Ln($linea);
		
		$i = $i + 1;
		$contador = $contador + 1;
		
	}
	
	$pdf->Output();
?>
