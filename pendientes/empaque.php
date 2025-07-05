<?php

	//$valor = $_GET["valor"];
	$valor = 'EMPAQUE';
			
	date_default_timezone_set("America/Mexico_City"); 
	include 'plantilla_pendientes.php';
	
	require_once('BaseDatos.php');
	$bd = new BaseDatos();
	
	$pagina = 1;				
	$pdf = new PDF('P', 'mm', 'Letter');
	
	$pdf->titulo_pdf = "CHILES Y SEMILLAS SAN JOSE - LISTA DE EMPAQUE";	
	$query = "SELECT TITULO, CREADA, COMPLETADA, NOTAS, PRIORIDAD
			  FROM PENDIENTES_EMPAQUE";
	$resultado =  $bd -> query($query);					
			
	
	$margen = -1;
	$linea = 7;
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	// encabezado del reporte
	$pdf->Image('img/LOGO_DEFINITIVO_color.jpg', 18, 9, 20 );
	$pdf->SetFont('Arial','B', 10);			
	$pdf->Cell(30);
	$pdf->Cell(168,6, utf8_decode('Fecha de realización de la lista:'), 1, 0, 'L');
	$pdf->Ln(6);
	
	$pdf->Cell(30);
	$pdf->Cell(84, 6, utf8_decode('Realizó:'), 1, 0, 'L');
		
	$pdf->Cell(84, 6, utf8_decode('Revisó:'),1,0,'L');
	$pdf->Ln(10);
	
	// titulo de las columnas
	$pdf->SetFillColor(190, 190, 190);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell($margen);
	$pdf->Cell(10, $linea, 'ID', 1, 0, 'C', 1);
	$pdf->Cell(84, $linea, 'PRODUCTO', 1, 0, 'C', 1);			
	$pdf->Cell(15, $linea, 'PIEZAS', 1, 0, 'C', 1);	
	$pdf->Cell(50, $linea, 'BOLSA', 1, 0, 'C', 1);
	$pdf->Cell(30, $linea, 'ASIGNADO', 1, 0, 'C', 1);	
	$pdf->Cell(10, $linea, 'EDO', 1, 0, 'C', 1);
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
			
			// titulo de las columnas
			$pdf->SetFillColor(190, 190, 190);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell($margen);
			$pdf->Cell(10, $linea, 'ID', 1, 0, 'C', 1);
			$pdf->Cell(84, $linea, 'PRODUCTO', 1, 0, 'C', 1);			
			$pdf->Cell(15, $linea, 'PIEZAS', 1, 0, 'C', 1);	
			$pdf->Cell(50, $linea, 'BOLSA', 1, 0, 'C', 1);
			$pdf->Cell(30, $linea, 'ASIGNADO', 1, 0, 'C', 1);	
			$pdf->Cell(10, $linea, 'EDO', 1, 0, 'C', 1);
			$pdf->Ln($linea);
			$i = 0;
		}
		
		// ID
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell($margen);
		$pdf->Cell(10, $linea, $contador.' - '.$row['PRIORIDAD'], 1, 0, 'R');
		
		
		// normal
		$pdf->SetFillColor(255,255,255);		
		$titulo = explode(",", $row['TITULO']);
		
		if (count($titulo) == 2) {
			$producto = $titulo[0];
			$piezas = $titulo[1];			
		}
		
		else{
			$producto = $titulo[0]. ' <MALA CAPTURA>';
			$piezas = '0';			
		}
				
		
		// PRODUCTO
		$pdf->SetFont('Arial', '', 10);		
		$pdf->Cell(84, $linea, $producto, 1, 0, 'L');	

		// PIEZAS
		$pdf->Cell(15, $linea, $piezas, 1, 0, 'R');
		
		// BOLSA		
		$pdf->Cell(50, $linea, ' ', 1, 0, 'L');	
		
		// ASIGNADO		
		$pdf->Cell(30, $linea, ' ', 1, 0, 'L');	
		
		// EDO		
		$pdf->Cell(10, $linea, ' ', 1, 0, 'L');	
		
		$x = $pdf->getX();
		$y = $pdf->getY();
			
		$pdf->SetFont('Arial', 'B', 6);
		$tamano_cadena = $pdf->GetStringWidth($row['CREADA']);
		$pdf->setXY(101-$tamano_cadena, $y+3);			
		$pdf->Write(0, $row['CREADA']);		
		
		$pdf->setXY($x, $y);
		$pdf->Ln($linea);
		
		$i = $i + 1;
		$contador = $contador + 1;
		
	}
	
	$pdf->Output();
?>
