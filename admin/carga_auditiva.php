<?php

error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';

$cone =  ConexionDAO::get_instance();
 $query ="SELECT ID_PARIDAD , c.ID_CONTROL 
				FROM antecedentes_prenatales";
  $query2=	" select 
		DISTINCT(ID_NEOCOSUR),
		PESQUISA_ANTES_DEL_ALTA ,
		PEAT_AUTOMATIZADOS,
		PEAT_ATOMATIZADOS_NORMAL,
		PEAT_EXTENDIDOS,
		PEAT_EXTENDIDOS_NORMAL,
		EMISIONES_OTOACUSTICAS,
		EMISIONES_OTOACUSTICAS_NORMAL
		from   funcion_auditiva 
			where  
				ID_NEOCOSUR in (select ID_NEOCOSUR from patologias_neonatales) ;";	    
			
$cone->Abrir();		
$arC = $cone->select($query2);	
//$row = $retorno->fetch_assoc();				
$cone->Cerrar();						
while($arC!=null && $arr = $arC->fetch_array())		{			
						
			if($arr['PESQUISA_ANTES_DEL_ALTA']!="null"  || $arr['PESQUISA_ANTES_DEL_ALTA']!=""  )  	{				
			$pesquisa = $arr['PESQUISA_ANTES_DEL_ALTA']=='' ? 'null' : $arr['PESQUISA_ANTES_DEL_ALTA'];							
			$check_pesquisa_alta_1 = $arr['PEAT_AUTOMATIZADOS']=='' ? 'null' : $arr['PEAT_AUTOMATIZADOS'];							
			$pesquisa_alta_1 = $arr['PEAT_ATOMATIZADOS_NORMAL']=='' ? 'null' : $arr['PEAT_ATOMATIZADOS_NORMAL'];							
			$check_pesquisa_alta_2 = $arr['PEAT_EXTENDIDOS']=='' ? 'null' : $arr['PEAT_EXTENDIDOS'];							
			$pesquisa_alta_2 = $arr['PEAT_EXTENDIDOS_NORMAL']=='' ? 'null' : $arr['PEAT_EXTENDIDOS_NORMAL'];							
			$check_pesquisa_alta_3 = $arr['EMISIONES_OTOACUSTICAS']=='' ? 'null' : $arr['EMISIONES_OTOACUSTICAS'];							
			$pesquisa_alta_3 = $arr['EMISIONES_OTOACUSTICAS_NORMAL']=='' ? 'null' : $arr['EMISIONES_OTOACUSTICAS_NORMAL'];							
			$insert = "	update patologias_neonatales
		set
			EVA_PESQUISA = ".$pesquisa.",
			EVA_AUTO =".$check_pesquisa_alta_1." ,
			EVA_AUTO_NOR = ".$pesquisa_alta_1.",
			EVA_EXT = ".$check_pesquisa_alta_2." , 
			EVA_EXT_NOR = ".$pesquisa_alta_2." , 
			EVA_EMI = ".$check_pesquisa_alta_3." , 
			EVA_EMI_NOR = ".$pesquisa_alta_3."  
		    where ID_NEOCOSUR = ".$arr['ID_NEOCOSUR'].";"; 
										//die;
			$cone->Abrir();						
			$cone->insertUpdateDelete($insert);	

			$cone->Cerrar();		
	}
	$bandera=true;

	/*else {					
		$rop_der = $arr['rop_izq']=='' ? 'null' : $arr['rop_izq'];
		$localiza_der = $arr['localiza_izq']=='' ? 'null' : $arr['localiza_izq'];	
		$severidad_der = $arr['severidad_izq']=='' ? 'null' : $arr['severidad_izq'];
		$flus_der = $arr['flus_izq']=='' ? 'null' : $arr['flus_izq'];			
		$ciguria_der = $arr['cirugia_izq']=='' ? 'null' : $arr['cirugia_izq'];	
		$id_cual_der = $arr['id_cual_izq']=='' ? 'null' : $arr['id_cual_izq'];		
		echo "<br>  ".$insert = "	update      funcion_visual
										set ROP_IZQ = " .$rop_der." ,		
											ID_LOCALIZACION_IZQ = " .$localiza_der." ,	
											ID_SEVERIDAD_IZQ = " .$severidad_der." ,	
											ENF_PLUS_IZQ = " . $flus_der." ,			
											CIRUGIA_ROP_IZQ = " . $ciguria_der." ,	
											ID_CIRUGIA_ROP_IZQ = " .$id_cual_der   ." 		
											where ID_CONTROL = ".$arr['id_sgm'].";";	
				//die;	
			$cone->Abrir();	
			$cone->insertUpdateDelete($insert);
			$cone->Cerrar();	
		}   */ 
	}               			                    	                      				//var_dump($retorno);				echo "OK";
 		
	if($bandera){
		echo "OK ";
	}
	else{
		echo "Error en ejecución";	
	}
?>