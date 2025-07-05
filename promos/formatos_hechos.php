<?php
	$valor = $_GET["valor"];

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');	

	if ($valor == 'PROMOS'){
		$pdf = new FPDI('P', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/PROMOS_POR_LIQUIDACION.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 279, FALSE);
		
		}  
	}
	
	
	
    
	$pdf -> Output();
?>

