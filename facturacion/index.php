<?php
//***** Calculo de Gastos por medio de una sentencia mysql compleja****



require_once('BaseDatos.php');
$bd = new BaseDatos();


$res = $bd -> query("SELECT ID_PRODUCTO, CODIGO_SAT, NOMBRE_PRODUCTO, IMP_16, IMP_8, ULT_FECHA_FACT FROM QRY_VER_FACTURADOS");


$key = -1;

echo '<style type="text/css">
.tftable {font-size:14px;color:#333333;width:50%;border-width: 1px;border-color: #9dcc7a;border-collapse: collapse;}
.tftable th {font-size:14px;background-color:#abd28e;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;text-align:left;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:14px;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;}
.tftable tr:hover {background-color:#ffff99;}
</style>';

echo '<table class="tftable" border="1">';
echo '<tr><th>ID_PRODUCTO</th> <th>CODIGO_SAT</th> <th>NOMBRE_PRODUCTO</th> <th>IMP_16</th> <th>IMP_8</th> <th>ULT_FECHA_FACT</th></tr>';

$i=1;
foreach ($res as $key => $value) {

		//$id_producto = $value['ID_PRODUCTO'];
		$id_producto = $i;
		$codigo_sat = $value['CODIGO_SAT'];
		$nombre_producto = utf8_encode($value['NOMBRE_PRODUCTO']);
		$imp_16 = utf8_encode($value['IMP_16']);
		$imp_8 = utf8_encode($value['IMP_8']);
		$ult_fecha_fact = utf8_encode($value['ULT_FECHA_FACT']);
		
		echo '<tr>';
		echo '<td>'.$id_producto.'</td>';
		echo '<td>'.$codigo_sat.'</td>';
		echo '<td>'.$nombre_producto.'</td>';
		echo '<td>'.$imp_16.'</td>';
		echo '<td>'.$imp_8.'</td>';		
		echo '<td>'.$ult_fecha_fact.'</td>';		
		echo '</tr>';	
		$i = $i + 1;
}


echo '</table>';				

?>