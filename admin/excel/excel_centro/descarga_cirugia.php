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
$idCentros ;
	if($cant_nombre>=2){
		$where .= " and c_id_centro in  (  ";
		for ($i=0 ; $i< $cant_nombre ; $i++){
		$id .= $nombre[$i].",";	
		
		
		}
		
		$id=substr($id,0, -1);
		$id=$cone->test_input($id) ;
		$id=$filtro->process($id) ;
	
		$where.= $id."  ) ";
	}
	else if($cant_nombre==1)
	 {
		$nombre[0]=$cone->test_input($nombre[0]) ; 
		$nombre[0]=$filtro->process($nombre[0]) ; 
		$where .= " and c_id_centro = ".$nombre[0]."  " ;
	 }
	 


if(isset($cirugia)=='1' ){
	$cirugia = " 
		cirugia.id_neocosur as 'Id Neocosur',
		ingreso.ID_CENTRO as 'Id Centro',
        edad,
        detalle,
        otro " ;
	$query .=$cirugia; 
}


$filtroFecha = " " ;

$fecha_desde_cirugia=$cone->test_input($fecha_desde_cirugia) ;
$fecha_desde_cirugia=$filtro->process($fecha_desde_cirugia) ;
$fecha_hasta_cirugia=$cone->test_input($fecha_hasta_cirugia) ;
$fecha_hasta_cirugia=$filtro->process($fecha_hasta_cirugia) ;


if ($fecha_desde_cirugia!= '' && $fecha_hasta_cirugia!= '' ){
	$filtroFecha = " and ingreso.FECHA_NACIMIENTO between '". $fecha_desde_cirugia."' and  '". $fecha_hasta_cirugia."' " ;
	
}
else if ($fecha_desde_cirugia!= '' ){
	$filtroFecha = " and ingreso.FECHA_NACIMIENTO = '". $fecha_desde_cirugia."' ";
	
}
else if ($fecha_hasta_cirugia!= '' ){
	$filtroFecha = "   and ingreso.FECHA_NACIMIENTO = '". $fecha_hasta_cirugia."' ";
	
}

$fecha_desde_cirugia;
$fecha_hasta_cirugia;

//$cone->Abrir();
	
//select
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
		
	
FROM cirugia
      	inner join ingreso on ingreso.ID_NEOCOSUR=cirugia.id_neocosur
		inner join centro c on c.c_id_centro = ingreso.id_centro".$where.$filtroFecha.$limite  ;

$cone->Abrir();
$retorno =$cone->select($query);	
$info_campo = $retorno->fetch_fields(); 
$cone->Cerrar(); 
 
$db_record = 'excel_cirugia';
// optional where query

// filename for export
$csv_filename = 'export_'.$db_record.'_'.date('Y-m-d').'.csv';
$csv_export = '';
foreach ($info_campo as $valor) {
			 $csv_export.= utf8_decode($valor->name.';');

        }

$csv_export.= '
';


$field=$retorno->field_count;


// loop through database query and fill export variable
while($row = $retorno->fetch_array()) {
	//
  // create line with field values
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



?>