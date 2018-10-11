<?php

/******************************************************************************
* Class for neocosur.informacion_alta
*******************************************************************************/

class informacion_alta
{
	/**
	* @var int
	*/
	private $ID_INFORMACION_ALTA;

	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $FECCHA_ALTA_FALLECE;

	/**
	* @var int
	*/
	private $ID_DESTINO;

	/**
	* @var int
	*/
	private $OXIGENO_DOMICILIARIO;

	/**
	* @var int
	*/
	private $FALLECE_MENOR_DIA_HORAS;
	
	private $AUTOPSIA;
	/**
	* @var int
	*/
	private $RESULTADO_AUTOPSIA;

	/**
	* @var int
	*/
	private $ID_SITUACION_MUERTE;

	/**
	* @var string
	*/
	private $OBSERVACIONES_;

	/**
	* @var int
	*/
	private $CAUSA_PROBABLE_MALFORMACIONES;

	/**
	* @var int
	*/
	private $CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA;

	/**
	* @var int
	*/
	private $CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO;

	/**
	* @var int
	*/
	private $CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA;

	/**
	* @var int
	*/
	private $CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA;

	/**
	* @var int
	*/
	private $CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA;

	/**
	* @var int
	*/
	private $CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO;

	/**
	* @var int
	*/
	private $CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA;

	/**
	* @var int
	*/
	private $CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL;

	/**
	* @var int
	*/
	private $CAUSA_PROBABLE_SITUACION_MUERTE_OTRA;

	/**
	* @var int
	*/
	private $CAUSA_PROBABLE_SITUACION_MURTE_CAUSA;

	/**
	* @var string
	*/
	private $OBSERVACIONES_CAUSA_PROBABLE_MUERTE;
        
        
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

	

	public function setID_INFORMACION_ALTA($ID_INFORMACION_ALTA='')
	{
		$this->ID_INFORMACION_ALTA = $ID_INFORMACION_ALTA;
		return true;
	}

	public function getID_INFORMACION_ALTA()
	{
		return $this->ID_INFORMACION_ALTA;
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

	public function setFECCHA_ALTA_FALLECE($FECCHA_ALTA_FALLECE='')
	{
		$this->FECCHA_ALTA_FALLECE = $FECCHA_ALTA_FALLECE;
		return true;
	}

	public function getFECCHA_ALTA_FALLECE()
	{
		return $this->FECCHA_ALTA_FALLECE;
	}

	public function setID_DESTINO($ID_DESTINO='')
	{
		$this->ID_DESTINO = $ID_DESTINO;
		return true;
	}

	public function getID_DESTINO()
	{
		return $this->ID_DESTINO;
	}

	public function setOXIGENO_DOMICILIARIO($OXIGENO_DOMICILIARIO='')
	{
		$this->OXIGENO_DOMICILIARIO = $OXIGENO_DOMICILIARIO;
		return true;
	}

	public function getOXIGENO_DOMICILIARIO()
	{
		return $this->OXIGENO_DOMICILIARIO;
	}

	public function setFALLECE_MENOR_DIA_HORAS($FALLECE_MENOR_DIA_HORAS='')
	{
		$this->FALLECE_MENOR_DIA_HORAS = $FALLECE_MENOR_DIA_HORAS;
		return true;
	}

	public function getFALLECE_MENOR_DIA_HORAS()
	{
		return $this->FALLECE_MENOR_DIA_HORAS;
	}

	public function setRESULTADO_AUTOPSIA($RESULTADO_AUTOPSIA='')
	{
		$this->RESULTADO_AUTOPSIA = $RESULTADO_AUTOPSIA;
		return true;
	}

	public function getRESULTADO_AUTOPSIA()
	{
		return $this->RESULTADO_AUTOPSIA;
	}

	public function setID_SITUACION_MUERTE($ID_SITUACION_MUERTE='')
	{
		$this->ID_SITUACION_MUERTE = $ID_SITUACION_MUERTE;
		return true;
	}

	public function getID_SITUACION_MUERTE()
	{
		return $this->ID_SITUACION_MUERTE;
	}

	public function setOBSERVACIONES_($OBSERVACIONES_='')
	{
		$this->OBSERVACIONES_ = $OBSERVACIONES_;
		return true;
	}

	public function getOBSERVACIONES_()
	{
		return $this->OBSERVACIONES_;
	}

	public function setCAUSA_PROBABLE_($CAUSA_PROBABLE_MALFORMACIONES='')
	{
		$this->CAUSA_PROBABLE_MALFORMACIONES = $CAUSA_PROBABLE_MALFORMACIONES;
		return true;
	}

	public function getCAUSA_PROBABLE_MALFORMACIONES()
	{
		return $this->CAUSA_PROBABLE_MALFORMACIONES;
	}

	public function setCAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA($CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA='')
	{
		$this->CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA = $CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA;
		return true;
	}

	public function getCAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA()
	{
		return $this->CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA;
	}

	public function setCAUSA_PROBABLE_PARO_CARDIORESPIRATORIO($CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO='')
	{
		$this->CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO = $CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO;
		return true;
	}

	public function getCAUSA_PROBABLE_PARO_CARDIORESPIRATORIO()
	{
		return $this->CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO;
	}

	public function setCAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA($CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA='')
	{
		$this->CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA = $CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA;
		return true;
	}

	public function getCAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA()
	{
		return $this->CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA;
	}

	public function setCAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA($CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA='')
	{
		$this->CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA = $CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA;
		return true;
	}

	public function getCAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA()
	{
		return $this->CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA;
	}

	public function setCAUSA_PARO_CARDIORESPIRATORIO_CARDIACA($CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA='')
	{
		$this->CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA = $CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA;
		return true;
	}

	public function getCAUSA_PARO_CARDIORESPIRATORIO_CARDIACA()
	{
		return $this->CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA;
	}

	public function setCAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO($CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO='')
	{
		$this->CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO = $CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO;
		return true;
	}

	public function getCAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO()
	{
		return $this->CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO;
	}

	public function setCAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA($CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA='')
	{
		$this->CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA = $CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA;
		return true;
	}

	public function getCAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA()
	{
		return $this->CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA;
	}

	public function setCAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL($CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL='')
	{
		$this->CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL = $CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL;
		return true;
	}

	public function getCAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL()
	{
		return $this->CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL;
	}

	public function setCAUSA_PROBABLE_SITUACION_MUERTE_OTRA($CAUSA_PROBABLE_SITUACION_MUERTE_OTRA='')
	{
		$this->CAUSA_PROBABLE_SITUACION_MUERTE_OTRA = $CAUSA_PROBABLE_SITUACION_MUERTE_OTRA;
		return true;
	}

	public function getCAUSA_PROBABLE_SITUACION_MUERTE_OTRA()
	{
		return $this->CAUSA_PROBABLE_SITUACION_MUERTE_OTRA;
	}

	public function setCAUSA_PROBABLE_SITUACION_MURTE_CAUSA($CAUSA_PROBABLE_SITUACION_MURTE_CAUSA='')
	{
		$this->CAUSA_PROBABLE_SITUACION_MURTE_CAUSA = $CAUSA_PROBABLE_SITUACION_MURTE_CAUSA;
		return true;
	}

	public function getCAUSA_PROBABLE_SITUACION_MURTE_CAUSA()
	{
		return $this->CAUSA_PROBABLE_SITUACION_MURTE_CAUSA;
	}

	public function setOBSERVACIONES_CAUSA_PROBABLE_MUERTE($OBSERVACIONES_CAUSA_PROBABLE_MUERTE='')
	{
		$this->OBSERVACIONES_CAUSA_PROBABLE_MUERTE = $OBSERVACIONES_CAUSA_PROBABLE_MUERTE;
		return true;
	}

	public function getOBSERVACIONES_CAUSA_PROBABLE_MUERTE()
	{
		return $this->OBSERVACIONES_CAUSA_PROBABLE_MUERTE;
	}

} // END class informacion_alta