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
		$where .= " and c_id_centro = ".$nombre[0]."  " ;
	 }
	 


if(isset($identificacion)=='1' ){ 
	$identi = "c_fecha_crea as ' Fecha de Creación',
	c_nombre as ' nombre',
	c_cod_centro as 'codigo Centro',
	c_id_pais as 'pais ',
	c_universidad as 'universidad',
	c_tipo as 'Tipo ',"  ;
	$query .= $identi;
	
}

if(isset($estadisticas)=='1'  ){
	$estadis =" c_est_total_plaza as ' N° total de plazas',
	c_est_total_parto as 'total de partos',
	c_est_morta_neona as ' mortalidad neonatal global',
	c_est_plaza_uci  as 'Número de plazas Uci ',
	c_est_parto_1500 as 'partos <= 1500 g',
	c_est_morta_1500 as ' mortalidad <= 1500 g',";
	$query .=$estadis; 	
}

if(isset($recursos)=='1'  ){
	$recurso = "c_re_frecuencia as 'Ventiliacion alta Frecuencia',
	c_re_oxido as 'Oxido Nítrico',
	c_re_cir_general as 'Cirugía General',
	c_re_cir_cardiaca as 'Cirugía cardíaca',";
	$query .= $recurso; 
}

if(isset($seguimientos)=='1' ){
	$segui = " 
		c_seg_neo as 'seguimiento Neonatal',
	c_seg_dura as 'Duración Seguimientk',
	c_seg_nino as 'N° Niños Estimados por año', 
	c_seg_ofta as 'oftalmólogo' ,
	c_seg_otorri as 'Neurólogo' ,
	c_seg_neuro as 'Neurólogo'  ,
	c_seg_bronco as  'Broncopulmonar'  ,
	c_seg_fono as 'Fonoaudiólogo' ,
	c_seg_kine as 'Kinesiólogo' ,
	c_seg_oxi as 'Oxigeno'," ;
	$query .=$segui; 
}


$filtroFecha = " " ;
$fecha_desde_centro=$cone->test_input($fecha_desde_centro) ;
$fecha_desde_centro=$filtro->process($fecha_desde_centro) ;
$fecha_hasta_centro=$cone->test_input($fecha_hasta_centro) ;
$fecha_hasta_centro=$filtro->process($fecha_hasta_centro) ;

if ($fecha_desde_centro!= '' && $fecha_hasta_centro!= '' ){
	$filtroFecha = " and c_fecha_crea between '". $fecha_desde_centro."' and  '". $fecha_hasta_centro."' " ;
	
}
else if ($fecha_desde_centro!= '' ){
	$filtroFecha = " and c_fecha_crea = '". $fecha_desde_centro."' ";
	
}
else if ($fecha_hasta_centro!= '' ){
	$filtroFecha = "   and c_fecha_crea = '". $fecha_hasta_centro."' ";
	
}

$fecha_desde_centro;
$fecha_hasta_centro;

//
	

/* 

-- Identificaicion
	
	-- Estadisticas
	
	-- recursos 
	
	-- Seguimiento 
*/	
$query=substr($query,0, -1);

if(trim($query)=="select"){
	$query .= " ' sin datos ' ";
	$limite = "  limit 0,1 ";
}
$query .= "
		
	
	
	from centro ".$where.$filtroFecha.$limite  ;

$cone->Abrir();
$retorno = $cone->select($query);


$info_campo = $retorno->fetch_fields(); 

$cone->Cerrar(); 
$db_record = 'excel_centro';
// optional where query


$csv_filename = 'export_'.$db_record.'_'.date('Y-m-d').'.csv';
$csv_export = '';
foreach ($info_campo as $valor) {
			 $csv_export.= utf8_decode($valor->name.';');
        }

$csv_export.= '
';


$field=$retorno->field_count;

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