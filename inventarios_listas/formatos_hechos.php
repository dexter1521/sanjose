<?php

	$valor = $_GET["valor"];

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');
	
	
	if ($valor == 'PAPELERIA'){	
        
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
		$pdf -> setSourceFile('pdf/INVENTARIO_PAPELERIA.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 216, 279, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);		
	
		$pdf -> SetXY(125, 255);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}

	else if ($valor == 'EMPAQUE_VASOS'){	        
        
		$pdf = new FPDI('P', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/EMPAQUE_VASOS.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 279, FALSE);
			
			//$pdf -> SetXY(125, 5);	
			//$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
		
		}  
	}
	
	$pdf -> Output();
	
?>

