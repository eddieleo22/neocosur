<?php

/******************************************************************************
* Class for neocosur.evolucion_tratamiento
*******************************************************************************/

class evolucion_tratamiento
{
	/**
	* @var int
	*/
	private $ID_EVOL_TRAT;

	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $VM_CONVENCIONAL;

	/**
	* @var int
	*/
	private $VM_CONVENCIONAL_HORAS;

	/**
	* @var int
	*/
	private $VM_CONVENCIONAL_DIAS;

	/**
	* @var int
	*/
	private $VM_CONVENCIONAL_INGRESO;

	/**
	* @var int
	*/
	private $VM_CONVENCIONAL_TERAPIA_SDR;

	/**
	* @var int
	*/
	private $VM_CONVENCIONAL_OTRO;

	/**
	* @var int
	*/
	private $VM_ALTA_FRECUENCIA;

	/**
	* @var int
	*/
	private $VM_ALTA_FRECUENCIA_HORAS;

	/**
	* @var int
	*/
	private $VM_ALTA_FRECUENCIA_DIAS;

	/**
	* @var int
	*/
	private $USO_OXIGENO;

	/**
	* @var int
	*/
	private $USO_OXIGENO_HORAS;

	/**
	* @var int
	*/
	private $USO_OXIGENO_DIAS;

	/**
	* @var int
	*/
	private $CPAP;

	/**
	* @var int
	*/
	private $CPAP_HORAS;

	/**
	* @var int
	*/
	private $CPAP_DIAS;

	/**
	* @var int
	*/
	private $CPAP_TRATAMIENTO_;

	/**
	* @var int
	*/
	private $CPAP_TRAT_INICIO_SDR;

	/**
	* @var int
	*/
	private $CPAP_TRAT_INICIO_SDR_TERAPEUTICO;

	/**
	* @var int
	*/
	private $CPAP_POST_EXTUBACION;

	/**
	* @var int
	*/
	private $CPAP_TRATAMIENTO_APNEA;

	/**
	* @var int
	*/
	private $VENTILACION_NASAL_NO_INVASIVA;

	/**
	* @var int
	*/
	private $VENTILACION_NASAL_NO_INVASIVA_HORAS;

	/**
	* @var int
	*/
	private $VENTILACION_NASAL_NO_INVASIVA_DIAS;
	private $VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR;
	private $VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION;
	private $VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA;
	
	private $HEMORRAGIA_PULMONAR;
	/**
	* @var int
	*/
	private $RECIBE_SURFACTANTE;

	/**
	* @var int
	*/
	private $RECIBE_SURFACTANTE_PROFILACTICO;

	/**
	* @var int
	*/
	private $RECIBE_SURFACTANTE_SELECTIVO;

	/**
	* @var int
	*/
	private $RECIBE_SURFACTANTE_INSURE;

	/**
	* @var int
	*/
	private $RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS;

	/**
	* @var int
	*/
	private $RECIBE_SURFACTANTE_CANTIDAD_DOSIS;

	/**
	* @var int
	*/
	private $PARACETAMOL;

	/**
	* @var int
	*/
	private $INDOMETACINA;

	/**
	* @var int
	*/
	private $INDOMETACINA_PROFILACTICO;

	/**
	* @var int
	*/
	private $INDOMETACINA_TRATAMIENTO;

	/**
	* @var int
	*/
	private $IBUPROFENO;

	/**
	* @var int
	*/
	private $CORTICOIDES_POST_NATAL;

	/**
	* @var int
	*/
	private $NUMERO_TRANSFUSIONES;

	/**
	* @var int
	*/
	private $ANTIBIOTICO_MENOR_72_HORAS;

	/**
	* @var int
	*/
	private $NUMERO_CURSOS_ANTIBIOTICOS;

	/**
	* @var int
	*/
	private $ERITROPOYETINA;

	/**
	* @var int
	*/
	private $TRATAMIENTO_APNEA;

	/**
	* @var int
	*/
	private $TRATAMIENTO_APNEA_CAFEINA;

	/**
	* @var int
	*/
	private $TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA;

	/**
	* @var int
	*/
	private $OXIDO_NITRICO;

	/**
	* @var int
	*/
	private $EG_POST_NATAL_TERMINO_XANTINAS;

	/**
	* @var int
	*/
	private $CATETERES_;

	/**
	* @var int
	*/
	private $CATETER_ARETERIA_UMBILICAL_HORAS;

	/**
	* @var int
	*/
	private $CATETER_ARTERIA_UMBILICAL_DIAS;

	/**
	* @var int
	*/
	private $CATETER_VENA_UMBILCAL;

	/**
	* @var int
	*/
	private $CATETER_VENA_UMBILICAL_HORAS;

	/**
	* @var int
	*/
	private $CATETER_VENA_UMBILICAL_DIAS;

	/**
	* @var int
	*/
	private $CATETER_VENOSO_CENTRAL;

	/**
	* @var int
	*/
	private $CATETER_VENOSO_CENTRAL_HORAS;

	/**
	* @var int
	*/
	private $CATETER_VENOSO_CENTRAL_DIAS;

	/**
	* @var int
	*/
	private $CATETER_PRECUTANEO;

	/**
	* @var int
	*/
	private $CATETER_PRECUTANEO_HORAS;

	/**
	* @var int
	*/
	private $CATETER_PERCUTANEO_DIAS;

	/**
	* @var int
	*/
	private $ALIMENTACION_PARENTAL_TOTAL_DIAS;

	/**
	* @var int
	*/
	private $ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS;

	/**
	* @var int
	*/
	private $INICIO_AMINOACIDOS_EDAD_DIAS;

	/**
	* @var int
	*/
	private $ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS;

	/**
	* @var int
	*/
	private $INIC;

	/**
	* @var int
	*/
	private $FORTIFICANTE_LECHE_MATERNA;

	/**
	* @var int
	*/
	private $LECHE_MATERNA_HOSPITALIZACION;
	private $LECHE_DONADA;
	private $LECHE_MADRE;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_FORMULA_14_DIAS;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_FORMULA_28_DIAS;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_FORMULA_36_SEM;

	/**
	* @var int
	*/
	private $LECHE_MAT_;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_14_DIAS;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_28_DIAS;

	/**
	* @var int
	*/
	private $LECHE_MAT_HOSP_36_SEM;

	/**
	* @var string
	*/
        private $OBSERVACION_EVAL_TRATAMIENTO;
        function __construct()
	 	{
	 		

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
	

	public function setID_EVOL_TRAT($ID_EVOL_TRAT='')
	{
		$this->ID_EVOL_TRAT = $ID_EVOL_TRAT;
		return true;
	}

	public function getID_EVOL_TRAT()
	{
		return $this->ID_EVOL_TRAT;
	}

	public function setID_NEOCOSUR($ID_NEOCOSUR='')
	{
		$this->ID_NEOCOSUR = $ID_NEOCOSUR;
		return true;
	}

	public function getID_NEOCOSUR()
	{
		return $this->ID_NEOCOSUR;
	}

	public function setVM_CONVENCIONAL($VM_CONVENCIONAL='')
	{
		$this->VM_CONVENCIONAL = $VM_CONVENCIONAL;
		return true;
	}

	public function getVM_CONVENCIONAL()
	{
		return $this->VM_CONVENCIONAL;
	}

	public function setVM_CONVENCIONAL_HORAS($VM_CONVENCIONAL_HORAS='')
	{
		$this->VM_CONVENCIONAL_HORAS = $VM_CONVENCIONAL_HORAS;
		return true;
	}

	public function getVM_CONVENCIONAL_HORAS()
	{
		return $this->VM_CONVENCIONAL_HORAS;
	}

	public function setVM_CONVENCIONAL_DIAS($VM_CONVENCIONAL_DIAS='')
	{
		$this->VM_CONVENCIONAL_DIAS = $VM_CONVENCIONAL_DIAS;
		return true;
	}

	public function getVM_CONVENCIONAL_DIAS()
	{
		return $this->VM_CONVENCIONAL_DIAS;
	}

	public function setVM_CONVENCIONAL_INGRESO($VM_CONVENCIONAL_INGRESO='')
	{
		$this->VM_CONVENCIONAL_INGRESO = $VM_CONVENCIONAL_INGRESO;
		return true;
	}

	public function getVM_CONVENCIONAL_INGRESO()
	{
		return $this->VM_CONVENCIONAL_INGRESO;
	}

	public function setVM_CONVENCIONAL_TERAPIA_SDR($VM_CONVENCIONAL_TERAPIA_SDR='')
	{
		$this->VM_CONVENCIONAL_TERAPIA_SDR = $VM_CONVENCIONAL_TERAPIA_SDR;
		return true;
	}

	public function getVM_CONVENCIONAL_TERAPIA_SDR()
	{
		return $this->VM_CONVENCIONAL_TERAPIA_SDR;
	}

	public function setVM_CONVENCIONAL_OTRO($VM_CONVENCIONAL_OTRO='')
	{
		$this->VM_CONVENCIONAL_OTRO = $VM_CONVENCIONAL_OTRO;
		return true;
	}

	public function getVM_CONVENCIONAL_OTRO()
	{
		return $this->VM_CONVENCIONAL_OTRO;
	}

	public function setVM_ALTA_FRECUENCIA($VM_ALTA_FRECUENCIA='')
	{
		$this->VM_ALTA_FRECUENCIA = $VM_ALTA_FRECUENCIA;
		return true;
	}

	public function getVM_ALTA_FRECUENCIA()
	{
		return $this->VM_ALTA_FRECUENCIA;
	}

	public function setVM_ALTA_FRECUENCIA_HORAS($VM_ALTA_FRECUENCIA_HORAS='')
	{
		$this->VM_ALTA_FRECUENCIA_HORAS = $VM_ALTA_FRECUENCIA_HORAS;
		return true;
	}

	public function getVM_ALTA_FRECUENCIA_HORAS()
	{
		return $this->VM_ALTA_FRECUENCIA_HORAS;
	}

	public function setVM_ALTA_FRECUENCIA_DIAS($VM_ALTA_FRECUENCIA_DIAS='')
	{
		$this->VM_ALTA_FRECUENCIA_DIAS = $VM_ALTA_FRECUENCIA_DIAS;
		return true;
	}

	public function getVM_ALTA_FRECUENCIA_DIAS()
	{
		return $this->VM_ALTA_FRECUENCIA_DIAS;
	}

	public function setUSO_OXIGENO($USO_OXIGENO='')
	{
		$this->USO_OXIGENO = $USO_OXIGENO;
		return true;
	}

	public function getUSO_OXIGENO()
	{
		return $this->USO_OXIGENO;
	}

	public function setUSO_OXIGENO_HORAS($USO_OXIGENO_HORAS='')
	{
		$this->USO_OXIGENO_HORAS = $USO_OXIGENO_HORAS;
		return true;
	}

	public function getUSO_OXIGENO_HORAS()
	{
		return $this->USO_OXIGENO_HORAS;
	}

	public function setUSO_OXIGENO_DIAS($USO_OXIGENO_DIAS='')
	{
		$this->USO_OXIGENO_DIAS = $USO_OXIGENO_DIAS;
		return true;
	}

	public function getUSO_OXIGENO_DIAS()
	{
		return $this->USO_OXIGENO_DIAS;
	}

	public function setCPAP($CPAP='')
	{
		$this->CPAP = $CPAP;
		return true;
	}

	public function getCPAP()
	{
		return $this->CPAP;
	}

	public function setCPAP_HORAS($CPAP_HORAS='')
	{
		$this->CPAP_HORAS = $CPAP_HORAS;
		return true;
	}

	public function getCPAP_HORAS()
	{
		return $this->CPAP_HORAS;
	}

	public function setCPAP_DIAS($CPAP_DIAS='')
	{
		$this->CPAP_DIAS = $CPAP_DIAS;
		return true;
	}

	public function getCPAP_DIAS()
	{
		return $this->CPAP_DIAS;
	}

	public function setCPAP_TRATAMIENTO_($CPAP_TRATAMIENTO_='')
	{
		$this->CPAP_TRATAMIENTO_ = $CPAP_TRATAMIENTO_;
		return true;
	}

	public function getCPAP_TRATAMIENTO_()
	{
		return $this->CPAP_TRATAMIENTO_;
	}

	public function setCPAP_TRAT_INICIO_SDR_PROFILACTICO($CPAP_TRAT_INICIO_SDR_PROFILACTICO='')
	{
		$this->CPAP_TRAT_INICIO_SDR_PROFILACTICO = $CPAP_TRAT_INICIO_SDR_PROFILACTICO;
		return true;
	}

	public function getCPAP_TRAT_INICIO_SDR_PROFILACTICO()
	{
		return $this->CPAP_TRAT_INICIO_SDR_PROFILACTICO;
	}

	public function setCPAP_TRAT_INICIO_SDR_TERAPEUTICO($CPAP_TRAT_INICIO_SDR_TERAPEUTICO='')
	{
		$this->CPAP_TRAT_INICIO_SDR_TERAPEUTICO = $CPAP_TRAT_INICIO_SDR_TERAPEUTICO;
		return true;
	}

	public function getCPAP_TRAT_INICIO_SDR_TERAPEUTICO()
	{
		return $this->CPAP_TRAT_INICIO_SDR_TERAPEUTICO;
	}

	public function setCPAP_POST_EXTUBACION($CPAP_POST_EXTUBACION='')
	{
		$this->CPAP_POST_EXTUBACION = $CPAP_POST_EXTUBACION;
		return true;
	}

	public function getCPAP_POST_EXTUBACION()
	{
		return $this->CPAP_POST_EXTUBACION;
	}

	public function setCPAP_TRATAMIENTO_APNEA($CPAP_TRATAMIENTO_APNEA='')
	{
		$this->CPAP_TRATAMIENTO_APNEA = $CPAP_TRATAMIENTO_APNEA;
		return true;
	}

	public function getCPAP_TRATAMIENTO_APNEA()
	{
		return $this->CPAP_TRATAMIENTO_APNEA;
	}

	public function setVENTILACION_NASAL_NO_INVASIVA($VENTILACION_NASAL_NO_INVASIVA='')
	{
		$this->VENTILACION_NASAL_NO_INVASIVA = $VENTILACION_NASAL_NO_INVASIVA;
		return true;
	}

	public function getVENTILACION_NASAL_NO_INVASIVA()
	{
		return $this->VENTILACION_NASAL_NO_INVASIVA;
	}

	public function setVENTILACION_NASAL_NO_INVASIVA_HORAS($VENTILACION_NASAL_NO_INVASIVA_HORAS='')
	{
		$this->VENTILACION_NASAL_NO_INVASIVA_HORAS = $VENTILACION_NASAL_NO_INVASIVA_HORAS;
		return true;
	}

	public function getVENTILACION_NASAL_NO_INVASIVA_HORAS()
	{
		return $this->VENTILACION_NASAL_NO_INVASIVA_HORAS;
	}

	public function setVENTILACION_NASAL_NO_INVASIVA_DIAS($VENTILACION_NASAL_NO_INVASIVA_DIAS='')
	{
		$this->VENTILACION_NASAL_NO_INVASIVA_DIAS = $VENTILACION_NASAL_NO_INVASIVA_DIAS;
		return true;
	}

	public function getVENTILACION_NASAL_NO_INVASIVA_DIAS()
	{
		return $this->VENTILACION_NASAL_NO_INVASIVA_DIAS;
	}

	public function setRECIBE_SURFACTANTE($RECIBE_SURFACTANTE='')
	{
		$this->RECIBE_SURFACTANTE = $RECIBE_SURFACTANTE;
		return true;
	}

	public function getRECIBE_SURFACTANTE()
	{
		return $this->RECIBE_SURFACTANTE;
	}

	public function setRECIBE_SURFACTANTE_PROFILACTICO($RECIBE_SURFACTANTE_PROFILACTICO='')
	{
		$this->RECIBE_SURFACTANTE_PROFILACTICO = $RECIBE_SURFACTANTE_PROFILACTICO;
		return true;
	}

	public function getRECIBE_SURFACTANTE_PROFILACTICO()
	{
		return $this->RECIBE_SURFACTANTE_PROFILACTICO;
	}

	public function setRECIBE_SURFACTANTE_SELECTIVO($RECIBE_SURFACTANTE_SELECTIVO='')
	{
		$this->RECIBE_SURFACTANTE_SELECTIVO = $RECIBE_SURFACTANTE_SELECTIVO;
		return true;
	}

	public function getRECIBE_SURFACTANTE_SELECTIVO()
	{
		return $this->RECIBE_SURFACTANTE_SELECTIVO;
	}

	public function setRECIBE_SURFACTANTE_INSURE($RECIBE_SURFACTANTE_INSURE='')
	{
		$this->RECIBE_SURFACTANTE_INSURE = $RECIBE_SURFACTANTE_INSURE;
		return true;
	}

	public function getRECIBE_SURFACTANTE_INSURE()
	{
		return $this->RECIBE_SURFACTANTE_INSURE;
	}

	public function setRECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS($RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS='')
	{
		$this->RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS = $RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS;
		return true;
	}

	public function getRECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS()
	{
		return $this->RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS;
	}

	public function setRECIBE_SURFACTANTE_CANTIDAD_DOSIS($RECIBE_SURFACTANTE_CANTIDAD_DOSIS='')
	{
		$this->RECIBE_SURFACTANTE_CANTIDAD_DOSIS = $RECIBE_SURFACTANTE_CANTIDAD_DOSIS;
		return true;
	}

	public function getRECIBE_SURFACTANTE_CANTIDAD_DOSIS()
	{
		return $this->RECIBE_SURFACTANTE_CANTIDAD_DOSIS;
	}

	public function setPARACETAMOL($PARACETAMOL='')
	{
		$this->PARACETAMOL = $PARACETAMOL;
		return true;
	}

	public function getPARACETAMOL()
	{
		return $this->PARACETAMOL;
	}

	public function setINDOMETACINA($INDOMETACINA='')
	{
		$this->INDOMETACINA = $INDOMETACINA;
		return true;
	}

	public function getINDOMETACINA()
	{
		return $this->INDOMETACINA;
	}

	public function setINDOMETACINA_PROFILACTICO($INDOMETACINA_PROFILACTICO='')
	{
		$this->INDOMETACINA_PROFILACTICO = $INDOMETACINA_PROFILACTICO;
		return true;
	}

	public function getINDOMETACINA_PROFILACTICO()
	{
		return $this->INDOMETACINA_PROFILACTICO;
	}

	public function setINDOMETACINA_TRATAMIENTO($INDOMETACINA_TRATAMIENTO='')
	{
		$this->INDOMETACINA_TRATAMIENTO = $INDOMETACINA_TRATAMIENTO;
		return true;
	}

	public function getINDOMETACINA_TRATAMIENTO()
	{
		return $this->INDOMETACINA_TRATAMIENTO;
	}

	public function setIBUPROFENO($IBUPROFENO='')
	{
		$this->IBUPROFENO = $IBUPROFENO;
		return true;
	}

	public function getIBUPROFENO()
	{
		return $this->IBUPROFENO;
	}

	public function setCORTICOIDES_POST_NATAL($CORTICOIDES_POST_NATAL='')
	{
		$this->CORTICOIDES_POST_NATAL = $CORTICOIDES_POST_NATAL;
		return true;
	}

	public function getCORTICOIDES_POST_NATAL()
	{
		return $this->CORTICOIDES_POST_NATAL;
	}

	public function setNUMERO_TRANSFUSIONES($NUMERO_TRANSFUSIONES='')
	{
		$this->NUMERO_TRANSFUSIONES = $NUMERO_TRANSFUSIONES;
		return true;
	}

	public function getNUMERO_TRANSFUSIONES()
	{
		return $this->NUMERO_TRANSFUSIONES;
	}

	public function setANTIBIOTICO_MENOR_72_HORAS($ANTIBIOTICO_MENOR_72_HORAS='')
	{
		$this->ANTIBIOTICO_MENOR_72_HORAS = $ANTIBIOTICO_MENOR_72_HORAS;
		return true;
	}

	public function getANTIBIOTICO_MENOR_72_HORAS()
	{
		return $this->ANTIBIOTICO_MENOR_72_HORAS;
	}

	public function setNUMERO_CURSOS_ANTIBIOTICOS($NUMERO_CURSOS_ANTIBIOTICOS='')
	{
		$this->NUMERO_CURSOS_ANTIBIOTICOS = $NUMERO_CURSOS_ANTIBIOTICOS;
		return true;
	}

	public function getNUMERO_CURSOS_ANTIBIOTICOS()
	{
		return $this->NUMERO_CURSOS_ANTIBIOTICOS;
	}

	public function setERITROPOYETINA($ERITROPOYETINA='')
	{
		$this->ERITROPOYETINA = $ERITROPOYETINA;
		return true;
	}

	public function getERITROPOYETINA()
	{
		return $this->ERITROPOYETINA;
	}

	public function setTRATAMIENTO_APNEA($TRATAMIENTO_APNEA='')
	{
		$this->TRATAMIENTO_APNEA = $TRATAMIENTO_APNEA;
		return true;
	}

	public function getTRATAMIENTO_APNEA()
	{
		return $this->TRATAMIENTO_APNEA;
	}

	public function setTRATAMIENTO_APNEA_CAFEINA($TRATAMIENTO_APNEA_CAFEINA='')
	{
		$this->TRATAMIENTO_APNEA_CAFEINA = $TRATAMIENTO_APNEA_CAFEINA;
		return true;
	}

	public function getTRATAMIENTO_APNEA_CAFEINA()
	{
		return $this->TRATAMIENTO_APNEA_CAFEINA;
	}

	public function setTRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA($TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA='')
	{
		$this->TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA = $TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA;
		return true;
	}

	public function getTRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA()
	{
		return $this->TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA;
	}

	public function setOXIDO_NITRICO($OXIDO_NITRICO='')
	{
		$this->OXIDO_NITRICO = $OXIDO_NITRICO;
		return true;
	}

	public function getOXIDO_NITRICO()
	{
		return $this->OXIDO_NITRICO;
	}

	public function setEG_POST_NATAL_TERMINO_XANTINAS($EG_POST_NATAL_TERMINO_XANTINAS='')
	{
		$this->EG_POST_NATAL_TERMINO_XANTINAS = $EG_POST_NATAL_TERMINO_XANTINAS;
		return true;
	}

	public function getEG_POST_NATAL_TERMINO_XANTINAS()
	{
		return $this->EG_POST_NATAL_TERMINO_XANTINAS;
	}

	public function setCATETERES_($CATETERES_='')
	{
		$this->CATETERES_ = $CATETERES_;
		return true;
	}

	public function getCATETERES_()
	{
		return $this->CATETERES_;
	}

	public function setCATETER_ARETERIA_UMBILICAL_HORAS($CATETER_ARETERIA_UMBILICAL_HORAS='')
	{
		$this->CATETER_ARETERIA_UMBILICAL_HORAS = $CATETER_ARETERIA_UMBILICAL_HORAS;
		return true;
	}

	public function getCATETER_ARETERIA_UMBILICAL_HORAS()
	{
		return $this->CATETER_ARETERIA_UMBILICAL_HORAS;
	}

	public function setCATETER_ARTERIA_UMBILICAL_DIAS($CATETER_ARTERIA_UMBILICAL_DIAS='')
	{
		$this->CATETER_ARTERIA_UMBILICAL_DIAS = $CATETER_ARTERIA_UMBILICAL_DIAS;
		return true;
	}

	public function getCATETER_ARTERIA_UMBILICAL_DIAS()
	{
		return $this->CATETER_ARTERIA_UMBILICAL_DIAS;
	}

	public function setCATETER_VENA_UMBILCAL($CATETER_VENA_UMBILCAL='')
	{
		$this->CATETER_VENA_UMBILCAL = $CATETER_VENA_UMBILCAL;
		return true;
	}

	public function getCATETER_VENA_UMBILCAL()
	{
		return $this->CATETER_VENA_UMBILCAL;
	}

	public function setCATETER_VENA_UMBILICAL_HORAS($CATETER_VENA_UMBILICAL_HORAS='')
	{
		$this->CATETER_VENA_UMBILICAL_HORAS = $CATETER_VENA_UMBILICAL_HORAS;
		return true;
	}

	public function getCATETER_VENA_UMBILICAL_HORAS()
	{
		return $this->CATETER_VENA_UMBILICAL_HORAS;
	}

	public function setCATETER_VENA_UMBILICAL_DIAS($CATETER_VENA_UMBILICAL_DIAS='')
	{
		$this->CATETER_VENA_UMBILICAL_DIAS = $CATETER_VENA_UMBILICAL_DIAS;
		return true;
	}

	public function getCATETER_VENA_UMBILICAL_DIAS()
	{
		return $this->CATETER_VENA_UMBILICAL_DIAS;
	}

	public function setCATETER_VENOSO_CENTRAL($CATETER_VENOSO_CENTRAL='')
	{
		$this->CATETER_VENOSO_CENTRAL = $CATETER_VENOSO_CENTRAL;
		return true;
	}

	public function getCATETER_VENOSO_CENTRAL()
	{
		return $this->CATETER_VENOSO_CENTRAL;
	}

	public function setCATETER_VENOSO_CENTRAL_HORAS($CATETER_VENOSO_CENTRAL_HORAS='')
	{
		$this->CATETER_VENOSO_CENTRAL_HORAS = $CATETER_VENOSO_CENTRAL_HORAS;
		return true;
	}

	public function getCATETER_VENOSO_CENTRAL_HORAS()
	{
		return $this->CATETER_VENOSO_CENTRAL_HORAS;
	}

	public function setCATETER_VENOSO_CENTRAL_DIAS($CATETER_VENOSO_CENTRAL_DIAS='')
	{
		$this->CATETER_VENOSO_CENTRAL_DIAS = $CATETER_VENOSO_CENTRAL_DIAS;
		return true;
	}

	public function getCATETER_VENOSO_CENTRAL_DIAS()
	{
		return $this->CATETER_VENOSO_CENTRAL_DIAS;
	}

	public function setCATETER_PRECUTANEO($CATETER_PRECUTANEO='')
	{
		$this->CATETER_PRECUTANEO = $CATETER_PRECUTANEO;
		return true;
	}

	public function getCATETER_PRECUTANEO()
	{
		return $this->CATETER_PRECUTANEO;
	}

	public function setCATETER_PRECUTANEO_HORAS($CATETER_PRECUTANEO_HORAS='')
	{
		$this->CATETER_PRECUTANEO_HORAS = $CATETER_PRECUTANEO_HORAS;
		return true;
	}

	public function getCATETER_PRECUTANEO_HORAS()
	{
		return $this->CATETER_PRECUTANEO_HORAS;
	}

	public function setCATETER_PERCUTANEO_DIAS($CATETER_PERCUTANEO_DIAS='')
	{
		$this->CATETER_PERCUTANEO_DIAS = $CATETER_PERCUTANEO_DIAS;
		return true;
	}

	public function getCATETER_PERCUTANEO_DIAS()
	{
		return $this->CATETER_PERCUTANEO_DIAS;
	}

	public function setALIMENTACION_PARENTAL_TOTAL_DIAS($ALIMENTACION_PARENTAL_TOTAL_DIAS='')
	{
		$this->ALIMENTACION_PARENTAL_TOTAL_DIAS = $ALIMENTACION_PARENTAL_TOTAL_DIAS;
		return true;
	}

	public function getALIMENTACION_PARENTAL_TOTAL_DIAS()
	{
		return $this->ALIMENTACION_PARENTAL_TOTAL_DIAS;
	}

	public function setALIMENTACION_PARENTAL_EDAD_INICIO_DIAS($ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS='')
	{
		$this->ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS = $ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS;
		return true;
	}

	public function getALIMENTACION_PARENTAL_EDAD_INICIO_DIAS()
	{
		return $this->ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS;
	}

	public function setINICIO_AMINOACIDOS_EDAD_DIAS($INICIO_AMINOACIDOS_EDAD_DIAS='')
	{
		$this->INICIO_AMINOACIDOS_EDAD_DIAS = $INICIO_AMINOACIDOS_EDAD_DIAS;
		return true;
	}

	public function getINICIO_AMINOACIDOS_EDAD_DIAS()
	{
		return $this->INICIO_AMINOACIDOS_EDAD_DIAS;
	}

	public function setALIMENTACION_PARENTAL_100_ML_EDAD_DIAS($ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS='')
	{
		$this->ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS = $ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS;
		return true;
	}

	public function getALIMENTACION_PARENTAL_100_ML_EDAD_DIAS()
	{
		return $this->ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS;
	}

	public function setINIC($INIC='')
	{
		$this->INIC = $INIC;
		return true;
	}

	public function getINIC()
	{
		return $this->INIC;
	}

	public function setFORTIFICANTE_LECHE_MATERNA($FORTIFICANTE_LECHE_MATERNA='')
	{
		$this->FORTIFICANTE_LECHE_MATERNA = $FORTIFICANTE_LECHE_MATERNA;
		return true;
	}

	public function getFORTIFICANTE_LECHE_MATERNA()
	{
		return $this->FORTIFICANTE_LECHE_MATERNA;
	}

	public function setLECHE_MATERNA_HOSPITALIZACION($LECHE_MATERNA_HOSPITALIZACION='')
	{
		$this->LECHE_MATERNA_HOSPITALIZACION = $LECHE_MATERNA_HOSPITALIZACION;
		return true;
	}

	public function getLECHE_MATERNA_HOSPITALIZACION()
	{
		return $this->LECHE_MATERNA_HOSPITALIZACION;
	}

	public function setLECHE_MAT_HOSP_($LECHE_MAT_HOSP_='')
	{
		$this->LECHE_MAT_HOSP_ = $LECHE_MAT_HOSP_;
		return true;
	}

	public function getLECHE_MAT_HOSP_()
	{
		return $this->LECHE_MAT_HOSP_;
	}

	public function setLECHE_MAT_HOSP_FORMULA_14_DIAS($LECHE_MAT_HOSP_FORMULA_14_DIAS='')
	{
		$this->LECHE_MAT_HOSP_FORMULA_14_DIAS = $LECHE_MAT_HOSP_FORMULA_14_DIAS;
		return true;
	}

	public function getLECHE_MAT_HOSP_FORMULA_14_DIAS()
	{
		return $this->LECHE_MAT_HOSP_FORMULA_14_DIAS;
	}

	public function setLECHE_MAT_HOSP_FORMULA_28_DIAS($LECHE_MAT_HOSP_FORMULA_28_DIAS='')
	{
		$this->LECHE_MAT_HOSP_FORMULA_28_DIAS = $LECHE_MAT_HOSP_FORMULA_28_DIAS;
		return true;
	}

	public function getLECHE_MAT_HOSP_FORMULA_28_DIAS()
	{
		return $this->LECHE_MAT_HOSP_FORMULA_28_DIAS;
	}

	public function setLECHE_MAT_HOSP_FORMULA_36_SEM($LECHE_MAT_HOSP_FORMULA_36_SEM='')
	{
		$this->LECHE_MAT_HOSP_FORMULA_36_SEM = $LECHE_MAT_HOSP_FORMULA_36_SEM;
		return true;
	}

	public function getLECHE_MAT_HOSP_FORMULA_36_SEM()
	{
		return $this->LECHE_MAT_HOSP_FORMULA_36_SEM;
	}

	public function setLECHE_MAT_($LECHE_MAT_='')
	{
		$this->LECHE_MAT_ = $LECHE_MAT_;
		return true;
	}

	public function getLECHE_MAT_()
	{
		return $this->LECHE_MAT_;
	}

	public function setLECHE_MAT_HOSP_14_DIAS($LECHE_MAT_HOSP_14_DIAS='')
	{
		$this->LECHE_MAT_HOSP_14_DIAS = $LECHE_MAT_HOSP_14_DIAS;
		return true;
	}

	public function getLECHE_MAT_HOSP_14_DIAS()
	{
		return $this->LECHE_MAT_HOSP_14_DIAS;
	}

	public function setLECHE_MAT_HOSP_28_DIAS($LECHE_MAT_HOSP_28_DIAS='')
	{
		$this->LECHE_MAT_HOSP_28_DIAS = $LECHE_MAT_HOSP_28_DIAS;
		return true;
	}

	public function getLECHE_MAT_HOSP_28_DIAS()
	{
		return $this->LECHE_MAT_HOSP_28_DIAS;
	}

	public function setLECHE_MAT_HOSP_36_SEM($LECHE_MAT_HOSP_36_SEM='')
	{
		$this->LECHE_MAT_HOSP_36_SEM = $LECHE_MAT_HOSP_36_SEM;
		return true;
	}

	public function getLECHE_MAT_HOSP_36_SEM()
	{
		return $this->LECHE_MAT_HOSP_36_SEM;
	}

	public function setOBSERVACION_EVAL_TRATAMIENTO($OBSERVACION_EVAL_TRATAMIENTO='')
	{
		$this->OBSERVACION_EVAL_TRATAMIENTO = $OBSERVACION_EVAL_TRATAMIENTO;
		return true;
	}

	public function getOBSERVACION_EVAL_TRATAMIENTO()
	{
		return $this->OBSERVACION_EVAL_TRATAMIENTO;
	}

} // END class evolucion_tratamiento