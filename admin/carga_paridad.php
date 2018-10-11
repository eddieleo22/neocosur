<?php
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';

$cone = new ConexionDAO();
$cone =  ConexionDAO::get_instance();
 $query ="SELECT ID_PARIDAD , c.ID_CONTROL 
				FROM antecedentes_prenatales";
 $query2=	" SELECT ap.ID_PARIDAD,ap.ID_NEOCOSUR, c.ID_CONTROL FROM antecedentes_prenatales as ap			
			inner join  control   c on   c.ID_NEOCOSUR=ap.ID_NEOCOSUR 
				   inner join antecedentes_connatales  as pt  on c.ID_CONTROL= pt.ID_CONTROL ;";		
$cone->Abrir();		
$arC = $cone->select($query2);	
//$row = $retorno->fetch_assoc();				
$cone->Cerrar();						
while($arC!=null && $arr = $arC->fetch_array())		{			
							
			if($arr['ID_PARIDAD']!="null"  )  	{				
			$paridad = $arr['ID_PARIDAD']=='' ? 'null' : $arr['ID_PARIDAD'];							
			$insert = " update    antecedentes_connatales 			
											set ID_PARIDAD = " .$paridad." 
		                         		where ID_CONTROL = ".$arr['ID_CONTROL'].";"; 
										//die;
			$cone->Abrir();						
			$cone->insertUpdateDelete($insert);	

			$cone->Cerrar();		
	}
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
		$bandera=true;
	}               			                    	                      				//var_dump($retorno);				echo "OK";
 	if($bandera){
		echo "OK ";
	}	
	else{
		echo "Error en ejecución";	
	}
?>