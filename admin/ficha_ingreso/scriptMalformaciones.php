<?php
//error_reporting(0);


include '../capaDAO/ConexionDAO.php';
//include 'ayuda.php';

//var_dump($cone);
//echo 'asdasda '.$id;
$cone = new ConexionDAO();

$query = "select  *  from antecedentes_parto ";
		//echo $query;
		
$cone->Abrir();
$resultado = $cone->select($query);			
//$row = $resultado->fetch_assoc();					
$cone->Cerrar();

;

/*
$ar = $row;
//echo "<br><br><br>";


  $malformacion=$ar['MLF_MAYOR'];
  $compromete=$ar['MLF_COMPROMETE_VIDA'];
	$sistema_nervioso=$ar['MLF_NERVIOSO_CENTRAL'];
	$anecefalia=$ar['MLF_NER_ANE'];
	$mielo=$ar['MLF_NER_MIELO'];
	$hidranencefalia=$ar['MLF_NER_HIDRA'];
	$hidrocefalia=$ar['MLF_NER_HIDRO'];
	$holo=$ar['MLF_NER_HOLO'];
  $cardiacos=$ar['MLF_DEF_CARDIACOS'];
	$tronco=$ar['MLF_CAR_TRON'];
	$transposicion=$ar['MLF_CAR_VAS'];
	$fallot=$ar['MLF_CAR_FALL'];
	$ventriculo_unico=$ar['MLF_CAR_UNI'];
	$doble_ventriculo_derecho=$ar['MLF_CAR_DOB'];
	$canal_atrio=$ar['MLF_CAR_CAN'];
	$atresia_pulmonar=$ar['MLF_CAR_ATRE'];
	$atresia_tricuspide=$ar['MLF_CAR_TRI'];
	$hipoplasia=$ar['MLF_CAR_HIPO'];
	$interrupcion=$ar['MLF_CAR_AORT'];
	$anomalia_retorno=$ar['MLF_CAR_ANO'];
  $gastrointestinales=$ar['MLF_DEF_GASTRO'];
	$fisura_paladar=$ar['MLF_GST_PAL'];
	$fistula=$ar['MLF_GST_FIS'];
	$atresia_duodenal=$ar['MLF_GST_DUO'];
	$atresia_yeyunal=$ar['MLF_GST_YEY'];
	$atresia_ileal=$ar['MLF_GST_LLE'];
	$atresia_intestino=$ar['MLF_GST_REC'];
	$ano_imperforado=$ar['MLF_GST_ANO'];
	$onfalocele=$ar['MLF_GST_ONF'];
	$gastrosquisis=$ar['MLF_GST_GAS'];
  $genitourinarios=$ar['MLF_DEF_URINARIOS'];
	$agenesia=$ar['MLF_URI_AGE'];
	$renal=$ar['MLF_URI_DIS'];
	$uropatia=$ar['MLF_URI_URO'];
	$ectrofia_vesical=$ar['MLF_URI_ECT'];
  $cromosomica=$ar['MLF_DEF_CROMOSOMICA'];
	$trisomia_13=$ar['MLF_CRO_13'];
	$trisomia_18=$ar['MLF_CRO_18'];
	$trisomia_21=$ar['MLF_CRO_21'];
  $otro_defecto=$ar['MLF_OTROS_DEF'];
	$displasia_esqueletica=$ar['MLF_OTR_ESQ'];
	$hernia=$ar['MLF_OTR_HER'];
	$hidrops=$ar['MLF_OTR_HID'];
	$potter=$ar['MLF_OTR_SEC'];
	$errores_congenitas=$ar['MLF_OTR_ERR'];
	$distrofia_miotonica=$ar['MLF_OTR_MIO'];
	$cual_defecto=$ar['MALF_OTROS_CUAL'];*/
	
	while($resultado!=null && $arr = $resultado->fetch_array())
	{	
			echo" <br> CONGENITA --> ".$arr['MLF_MAYOR'];
		if($arr['MLF_MAYOR']=='' || $arr['MLF_MAYOR']==null){
			echo"  CONGENITA --> ".$arr['MLF_COMPROMETE_VIDA']." - ".$arr['MLF_DEF_CARDIACOS']." - ".$arr['MLF_DEF_GASTRO']." - ".
			$arr['MLF_DEF_URINARIOS']." - ".$arr['MLF_DEF_CROMOSOMICA']." - ".$arr['MLF_OTROS_DEF'];
			;
			if($arr['MLF_COMPROMETE_VIDA']!='' || $arr['MLF_DEF_CARDIACOS']!='' || $arr['MLF_DEF_GASTRO']!='' 
				|| $arr['MLF_DEF_URINARIOS']!='' || $arr['MLF_DEF_CROMOSOMICA']!='' || $arr['MLF_OTROS_DEF']!=''
			){
				echo $query ="update antecedentes_parto set MLF_MAYOR=1 ";
			}
			
		}
	}
	
	
	
?>
