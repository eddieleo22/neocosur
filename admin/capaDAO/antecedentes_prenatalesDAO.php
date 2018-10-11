<?php

/******************************************************************************
* Class for neocosur.antecedentes_prenatalesDAO
*******************************************************************************/

class antecedentes_prenatalesDAO 
{
	private $conexionDao;
	private $id;	
	function __construct($con)
	{
		$this->conexionDao = $con;			
	}
        function __destruct() {
             $this->conexionDao =null;
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

	
	public function guarda($antecedentes_prenatales)
	{
          
           
		 $query ="INSERT INTO antecedentes_prenatales ( 
		`ID_NEOCOSUR`,
		`EDAD_MATERNA`,
        `ANIO_ESCOLARIDAD`,
		`ID_NIVEL_EDUCACION`,
		`CONTROL_EMBARAZO`,
		`GEST_PRIMER_CONTROL`,
		`DIABETES`,
		`DIABETES_GESTACIONAL`,
		`ID_PARIDAD`,
		`TABAQUISMO`,
		`HIPERTENSION_ARTERIAL`,
		`HIPERTENSION_EMBARAZO`,
		`MEDICAMENTOS`,
		`MULTIPLE`,
		`ID_MULTIPLE_LUGAR`,
		`RETARDO_CREC_INTRA_UTERINO`,
		`ANTIBIOTICO_PRENATAL`,
		`RUPTURA_PRE_MEMBRANA_DIAS`,
		`RUPTURA_PRE_MEMBRANA_HORAS`,
		`CORTICOIDE_PRENATAL`,
		`CORTICOIDE_PRENATAL_CURSO_INCOM`,
		`CORTICOIDE_PRENATAL_UN_CURSO`,
		`CORIOAMNIONITIS`,
		`SULFATO_MG`,
		`SULFATO_MG_NEURO`,
		`ALTERACION_DOPLER_FETAL`,
		`FLUJO_REVERSO_VENA_UMBILICAL`,
		`DUCTUS_VENOSO_ALTERADO`,
		`DILATACION_CEREBRAL_MEDIA`,
		`OTRA_ALTERACION`,
		`OBSERVACIONES_PRENATALES`
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
	
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);	
		$sentencia->bind_param("sssssssssssssssssssssssssssssss", 
		$antecedentes_prenatales->ID_NEOCOSUR ,
		$antecedentes_prenatales->EDAD_MATERNA ,
		$antecedentes_prenatales->ANIO_ESCOLARIDAD ,
		$antecedentes_prenatales->ID_NIVEL_EDUCACION,
		$antecedentes_prenatales->CONTROL_EMBARAZO ,
		$antecedentes_prenatales->GEST_PRIMER_CONTROL,
		$antecedentes_prenatales->DIABETES ,
		$antecedentes_prenatales->DIABETES_GESTACIONAL,
		$antecedentes_prenatales->ID_PARIDAD ,
		$antecedentes_prenatales->TABAQUISMO ,
		$antecedentes_prenatales->HIPERTENSION_ARTERIAL ,
		$antecedentes_prenatales->HIPERTENSION_EMBARAZO,
		$antecedentes_prenatales->HIPERTENSION_MEDICAMENTOS,
		$antecedentes_prenatales->MULTIPLE,
		$antecedentes_prenatales->ID_MULTIPLE_LUGAR ,
		$antecedentes_prenatales->RETARDO_CREC_INTRA_UTERINO ,
		$antecedentes_prenatales->ANTIBIOTICO_PRENATAL,		
		$antecedentes_prenatales->RUPTURA_PRE_MEMBRANA_DIAS,		
		$antecedentes_prenatales->RUPTURA_PRE_MEMBRANA_HORAS,		
		$antecedentes_prenatales->CORTICOIDE_PRENATAL,		
		$antecedentes_prenatales->CORTICOIDE_PRENATAL_CURSO_INCOMPLETO,	
		$antecedentes_prenatales->CORTICOIDE_PRENATAL_UN_CURSO,	
		$antecedentes_prenatales->CORIOAMNIONITIS,	
		$antecedentes_prenatales->SULFATO_MG,	
		$antecedentes_prenatales->SULFATO_MG_NEURO,
		$antecedentes_prenatales->ALTERACION_DOPLER_FETAL,
		$antecedentes_prenatales->FLUJO_REVERSO_VENA_UMBILICAL,
		$antecedentes_prenatales->DUCTUS_VENOSO_ALTERADO,
		$antecedentes_prenatales->DILATACION_CEREBRAL_MEDIA,
		$antecedentes_prenatales->OTRA_ALTERACION,
		$antecedentes_prenatales->OBSERVACIONES_PRENATALES	
		);	
 
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno; 
	}


	public function actualizar($antecedentes_prenatales)
	{
		  $query ="UPDATE antecedentes_prenatales SET  
				`EDAD_MATERNA`= ? ,
				`ANIO_ESCOLARIDAD`= ? ,
				`ID_NIVEL_EDUCACION`= ? ,
				`CONTROL_EMBARAZO`= ? ,
				`GEST_PRIMER_CONTROL`= ? ,
				`DIABETES`= ? ,
				`DIABETES_GESTACIONAL`= ? ,
				`ID_PARIDAD`= ? ,
				`TABAQUISMO`= ? ,
				`HIPERTENSION_ARTERIAL`= ? ,
				`HIPERTENSION_EMBARAZO`=? ,
				`MEDICAMENTOS`= ? ,
				`MULTIPLE`= ? ,
				`ID_MULTIPLE_LUGAR`= ? ,
				`RETARDO_CREC_INTRA_UTERINO`= ? ,
				`ANTIBIOTICO_PRENATAL`= ? ,
				`RUPTURA_PRE_MEMBRANA_DIAS`= ? ,
				`RUPTURA_PRE_MEMBRANA_HORAS`= ? ,
				`CORTICOIDE_PRENATAL`= ? ,
				`CORTICOIDE_PRENATAL_CURSO_INCOM`= ? ,
				`CORTICOIDE_PRENATAL_UN_CURSO`= ? ,
				`CORIOAMNIONITIS`= ? ,
				`SULFATO_MG`= ? ,
				`SULFATO_MG_NEURO`= ? ,
				`ALTERACION_DOPLER_FETAL`= ? ,
				`FLUJO_REVERSO_VENA_UMBILICAL`= ? ,
				`DUCTUS_VENOSO_ALTERADO`= ? ,
				`DILATACION_CEREBRAL_MEDIA`= ? ,
				`OTRA_ALTERACION`= ? , 
				`OBSERVACIONES_PRENATALES`= ? 
					where `ID_NEOCOSUR`= ? "; 
         $this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);	
		$sentencia->bind_param("sssssssssssssssssssssssssssssss", 
		$antecedentes_prenatales->EDAD_MATERNA ,
		$antecedentes_prenatales->ANIO_ESCOLARIDAD ,
		$antecedentes_prenatales->ID_NIVEL_EDUCACION,
		$antecedentes_prenatales->CONTROL_EMBARAZO ,
		$antecedentes_prenatales->GEST_PRIMER_CONTROL,
		$antecedentes_prenatales->DIABETES ,
		$antecedentes_prenatales->DIABETES_GESTACIONAL,
		$antecedentes_prenatales->ID_PARIDAD ,
		$antecedentes_prenatales->TABAQUISMO ,
		$antecedentes_prenatales->HIPERTENSION_ARTERIAL ,
		$antecedentes_prenatales->HIPERTENSION_EMBARAZO,
		$antecedentes_prenatales->HIPERTENSION_MEDICAMENTOS,
		$antecedentes_prenatales->MULTIPLE,
		$antecedentes_prenatales->ID_MULTIPLE_LUGAR ,
		$antecedentes_prenatales->RETARDO_CREC_INTRA_UTERINO ,
		$antecedentes_prenatales->ANTIBIOTICO_PRENATAL,		
		$antecedentes_prenatales->RUPTURA_PRE_MEMBRANA_DIAS,		
		$antecedentes_prenatales->RUPTURA_PRE_MEMBRANA_HORAS,		
		$antecedentes_prenatales->CORTICOIDE_PRENATAL,		
		$antecedentes_prenatales->CORTICOIDE_PRENATAL_CURSO_INCOMPLETO,	
		$antecedentes_prenatales->CORTICOIDE_PRENATAL_UN_CURSO,	
		$antecedentes_prenatales->CORIOAMNIONITIS,	
		$antecedentes_prenatales->SULFATO_MG,	
		$antecedentes_prenatales->SULFATO_MG_NEURO,
		$antecedentes_prenatales->ALTERACION_DOPLER_FETAL,
		$antecedentes_prenatales->FLUJO_REVERSO_VENA_UMBILICAL,
		$antecedentes_prenatales->DUCTUS_VENOSO_ALTERADO,
		$antecedentes_prenatales->DILATACION_CEREBRAL_MEDIA,
		$antecedentes_prenatales->OTRA_ALTERACION,
		$antecedentes_prenatales->OBSERVACIONES_PRENATALES	,		
		$antecedentes_prenatales->ID_NEOCOSUR 
		);	
	
		$retorno=$sentencia->execute(); 
 
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	

	public function buscarId($id)
	{
		$query = "SELECT * FROM antecedentes_prenatales WHERE `ID_NEOCOSUR`= ? ;";
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