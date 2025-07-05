<?php
	require('fpdf181/fpdf.php');
	
	class PDF extends FPDF
	{
		
		function Header()
		{
			date_default_timezone_set("America/Mexico_City"); 
			//global $titulo_pdf;			
			$this->SetFont('Arial','B', 13);
			$this->Cell(30);
			$this->Cell(160,6, $this->titulo_pdf, 0,0,'R');
			$this->Ln(7);
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);			
			$this->Cell(170,5, utf8_decode('Fecha de impresión del formato: ').date("d / m / Y  H:i:s") ,0,0,'L');
			$this->Cell(20,5, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );			
		}		
	}
?>