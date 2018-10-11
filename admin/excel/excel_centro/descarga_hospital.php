<?php
error_reporting(0);
require '../../capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();



include '../../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);
extract($_POST);


$cant_nombre= count($nombre);

$query ="select ";
$where = " where  1 ";
	if($cant_nombre>=2){
		$where .= " and c_id_centro in  (  ";
		for ($i=0 ; $i< $cant_nombre ; $i++){
		$id .= $nombre[$i].",";	
		
		
		}
		
		$id=substr($id,0, -1);
		$id=$cone->test_input($id) ;
		$id=$filtro->process($id) ;
	
		$where.= $id." ) ";
	}
	else if($cant_nombre==1)
	 {
		 $nombre[0]=$cone->test_input($nombre[0]) ; 
		 $nombre[0]=$filtro->process($nombre[0]) ; 
		$where .= " and c_id_centro = ".$nombre[0]." ; " ;
	 }
	 


if(isset($hospital)=='1' ){
	$hospital = " 
		  
		 hospitalizacion.`ID_CONTROL` ,
        `DIAG_O2` as 'Requiere O2 ',
        `DIAG_NO_INVASIVA` as 'Ventilación mecánica no invasiva',
        `DIAG_INVASIVA` as 'Requiere Ventilación mecánica invasiva',
         DIAG_INVASIVA_ID as 'Tipo Invasiva',
        `DIAG_O2_DOMICILIO` as 'Requiere O2 domicilario',
        `DIAG_O2_DOMICILIO_ID` as 'Tipo Domicilio ',
        `DIAG_CUAL` as 'Si es otro ¿cuál?',
        `FECHA` as 'Fecha Hospitalización',
        `DIA`,
        `EDAD_AGNOS` as 'Edad Años',
        `EDAD_MESES` as 'Edad Meses', 
        `OBSERVACIONES`  " ;
	$query .=$hospital; 
}


$filtroFecha = " " ;
$fecha_desde_hospital=$cone->test_input($fecha_desde_hospital) ;
$fecha_desde_hospital=$filtro->process($fecha_desde_hospital) ;
$fecha_hasta_hospital=$cone->test_input($fecha_hasta_hospital) ;
$fecha_hasta_hospital=$filtro->process($fecha_hasta_hospital) ;
if ($fecha_desde_hospital!= '' && $fecha_hasta_hospital!= '' ){
	$filtroFecha = " and FECHA_CONTROL between '". $fecha_desde_hospital."' and  '". $fecha_hasta_hospital."' " ;
	
}
else if ($fecha_desde_hospital!= '' ){
	$filtroFecha = " and FECHA_CONTROL = '". $fecha_desde_hospital."' "; 
	
}
else if ($fecha_hasta_hospital!= '' ){
	$filtroFecha = "   and FECHA_CONTROL = '". $fecha_hasta_hospital."' ";
	 
}

$fecha_desde_hospital;
$fecha_hasta_hospital;


	

/* 

-- Identificaicion
	
	-- Estadisticas
	
	-- recursos 
	
	-- Seguimiento 
*/	
$query=substr($query,0, -1);

if(trim($query)=="select"){
	$query .= " ' sin datos ' ";
	$limite = " limit 0,1";
	
}
$query .= "
		
	
	FROM `hospitalizacion`  
			inner join control c on c.id_control =hospitalizacion.`ID_CONTROL` 
			inner join ingreso i on c.ID_NEOCOSUR  =  i.ID_NEOCOSUR 
			inner join centro ce on ce.c_id_centro = i.id_centro ".$where.$filtroFecha.$limite  ;


$cone->Abrir();
$retorno =$cone->select($query);	 
$field=$retorno->field_count; 
$info_campo = $retorno->fetch_fields(); 
$cone->Cerrar();  


$db_record = 'excel_hospitalizacion';
// optional where query

// filename for export
$csv_filename = 'export_'.$db_record.'_'.date('Y-m-d').'.csv';
$csv_export = '';
foreach ($info_campo as $valor) {
			 $csv_export.= utf8_decode($valor->name.';'); 
        }

$csv_export.= '
';

while($row = $retorno->fetch_array()) { 
  for($i = 0; $i < $field; $i++) {
	 
    $csv_export.= '"'.$row[$i].'";';
  }	
  $csv_export.= '
';	
}
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);
;

?>