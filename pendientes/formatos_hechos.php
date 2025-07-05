<?php

	$valor = $_GET["valor"];

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');
	$pdf = new FPDI('P', 'mm', 'Letter');	
	date_default_timezone_set("America/Mexico_City"); 

	if ($valor == 'DEGUSTACIONES'){
		$pdf -> setSourceFile('pdf/registro_degustaciones.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(125, 259);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
	
	elseif ($valor == 'GENERICO'){
		$pdf -> setSourceFile('pdf/formato_generico.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(125, 259);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
	
	elseif ($valor == 'CHECKLIST_SEMANAL'){
		$pdf -> setSourceFile('pdf/formato_checklist_semanal.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(125, 259);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
	
	elseif ($valor == 'CHECKLIST_GENERICO'){
		$pdf -> setSourceFile('pdf/formato_checklist_generico.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(115, 250);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	
	}
	
	elseif ($valor == 'CHECKLIST_EMPAQUE'){
		$pdf -> setSourceFile('pdf/formato_checklist_empaque.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(115, 250);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	
	}
	
	
	elseif ($valor == 'CHECKLIST_SALIDA'){
		$pdf -> setSourceFile('pdf/checklist_salida.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(115, 259);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	
	}
	
	elseif ($valor == 'CHECKLIST_ENTRADA'){
		$pdf -> setSourceFile('pdf/checklist_entrada.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(115, 259);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	
	}

	
	$pdf -> Output();
	
?>

