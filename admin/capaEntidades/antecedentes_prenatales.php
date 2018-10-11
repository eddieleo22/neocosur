<?php

/* * ****************************************************************************
 * Class for neocosur.antecedentes_prenatales
 * ***************************************************************************** */

class antecedentes_prenatales {

    /**
     * @var int
     * Class Unique ID
     */
    private $ID_NEOCOSUR;

    /**
     * @var int
     */
    private $EDAD_MATERNA;

    /**
     *
     * @var int 
     */
    private $ANIO_ESCOLARIDAD;

    /**
     * @var int
     */
    private $ID_NIVEL_EDUCACION;

    /**
     * @var int
     */
    private $CONTROL_EMBARAZO;
    private $GEST_PRIMER_CONTROL;

    /**
     * @var int
     */
    private $DIABETES;

    /**
     * @var int
     */
    private $DIABETES_GESTACIONAL;

    /**
     * @var int
     */
    private $ID_PARIDAD;

    /**
     * @var int
     */
    private $TABAQUISMO;

    /**
     * @var int
     */
    private $HIPERTENSION_ARTERIAL;

    /**
     * @var int
     */
    private $HIPERTENSION_EMBARAZO;

    /**
     * @var int
     */
    private $HIPERTENSION_MEDICAMENTOS;

    /**
     * @var int
     */
    private $MULTIPLE;

    /**
     * @var int
     */
    private $ID_MULTIPLE_LUGAR;

    /**
     * @var int
     */
    private $RETARDO_CREC_INTRA_UTERINO;

    /**
     * @var int
     */
    private $ANTIBIOTICO_PRENATAL;

    /**
     * @var int
     */
    private $RUPTURA_PRE_MEMBRANA_DIAS;

    /**
     * @var int
     */
    private $RUPTURA_PRE_MEMBRANA_HORAS;

    /**
     * @var int
     */
    private $CORTICOIDE_PRENATAL;

    /**
     * @var int
     */
    private $CORTICOIDE_PRENATAL_CURSO_INCOMPLETO;

    /**
     * @var int
     */
    //private $CORTICOIDE_PRENATAL_CURSO_COMPLETO;

    /**
     * @var int
     */
    private $CORTICOIDE_PRENATAL_UN_CURSO;

    /**
     * @var int
     */
    private $CORTICOIDE_PRENATAL_MAS_CURSOS;

    /**
     * @var int
     */
    private $CORIOAMNIONITIS;

    /**
     * @var int
     */
    private $SULFATO_MG;
    private $SULFATO_MG_NEURO;

    /**
     * @var int
     */
    private $ALTERACION_DOPLER_FETAL;

    /**
     * @var int
     */
    private $FLUJO_REVERSO_VENA_UMBILICAL;
    private $DUCTUS_VENOSO_ALTERADO;

    /**
     * @var int
     */
    private $DILATACION_CEREBRAL_MEDIA;

    /**
     * @var int
     */
    private $OTRA_ALTERACION;

    /**
     * @var string
     */
    private $OBSERVACIONES_PRENATALES;

    /**
     * @var int
     */
    private $MAFORMACION_CONGENITA_MAYOR;

    /**
     * @var int
     */
    //private $MALFORMACION_CM_NO_COMPROMETE_VIDA;

    /**
     * @var int
     */
    private $MALFORMACION_CM_COMPROMETE_VIDA;

    /**
     * @var int
     */
    private $MALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL;

    /**
     * @var int
     */
    private $MALF_COMPR_DEFECTOS_GENITO_URINARIOS;

    /**
     * @var int
     */
    private $MALF_COMPR_DEFECTOS_CARDIACOS;

    /**
     * @var int
     */
    private $MALF_COMPR_ANOMALIA_CROMOSOMICA;

    /**
     * @var int
     */
    private $MALF_COMPR_DEFECTOS_GASTROINTESTINALES;

    /**
     * @var int
     */
    private $MALF_COMPR_OTROS_DEFECTOS;
    
    /*
     * var int
     */
    private $MALF_COMPR_OTROS;
    /**
     * @var string
     */
    private $OBSERVACIONES;
    
   //private $EDAD_GESTACIONAL;
   function __construct() {
        
	}
    public function __get($property) 
		{
			if (property_exists($this, $property)) 
			{
				return $this->$property;
			}
		}

		public function __set($property, $value) 
		{
			if (property_exists($this, $property)) 
			{
				$this->$property = $value;
    		}
		}

	//function __construct(){}	
    /*function __construct($ID_NEOCOSUR, $EDAD_MATERNA, $ANIO_ESCOLARIDAD, $ID_NIVEL_EDUCACION,$CONTROL_EMBARAZO,
            $DIABETES, $DIABETES_GESTACIONAL,$ID_PARIDAD,$TABAQUISMO,$HIPERTENSION_ARTERIAL, $HIPERTENSION_EMBARAZO, $MEDICAMENTOS,
            $MULTIPLE, $ID_MULTIPLE_LUGAR, $RETARDO_CREC_INTRA_UTERINO,$ANTIBIOTICO_PRENATAL, $RUPTURA_PRE_MEMBRANA_DIAS, $RUPTURA_PRE_MEMBRANA_HORAS,
             $CORTICOIDE_PRENATAL, $CORTICOIDE_PRENATAL_CURSO_INCOMPLETO, $CORTICOIDE_PRENATAL_UN_CURSO, 
            $CORIOAMNIONITIS, $SULFATO_MG, $ALTERACION_DOPLER_FETAL, $FLUJO_REVERSO_VENA_UMBILICAL,
            $DILATACION_CEREBRAL_MEDIA, $OTRA_ALTERACION, $OBSERVACIONES_PRENATALES) {
        $this->ID_NEOCOSUR = $ID_NEOCOSUR;
        $this->EDAD_MATERNA = $EDAD_MATERNA;
        $this->ANIO_ESCOLARIDAD = $ANIO_ESCOLARIDAD;
        $this->ID_NIVEL_EDUCACION = $ID_NIVEL_EDUCACION;
        $this->ID_PARIDAD = $ID_PARIDAD;
        $this->TABAQUISMO = $TABAQUISMO; 
        $this->CONTROL_EMBARAZO = $CONTROL_EMBARAZO;
        $this->DIABETES = $DIABETES;
        $this->DIABETES_GESTACIONAL = $DIABETES_GESTACIONAL;  
        $this->HIPERTENSION_ARTERIAL = $HIPERTENSION_ARTERIAL;
        $this->HIPERTENSION_EMBARAZO = $HIPERTENSION_EMBARAZO;
        $this->HIPERTENSION_MEDICAMENTOS = $MEDICAMENTOS;
        $this->MULTIPLE = $MULTIPLE;
        $this->ID_MULTIPLE_LUGAR = $ID_MULTIPLE_LUGAR;
        //EDAD_GESTACIONAL NUEVO
        $this->RETARDO_CREC_INTRA_UTERINO = $RETARDO_CREC_INTRA_UTERINO;        
        $this->RUPTURA_PRE_MEMBRANA_DIAS = $RUPTURA_PRE_MEMBRANA_DIAS;
        $this->RUPTURA_PRE_MEMBRANA_HORAS = $RUPTURA_PRE_MEMBRANA_HORAS;
        $this->ANTIBIOTICO_PRENATAL = $ANTIBIOTICO_PRENATAL;
        
        $this->CORTICOIDE_PRENATAL = $CORTICOIDE_PRENATAL;
        $this->CORTICOIDE_PRENATAL_CURSO_INCOMPLETO = $CORTICOIDE_PRENATAL_CURSO_INCOMPLETO;
        $this->CORTICOIDE_PRENATAL_UN_CURSO = $CORTICOIDE_PRENATAL_UN_CURSO;
        $this->CORIOAMNIONITIS = $CORIOAMNIONITIS;
        $this->SULFATO_MG = $SULFATO_MG;
        $this->ALTERACION_DOPLER_FETAL = $ALTERACION_DOPLER_FETAL;
        $this->FLUJO_REVERSO_VENA_UMBILICAL = $FLUJO_REVERSO_VENA_UMBILICAL;
        $this->DILATACION_CEREBRAL_MEDIA = $DILATACION_CEREBRAL_MEDIA;
        $this->OTRA_ALTERACION = $OTRA_ALTERACION;
        $this->OBSERVACIONES_PRENATALES = $OBSERVACIONES_PRENATALES;
        
    }*/

    
    
    public function setID_NEOCOSUR($ID_NEOCOSUR ) {
        $this->ID_NEOCOSUR = $ID_NEOCOSUR;
        return true;
    }

    public function getID_NEOCOSUR() {
        return $this->ID_NEOCOSUR;
    }

    public function setEDAD_MATERNA($EDAD_MATERNA ) {
        if($EDAD_MATERNA!=''){
        $this->EDAD_MATERNA = $EDAD_MATERNA;
        }
    else {
        $this->EDAD_MATERNA = null;
    }
        return true;
    }

    public function getEDAD_MATERNA() {
        return $this->EDAD_MATERNA;
    }
    
    public function getANIO_ESCOLARIDAD(){
        return $this->ANIO_ESCOLARIDAD;
    }
    public function setANIO_ESCOLARIDAD($ANIO_ESCOLARIDAD = null) {
        $this->ANIO_ESCOLARIDAD = $ANIO_ESCOLARIDAD;
        return true;
    }
    
    
    public function setID_NIVEL_EDUCACION($ID_NIVEL_EDUCACION ) {
        $this->ID_NIVEL_EDUCACION = $ID_NIVEL_EDUCACION;
        return true;
    }

    public function getID_NIVEL_EDUCACION() {
        return $this->ID_NIVEL_EDUCACION;
    }

    public function setCONTROL_EMBARAZO($CONTROL_EMBARAZO ) {
        $this->CONTROL_EMBARAZO = $CONTROL_EMBARAZO;
        return true;
    }

    public function getCONTROL_EMBARAZO() {
        return $this->CONTROL_EMBARAZO;
    }

    public function setDIABETES($DIABETES ) {
        $this->DIABETES = $DIABETES;
        return true;
    }

    public function getDIABETES() {
        return $this->DIABETES;
    }

    public function setDIABETES_GESTACIONAL($DIABETES_GESTACIONAL ) {
        $this->DIABETES_GESTACIONAL = $DIABETES_GESTACIONAL;
        return true;
    }

    public function getDIABETES_GESTACIONAL() {
        return $this->DIABETES_GESTACIONAL;
    }

    public function setID_PARIDAD($ID_PARIDAD ) {
        $this->ID_PARIDAD = $ID_PARIDAD;
        return true;
    }

    public function getID_PARIDAD() {
        return $this->ID_PARIDAD;
    }

    public function setTABAQUISMO($TABAQUISMO ) {
        $this->TABAQUISMO = $TABAQUISMO;
        return true;
    }

    public function getTABAQUISMO() {
        return $this->TABAQUISMO;
    }

    public function setHIPERTENSION_ARTERIAL($HIPERTENSION_ARTERIAL ) {
        $this->HIPERTENSION_ARTERIAL = $HIPERTENSION_ARTERIAL;
        return true;
    }

    public function getHIPERTENSION_ARTERIAL() {
        return $this->HIPERTENSION_ARTERIAL;
    }

    public function setHIPERTENSION_EMBARAZO($HIPERTENSION_EMBARAZO ) {
        $this->HIPERTENSION_EMBARAZO = $HIPERTENSION_EMBARAZO;
        return true;
    }

    public function getHIPERTENSION_EMBARAZO() {
        return $this->HIPERTENSION_EMBARAZO;
    }

    public function setHIPERTENSION_MEDICAMENTOS($HIPERTENSION_MEDICAMENTOS ) {
        $this->HIPERTENSION_MEDICAMENTOS = $HIPERTENSION_MEDICAMENTOS;
        return true;
    }

    public function getHIPERTENSION_MEDICAMENTOS() {
        return $this->HIPERTENSION_MEDICAMENTOS;
    }

    public function setMULTIPLE($MULTIPLE ) {
        $this->MULTIPLE = $MULTIPLE;
        return true;
    }

    public function getMULTIPLE() {
        return $this->MULTIPLE;
    }

    public function setID_MULTIPLE_LUGAR($ID_MULTIPLE_LUGAR ) {
        $this->ID_MULTIPLE_LUGAR = $ID_MULTIPLE_LUGAR;
        return true;
    }

    public function getID_MULTIPLE_LUGAR() {
        return $this->ID_MULTIPLE_LUGAR;
    }

    public function setRETARDO_CREC_INTRA_UTERINO($RETARDO_CREC_INTRA_UTERINO ) {
        $this->RETARDO_CREC_INTRA_UTERINO = $RETARDO_CREC_INTRA_UTERINO;
        return true;
    }

    public function getRETARDO_CREC_INTRA_UTERINO() {
        return $this->RETARDO_CREC_INTRA_UTERINO;
    }

    public function setANTIBIOTICO_PRENATAL($ANTIBIOTICO_PRENATAL ) {
        $this->ANTIBIOTICO_PRENATAL = $ANTIBIOTICO_PRENATAL;
        return true;
    }

    public function getANTIBIOTICO_PRENATAL() {
        return $this->ANTIBIOTICO_PRENATAL;
    }

    public function setRUPTURA_PRE_MEMBRANA_DIAS($RUPTURA_PRE_MEMBRANA_DIAS ) {
        $this->RUPTURA_PRE_MEMBRANA_DIAS = $RUPTURA_PRE_MEMBRANA_DIAS;
        return true;
    }

    public function getRUPTURA_PRE_MEMBRANA_DIAS() {
        return $this->RUPTURA_PRE_MEMBRANA_DIAS;
    }

    public function setRUPTURA_PRE_MEMBRANA_HORAS($RUPTURA_PRE_MEMBRANA_HORAS ) {
        $this->RUPTURA_PRE_MEMBRANA_HORAS = $RUPTURA_PRE_MEMBRANA_HORAS;
        return true;
    }

    public function getRUPTURA_PRE_MEMBRANA_HORAS() {
        return $this->RUPTURA_PRE_MEMBRANA_HORAS;
    }

    public function setCORTICOIDE_PRENATAL($CORTICOIDE_PRENATAL ) {
        $this->CORTICOIDE_PRENATAL = $CORTICOIDE_PRENATAL;
        return true;
    }

    public function getCORTICOIDE_PRENATAL() {
        return $this->CORTICOIDE_PRENATAL;
    }

    public function setCORTICOIDE_PRENATAL_CURSO_INCOMPLETO($CORTICOIDE_PRENATAL_CURSO_INCOMPLETO ) {
        $this->CORTICOIDE_PRENATAL_CURSO_INCOMPLETO = $CORTICOIDE_PRENATAL_CURSO_INCOMPLETO;
        return true;
    }

    public function getCORTICOIDE_PRENATAL_CURSO_INCOMPLETO() {
        return $this->CORTICOIDE_PRENATAL_CURSO_INCOMPLETO;
    }

    /*public function setCORTICOIDE_PRENATAL_CURSO_COMPLETO($CORTICOIDE_PRENATAL_CURSO_COMPLETO ) {
        $this->CORTICOIDE_PRENATAL_CURSO_COMPLETO = $CORTICOIDE_PRENATAL_CURSO_COMPLETO;
        return true;
    }

    public function getCORTICOIDE_PRENATAL_CURSO_COMPLETO() {
        return $this->CORTICOIDE_PRENATAL_CURSO_COMPLETO;
    }*/

    public function setCORTICOIDE_PRENATAL_UN_CURSO($CORTICOIDE_PRENATAL_UN_CURSO ) {
        $this->CORTICOIDE_PRENATAL_UN_CURSO = $CORTICOIDE_PRENATAL_UN_CURSO;
        return true;
    }

    public function getCORTICOIDE_PRENATAL_UN_CURSO() {
        return $this->CORTICOIDE_PRENATAL_UN_CURSO;
    }

    public function setCORTICOIDE_PRENATAL_MAS_CURSOS($CORTICOIDE_PRENATAL_MAS_CURSOS ) {
        $this->CORTICOIDE_PRENATAL_MAS_CURSOS = $CORTICOIDE_PRENATAL_MAS_CURSOS;
        return true;
    }

    public function getCORTICOIDE_PRENATAL_MAS_CURSOS() {
        return $this->CORTICOIDE_PRENATAL_MAS_CURSOS;
    }

    public function setCORIOAMNIONITIS($CORIOAMNIONITIS ) {
        $this->CORIOAMNIONITIS = $CORIOAMNIONITIS;
        return true;
    }

    public function getCORIOAMNIONITIS() {
        return $this->CORIOAMNIONITIS;
    }

    public function setSULFATO_MG($SULFATO_MG ) {
        $this->SULFATO_MG = $SULFATO_MG;
        return true;
    }

    public function getSULFATO_MG() {
        return $this->SULFATO_MG;
    }

    public function setALTERACION_DOPLER_FETAL($ALTERACION_DOPLER_FETAL ) {
        $this->ALTERACION_DOPLER_FETAL = $ALTERACION_DOPLER_FETAL;
        return true;
    }

    public function getALTERACION_DOPLER_FETAL() {
        return $this->ALTERACION_DOPLER_FETAL;
    }

    public function setFLUJO_REVERSO_VENA_UMBILICAL($FLUJO_REVERSO_VENA_UMBILICAL ) {
        $this->FLUJO_REVERSO_VENA_UMBILICAL = $FLUJO_REVERSO_VENA_UMBILICAL;
        return true;
    }

    public function getFLUJO_REVERSO_VENA_UMBILICAL() {
        return $this->FLUJO_REVERSO_VENA_UMBILICAL;
    }

    public function setDILATACION_CEREBRAL_MEDIA($DILATACION_CEREBRAL_MEDIA ) {
        $this->DILATACION_CEREBRAL_MEDIA = $DILATACION_CEREBRAL_MEDIA;
        return true;
    }

    public function getDILATACION_CEREBRAL_MEDIA() {
        return $this->DILATACION_CEREBRAL_MEDIA;
    }

    public function setOTRA_ALTERACION($OTRA_ALTERACION ) {
        $this->OTRA_ALTERACION = $OTRA_ALTERACION;
        return true;
    }

    public function getOTRA_ALTERACION() {
        return $this->OTRA_ALTERACION;
    }

    public function setOBSERVACIONES_PRENATALES($OBSERVACIONES_PRENATALES ) {
        $this->OBSERVACIONES_PRENATALES = $OBSERVACIONES_PRENATALES;
        return true;
    }

    public function getOBSERVACIONES_PRENATALES() {
        return $this->OBSERVACIONES_PRENATALES;
    }

    public function setMAFORMACION_CONGENITA_MAYOR($MAFORMACION_CONGENITA_MAYOR ) {
        $this->MAFORMACION_CONGENITA_MAYOR = $MAFORMACION_CONGENITA_MAYOR;
        return true;
    }

    public function getMAFORMACION_CONGENITA_MAYOR() {
        return $this->MAFORMACION_CONGENITA_MAYOR;
    }

   

    public function setMALFORMACION_CM_COMPROMETE_VIDA($MALFORMACION_CM_COMPROMETE_VIDA ) {
        $this->MALFORMACION_CM_COMPROMETE_VIDA = $MALFORMACION_CM_COMPROMETE_VIDA;
        return true;
    }

    public function getMALFORMACION_CM_COMPROMETE_VIDA() {
        return $this->MALFORMACION_CM_COMPROMETE_VIDA;
    }

    public function setMALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL($MALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL ) {
        $this->MALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL = $MALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL;
        return true;
    }

    public function getMALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL() {
        return $this->MALF_COMPR_DEFECTOS_SIST_NERVIOSO_CENTRAL;
    }

    public function setMALF_COMPR_DEFECTOS_GENITO_URINARIOS($MALF_COMPR_DEFECTOS_GENITO_URINARIOS ) {
        $this->MALF_COMPR_DEFECTOS_GENITO_URINARIOS = $MALF_COMPR_DEFECTOS_GENITO_URINARIOS;
        return true;
    }

    public function getMALF_COMPR_DEFECTOS_GENITO_URINARIOS() {
        return $this->MALF_COMPR_DEFECTOS_GENITO_URINARIOS;
    }

    public function setMALF_COMPR_DEFECTOS_CARDIACOS($MALF_COMPR_DEFECTOS_CARDIACOS ) {
        $this->MALF_COMPR_DEFECTOS_CARDIACOS = $MALF_COMPR_DEFECTOS_CARDIACOS;
        return true;
    }

    public function getMALF_COMPR_DEFECTOS_CARDIACOS() {
        return $this->MALF_COMPR_DEFECTOS_CARDIACOS;
    }

    public function setMALF_COMPR_ANOMALIA_CROMOSOMICA($MALF_COMPR_ANOMALIA_CROMOSOMICA ) {
        $this->MALF_COMPR_ANOMALIA_CROMOSOMICA = $MALF_COMPR_ANOMALIA_CROMOSOMICA;
        return true;
    }

    public function getMALF_COMPR_ANOMALIA_CROMOSOMICA() {
        return $this->MALF_COMPR_ANOMALIA_CROMOSOMICA;
    }

    public function setMALF_COMPR_DEFECTOS_GASTROINTESTINALES($MALF_COMPR_DEFECTOS_GASTROINTESTINALES ) {
        $this->MALF_COMPR_DEFECTOS_GASTROINTESTINALES = $MALF_COMPR_DEFECTOS_GASTROINTESTINALES;
        return true;
    }

    public function getMALF_COMPR_DEFECTOS_GASTROINTESTINALES() {
        return $this->MALF_COMPR_DEFECTOS_GASTROINTESTINALES;
    }

    public function setMALF_COMPR_OTROS_DEFECTOS($MALF_COMPR_OTROS_DEFECTOS ) {
        $this->MALF_COMPR_OTROS_DEFECTOS = $MALF_COMPR_OTROS_DEFECTOS;
        return true;
    }

    public function getMALF_COMPR_OTROS_DEFECTOS() {
        return $this->MALF_COMPR_OTROS_DEFECTOS;
    }
    
    public function setMALF_COMPR_OTROS($MALF_COMPR_OTROS ) {
        $this->MALF_COMPR_OTROS = $MALF_COMPR_OTROS;
        return true;
    }

    public function getMALF_COMPR_OTROS() {
        return $this->MALF_COMPR_OTROS;
    }
    

    public function setOBSERVACIONES($OBSERVACIONES ) {
        $this->OBSERVACIONES = $OBSERVACIONES;
        return true;
    }

    public function getOBSERVACIONES() {
        return $this->OBSERVACIONES;
    }
     
    

}

// END class antecedentes_prenatales