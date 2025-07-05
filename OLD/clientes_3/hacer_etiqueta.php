<?php	
require('fpdf181/PDF_Label.php');
require_once('BaseDatos.php');
$bd = new BaseDatos();

$valor = $_GET["valor"];

// OBTENER LOS CAMPOS DE LA ETIQUETA

// CAMPOS EL COMUN
$texto_1 = utf8_decode("Chiles y Semillas San José");
$texto_3 = utf8_decode("Calle Benito Juárez 109-A. Centro");
$texto_4 = utf8_decode("Misantla, Ver. Cel. 232 160 96 07");

// CAMPOS DE LA BD
$res = $bd -> query("SELECT * FROM TBL_ETIQUETAS_PRODUCTOS WHERE ID = ".$valor);					 
$datos = $res -> fetch_assoc();

// OBTENER LOS VALORES DE LA CONSULTA
$nombre_producto = utf8_encode($datos['NOMBRE_PRODUCTO']);
$formato = $datos['FORMATO'];
$observaciones = $datos['OBSERVACIONES'];
$ruta_archivo = $datos['RUTA_ARCHIVO'];
$nombre_archivo = $datos['NOMBRE_ARCHIVO'];
$fuente = $datos['FUENTE'];
$notas = $datos['NOTAS'];

// VERIFICAR SI EXISTE ARCHIVO PDF, EN CASO CONTRARIO CONSTRUIR LA ETIQUETA
$aux = substr($nombre_archivo, -3);

// existe el archivo
if ($aux == "pdf"){	
	$ruta_completa = "http://chilessanjose:8080".$ruta_archivo.$nombre_archivo;			
	header('Content-type: application/pdf');
	header('Content-Disposition: inline; filename="' . $nombre_archivo . '"');
	header('Content-Transfer-Encoding: binary');
	header('Accept-Ranges: bytes');
	@readfile($ruta_completa);
	}

// no existe el archivo, enviar al destino php
else if ($aux <> "pdf"){
	$texto_2 = str_replace(" - ", "\n", utf8_decode($nombre_producto));
	$pdf = new PDF_Label($formato);
	$pdf->AddPage();

	// ARMAR LA ETIQUETA
	$pdf->Make_Labels($formato, $texto_1, $texto_2, $texto_3, $texto_4, $fuente, $notas);
	$pdf->Output();
}

else{
	echo "algo pasa con tu vida que no funciona muy bien...";
	
}
?>
