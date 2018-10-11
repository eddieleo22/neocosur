<?php

/******************************************************************************
* Class for neocosur.patologias_neonatalesDAO
*******************************************************************************/

class patologias_neonatalesDAO
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
	
      
	
		
	public function guarda($patologias_neonatales)
	{
		$query ="INSERT INTO patologias_neonatales (
		`ID_NEOCOSUR`,
		`CLINICA_SDR`,
		`HIC`,
		`ID_HIC_GRADO`,
		`RADIOGRAFIA_TORAX_ALTERADA`,
		`LEUCOMALACIA`,
		`OXIGENO_28_DIAS`,
		`OXIGENO_36_SEMANAS`,
		`HIDROCEFALIA`,
		`ID_SEVERIDAD_DISPLACIA`,
		`CONVULSIONES`,
		`ECO_CEREBRAL_MENOR_7_DIAS`,
		`ECO_CEREBRAL_7_21_DIAS`,
		`ECO_CREBRAL_MAYOR_21_DIAS`,
		`RUP_ALVEOLAR`,
		`RUP_ALVEOLAR_NEUMOTORAX`,
		`RUP_ALVEOLAR_NEUMOMEDIASTINO`,
		`RUP_ALVEOLAR_EFISEMA_INTERSTICIAL`,
		`ENTEROCOLITIS_`,
		`DG_ENTEROCOLITIS_DIAS`,
		`PERFORACION_INTESTINAL`,
		`HEMORRAGIA_PULMONAR`,
		`DUCTUS`,
		`DUCTUS_CLINICO`,
		`DUCTUS_ECOGRAFICO`,
		`EVALUACION_OFTALMOLOGICA_PREVIA_ALTA`,
		`ROP_OJO_IZQ`,
		`ID_LOCALIZACION_OJO_IZQ`,
		`ID_SEVERIDAD_OJO_IZQ`,
		`ENF_PLUS_OJO_IZQ`,
		`CIRUGIA_ROP_OJO_IZQ`,
		`ID_TIPO_CIRUGIA_ROP_OJO_IZQ`,
		`ROP_OJO_DER`,
		`ID_LOCALIZACION_OJO_DER`,
		`ID_SEVERIDAD_OJO_DER`,
		`ENF_PLUS_OJO_DER`,
		`CIRUGIA_ROP_OJO_DER`,
		`ID_TIPO_CIRUGIA_ROP_OJO_DER`,
		`PRIMER_FONDO_OJO_DIAS`,
		`BEVACIZUMAB`,
		`SEPSIS_PRECOZ`,
		`ID_TIPO_GERMEN_PRECOZ`,
		`SEPSIS_PRECOZ_HEMOCULTIVO`,
		`SEPSIS_PRECOZ_LCR_POSITIVO`,
		`SEPSIS_TARDIA`,
		`NUMERO_SEPSIS_CLINICAS`,
		`EVA_PESQUISA`,
		`EVA_AUTO`,
		`EVA_AUTO_NOR`,
		`EVA_EXT`,
		`EVA_EXT_NOR`,
		`EVA_EMI`,
		`EVA_EMI_NOR`
		
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ) " ;
		
		//echo "queryyyy  ".$query;die;
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssss",
		$patologias_neonatales->ID_NEOCOSUR,
		$patologias_neonatales->CLINICA_SDR,
		$patologias_neonatales->HIC,
		$patologias_neonatales->ID_HIC_GRADO,
		$patologias_neonatales->RADIOGRAFIA_TORAX_ALTERADA,
		$patologias_neonatales->LEUCOMALACIA,
		$patologias_neonatales->OXIGENO_28_DIAS,
		$patologias_neonatales->OXIGENO_36_SEMANAS,
		$patologias_neonatales->HIDROCEFALIA,
		$patologias_neonatales->ID_SEVERIDAD_DISPLACIA,
		$patologias_neonatales->CONVULSIONES,
		$patologias_neonatales->ECO_CEREBRAL_MENOR_7_DIAS,
		$patologias_neonatales->ECO_CEREBRAL_7_21_DIAS,
		$patologias_neonatales->ECO_CREBRAL_MAYOR_21_DIAS,
		$patologias_neonatales->RUP_ALVEOLAR,
		$patologias_neonatales->RUP_ALVEOLAR_NEUMOTORAX,
		$patologias_neonatales->RUP_ALVEOLAR_NEUMOMEDIASTINO,
		$patologias_neonatales->RUP_ALVEOLAR_EFISEMA_INTERSTICIAL,
		$patologias_neonatales->ENTEROCOLITIS_,
		$patologias_neonatales->DG_ENTEROCOLITIS_DIAS,
		$patologias_neonatales->PERFORACION_INTESTINAL,		
		$patologias_neonatales->HEMORRAGIA_PULMONAR,
		$patologias_neonatales->DUCTUS,
		$patologias_neonatales->DUCTUS_CLINICO,
		$patologias_neonatales->DUCTUS_ECOGRAFICO,
		$patologias_neonatales->EVALUACION_OFTALMOLOGICA_PREVIA_ALTA,
		$patologias_neonatales->ROP_OJO_IZQ,
		$patologias_neonatales->ID_LOCALIZACION_OJO_IZQ,
		$patologias_neonatales->ID_SEVERIDAD_OJO_IZQ,
		$patologias_neonatales->ENF_PLUS_OJO_IZQ,
		$patologias_neonatales->CIRUGIA_ROP_OJO_IZQ,
		$patologias_neonatales->ID_TIPO_CIRUGIA_ROP_OJO_IZQ,
		$patologias_neonatales->ROP_OJO_DER,
		$patologias_neonatales->ID_LOCALIZACION_OJO_DER,
		$patologias_neonatales->ID_SEVERIDAD_OJO_DER,
		$patologias_neonatales->ENF_PLUS_OJO_DER,
		$patologias_neonatales->CIRUGIA_ROP_OJO_DER,
		$patologias_neonatales->ID_TIPO_CIRUGIA_ROP_OJO_DER,
		$patologias_neonatales->PRIMER_FONDO_OJO_DIAS,
		$patologias_neonatales->BEVACIZUMAB,
		$patologias_neonatales->SEPSIS_PRECOZ,
		$patologias_neonatales->ID_TIPO_GERMEN_PRECOZ,
		$patologias_neonatales->SEPSIS_PRECOZ_HEMOCULTIVO,
		$patologias_neonatales->SEPSIS_PRECOZ_LCR_POSITIVO,
		$patologias_neonatales->SEPSIS_TARDIA,
		$patologias_neonatales->NUMERO_SEPSIS_CLINICAS,
		$patologias_neonatales->EVA_PESQUISA,
		$patologias_neonatales->EVA_AUTO,
		$patologias_neonatales->EVA_AUTO_NOR,
		$patologias_neonatales->EVA_EXT,
		$patologias_neonatales->EVA_EXT_NOR,
		$patologias_neonatales->EVA_EMI,
		$patologias_neonatales->EVA_EMI_NOR
			);
 
		$retorno=$sentencia->execute();  
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	

	public function actualizar($patologias_neonatales)
	{
		$query = "UPDATE patologias_neonatales SET 
				`CLINICA_SDR` = ? ,
				`HIC` =  ? ,
				`ID_HIC_GRADO` =  ? ,
				`RADIOGRAFIA_TORAX_ALTERADA` =  ? ,
				`LEUCOMALACIA` = ? ,
				`OXIGENO_28_DIAS` =  ? ,
				`OXIGENO_36_SEMANAS` = ? ,
				`HIDROCEFALIA` = ? ,
				`ID_SEVERIDAD_DISPLACIA` = ? ,
				`CONVULSIONES` =  ? ,
				`ECO_CEREBRAL_MENOR_7_DIAS` =  ? ,
				`ECO_CEREBRAL_7_21_DIAS` =  ? ,
				`ECO_CREBRAL_MAYOR_21_DIAS` =  ? ,
				`RUP_ALVEOLAR` =  ? ,
				`RUP_ALVEOLAR_NEUMOTORAX` =  ? ,
				`RUP_ALVEOLAR_NEUMOMEDIASTINO` =  ? ,
				`RUP_ALVEOLAR_EFISEMA_INTERSTICIAL` =  ? ,
				`ENTEROCOLITIS_` =  ? ,
				`DG_ENTEROCOLITIS_DIAS` =  ? ,
				`PERFORACION_INTESTINAL` =  ? ,
				`HEMORRAGIA_PULMONAR` =  ? ,
				`DUCTUS` =  ? ,
				`DUCTUS_CLINICO` =  ? ,
				`DUCTUS_ECOGRAFICO` =  ? ,
				`EVALUACION_OFTALMOLOGICA_PREVIA_ALTA` =  ? ,
				`ROP_OJO_IZQ` =  ? ,
				`ID_LOCALIZACION_OJO_IZQ` =  ? ,
				`ID_SEVERIDAD_OJO_IZQ` =  ? ,
				`ENF_PLUS_OJO_IZQ` =  ? ,
				`CIRUGIA_ROP_OJO_IZQ` =  ? ,
				`ID_TIPO_CIRUGIA_ROP_OJO_IZQ` =  ? ,
				`ROP_OJO_DER` =  ? ,
				`ID_LOCALIZACION_OJO_DER` =  ? ,
				`ID_SEVERIDAD_OJO_DER` =  ? ,
				`ENF_PLUS_OJO_DER` =  ? ,
				`CIRUGIA_ROP_OJO_DER` =  ? ,
				`ID_TIPO_CIRUGIA_ROP_OJO_DER` =  ? ,
				`PRIMER_FONDO_OJO_DIAS` =  ? ,
				`BEVACIZUMAB` =  ? ,
				`SEPSIS_PRECOZ` =  ? ,
				`ID_TIPO_GERMEN_PRECOZ` =  ? ,
				`SEPSIS_PRECOZ_HEMOCULTIVO` =  ? ,
				`SEPSIS_PRECOZ_LCR_POSITIVO` =  ? ,
				`SEPSIS_TARDIA` =  ? ,
				`NUMERO_SEPSIS_CLINICAS` =  ? ,
				`EVA_PESQUISA` =  ? ,
				`EVA_AUTO` =  ? ,
				`EVA_AUTO_NOR` =  ? ,
				`EVA_EXT` =  ? ,
				`EVA_EXT_NOR` = ? ,
				`EVA_EMI` = ? ,
				`EVA_EMI_NOR` = ?
				WHERE `ID_NEOCOSUR`= ? ";
				
				//echo "queryyyy  ".$query;die;
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssss",
		$patologias_neonatales->CLINICA_SDR,
		$patologias_neonatales->HIC,
		$patologias_neonatales->ID_HIC_GRADO,
		$patologias_neonatales->RADIOGRAFIA_TORAX_ALTERADA,
		$patologias_neonatales->LEUCOMALACIA,
		$patologias_neonatales->OXIGENO_28_DIAS,
		$patologias_neonatales->OXIGENO_36_SEMANAS,
		$patologias_neonatales->HIDROCEFALIA,
		$patologias_neonatales->ID_SEVERIDAD_DISPLACIA,
		$patologias_neonatales->CONVULSIONES,
		$patologias_neonatales->ECO_CEREBRAL_MENOR_7_DIAS,
		$patologias_neonatales->ECO_CEREBRAL_7_21_DIAS,
		$patologias_neonatales->ECO_CREBRAL_MAYOR_21_DIAS,
		$patologias_neonatales->RUP_ALVEOLAR,
		$patologias_neonatales->RUP_ALVEOLAR_NEUMOTORAX,
		$patologias_neonatales->RUP_ALVEOLAR_NEUMOMEDIASTINO,
		$patologias_neonatales->RUP_ALVEOLAR_EFISEMA_INTERSTICIAL,
		$patologias_neonatales->ENTEROCOLITIS_,
		$patologias_neonatales->DG_ENTEROCOLITIS_DIAS,
		$patologias_neonatales->PERFORACION_INTESTINAL,		
		$patologias_neonatales->HEMORRAGIA_PULMONAR,
		$patologias_neonatales->DUCTUS,
		$patologias_neonatales->DUCTUS_CLINICO,
		$patologias_neonatales->DUCTUS_ECOGRAFICO,
		$patologias_neonatales->EVALUACION_OFTALMOLOGICA_PREVIA_ALTA,
		$patologias_neonatales->ROP_OJO_IZQ,
		$patologias_neonatales->ID_LOCALIZACION_OJO_IZQ,
		$patologias_neonatales->ID_SEVERIDAD_OJO_IZQ,
		$patologias_neonatales->ENF_PLUS_OJO_IZQ,
		$patologias_neonatales->CIRUGIA_ROP_OJO_IZQ,
		$patologias_neonatales->ID_TIPO_CIRUGIA_ROP_OJO_IZQ,
		$patologias_neonatales->ROP_OJO_DER,
		$patologias_neonatales->ID_LOCALIZACION_OJO_DER,
		$patologias_neonatales->ID_SEVERIDAD_OJO_DER,
		$patologias_neonatales->ENF_PLUS_OJO_DER,
		$patologias_neonatales->CIRUGIA_ROP_OJO_DER,
		$patologias_neonatales->ID_TIPO_CIRUGIA_ROP_OJO_DER,
		$patologias_neonatales->PRIMER_FONDO_OJO_DIAS,
		$patologias_neonatales->BEVACIZUMAB,
		$patologias_neonatales->SEPSIS_PRECOZ,
		$patologias_neonatales->ID_TIPO_GERMEN_PRECOZ,
		$patologias_neonatales->SEPSIS_PRECOZ_HEMOCULTIVO,
		$patologias_neonatales->SEPSIS_PRECOZ_LCR_POSITIVO,
		$patologias_neonatales->SEPSIS_TARDIA,
		$patologias_neonatales->NUMERO_SEPSIS_CLINICAS,
		$patologias_neonatales->EVA_PESQUISA,
		$patologias_neonatales->EVA_AUTO,
		$patologias_neonatales->EVA_AUTO_NOR,
		$patologias_neonatales->EVA_EXT,
		$patologias_neonatales->EVA_EXT_NOR,
		$patologias_neonatales->EVA_EMI,
		$patologias_neonatales->EVA_EMI_NOR,		
		$patologias_neonatales->ID_NEOCOSUR
			);
 
		$retorno=$sentencia->execute();  
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
		 $query = "SELECT * FROM patologias_neonatales WHERE `ID_NEOCOSUR`= ? ;";
            
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