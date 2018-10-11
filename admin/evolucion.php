<?php
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';

$cone = new ConexionDAO();
$cone =  ConexionDAO::get_instance();

$query =" SELECT  `ID_NEOCOSUR`,CATETER_PRECUTANEO_HORAS,CATETER_PERCUTANEO_DIAS FROM `evolucion_tratamiento2`  ;  ";
 	
$cone->Abrir();		
$arC = $cone->select($query);	 			
$cone->Cerrar();						
while($arC!=null && $arr = $arC->fetch_array())		{			
							
		// if($arr['ID_PARIDAD']!="null"  )  	{				
			$idNeocosur = $arr['ID_NEOCOSUR']=='' ? 'null' : $arr['ID_NEOCOSUR'];							
			$dias = $arr['CATETER_PERCUTANEO_DIAS']=='' ? 'null' : $arr['CATETER_PERCUTANEO_DIAS'];							
			$horas = $arr['CATETER_PRECUTANEO_HORAS']=='' ? 'null' : $arr['CATETER_PRECUTANEO_HORAS'];							
			echo "<br> ".$insert = " update    evolucion_tratamiento			
											set 
											CATETER_PERCUTANEO_DIAS = " .$dias.", 
											CATETER_PRECUTANEO_HORAS = " .$dias."
		                         		where ID_NEOCOSUR = ".$arr['ID_NEOCOSUR']."; ";  
			//$cone->Abrir();						
			//$cone->insertUpdateDelete($insert);	
			//$cone->Cerrar();		
	 // }
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
	} 
/*	//var_dump($retorno);				echo "OK";
 	if($bandera){
		echo "OK ";
	}	
	else{
		echo "Error en ejecución";	
	}
	*/
?>