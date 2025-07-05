<?php

	$valor = $_GET["valor"];
	$descomponer = explode("_",$valor);

	$anio = $descomponer[0];
	$mes = $descomponer[1];
	$aniomes = $anio."_".$mes;
	$titulo = mb_strtoupper($descomponer[2]);

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');
	$pdf = new FPDI('L', 'mm', 'letter');	
	date_default_timezone_set("America/Mexico_City"); 

	
	// Initialize a file URL to the variable 
	//$url = "https://incompetech.com/beta/cal-monthly/pdfs/2020_3_1_11x8.5_Es_1.pdf"; 
	//$url = "https://incompetech.com/beta/cal-monthly/pdfs/" .$anio."_".$mes. "_1_11x8.5_Es_1.pdf";
	$url = "https://incompetech.com/beta/cal-monthly/pdfs/2023_1_12_11x8.5_Es_1.pdf";
  
	// Use basename() function to return the base name of file  
	//$file_name = basename($url); 
	$file_name = "salida.pdf";
	  
	// Use file_get_contents() function to get the file 
	// from url and use file_put_contents() function to 
	// save the file by using base name 
	if(file_put_contents( $file_name, file_get_contents($url))) { 
		$pdf -> setSourceFile($file_name);	
		$tplIdx = $pdf -> importPage($mes);
		$size = $pdf->getTemplateSize($tplIdx);
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 279, 216, FALSE);	
		
		$pdf -> SetFont('Arial', 'B', 14);
		$pdf -> SetTextColor(255, 0, 0);
		$pdf -> SetXY(190, 10);	
		$pdf -> Write(0, 'CHILES Y SEMILLAS SAN JOSE');
		
		$pdf -> SetFont('Arial', 'B', 30);
		$pdf -> SetTextColor(0, 0, 255);
		$pdf -> SetXY(5, 10);	
		$pdf -> Write(0, utf8_decode($titulo));
		
		$pdf -> SetFont('Arial', 'B', 20);
		$pdf -> SetTextColor(0, 0, 255);
		$pdf -> SetXY(155, 193);	
		$pdf -> Write(0, utf8_decode($titulo));
		
		
		$pdf -> SetFont('Arial', 'B', 10);
		$pdf -> SetTextColor(255, 0, 0);
		$pdf -> SetXY(200, 20);	
		$pdf -> Write(0, utf8_decode('IMPRESION: ').date("d / m / Y  H:i:s"));
		$pdf -> Output();
	} 
	else { 
		echo "ERROR, CONTACTE A RUBEN";
		
	} 

		
	
?>

