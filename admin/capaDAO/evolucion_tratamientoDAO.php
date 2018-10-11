<?php

/******************************************************************************
* Class for neocosur.evolucion_tratamientoDAO
*******************************************************************************/

class evolucion_tratamientoDAO
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
	
	
	
	public function guarda($evolucion_tratamiento)
	{
		 $query ="INSERT INTO evolucion_tratamiento (
		`ID_NEOCOSUR`,
		`VM_CONVENCIONAL`,
		`VM_CONVENCIONAL_HORAS`,
		`VM_CONVENCIONAL_DIAS`,
		`VM_CONVENCIONAL_INGRESO`,
		`VM_CONVENCIONAL_TERAPIA_SDR`,
		`VM_CONVENCIONAL_OTRO`,
		`VM_ALTA_FRECUENCIA`,
		`VM_ALTA_FRECUENCIA_HORAS`,
		`VM_ALTA_FRECUENCIA_DIAS`,
		`USO_OXIGENO`,
		`USO_OXIGENO_HORAS`,
		`USO_OXIGENO_DIAS`,
		`CPAP`,
		`CPAP_HORAS`,
		`CPAP_DIAS`,
		`CPAP_TRATAMIENTO_`,
		`CPAP_TRAT_INICIO_SDR`,
		`CPAP_POST_EXTUBACION`,
		`CPAP_TRATAMIENTO_APNEA`,
		`VENTILACION_NASAL_NO_INVASIVA`,
		`VENTILACION_NASAL_NO_INVASIVA_HORAS`,
		`VENTILACION_NASAL_NO_INVASIVA_DIAS`,
		`VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR`,
		`VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION`,
		`VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA`, 
		`RECIBE_SURFACTANTE`,
		`RECIBE_SURFACTANTE_PROFILACTICO`,
		`RECIBE_SURFACTANTE_SELECTIVO`,
		`RECIBE_SURFACTANTE_INSURE`,
		`RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS`,
		`RECIBE_SURFACTANTE_CANTIDAD_DOSIS`,
		`PARACETAMOL`,
		`INDOMETACINA`,
		`INDOMETACINA_PROFILACTICO`,
		`INDOMETACINA_TRATAMIENTO`,
		`IBUPROFENO`,
		`CORTICOIDES_POST_NATAL`,
		`NUMERO_TRANSFUSIONES`,
		`ANTIBIOTICO_MENOR_72_HORAS`,
		`NUMERO_CURSOS_ANTIBIOTICOS`,
		`ERITROPOYETINA`,
		`TRATAMIENTO_APNEA`,
		`TRATAMIENTO_APNEA_CAFEINA`,
		`TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA`,
		`OXIDO_NITRICO`,
		`EG_POST_NATAL_TERMINO_XANTINAS`,
		`CATETERES_`,
		`CATETER_ARETERIA_UMBILICAL_HORAS`,
		`CATETER_ARTERIA_UMBILICAL_DIAS`,
		`CATETER_VENA_UMBILCAL`,
		`CATETER_VENA_UMBILICAL_HORAS`,
		`CATETER_VENA_UMBILICAL_DIAS`,
		`CATETER_VENOSO_CENTRAL`,
		`CATETER_VENOSO_CENTRAL_HORAS`,
		`CATETER_VENOSO_CENTRAL_DIAS`,
		`CATETER_PRECUTANEO`,
		`CATETER_PRECUTANEO_HORAS`,
		`CATETER_PERCUTANEO_DIAS`,
		`ALIMENTACION_PARENTAL_TOTAL_DIAS`,
		`ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS`,
		`INICIO_AMINOACIDOS_EDAD_DIAS`,
		`ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS`,
		`INIC`,
		`FORTIFICANTE_LECHE_MATERNA`,
		`LECHE_MATERNA_HOSPITALIZACION`,
		`LECHE_DONADA`,
		`LECHE_MADRE`,
		`LECHE_MAT_HOSP_`,
		`LECHE_MAT_HOSP_FORMULA_14_DIAS`,
		`LECHE_MAT_HOSP_FORMULA_28_DIAS`,
		`LECHE_MAT_HOSP_FORMULA_36_SEM`,
		`LECHE_MAT_`,
		`LECHE_MAT_HOSP_14_DIAS`,
		`LECHE_MAT_HOSP_28_DIAS`,
		`LECHE_MAT_HOSP_36_SEM`,
		`OBSERVACION_EVAL_TRATAMIENTO`
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ) ";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
		$evolucion_tratamiento->ID_NEOCOSUR,
		$evolucion_tratamiento->VM_CONVENCIONAL,
		$evolucion_tratamiento->VM_CONVENCIONAL_HORAS,
		$evolucion_tratamiento->VM_CONVENCIONAL_DIAS,
		$evolucion_tratamiento->VM_CONVENCIONAL_INGRESO,
		$evolucion_tratamiento->VM_CONVENCIONAL_TERAPIA_SDR,
		$evolucion_tratamiento->VM_CONVENCIONAL_OTRO,
		$evolucion_tratamiento->VM_ALTA_FRECUENCIA,
		$evolucion_tratamiento->VM_ALTA_FRECUENCIA_HORAS,
		$evolucion_tratamiento->VM_ALTA_FRECUENCIA_DIAS,
		$evolucion_tratamiento->USO_OXIGENO,
		$evolucion_tratamiento->USO_OXIGENO_HORAS,
		$evolucion_tratamiento->USO_OXIGENO_DIAS,
		$evolucion_tratamiento->CPAP,
		$evolucion_tratamiento->CPAP_HORAS,
		$evolucion_tratamiento->CPAP_DIAS,
		$evolucion_tratamiento->CPAP_TRATAMIENTO_,
		$evolucion_tratamiento->CPAP_TRAT_INICIO_SDR,
		$evolucion_tratamiento->CPAP_POST_EXTUBACION,
		$evolucion_tratamiento->CPAP_TRATAMIENTO_APNEA,
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA,
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_HORAS,
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_DIAS,  
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR,  
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION,  
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA,    
		$evolucion_tratamiento->RECIBE_SURFACTANTE,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_PROFILACTICO,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_SELECTIVO,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_INSURE,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_CANTIDAD_DOSIS,
		$evolucion_tratamiento->PARACETAMOL,
		$evolucion_tratamiento->INDOMETACINA,
		$evolucion_tratamiento->INDOMETACINA_PROFILACTICO,
		$evolucion_tratamiento->INDOMETACINA_TRATAMIENTO,
		$evolucion_tratamiento->IBUPROFENO,
		$evolucion_tratamiento->CORTICOIDES_POST_NATAL,
		$evolucion_tratamiento->NUMERO_TRANSFUSIONES,
		$evolucion_tratamiento->ANTIBIOTICO_MENOR_72_HORAS,
		$evolucion_tratamiento->NUMERO_CURSOS_ANTIBIOTICOS,
		$evolucion_tratamiento->ERITROPOYETINA,
		$evolucion_tratamiento->TRATAMIENTO_APNEA,
		$evolucion_tratamiento->TRATAMIENTO_APNEA_CAFEINA,
		$evolucion_tratamiento->TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA,
		$evolucion_tratamiento->OXIDO_NITRICO,
		$evolucion_tratamiento->EG_POST_NATAL_TERMINO_XANTINAS,
		$evolucion_tratamiento->CATETERES_,
		$evolucion_tratamiento->CATETER_ARETERIA_UMBILICAL_HORAS,
		$evolucion_tratamiento->CATETER_ARTERIA_UMBILICAL_DIAS,
		$evolucion_tratamiento->CATETER_VENA_UMBILCAL,
		$evolucion_tratamiento->CATETER_VENA_UMBILICAL_HORAS,
		$evolucion_tratamiento->CATETER_VENA_UMBILICAL_DIAS,
		$evolucion_tratamiento->CATETER_VENOSO_CENTRAL,
		$evolucion_tratamiento->CATETER_VENOSO_CENTRAL_HORAS,
		$evolucion_tratamiento->CATETER_VENOSO_CENTRAL_DIAS,
		$evolucion_tratamiento->CATETER_PRECUTANEO,
		$evolucion_tratamiento->CATETER_PRECUTANEO_HORAS,
		$evolucion_tratamiento->CATETER_PERCUTANEO_DIAS,
		$evolucion_tratamiento->ALIMENTACION_PARENTAL_TOTAL_DIAS,
		$evolucion_tratamiento->ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS,
		$evolucion_tratamiento->INICIO_AMINOACIDOS_EDAD_DIAS,
		$evolucion_tratamiento->ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS,
		$evolucion_tratamiento->INIC,
		$evolucion_tratamiento->FORTIFICANTE_LECHE_MATERNA,
		$evolucion_tratamiento->LECHE_MATERNA_HOSPITALIZACION,
		$evolucion_tratamiento->LECHE_DONADA,
		$evolucion_tratamiento->LECHE_MADRE,
		$evolucion_tratamiento->LECHE_MAT_HOSP_,
		$evolucion_tratamiento->LECHE_MAT_HOSP_FORMULA_14_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_FORMULA_28_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_FORMULA_36_SEM,
		$evolucion_tratamiento->LECHE_MAT_,
		$evolucion_tratamiento->LECHE_MAT_HOSP_14_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_28_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_36_SEM,
		$evolucion_tratamiento->OBSERVACION_EVAL_TRATAMIENTO
		);
 
		$retorno=$sentencia->execute();  
		$this->conexionDao->Cerrar();
		return $retorno;
	}
		
		
		
		
	public function actualizar($evolucion_tratamiento)
	{
			$query = "UPDATE evolucion_tratamiento SET 
				`VM_CONVENCIONAL` =  ? ,
				`VM_CONVENCIONAL_HORAS` = ? ,
				`VM_CONVENCIONAL_DIAS` =  ? ,
				`VM_CONVENCIONAL_INGRESO` =  ? ,
				`VM_CONVENCIONAL_TERAPIA_SDR` =  ? ,
				`VM_CONVENCIONAL_OTRO` =  ? ,
				`VM_ALTA_FRECUENCIA` =  ? ,
				`VM_ALTA_FRECUENCIA_HORAS` =  ? ,
				`VM_ALTA_FRECUENCIA_DIAS` =  ? ,
				`USO_OXIGENO` =  ? ,
				`USO_OXIGENO_HORAS` =  ? ,
				`USO_OXIGENO_DIAS` =  ? ,
				`CPAP` =  ? ,
				`CPAP_HORAS` =  ? ,
				`CPAP_DIAS` =  ? ,
				`CPAP_TRATAMIENTO_` =  ? ,
				`CPAP_TRAT_INICIO_SDR` =  ? ,				
				`CPAP_POST_EXTUBACION` =  ? ,
				`CPAP_TRATAMIENTO_APNEA` =  ? ,
				`VENTILACION_NASAL_NO_INVASIVA` =  ? ,
				`VENTILACION_NASAL_NO_INVASIVA_HORAS` =  ? ,
				`VENTILACION_NASAL_NO_INVASIVA_DIAS` =  ? , 
				`VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR` =  ? , 
				`VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION` =  ? , 
				`VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA` =  ? , 
				`RECIBE_SURFACTANTE` =  ? ,
				`RECIBE_SURFACTANTE_PROFILACTICO` =  ? ,
				`RECIBE_SURFACTANTE_SELECTIVO` =  ? ,
				`RECIBE_SURFACTANTE_INSURE` =  ? ,
				`RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS` =  ? ,
				`RECIBE_SURFACTANTE_CANTIDAD_DOSIS` =  ? ,
				`PARACETAMOL` =  ? ,
				`INDOMETACINA` =  ? ,
				`INDOMETACINA_PROFILACTICO` =  ? ,
				`INDOMETACINA_TRATAMIENTO` =  ? ,
				`IBUPROFENO` =  ? ,
				`CORTICOIDES_POST_NATAL` =  ? ,
				`NUMERO_TRANSFUSIONES` =  ? ,
				`ANTIBIOTICO_MENOR_72_HORAS` =  ? ,
				`NUMERO_CURSOS_ANTIBIOTICOS` =  ? ,
				`ERITROPOYETINA` =  ? ,
				`TRATAMIENTO_APNEA` =  ? ,
				`TRATAMIENTO_APNEA_CAFEINA` =  ? ,
				`TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA` =  ? ,
				`OXIDO_NITRICO` =  ? ,
				`EG_POST_NATAL_TERMINO_XANTINAS` =  ? ,
				`CATETERES_` =  ? ,
				`CATETER_ARETERIA_UMBILICAL_HORAS` =  ? ,
				`CATETER_ARTERIA_UMBILICAL_DIAS` =  ? ,
				`CATETER_VENA_UMBILCAL` =  ? ,
				`CATETER_VENA_UMBILICAL_HORAS` =  ? ,
				`CATETER_VENA_UMBILICAL_DIAS` =  ? ,
				`CATETER_VENOSO_CENTRAL` =  ? ,
				`CATETER_VENOSO_CENTRAL_HORAS` =  ? ,
				`CATETER_VENOSO_CENTRAL_DIAS` =  ? ,
				`CATETER_PRECUTANEO` =  ? ,
				`CATETER_PRECUTANEO_HORAS` =  ? ,
				`CATETER_PERCUTANEO_DIAS` =  ? ,
				`ALIMENTACION_PARENTAL_TOTAL_DIAS` =  ? ,
				`ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS` =  ? ,
				`INICIO_AMINOACIDOS_EDAD_DIAS` =  ? ,
				`ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS` =  ? ,
				`INIC` =  ? ,
				`FORTIFICANTE_LECHE_MATERNA` =  ? ,
				`LECHE_MATERNA_HOSPITALIZACION` =  ? ,
				`LECHE_DONADA` =  ? ,
				`LECHE_MADRE` =  ? ,				
				`LECHE_MAT_HOSP_` =  ? ,
				`LECHE_MAT_HOSP_FORMULA_14_DIAS` =  ? ,
				`LECHE_MAT_HOSP_FORMULA_28_DIAS` =  ? ,
				`LECHE_MAT_HOSP_FORMULA_36_SEM` =  ? ,
				`LECHE_MAT_` =  ? ,
				`LECHE_MAT_HOSP_14_DIAS` =  ? ,
				`LECHE_MAT_HOSP_28_DIAS` =  ? ,
				`LECHE_MAT_HOSP_36_SEM` =  ? ,
				`OBSERVACION_EVAL_TRATAMIENTO` =  ? 				
				WHERE `ID_NEOCOSUR`= ? ; ";
				
	$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
		$evolucion_tratamiento->VM_CONVENCIONAL,
		$evolucion_tratamiento->VM_CONVENCIONAL_HORAS,
		$evolucion_tratamiento->VM_CONVENCIONAL_DIAS,
		$evolucion_tratamiento->VM_CONVENCIONAL_INGRESO,
		$evolucion_tratamiento->VM_CONVENCIONAL_TERAPIA_SDR,
		$evolucion_tratamiento->VM_CONVENCIONAL_OTRO,
		$evolucion_tratamiento->VM_ALTA_FRECUENCIA,
		$evolucion_tratamiento->VM_ALTA_FRECUENCIA_HORAS,
		$evolucion_tratamiento->VM_ALTA_FRECUENCIA_DIAS,
		$evolucion_tratamiento->USO_OXIGENO,
		$evolucion_tratamiento->USO_OXIGENO_HORAS,
		$evolucion_tratamiento->USO_OXIGENO_DIAS,
		$evolucion_tratamiento->CPAP,
		$evolucion_tratamiento->CPAP_HORAS,
		$evolucion_tratamiento->CPAP_DIAS,
		$evolucion_tratamiento->CPAP_TRATAMIENTO_,
		$evolucion_tratamiento->CPAP_TRAT_INICIO_SDR,
		$evolucion_tratamiento->CPAP_POST_EXTUBACION,
		$evolucion_tratamiento->CPAP_TRATAMIENTO_APNEA,
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA,
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_HORAS,
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_DIAS,  
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR,  
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION,  
		$evolucion_tratamiento->VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA,    
		$evolucion_tratamiento->RECIBE_SURFACTANTE,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_PROFILACTICO,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_SELECTIVO,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_INSURE,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS,
		$evolucion_tratamiento->RECIBE_SURFACTANTE_CANTIDAD_DOSIS,
		$evolucion_tratamiento->PARACETAMOL,
		$evolucion_tratamiento->INDOMETACINA,
		$evolucion_tratamiento->INDOMETACINA_PROFILACTICO,
		$evolucion_tratamiento->INDOMETACINA_TRATAMIENTO,
		$evolucion_tratamiento->IBUPROFENO,
		$evolucion_tratamiento->CORTICOIDES_POST_NATAL,
		$evolucion_tratamiento->NUMERO_TRANSFUSIONES,
		$evolucion_tratamiento->ANTIBIOTICO_MENOR_72_HORAS,
		$evolucion_tratamiento->NUMERO_CURSOS_ANTIBIOTICOS,
		$evolucion_tratamiento->ERITROPOYETINA,
		$evolucion_tratamiento->TRATAMIENTO_APNEA,
		$evolucion_tratamiento->TRATAMIENTO_APNEA_CAFEINA,
		$evolucion_tratamiento->TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA,
		$evolucion_tratamiento->OXIDO_NITRICO,
		$evolucion_tratamiento->EG_POST_NATAL_TERMINO_XANTINAS,
		$evolucion_tratamiento->CATETERES_,
		$evolucion_tratamiento->CATETER_ARETERIA_UMBILICAL_HORAS,
		$evolucion_tratamiento->CATETER_ARTERIA_UMBILICAL_DIAS,
		$evolucion_tratamiento->CATETER_VENA_UMBILCAL,
		$evolucion_tratamiento->CATETER_VENA_UMBILICAL_HORAS,
		$evolucion_tratamiento->CATETER_VENA_UMBILICAL_DIAS,
		$evolucion_tratamiento->CATETER_VENOSO_CENTRAL,
		$evolucion_tratamiento->CATETER_VENOSO_CENTRAL_HORAS,
		$evolucion_tratamiento->CATETER_VENOSO_CENTRAL_DIAS,
		$evolucion_tratamiento->CATETER_PRECUTANEO,
		$evolucion_tratamiento->CATETER_PRECUTANEO_HORAS,
		$evolucion_tratamiento->CATETER_PERCUTANEO_DIAS,
		$evolucion_tratamiento->ALIMENTACION_PARENTAL_TOTAL_DIAS,
		$evolucion_tratamiento->ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS,
		$evolucion_tratamiento->INICIO_AMINOACIDOS_EDAD_DIAS,
		$evolucion_tratamiento->ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS,
		$evolucion_tratamiento->INIC,
		$evolucion_tratamiento->FORTIFICANTE_LECHE_MATERNA,
		$evolucion_tratamiento->LECHE_MATERNA_HOSPITALIZACION,
		$evolucion_tratamiento->LECHE_DONADA,
		$evolucion_tratamiento->LECHE_MADRE,
		$evolucion_tratamiento->LECHE_MAT_HOSP_,
		$evolucion_tratamiento->LECHE_MAT_HOSP_FORMULA_14_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_FORMULA_28_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_FORMULA_36_SEM,
		$evolucion_tratamiento->LECHE_MAT_,
		$evolucion_tratamiento->LECHE_MAT_HOSP_14_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_28_DIAS,
		$evolucion_tratamiento->LECHE_MAT_HOSP_36_SEM,
		$evolucion_tratamiento->OBSERVACION_EVAL_TRATAMIENTO,
		$evolucion_tratamiento->ID_NEOCOSUR
		);
 
		$retorno=$sentencia->execute();  
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
		$query = "SELECT * FROM evolucion_tratamiento WHERE `ID_NEOCOSUR`= ? ";
		
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