<?php

	$valor = $_GET["valor"];

	use setasign\Fpdi\Fpdi;	
	require_once('fpdf181/fpdf.php');	
	require_once('fpdi220/autoload.php');	

	if ($valor == 'JUSTIFICACIONES'){
        
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
		$pdf -> setSourceFile('pdf/formato_faltas_retardos.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 216, 279, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		$pdf -> SetXY(125, 17);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	
		$pdf -> SetXY(125, 157);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
	
	elseif ($valor == 'REPORTE_INCIDENCIA'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
		$pdf -> setSourceFile('pdf/formato_incidencia.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 0);
		
		$pdf -> SetXY(125, 15);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
		
		$pdf -> SetXY(125, 144);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}

	
	elseif ($valor == 'BECARIOS'){
        
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
		$pdf -> setSourceFile('pdf/registro_becarios.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 255);
		$pdf -> SetXY(115, 50);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	
		$pdf -> SetXY(115, 169);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
	
	elseif ($valor == 'RETARDOS_PERSONAL'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City");        
		
		$pdf -> setSourceFile('pdf/FORMATO_RETARDOS_PERMISOS_PERSONAL.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage('L', 'letter');
		$pdf ->useTemplate($tplIdx, null, null, 279, 216, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 255);
		
		$pdf -> SetXY(190, 15);	
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
	
	elseif ($valor == 'RETARDOS_BECARIOS'){
        
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
		$pdf -> setSourceFile('pdf/FORMATO_RETARDOS_PERMISOS_BECARIOS.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage('L', 'letter');
		$pdf ->useTemplate($tplIdx, null, null, 279, 216, FALSE);
	
		$pdf -> SetFont('Arial', 'I', 9);
		$pdf -> SetTextColor(0, 0, 255);
		
		$pdf -> SetXY(190, 15);		
		$pdf -> Write(0, utf8_decode('FECHA DE IMPRESION: ').date("d / m / Y  H:i:s"));
	}
    
    elseif ($valor == 'HORARIO_COMIDAS'){
        
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        
		$pdf -> setSourceFile('pdf/HORARIO_COMIDAS.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage('L', 'letter');
		$pdf ->useTemplate($tplIdx, null, null, 279, 216, FALSE);
	}
    
    //ROL_DESCANSO
    elseif ($valor == 'ROL_DESCANSO'){
        date_default_timezone_set("America/Mexico_City");         
        $pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/NVO_ROL_DESCANSOS_2022.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}    
	}
    
    elseif ($valor == 'AREAS'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/AREAS.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
        
    elseif ($valor == 'USO_ESCALERAS'){
        date_default_timezone_set("America/Mexico_City");         
        $pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/uso_escaleras.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}    
	}
    
    elseif ($valor == 'MUEBLE_CHILES'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/MUEBLE_CHILES.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
    
    elseif ($valor == 'META_EMPAQUE'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/META_EMPAQUE.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
    
    elseif ($valor == 'SUPERVISION'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/ROLES_SUPERVISION.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
    
    elseif ($valor == 'SUPERVISION_DIARIA'){
        date_default_timezone_set("America/Mexico_City");         
        $pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/ACTIVIDADES DIARIAS DE SUPERVISION.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}    
	}    
    
    elseif ($valor == 'ROL_AYUDANTES'){
        date_default_timezone_set("America/Mexico_City");         
        $pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/ROL_AYUDANTES.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}    
	}
    
    elseif ($valor == 'ROLES_GENERALES'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/ROLES_GENERALES.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
    
	elseif ($valor == 'CAPACITACION_VENTAS'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/PLAN BASICO DE CAPACITACION EN VENTAS.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
    
	elseif ($valor == 'ROL_LIMPIEZA'){
        date_default_timezone_set("America/Mexico_City");         
        $pdf = new FPDI('L', 'mm', 'letter');
		$pageCount = $pdf -> setSourceFile('pdf/ROL_DE_LIMPIEZA.pdf');
	
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			$tplIdx = $pdf -> importPage($pageNo);
			$size = $pdf->getTemplateSize($tplIdx);
	
			$pdf -> AddPage();
			$pdf ->useTemplate($tplIdx, null, null, 279, 212, FALSE);
		
		}    
	}
    
	elseif ($valor == 'CAP_NUEVO_INGRESO'){
        $pdf = new FPDI('P', 'mm', 'Letter');	
        date_default_timezone_set("America/Mexico_City"); 
        $pdf -> setSourceFile('pdf/CAPACITACION_PERSONAL_NUEVO_INGRESO.pdf');
	
		$tplIdx = $pdf -> importPage(1);
		$size = $pdf->getTemplateSize($tplIdx);
	
		$pdf -> AddPage();
		$pdf ->useTemplate($tplIdx, null, null, 210, 265, FALSE);
		
	}
    
    
	
	$pdf -> Output();
	
?>

