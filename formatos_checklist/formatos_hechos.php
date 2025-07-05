<?php
	$valor = $_GET["valor"];

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');	

	if ($valor == 'DEGUSTACIONES'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City");         
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
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
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
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
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
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
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
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
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
        
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
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
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City");         
        
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
	
	elseif ($valor == 'PRODUC_ORDEN_LIMP'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
		$pageCount = $pdf -> setSourceFile('pdf/productividad_orden_limpieza.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
			$pdf -> SetFont('Arial', 'I', 9);
			$pdf -> SetTextColor(0, 0, 0);
			$pdf -> SetXY(115, 259);	
			$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
		
		}
	
	}
	
	elseif ($valor == 'AGENDA_SEMANAL'){
		$pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/formato_agenda_semanal.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
	
			$pdf -> SetFont('Arial', 'I', 9);
			$pdf -> SetTextColor(0, 0, 0);
			$pdf -> SetXY(195, 8);	
			$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
		
		}
	}
	
	elseif ($valor == 'AGENDA_SEMANAL2'){
		$pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/formato_semanal.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
	
			$pdf -> SetFont('Arial', 'I', 9);
			$pdf -> SetTextColor(0, 0, 0);
			$pdf -> SetXY(195, 8);	
			$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
		
		}	
    }
        
        
    elseif ($valor == 'DESPENSAS'){
		$pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/donaciones_despensas.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
	
			$pdf -> SetFont('Arial', 'I', 9);
			$pdf -> SetTextColor(0, 0, 0);
			$pdf -> SetXY(195, 8);	
			$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
		
		}
        
    }
        
    elseif ($valor == 'ETIQUETAS_IMAGENES'){
		$pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/ETIQUETAS_IMAGENES.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}  
	}
    
    //formato_checklist_actividad.pdf
    elseif ($valor == 'CHECKLIST_ACTIVIDAD'){
		$pdf = new FPDI('P', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/formato_checklist_actividad.pdf');        
        date_default_timezone_set("America/Mexico_City");         		
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 275, FALSE);
		
		}  
        
        $pdf -> SetFont('Arial', 'I', 9);
        $pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(120, 5);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
        
	}
	
        //formato_checklist_actividad.pdf
    elseif ($valor == 'PEDIDOS_XCATAN'){
		$pdf = new FPDI('P', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/PEDIDOS_XCATAN.pdf');        
        date_default_timezone_set("America/Mexico_City");         		
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 275, FALSE);
            
            $pdf -> SetFont('Arial', 'I', 9);
            $pdf -> SetTextColor(0, 0, 0);
            $pdf -> SetXY(10, 259);	
            $pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
            
		
		}
	}
	
			    
    elseif ($valor == 'BOLSAS_AUT_EMPAQUE'){
		$pdf = new FPDI('P', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/BOLSAS_AUTORIZADAS.pdf');        
        date_default_timezone_set("America/Mexico_City");         		
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 275, FALSE);
            
            $pdf -> SetFont('Arial', 'I', 9);
            $pdf -> SetTextColor(0, 0, 0);
            $pdf -> SetXY(10, 259);	
            $pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
            
		
		}  	
	}
	
	elseif ($valor == 'ROL_LIMPIEZA'){
		$pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/ACTIVIDADES_DE_LIMPIEZA_2023.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}  
	}
	
	 elseif ($valor == 'ESPECIAS_1_KG'){
		$pdf = new FPDI('P', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/ESPECIAS_1_KG_EXHIBIDAS.pdf');        
        date_default_timezone_set("America/Mexico_City");         		
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 210, 275, FALSE);
            
            $pdf -> SetFont('Arial', 'I', 9);
            $pdf -> SetTextColor(0, 0, 0);
            $pdf -> SetXY(10, 259);	
            $pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
            
		
		}  	
	}
        
        
	
    
    
	$pdf -> Output();
?>

