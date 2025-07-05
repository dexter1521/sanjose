<?php
////////////////////////////////////////////////////////////////////////////////////////////////
// PDF_Label 
//
// Class to print labels in Avery or custom formats
//
// Copyright (C) 2003 Laurent PASSEBECQ (LPA)
// Based on code by Steve Dillon
//
//---------------------------------------------------------------------------------------------
// VERSIONS:
// 1.0: Initial release
// 1.1: + Added unit in the constructor
//      + Now Positions start at (1,1).. then the first label at top-left of a page is (1,1)
//      + Added in the description of a label:
//           font-size : defaut char size (can be changed by calling Set_Char_Size(xx);
//           paper-size: Size of the paper for this sheet (thanx to Al Canton)
//           metric    : type of unit used in this description
//                       You can define your label properties in inches by setting metric to
//                       'in' and print in millimiters by setting unit to 'mm' in constructor
//        Added some formats:
//           5160, 5161, 5162, 5163, 5164: thanks to Al Canton
//           8600                        : thanks to Kunal Walia
//      + Added 3mm to the position of labels to avoid errors 
// 1.2: = Bug of positioning
//      = Set_Font_Size modified -> Now, just modify the size of the font
// 1.3: + Labels are now printed horizontally
//      = 'in' as document unit didn't work
// 1.4: + Page scaling is disabled in printing options
// 1.5: + Added 3422 format
// 1.6: + FPDF 1.8 compatibility
////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * PDF_Label - PDF label editing
 * @package PDF_Label
 * @author Laurent PASSEBECQ
 * @copyright 2003 Laurent PASSEBECQ
**/

require_once('fpdf.php');

class PDF_Label extends FPDF {

	// Private properties
	protected $_Margin_Left;		// Left margin of labels
	protected $_Margin_Top;			// Top margin of labels
	protected $_X_Space;			// Horizontal space between 2 labels
	protected $_Y_Space;			// Vertical space between 2 labels
	protected $_X_Number;			// Number of labels horizontally
	protected $_Y_Number;			// Number of labels vertically
	protected $_Width;				// Width of label
	protected $_Height;				// Height of label
	protected $_Line_Height;		// Line height
	protected $_Padding;			// Padding
	protected $_Metric_Doc;			// Type of metric for the document
	protected $_COUNTX;				// Current x position
	protected $_COUNTY;				// Current y position

	// List of label formats
	protected $_Avery_Labels = array(
		'J5160' => array(
			'paper-size'=>'letter',	
			'metric'=>'mm',	
			'marginLeft'=>1.762,	
			'marginTop'=>10.7,		
			'NX'=>3,	
			'NY'=>10,	
			'SpaceX'=>3.175,	
			'SpaceY'=>0,	
			'width'=>66.675,	
			'height'=>25.4,		
			'font-size'=>8),
			
		'J5260' => array(
			'paper-size'=>'letter',	
			'metric'=>'mm',	
			'marginLeft'=>4,	
			'marginTop'=>13,		// ERA 14
			'NX'=>3,	
			'NY'=>10,	
			'SpaceX'=>5,	
			'SpaceY'=>0,	
			'width'=>66.3,	
			'height'=>25.4,		
			'font-size'=>10),
			
		'J5267' => array(
			'paper-size'=>'letter',	
			'metric'=>'mm',	
			'marginLeft'=>5,	
			'marginTop'=>10,	
			'NX'=>4,	
			'NY'=>20,	
			'SpaceX'=>7,	
			'SpaceY'=>0,	
			'width'=>44.5,	
			'height'=>12.5,		
			'font-size'=>9),
			
		'J5163' => array(
			'paper-size'=>'letter',	
			'metric'=>'mm',	
			'marginLeft'=>4,	
			'marginTop'=>14,	
			'NX'=>2,	
			'NY'=>5,	
			'SpaceX'=>5,	
			'SpaceY'=>0,	
			'width'=>102,	
			'height'=>51,		
			'font-size'=>9)
	);

	// Constructor
	function __construct($format, $unit='mm', $posX=1, $posY=1) {
		if (is_array($format)) {
			// Custom format
			$Tformat = $format;
		} else {
			// Built-in format
			if (!isset($this->_Avery_Labels[$format]))
				$this->Error('Unknown label format: '.$format);
			$Tformat = $this->_Avery_Labels[$format];
		}

		parent::__construct('P', $unit, $Tformat['paper-size']);
		$this->_Metric_Doc = $unit;
		$this->_Set_Format($Tformat);
		$this->SetFont('Arial');
		$this->SetMargins(0,0); 
		$this->SetAutoPageBreak(false); 
		$this->_COUNTX = $posX-2;
		$this->_COUNTY = $posY-1;
	}

	function _Set_Format($format) {
		$this->_Margin_Left	= $this->_Convert_Metric($format['marginLeft'], $format['metric']);
		$this->_Margin_Top	= $this->_Convert_Metric($format['marginTop'], $format['metric']);
		$this->_X_Space 	= $this->_Convert_Metric($format['SpaceX'], $format['metric']);
		$this->_Y_Space 	= $this->_Convert_Metric($format['SpaceY'], $format['metric']);
		$this->_X_Number 	= $format['NX'];
		$this->_Y_Number 	= $format['NY'];
		$this->_Width 		= $this->_Convert_Metric($format['width'], $format['metric']);
		$this->_Height	 	= $this->_Convert_Metric($format['height'], $format['metric']);
		$this->Set_Font_Size($format['font-size']);
		$this->_Padding		= $this->_Convert_Metric(3, 'mm');
	}

	// convert units (in to mm, mm to in)
	// $src must be 'in' or 'mm'
	function _Convert_Metric($value, $src) {
		$dest = $this->_Metric_Doc;
		if ($src != $dest) {
			$a['in'] = 39.37008;
			$a['mm'] = 1000;
			return $value * $a[$dest] / $a[$src];
		} else {
			return $value;
		}
	}

	// Give the line height for a given font size
	function _Get_Height_Chars($pt) {
		$a = array(5=>4,
				   6=>4, 
				   7=>4, 
				   8=>4, 				   
				   9=>4, 				   
				   10=>4.2, 				   
				   11=>4, 				   
				   12=>4.1, 				   
				   13=>6,
				   14=>6, 				   
				   15=>6,
				   16=>6,
				   17=>6,
				   18=>6,
				   19=>7,
				   20=>7,
				   21=>7,
				   22=>7
				   );
		if (!isset($a[$pt]))
			$this->Error('Invalid font size: '.$pt);
		return $this->_Convert_Metric($a[$pt], 'mm');
	}

	// Set the character size
	// This changes the line height too
	function Set_Font_Size($pt) {
		$this->_Line_Height = $this->_Get_Height_Chars($pt);
		$this->SetFontSize($pt);
	}

	// Print a label
	function Add_Label($text) {
		$this->_COUNTX++;
		if ($this->_COUNTX == $this->_X_Number) {
			// Row full, we start a new one
			$this->_COUNTX=0;
			$this->_COUNTY++;
			if ($this->_COUNTY == $this->_Y_Number) {
				// End of page reached, we start a new one
				$this->_COUNTY=0;
				$this->AddPage();
			}
		}

		$_PosX = $this->_Margin_Left + $this->_COUNTX*($this->_Width+$this->_X_Space) + $this->_Padding;
		$_PosY = $this->_Margin_Top + $this->_COUNTY*($this->_Height+$this->_Y_Space) + $this->_Padding;
		$this->SetXY($_PosX, $_PosY);
		$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text, 0, 'L');
	}
	
	
	function Calculate_Font_Size($text){
		$my_string = $text;
		$font_size = 9;
		$decrement_step = 0.1;
		$line_width = 41; // Line width (approx) in mm
		
		$this->AddFont('ArialRoundedMTBold','','ARLRDBD.php');
		$this->SetFont('ArialRoundedMTBold');
		//$this->SetFont('Arial', 'B', $font_size);
		
		while($this->GetStringWidth($my_string) < $line_width) {
			$this->SetFontSize($font_size += $decrement_step);
		}
		return $font_size;
	}

		
	
	// Print a label
	function Make_Labels($formato, $text_1, $text_2, $text_3, $text_4, $font_size, $notas) {
	
		if ($formato == 'J5260'){
			$offset_y = -1;
			$offset_x = -1;
			for($i=1; $i<=30; $i++) {
				$this->_COUNTX++;
				if ($this->_COUNTX == $this->_X_Number) {
					// Row full, we start a new one
					$this->_COUNTX=0;
					$this->_COUNTY++;
					if ($this->_COUNTY == $this->_Y_Number) {
						// End of page reached, we start a new one
						$this->_COUNTY=0;
						$this->AddPage();
					}
				}
				
				$offset_y = $offset_y + 0.01;
				$offset_x = $offset_x + 0.01;

				$_PosX = $this->_Margin_Left + $this->_COUNTX*($this->_Width+$this->_X_Space) + $this->_Padding;
				$_PosY = $this->_Margin_Top + $this->_COUNTY*($this->_Height+$this->_Y_Space) + $this->_Padding;
				
				
				$this->Image('img/LOGO_DEFINITIVO_color.jpg', $_PosX + $offset_x, $_PosY+2+$offset_y, 17);
					
				//$this->SetFont('Arial','B');
				//$this->Set_Font_Size(7);
				
				$this->AddFont('CooperBlack','','COOPBL.php');
				$this->SetFont('CooperBlack');									
				$this->Set_Font_Size(7);
				$this->SetXY($_PosX+7+$offset_x, $_PosY+0.5+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_1, 0, 'C');
					
				$this->AddFont('ArialRoundedMTBold','','ARLRDBD.php');
				$this->SetFont('ArialRoundedMTBold');
					
				$this->Set_Font_Size($font_size);
				$this->SetXY($_PosX+16+$offset_x, $_PosY+4.5+$offset_y);		
				$this->MultiCell($this->_Width-20 - $this->_Padding, $this->_Line_Height, $text_2, 0, 'C');
				$this->Rect($_PosX+16+$offset_x, $_PosY+4+$offset_y, 44, 12.5);
					
				$this->SetFont('Arial');
				$this->Set_Font_Size(7);
				$this->SetXY($_PosX+7+$offset_x, $_PosY+16+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_3, 0, 'C');					
					
				$this->SetFont('Arial','B');
				$this->Set_Font_Size(7);
				$this->SetXY($_PosX+7+$offset_x, $_PosY+18.5+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_4, 0, 'C');
			}					
		}
		
		elseif ($formato == 'J5267'){
			$offset_y = -2;
			$offset_x = 1.2;
			//$offset = 0;
			for($i=1; $i<=80; $i++) {
				$this->_COUNTX++;
				if ($this->_COUNTX == $this->_X_Number) {
					// Row full, we start a new one
					$this->_COUNTX=0;
					$this->_COUNTY++;
					if ($this->_COUNTY == $this->_Y_Number) {
						// End of page reached, we start a new one
						$this->_COUNTY=0;
						$this->AddPage();
					}
				}
				
				$offset_y = $offset_y + 0.05;
				$offset_x = $offset_x + 0.01;

				$_PosX = $this->_Margin_Left + $this->_COUNTX*($this->_Width+$this->_X_Space) + $this->_Padding;
				$_PosY = $this->_Margin_Top + $this->_COUNTY*($this->_Height+$this->_Y_Space) + $this->_Padding;
				
				$this->Image('img/LOGO_DEFINITIVO_color.jpg', $_PosX+$offset_x, $_PosY+2+$offset_y, 7.5);
				
				//$this->SetFont('Arial','B');
				
				$this->AddFont('CooperBlack','','COOPBL.php');
				$this->SetFont('CooperBlack');					
				$this->Set_Font_Size($font_size);
				$this->Set_Font_Size(6);				
				$this->SetXY($_PosX+$offset_x+3, $_PosY+1+$offset_y);				
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_1, 0, 'C');
				
				$text_2 = str_replace("\n", " - ", utf8_decode($text_2));
				$this->AddFont('ArialRoundedMTBold','','ARLRDBD.php');
				$this->SetFont('ArialRoundedMTBold');					
				$this->Set_Font_Size($font_size);
				$this->SetXY($_PosX+$offset_x+3.4, $_PosY+4.2+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_2, 0, 'C');
				$this->Rect($_PosX+$offset_x+7, $_PosY+4+$offset_y, 34.5, 4);
				
				$this->SetFont('Arial','B');
				$this->Set_Font_Size(6);
				$this->SetXY($_PosX+$offset_x+3.5, $_PosY+7.2+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_4, 0, 'C');
				
				
				
			}					
		}
		
		elseif ($formato == 'J5163'){
			$offset_y = 0;
			$offset_x = 0;
			//$offset = 0;
			for($i=1; $i<=10; $i++) {
				$this->_COUNTX++;
				if ($this->_COUNTX == $this->_X_Number) {
					// Row full, we start a new one
					$this->_COUNTX=0;
					$this->_COUNTY++;
					if ($this->_COUNTY == $this->_Y_Number) {
						// End of page reached, we start a new one
						$this->_COUNTY=0;
						$this->AddPage();
					}
				}
				
				$offset_y = $offset_y + 0.0;
				$offset_x = $offset_x + 0.0;

				$_PosX = $this->_Margin_Left + $this->_COUNTX*($this->_Width+$this->_X_Space) + $this->_Padding;
				$_PosY = $this->_Margin_Top + $this->_COUNTY*($this->_Height+$this->_Y_Space) + $this->_Padding;
				
				$this->SetFont('Arial','B');
				$this->Set_Font_Size(10);				
				$this->SetXY($_PosX+$offset_x, $_PosY+2+$offset_y);				
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_1, 0, 'C');
				
				$text_2 = str_replace("\n", " - ", utf8_decode($text_2));
				$this->AddFont('ArialRoundedMTBold','','ARLRDBD.php');
				$this->SetFont('ArialRoundedMTBold');					
				$this->Set_Font_Size($font_size);
				$this->SetXY($_PosX+$offset_x, $_PosY+4+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_2, 0, 'C');
				$this->Rect($_PosX+$offset_x, $_PosY+4+$offset_y, 100, 4);
				/*
				$this->SetFont('Arial','B');
				$this->Set_Font_Size(6);
				$this->SetXY($_PosX+$offset_x, $_PosY+8.2+$offset_y);
				$this->MultiCell($this->_Width - $this->_Padding, $this->_Line_Height, $text_4, 0, 'C');
				
				*/
				
			}					
		}
		
		
	}

	function _putcatalog()
	{
		parent::_putcatalog();
		// Disable the page scaling option in the printing dialog
		$this->_put('/ViewerPreferences <</PrintScaling /None>>');
	}

}
?>
