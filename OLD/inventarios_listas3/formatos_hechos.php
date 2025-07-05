<?php

	$valor = $_GET["valor"];

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');
	$pdf = new FPDI('P', 'mm', 'Letter');	
	date_default_timezone_set("America/Mexico_City"); 

	
	if ($valor == 'BOTANAS'){
		$pdf -> setSourceFile('pdf/inv_botanas.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(125, 259);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}

	

	
	$pdf -> Output();
	
?>

