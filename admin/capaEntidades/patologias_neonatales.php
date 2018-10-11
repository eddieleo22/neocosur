<?php

/******************************************************************************
* Class for neocosur.patologias_neonatales
*******************************************************************************/

class patologias_neonatales
{
	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $CLINICA_SDR;

	/**
	* @var int
	*/
	private $HIC;

	/**
	* @var int
	*/
	private $RADIOGRAFIA_TORAX_ALTERADA;

	/**
	* @var int
	*/
	private $LEUCOMALACIA;

	/**
	* @var int
	*/
	private $OXIGENO_28_DIAS;
	private $ID_HIC_GRADO;
	private $HEMORRAGIA_PULMONAR;

	/**
	* @var int
	*/
	private $OXIGENO_36_SEMANAS;

	/**
	* @var int
	*/
	private $HIDROCEFALIA;

	/**
	* @var int
	*/
	private $ID_SEVERIDAD_DISPLACIA;

	/**
	* @var int
	*/
	private $CONVULSIONES;

	/**
	* @var int
	*/
	private $ECO_CEREBRAL_MENOR_7_DIAS;

	/**
	* @var int
	*/
	private $ECO_CEREBRAL_7_21_DIAS;

	/**
	* @var int
	*/
	private $ECO_CREBRAL_MAYOR_21_DIAS;

	/**
	* @var int
	*/
	private $RUP_ALVEOLAR;

	/**
	* @var int
	*/
	private $RUP_ALVEOLAR_NEUMOTORAX;

	/**
	* @var int
	*/
	private $RUP_ALVEOLAR_NEUMOMEDIASTINO;

	/**
	* @var int
	*/
	private $RUP_ALVEOLAR_EFISEMA_INTERSTICIAL;

	/**
	* @var int
	*/
	private $ENTEROCOLITIS_;

	/**
	* @var int
	*/
	private $DG_ENTEROCOLITIS_DIAS;

	/**
	* @var int
	*/
	private $PERFORACION_INTESTINAL;

	/**
	* @var int
	*/
	private $DUCTUS;

	/**
	* @var int
	*/
	private $DUCTUS_CLINICO;

	/**
	* @var int
	*/
	private $DUCTUS_ECOGRAFICO;

	/**
	* @var int
	*/
	private $EVALUACION_OFTALMOLOGICA_PREVIA_ALTA;

	/**
	* @var int
	*/
	private $ROP_OJO_IZQ;

	/**
	* @var int
	*/
	private $ID_LOCALIZACION_OJO_IZQ;

	/**
	* @var int
	*/
	private $ID_SEVERIDAD_OJO_IZQ;

	/**
	* @var int
	*/
	private $ENF_PLUS_OJO_IZQ;

	/**
	* @var int
	*/
	private $CIRUGIA_ROP_OJO_IZQ;

	/**
	* @var int
	*/
	private $ID_TIPO_CIRUGIA_ROP_OJO_IZQ;

	/**
	* @var int
	*/
	private $ROP_OJO_DER;

	/**
	* @var int
	*/
	private $ID_LOCALIZACION_OJO_DER;

	/**
	* @var int
	*/
	private $ID_SEVERIDAD_OJO_DER;

	/**
	* @var int
	*/
	private $ENF_PLUS_OJO_DER;

	/**
	* @var int
	*/
	private $CIRUGIA_ROP_OJO_DER;

	/**
	* @var int
	*/
	private $ID_TIPO_CIRUGIA_ROP_OJO_DER;

	/**
	* @var int
	*/
	private $PRIMER_FONDO_OJO_DIAS;

	/**
	* @var int
	*/
	private $BEVACIZUMAB;

	/**
	* @var int
	*/
	private $SEPSIS_PRECOZ;

	/**
	* @var int
	*/
	private $ID_TIPO_GERMEN_PRECOZ;

	/**
	* @var int
	*/
	private $SEPSIS_PRECOZ_HEMOCULTIVO;

	/**
	* @var int
	*/
	private $SEPSIS_PRECOZ_LCR_POSITIVO;

	/**
	* @var int
	*/
	private $SEPSIS_TARDIA;

	/**
	* @var int
	*/
	private $NUMERO_SEPSIS_CLINICAS;

	/**
	* @var int
	*/
	private $LCR_POSITIVO_DIAS;

	/**
	* @var int
	*/
	private $ID_TIPO_GERMEN_LCR;
     

	private $EVA_PESQUISA;	
	private $EVA_AUTO;	
	private $EVA_AUTO_NOR;	
	private $EVA_EXT;	
	private $EVA_EXT_NOR;	
	private $EVA_EMI;	
	private $EVA_EMI_NOR;	
        
         public function __construct() {
            
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


	
        	public function setID_NEOCOSUR($ID_NEOCOSUR='')
	{
		$this->ID_NEOCOSUR = $ID_NEOCOSUR;
		return true;
	}

	public function getID_NEOCOSUR()
	{
		return $this->ID_NEOCOSUR;
	}

	public function setCLINICA_SDR($CLINICA_SDR='')
	{
		$this->CLINICA_SDR = $CLINICA_SDR;
		return true;
	}

	public function getCLINICA_SDR()
	{
		return $this->CLINICA_SDR;
	}

	public function setID_HIC_GRADO($ID_HIC_GRADO='')
	{
		$this->ID_HIC_GRADO = $ID_HIC_GRADO;
		return true;
	}

	public function getID_HIC_GRADO()
	{
		return $this->ID_HIC_GRADO;
	}

	public function setRADIOGRAFIA_TORAX_ALTERADA($RADIOGRAFIA_TORAX_ALTERADA='')
	{
		$this->RADIOGRAFIA_TORAX_ALTERADA = $RADIOGRAFIA_TORAX_ALTERADA;
		return true;
	}

	public function getRADIOGRAFIA_TORAX_ALTERADA()
	{
		return $this->RADIOGRAFIA_TORAX_ALTERADA;
	}

	public function setLEUCOMALACIA($LEUCOMALACIA='')
	{
		$this->LEUCOMALACIA = $LEUCOMALACIA;
		return true;
	}

	public function getLEUCOMALACIA()
	{
		return $this->LEUCOMALACIA;
	}

	public function setOXIGENO_28_DIAS($OXIGENO_28_DIAS='')
	{
		$this->OXIGENO_28_DIAS = $OXIGENO_28_DIAS;
		return true;
	}

	public function getOXIGENO_28_DIAS()
	{
		return $this->OXIGENO_28_DIAS;
	}

	public function setOXIGENO_36_SEMANAS($OXIGENO_36_SEMANAS='')
	{
		$this->OXIGENO_36_SEMANAS = $OXIGENO_36_SEMANAS;
		return true;
	}

	public function getOXIGENO_36_SEMANAS()
	{
		return $this->OXIGENO_36_SEMANAS;
	}

	public function setHIDROCEFALIA($HIDROCEFALIA='')
	{
		$this->HIDROCEFALIA = $HIDROCEFALIA;
		return true;
	}

	public function getHIDROCEFALIA()
	{
		return $this->HIDROCEFALIA;
	}

	public function setID_SEVERIDAD_DISPLACIA($ID_SEVERIDAD_DISPLACIA='')
	{
		$this->ID_SEVERIDAD_DISPLACIA = $ID_SEVERIDAD_DISPLACIA;
		return true;
	}

	public function getID_SEVERIDAD_DISPLACIA()
	{
		return $this->ID_SEVERIDAD_DISPLACIA;
	}

	public function setCONVULSIONES($CONVULSIONES='')
	{
		$this->CONVULSIONES = $CONVULSIONES;
		return true;
	}

	public function getCONVULSIONES()
	{
		return $this->CONVULSIONES;
	}

	public function setECO_CEREBRAL_MENOR_7_DIAS($ECO_CEREBRAL_MENOR_7_DIAS='')
	{
		$this->ECO_CEREBRAL_MENOR_7_DIAS = $ECO_CEREBRAL_MENOR_7_DIAS;
		return true;
	}

	public function getECO_CEREBRAL_MENOR_7_DIAS()
	{
		return $this->ECO_CEREBRAL_MENOR_7_DIAS;
	}

	public function setECO_CEREBRAL_7_21_DIAS($ECO_CEREBRAL_7_21_DIAS='')
	{
		$this->ECO_CEREBRAL_7_21_DIAS = $ECO_CEREBRAL_7_21_DIAS;
		return true;
	}

	public function getECO_CEREBRAL_7_21_DIAS()
	{
		return $this->ECO_CEREBRAL_7_21_DIAS;
	}

	public function setECO_CREBRAL_MAYOR_21_DIAS($ECO_CREBRAL_MAYOR_21_DIAS='')
	{
		$this->ECO_CREBRAL_MAYOR_21_DIAS = $ECO_CREBRAL_MAYOR_21_DIAS;
		return true;
	}

	public function getECO_CREBRAL_MAYOR_21_DIAS()
	{
		return $this->ECO_CREBRAL_MAYOR_21_DIAS;
	}

	public function setRUP_ALVEOLAR($RUP_ALVEOLAR='')
	{
		$this->RUP_ALVEOLAR = $RUP_ALVEOLAR;
		return true;
	}

	public function getRUP_ALVEOLAR()
	{
		return $this->RUP_ALVEOLAR;
	}

	public function setRUP_ALVEOLAR_NEUMOTORAX($RUP_ALVEOLAR_NEUMOTORAX='')
	{
		$this->RUP_ALVEOLAR_NEUMOTORAX = $RUP_ALVEOLAR_NEUMOTORAX;
		return true;
	}

	public function getRUP_ALVEOLAR_NEUMOTORAX()
	{
		return $this->RUP_ALVEOLAR_NEUMOTORAX;
	}

	public function setRUP_ALVEOLAR_NEUMOMEDIASTINO($RUP_ALVEOLAR_NEUMOMEDIASTINO='')
	{
		$this->RUP_ALVEOLAR_NEUMOMEDIASTINO = $RUP_ALVEOLAR_NEUMOMEDIASTINO;
		return true;
	}

	public function getRUP_ALVEOLAR_NEUMOMEDIASTINO()
	{
		return $this->RUP_ALVEOLAR_NEUMOMEDIASTINO;
	}

	public function setRUP_ALVEOLAR_EFISEMA_INTERSTICIAL($RUP_ALVEOLAR_EFISEMA_INTERSTICIAL='')
	{
		$this->RUP_ALVEOLAR_EFISEMA_INTERSTICIAL = $RUP_ALVEOLAR_EFISEMA_INTERSTICIAL;
		return true;
	}

	public function getRUP_ALVEOLAR_EFISEMA_INTERSTICIAL()
	{
		return $this->RUP_ALVEOLAR_EFISEMA_INTERSTICIAL;
	}

	public function setENTEROCOLITIS_($ENTEROCOLITIS_='')
	{
		$this->ENTEROCOLITIS_ = $ENTEROCOLITIS_;
		return true;
	}

	public function getENTEROCOLITIS_()
	{
		return $this->ENTEROCOLITIS_;
	}

	public function setDG_ENTEROCOLITIS_DIAS($DG_ENTEROCOLITIS_DIAS='')
	{
		$this->DG_ENTEROCOLITIS_DIAS = $DG_ENTEROCOLITIS_DIAS;
		return true;
	}

	public function getDG_ENTEROCOLITIS_DIAS()
	{
		return $this->DG_ENTEROCOLITIS_DIAS;
	}

	public function setPERFORACION_INTESTINAL($PERFORACION_INTESTINAL='')
	{
		$this->PERFORACION_INTESTINAL = $PERFORACION_INTESTINAL;
		return true;
	}

	public function getPERFORACION_INTESTINAL()
	{
		return $this->PERFORACION_INTESTINAL;
	}

	public function setDUCTUS($DUCTUS='')
	{
		$this->DUCTUS = $DUCTUS;
		return true;
	}

	public function getDUCTUS()
	{
		return $this->DUCTUS;
	}

	public function setDUCTUS_CLINICO($DUCTUS_CLINICO='')
	{
		$this->DUCTUS_CLINICO = $DUCTUS_CLINICO;
		return true;
	}

	public function getDUCTUS_CLINICO()
	{
		return $this->DUCTUS_CLINICO;
	}

	public function setDUCTUS_ECOGRAFICO($DUCTUS_ECOGRAFICO='')
	{
		$this->DUCTUS_ECOGRAFICO = $DUCTUS_ECOGRAFICO;
		return true;
	}

	public function getDUCTUS_ECOGRAFICO()
	{
		return $this->DUCTUS_ECOGRAFICO;
	}

	public function setEVALUACION_OFTALMOLOGICA_PREVIA_ALTA($EVALUACION_OFTALMOLOGICA_PREVIA_ALTA='')
	{
		$this->EVALUACION_OFTALMOLOGICA_PREVIA_ALTA = $EVALUACION_OFTALMOLOGICA_PREVIA_ALTA;
		return true;
	}

	public function getEVALUACION_OFTALMOLOGICA_PREVIA_ALTA()
	{
		return $this->EVALUACION_OFTALMOLOGICA_PREVIA_ALTA;
	}

	public function setROP_OJO_IZQ($ROP_OJO_IZQ='')
	{
		$this->ROP_OJO_IZQ = $ROP_OJO_IZQ;
		return true;
	}

	public function getROP_OJO_IZQ()
	{
		return $this->ROP_OJO_IZQ;
	}

	public function setID_LOCALIZACION_OJO_IZQ($ID_LOCALIZACION_OJO_IZQ='')
	{
		$this->ID_LOCALIZACION_OJO_IZQ = $ID_LOCALIZACION_OJO_IZQ;
		return true;
	}

	public function getID_LOCALIZACION_OJO_IZQ()
	{
		return $this->ID_LOCALIZACION_OJO_IZQ;
	}

	public function setID_SEVERIDAD_OJO_IZQ($ID_SEVERIDAD_OJO_IZQ='')
	{
		$this->ID_SEVERIDAD_OJO_IZQ = $ID_SEVERIDAD_OJO_IZQ;
		return true;
	}

	public function getID_SEVERIDAD_OJO_IZQ()
	{
		return $this->ID_SEVERIDAD_OJO_IZQ;
	}

	public function setENF_PLUS_OJO_IZQ($ENF_PLUS_OJO_IZQ='')
	{
		$this->ENF_PLUS_OJO_IZQ = $ENF_PLUS_OJO_IZQ;
		return true;
	}

	public function getENF_PLUS_OJO_IZQ()
	{
		return $this->ENF_PLUS_OJO_IZQ;
	}

	public function setCIRUGIA_ROP_OJO_IZQ($CIRUGIA_ROP_OJO_IZQ='')
	{
		$this->CIRUGIA_ROP_OJO_IZQ = $CIRUGIA_ROP_OJO_IZQ;
		return true;
	}

	public function getCIRUGIA_ROP_OJO_IZQ()
	{
		return $this->CIRUGIA_ROP_OJO_IZQ;
	}

	public function setID_TIPO_CIRUGIA_ROP_OJO_IZQ($ID_TIPO_CIRUGIA_ROP_OJO_IZQ='')
	{
		$this->ID_TIPO_CIRUGIA_ROP_OJO_IZQ = $ID_TIPO_CIRUGIA_ROP_OJO_IZQ;
		return true;
	}

	public function getID_TIPO_CIRUGIA_ROP_OJO_IZQ()
	{
		return $this->ID_TIPO_CIRUGIA_ROP_OJO_IZQ;
	}

	public function setROP_OJO_DER($ROP_OJO_DER='')
	{
		$this->ROP_OJO_DER = $ROP_OJO_DER;
		return true;
	}

	public function getROP_OJO_DER()
	{
		return $this->ROP_OJO_DER;
	}

	public function setID_LOCALIZACION_OJO_DER($ID_LOCALIZACION_OJO_DER='')
	{
		$this->ID_LOCALIZACION_OJO_DER = $ID_LOCALIZACION_OJO_DER;
		return true;
	}

	public function getID_LOCALIZACION_OJO_DER()
	{
		return $this->ID_LOCALIZACION_OJO_DER;
	}

	public function setID_SEVERIDAD_OJO_DER($ID_SEVERIDAD_OJO_DER='')
	{
		$this->ID_SEVERIDAD_OJO_DER = $ID_SEVERIDAD_OJO_DER;
		return true;
	}

	public function getID_SEVERIDAD_OJO_DER()
	{
		return $this->ID_SEVERIDAD_OJO_DER;
	}

	public function setENF_PLUS_OJO_DER($ENF_PLUS_OJO_DER='')
	{
		$this->ENF_PLUS_OJO_DER = $ENF_PLUS_OJO_DER;
		return true;
	}

	public function getENF_PLUS_OJO_DER()
	{
		return $this->ENF_PLUS_OJO_DER;
	}

	public function setCIRUGIA_ROP_OJO_DER($CIRUGIA_ROP_OJO_DER='')
	{
		$this->CIRUGIA_ROP_OJO_DER = $CIRUGIA_ROP_OJO_DER;
		return true;
	}

	public function getCIRUGIA_ROP_OJO_DER()
	{
		return $this->CIRUGIA_ROP_OJO_DER;
	}

	public function setID_TIPO_CIRUGIA_ROP_OJO_DER($ID_TIPO_CIRUGIA_ROP_OJO_DER='')
	{
		$this->ID_TIPO_CIRUGIA_ROP_OJO_DER = $ID_TIPO_CIRUGIA_ROP_OJO_DER;
		return true;
	}

	public function getID_TIPO_CIRUGIA_ROP_OJO_DER()
	{
		return $this->ID_TIPO_CIRUGIA_ROP_OJO_DER;
	}

	public function setPRIMER_FONDO_OJO_DIAS($PRIMER_FONDO_OJO_DIAS='')
	{
		$this->PRIMER_FONDO_OJO_DIAS = $PRIMER_FONDO_OJO_DIAS;
		return true;
	}

	public function getPRIMER_FONDO_OJO_DIAS()
	{
		return $this->PRIMER_FONDO_OJO_DIAS;
	}

	public function setBEVACIZUMAB($BEVACIZUMAB='')
	{
		$this->BEVACIZUMAB = $BEVACIZUMAB;
		return true;
	}

	public function getBEVACIZUMAB()
	{
		return $this->BEVACIZUMAB;
	}

	public function setSEPSIS_PRECOZ($SEPSIS_PRECOZ='')
	{
		$this->SEPSIS_PRECOZ = $SEPSIS_PRECOZ;
		return true;
	}

	public function getSEPSIS_PRECOZ()
	{
		return $this->SEPSIS_PRECOZ;
	}

	public function setID_TIPO_GERMEN_PRECOZ($ID_TIPO_GERMEN_PRECOZ='')
	{
		$this->ID_TIPO_GERMEN_PRECOZ = $ID_TIPO_GERMEN_PRECOZ;
		return true;
	}

	public function getID_TIPO_GERMEN_PRECOZ()
	{
		return $this->ID_TIPO_GERMEN_PRECOZ;
	}

	public function setSEPSIS_PRECOZ_HEMOCULTIVO($SEPSIS_PRECOZ_HEMOCULTIVO='')
	{
		$this->SEPSIS_PRECOZ_HEMOCULTIVO = $SEPSIS_PRECOZ_HEMOCULTIVO;
		return true;
	}

	public function getSEPSIS_PRECOZ_HEMOCULTIVO()
	{
		return $this->SEPSIS_PRECOZ_HEMOCULTIVO;
	}

	public function setSEPSIS_PRECOZ_LCR_POSITIVO($SEPSIS_PRECOZ_LCR_POSITIVO='')
	{
		$this->SEPSIS_PRECOZ_LCR_POSITIVO = $SEPSIS_PRECOZ_LCR_POSITIVO;
		return true;
	}

	public function getSEPSIS_PRECOZ_LCR_POSITIVO()
	{
		return $this->SEPSIS_PRECOZ_LCR_POSITIVO;
	}

	public function setSEPSIS_TARDIA($SEPSIS_TARDIA='')
	{
		$this->SEPSIS_TARDIA = $SEPSIS_TARDIA;
		return true;
	}

	public function getSEPSIS_TARDIA()
	{
		return $this->SEPSIS_TARDIA;
	}

	public function setNUMERO_SEPSIS_CLINICAS($NUMERO_SEPSIS_CLINICAS='')
	{
		$this->NUMERO_SEPSIS_CLINICAS = $NUMERO_SEPSIS_CLINICAS;
		return true;
	}

	public function getNUMERO_SEPSIS_CLINICAS()
	{
		return $this->NUMERO_SEPSIS_CLINICAS;
	}

	public function setLCR_POSITIVO_DIAS($LCR_POSITIVO_DIAS='')
	{
		$this->LCR_POSITIVO_DIAS = $LCR_POSITIVO_DIAS;
		return true;
	}

	public function getLCR_POSITIVO_DIAS()
	{
		return $this->LCR_POSITIVO_DIAS;
	}

	public function setID_TIPO_GERMEN_LCR($ID_TIPO_GERMEN_LCR='')
	{
		$this->ID_TIPO_GERMEN_LCR = $ID_TIPO_GERMEN_LCR;
		return true;
	}

	public function getID_TIPO_GERMEN_LCR()
	{
		return $this->ID_TIPO_GERMEN_LCR;
	}

} // END class patologias_neonatales