<?php
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';

$cone = new ConexionDAO();
 $query ="select	
		ID_NEOCOSUR,
		EVALUACION_OFTALMOLOGICA_PREVIA_ALTA as 'alta',
 		ROP_OJO_IZQ 	as 'rop_izq',		
		ID_LOCALIZACION_OJO_IZQ  	as  'localiza_izq',
		ID_SEVERIDAD_OJO_IZQ 	as  'severidad_izq',
		ENF_PLUS_OJO_IZQ 	as 'flus_izq',
		CIRUGIA_ROP_OJO_IZQ	as 'cirugia_izq' ,
		ID_TIPO_CIRUGIA_ROP_OJO_IZQ  as 'id_cual_izq',
		ROP_OJO_DER as 'rop_der',
		ID_LOCALIZACION_OJO_DER	as 'localiza_der' ,	
		ID_SEVERIDAD_OJO_DER 	as 'severidad_der' ,
		ENF_PLUS_OJO_DER 	as 'flus_der',		
		CIRUGIA_ROP_OJO_DER 	as 'ciguria_der',
		ID_TIPO_CIRUGIA_ROP_OJO_DER	as 'id_cual_der' 	
		from  patologias_neonatales";
		
 $query2="SELECT 	
			id_sgm,
			FUN_VIS_EVA_OFT_EVA_PREVIA_ALTA	as 'alta',
			FUN_VIS_EVA_OFT_OJO_IZQ_ROP  as 'rop_izq',
			FUN_VIS_EVA_OFT_OJO_IZQ_ZONA   	as  'localiza_izq',
			FUN_VIS_EVA_OFT_OJO_IZQ_ETAPA  	as  'severidad_izq',
			FUN_VIS_EVA_OFT_OJO_IZQ_ENF_PLUS as 'flus_izq',
			FUN_VIS_EVA_OFT_OJO_IZQ_CIRG_ROP	as 'cirugia_izq' ,
			FUN_VIS_EVA_OFT_OJO_IZQ_CIRG_ROP_SI_PRM	as 'id_cual_izq',
	        FUN_VIS_EVA_OFT_OJO_DER_ROP	as 'rop_der',
			FUN_VIS_EVA_OFT_OJO_DER_ZONA as 'localiza_der' ,
			FUN_VIS_EVA_OFT_OJO_DER_ETAPA	as 'severidad_der' ,
			FUN_VIS_EVA_OFT_OJO_DER_ENF_PLUS as 'flus_der',
			FUN_VIS_EVA_OFT_OJO_DER_CIRG_ROP	as 'ciguria_der',
			FUN_VIS_EVA_OFT_OJO_DER_CIRG_ROP_SI_PRM	as 'id_cual_der' 
	FROM `sgm` ";	

$cone->Abrir();		
$arC = $cone->select($query);	
//$row = $retorno->fetch_assoc();				
$cone->Cerrar();						
while($arC!=null && $arr = $arC->fetch_array())		{			
		if($arr['alta'] =='1' ){					
			if($arr['severidad_izq'] > $arr['severidad_der']  ) {						
			$rop_izq = $arr['rop_izq']=='' ? 'null' : $arr['rop_izq'];	
			$localiza_izq = $arr['localiza_izq']=='' ? 'null' : $arr['localiza_izq'];
			$severidad_izq = $arr['severidad_izq']=='' ? 'null' : $arr['severidad_izq'];
			$flus_izq = $arr['flus_izq']=='' ? 'null' : $arr['flus_izq'];		
			$cirugia_izq = $arr['ciguria_der']=='' ? 'null' : $arr['ciguria_der'];	
			$id_cual_izq = $arr['id_cual_izq']=='' ? 'null' : $arr['id_cual_izq'];							
			$insert = " update    patologias_neonatales 			
											set ROP_OJO_IZQ = " .$rop_izq." ,					
											ID_LOCALIZACION_OJO_IZQ = " . $localiza_izq." ,
											ID_SEVERIDAD_OJO_IZQ = " .$severidad_izq." ,	
											ENF_PLUS_OJO_IZQ = " .$flus_izq." ,				
											CIRUGIA_ROP_OJO_IZQ = " .$cirugia_izq ." ,	
											ID_TIPO_CIRUGIA_ROP_OJO_IZQ = " .$id_cual_izq." 	
		                         		where ID_NEOCOSUR = ".$arr['ID_NEOCOSUR'].";"; 
										//die;
			$cone->Abrir();						
			$cone->insertUpdateDelete($insert);	

			$cone->Cerrar();		
	}
	else {					
		$rop_der = $arr['rop_izq']=='' ? 'null' : $arr['rop_izq'];
		$localiza_der = $arr['localiza_der']=='' ? 'null' : $arr['localiza_der'];	
		$severidad_der = $arr['severidad_der']=='' ? 'null' : $arr['severidad_der'];
		$flus_der = $arr['flus_der']=='' ? 'null' : $arr['flus_der'];			
		$ciguria_der = $arr['cirugia_izq']=='' ? 'null' : $arr['cirugia_izq'];	
		$id_cual_der = $arr['id_cual_der']=='' ? 'null' : $arr['id_cual_der'];		
		$insert = "	update      patologias_neonatales
										set ROP_OJO_IZQ = " .$rop_der." ,		
											ID_LOCALIZACION_OJO_IZQ = " .$localiza_der." ,	
											ID_SEVERIDAD_OJO_IZQ = " .$severidad_der." ,	
											ENF_PLUS_OJO_IZQ = " . $flus_der." ,			
											CIRUGIA_ROP_OJO_IZQ = " . $ciguria_der." ,	
											ID_TIPO_CIRUGIA_ROP_OJO_IZQ = " .$id_cual_der   ." 		
											where ID_NEOCOSUR = ".$arr['ID_NEOCOSUR'].";";	
				//die;	
			$cone->Abrir();	
			$cone->insertUpdateDelete($insert);
			$cone->Cerrar();	
		}  
	$bandera = true;
	}   
}                       				//var_dump($retorno);				echo "OK";
 	
     
if($bandera){
		echo "OK ";
	}		
else{
		echo "Error en ejecución";	
	}
?>