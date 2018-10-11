<?php

/******************************************************************************
* Class for neocosur.antecedentes_partoDAO
*******************************************************************************/

class antecedentes_partoDAO
{
	private $conexionDao;
	private $id;	
	function __construct($cone)
	{
		$this->conexionDao = $cone;			
	}

	public function setId($id='')
	{
		$this->id = $id;
		return true;
	}

	public function getId()
	{
		return $this->id;
	}
	
	public function guarda($antecedentes_parto)
	{
		$query ="INSERT INTO antecedentes_parto (
			ID_NEOCOSUR ,
			OXIGENO_FLUJO_LIBRE ,
			VENTILACION_MASC ,
			INTUBACION ,
			MASAJE_CARDIACO ,
			ADRENALINA , 
			MLF_MAYOR ,
			MLF_COMPROMETE_VIDA ,
			MLF_NERVIOSO_CENTRAL ,
			MLF_NER_ANE ,
			MLF_NER_MIELO ,
			MLF_NER_HIDRA ,
			MLF_NER_HIDRO ,
			MLF_NER_HOLO ,
			MLF_DEF_CARDIACOS ,
			MLF_CAR_TRON ,
			MLF_CAR_VAS ,
			MLF_CAR_FALL ,
			MLF_CAR_UNI,
			MLF_CAR_DOB ,
			MLF_CAR_CAN ,
			MLF_CAR_ATRE ,
			MLF_CAR_TRI ,
			MLF_CAR_HIPO ,
			MLF_CAR_AORT ,
			MLF_CAR_ANO ,
			MLF_DEF_GASTRO ,
			MLF_GST_PAL ,
			MLF_GST_FIS ,
			MLF_GST_DUO ,
			MLF_GST_YEY ,
			MLF_GST_LLE ,
			MLF_GST_REC ,
			MLF_GST_ANO ,
			MLF_GST_ONF ,
			MLF_GST_GAS ,
			MLF_DEF_URINARIOS ,
			MLF_URI_AGE ,
			MLF_URI_DIS ,
			MLF_URI_URO ,
			MLF_URI_ECT ,
			MLF_DEF_CROMOSOMICA ,
			MLF_CRO_13 ,
			MLF_CRO_18 ,
			MLF_CRO_21 ,
			MLF_OTROS_DEF ,
			MLF_OTR_ESQ ,
			MLF_OTR_HER ,
			MLF_OTR_HID ,
			MLF_OTR_SEC ,
			MLF_OTR_ERR ,
			MLF_OTR_MIO ,
			MALF_OTROS_CUAL,
			SCORE_NEOCOSUR ,
			FALLECE_SALA_PARTO ,
			OBSERVACIONES
		)
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ) " ;

		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		

		$sentencia->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
		$antecedentes_parto->getID_NEOCOSUR(),
		$antecedentes_parto->getOXIGENO_FLUJO_LIBRE(),
		$antecedentes_parto->getVENTILACION_MASC(),
		$antecedentes_parto->getINTUBACION(),
		$antecedentes_parto->getMASAJE_CARDIACO(),
		$antecedentes_parto->getADRENALINA(), 
		$antecedentes_parto->getMLF_MAYOR(),
		$antecedentes_parto->getMLF_COMPROMETE_VIDA(),
		$antecedentes_parto->getMLF_NERVIOSO_CENTRAL(),
		$antecedentes_parto->getMLF_NER_ANE(),
		$antecedentes_parto->getMLF_NER_MIELO(),
		$antecedentes_parto->getMLF_NER_HIDRA(),
		$antecedentes_parto->getMLF_NER_HIDRO(),
		$antecedentes_parto->getMLF_NER_HOLO(),
		$antecedentes_parto->getMLF_DEF_CARDIACOS(),
		$antecedentes_parto->getMLF_CAR_TRON(),
		$antecedentes_parto->getMLF_CAR_VAS(),
		$antecedentes_parto->getMLF_CAR_FALL(),
		$antecedentes_parto->getMLF_CAR_UNI(),
		$antecedentes_parto->getMLF_CAR_DOB(),
		$antecedentes_parto->getMLF_CAR_CAN(),
		$antecedentes_parto->getMLF_CAR_ATRE(),
		$antecedentes_parto->getMLF_CAR_TRI(),
		$antecedentes_parto->getMLF_CAR_HIPO(),
		$antecedentes_parto->getMLF_CAR_AORT(),
		$antecedentes_parto->getMLF_CAR_ANO(),
		$antecedentes_parto->getMLF_DEF_GASTRO(),
		$antecedentes_parto->getMLF_GST_PAL(),
		$antecedentes_parto->getMLF_GST_FIS(),
		$antecedentes_parto->getMLF_GST_DUO(),
		$antecedentes_parto->getMLF_GST_YEY(),
		$antecedentes_parto->getMLF_GST_LLE(),
		$antecedentes_parto->getMLF_GST_REC(),
		$antecedentes_parto->getMLF_GST_ANO(),
		$antecedentes_parto->getMLF_GST_ONF(),
		$antecedentes_parto->getMLF_GST_GAS(),
		$antecedentes_parto->getMLF_DEF_URINARIOS(),
		$antecedentes_parto->getMLF_URI_AGE(),
		$antecedentes_parto->getMLF_URI_DIS(),
		$antecedentes_parto->getMLF_URI_URO(),
		$antecedentes_parto->getMLF_URI_ECT(),
		$antecedentes_parto->getMLF_DEF_CROMOSOMICA(),
		$antecedentes_parto->getMLF_CRO_13(),
		$antecedentes_parto->getMLF_CRO_18(),
		$antecedentes_parto->getMLF_CRO_21(),
		$antecedentes_parto->getMLF_OTROS_DEF(),
		$antecedentes_parto->getMLF_OTR_ESQ(),
		$antecedentes_parto->getMLF_OTR_HER(),
		$antecedentes_parto->getMLF_OTR_HID(),
		$antecedentes_parto->getMLF_OTR_SEC(),
		$antecedentes_parto->getMLF_OTR_ERR(),
		$antecedentes_parto->getMLF_OTR_MIO(),
		$antecedentes_parto->getMALF_OTROS_CUAL(),
		$antecedentes_parto->getSCORE_NEOCOSUR(),
		$antecedentes_parto->getFALLECE_SALA_PARTO(),
		$antecedentes_parto->getOBSERVACIONES()
		);		
 
		$retorno=$sentencia->execute(); 		

		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	public function actualizar($antecedentes_parto)
	{		
		 $query="update antecedentes_parto set 
        OXIGENO_FLUJO_LIBRE  = ? ,
		VENTILACION_MASC = ? ,
		INTUBACION =  ? ,
		MASAJE_CARDIACO= ? ,
		ADRENALINA= ? ,
		MLF_MAYOR= ? ,
		MLF_COMPROMETE_VIDA= ? ,
		MLF_NERVIOSO_CENTRAL= ? ,
		MLF_NER_ANE= ? ,
		MLF_NER_MIELO= ? ,
		MLF_NER_HIDRA= ? ,
		MLF_NER_HIDRO= ? ,
		MLF_NER_HOLO= ? ,
		MLF_DEF_CARDIACOS= ? ,
		MLF_CAR_TRON= ? ,
		MLF_CAR_VAS= ? ,
		MLF_CAR_FALL= ? ,
		MLF_CAR_UNI =  ? ,
		MLF_CAR_DOB= ? ,
		MLF_CAR_CAN= ? ,
		MLF_CAR_ATRE= ? ,
		MLF_CAR_TRI= ? ,
		MLF_CAR_HIPO= ? ,
		MLF_CAR_AORT= ? ,
		MLF_CAR_ANO= ? ,
		MLF_DEF_GASTRO= ? ,
		MLF_GST_PAL= ? ,
		MLF_GST_FIS= ? ,
		MLF_GST_DUO= ? ,
		MLF_GST_YEY= ? ,
		MLF_GST_LLE= ? ,
		MLF_GST_REC= ? ,
		MLF_GST_ANO= ? ,
		MLF_GST_ONF= ? ,
		MLF_GST_GAS= ? ,
		MLF_DEF_URINARIOS= ? ,
		MLF_URI_AGE= ? ,
		MLF_URI_DIS= ? ,
		MLF_URI_URO= ? ,
		MLF_URI_ECT= ? ,
		MLF_DEF_CROMOSOMICA= ? ,
		MLF_CRO_13= ? ,
		MLF_CRO_18= ? ,
		MLF_CRO_21= ? ,
		MLF_OTROS_DEF= ? ,
		MLF_OTR_ESQ=  ? ,
		MLF_OTR_HER= ? ,
		MLF_OTR_HID= ? ,
		MLF_OTR_SEC=  ? ,
		MLF_OTR_ERR= ? ,
		MLF_OTR_MIO= ? ,
		MALF_OTROS_CUAL= ? ,
		SCORE_NEOCOSUR=  ? ,
		FALLECE_SALA_PARTO= ? ,
		OBSERVACIONES= ? 
		WHERE ID_NEOCOSUR= ? ";
		
        $this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		

		$sentencia->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
		$antecedentes_parto->getOXIGENO_FLUJO_LIBRE(),
		$antecedentes_parto->getVENTILACION_MASC(),
		$antecedentes_parto->getINTUBACION(),
		$antecedentes_parto->getMASAJE_CARDIACO(),
		$antecedentes_parto->getADRENALINA(), 
		$antecedentes_parto->getMLF_MAYOR(),
		$antecedentes_parto->getMLF_COMPROMETE_VIDA(),
		$antecedentes_parto->getMLF_NERVIOSO_CENTRAL(),
		$antecedentes_parto->getMLF_NER_ANE(),
		$antecedentes_parto->getMLF_NER_MIELO(),
		$antecedentes_parto->getMLF_NER_HIDRA(),
		$antecedentes_parto->getMLF_NER_HIDRO(),
		$antecedentes_parto->getMLF_NER_HOLO(),
		$antecedentes_parto->getMLF_DEF_CARDIACOS(),
		$antecedentes_parto->getMLF_CAR_TRON(),
		$antecedentes_parto->getMLF_CAR_VAS(),
		$antecedentes_parto->getMLF_CAR_FALL(),
		$antecedentes_parto->getMLF_CAR_UNI(),
		$antecedentes_parto->getMLF_CAR_DOB(),
		$antecedentes_parto->getMLF_CAR_CAN(),
		$antecedentes_parto->getMLF_CAR_ATRE(),
		$antecedentes_parto->getMLF_CAR_TRI(),
		$antecedentes_parto->getMLF_CAR_HIPO(),
		$antecedentes_parto->getMLF_CAR_AORT(),
		$antecedentes_parto->getMLF_CAR_ANO(),
		$antecedentes_parto->getMLF_DEF_GASTRO(),
		$antecedentes_parto->getMLF_GST_PAL(),
		$antecedentes_parto->getMLF_GST_FIS(),
		$antecedentes_parto->getMLF_GST_DUO(),
		$antecedentes_parto->getMLF_GST_YEY(),
		$antecedentes_parto->getMLF_GST_LLE(),
		$antecedentes_parto->getMLF_GST_REC(),
		$antecedentes_parto->getMLF_GST_ANO(),
		$antecedentes_parto->getMLF_GST_ONF(),
		$antecedentes_parto->getMLF_GST_GAS(),
		$antecedentes_parto->getMLF_DEF_URINARIOS(),
		$antecedentes_parto->getMLF_URI_AGE(),
		$antecedentes_parto->getMLF_URI_DIS(),
		$antecedentes_parto->getMLF_URI_URO(),
		$antecedentes_parto->getMLF_URI_ECT(),
		$antecedentes_parto->getMLF_DEF_CROMOSOMICA(),
		$antecedentes_parto->getMLF_CRO_13(),
		$antecedentes_parto->getMLF_CRO_18(),
		$antecedentes_parto->getMLF_CRO_21(),
		$antecedentes_parto->getMLF_OTROS_DEF(),
		$antecedentes_parto->getMLF_OTR_ESQ(),
		$antecedentes_parto->getMLF_OTR_HER(),
		$antecedentes_parto->getMLF_OTR_HID(),
		$antecedentes_parto->getMLF_OTR_SEC(),
		$antecedentes_parto->getMLF_OTR_ERR(),
		$antecedentes_parto->getMLF_OTR_MIO(),
		$antecedentes_parto->getMALF_OTROS_CUAL(),
		$antecedentes_parto->getSCORE_NEOCOSUR(),
		$antecedentes_parto->getFALLECE_SALA_PARTO(),
		$antecedentes_parto->getOBSERVACIONES(),		
		$antecedentes_parto->getID_NEOCOSUR()
		);		
	
		$retorno=$sentencia->execute(); 		
		$this->conexionDao->Cerrar();
		return $retorno;	
	}
	
	
	public function  buscarId($id)
	{
		$query = "select  *  from antecedentes_parto WHERE ID_NEOCOSUR= ? ;";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	
	
}