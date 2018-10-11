<?php

/******************************************************************************
* Class for neocosur.oido_diagnostico
*******************************************************************************/

class oido_diagnostico
{
	/**
	* @var int
	*/
	private $ID_DIAGNOSTICO;

	/**
	* @var int
	*/
	private $ID_CONTROL;

	/**
	* @var int
	*/
	private $OIDO;

	/**
	* @var int
	*/
	private $ID_GRADO;

	/**
	* @var int
	*/
	private $ALTERACION_NEUROSENSORIAL;

	/**
	* @var int
	*/
	private $ALTERACION_DE_CONDUCCION;

	/**
	* @var int
	*/
	private $NECESIDAD_DE_TRATAMIENTO;

	/**
	* @var int
	*/
	private $TRAT_;

	/**
	* @var int
	*/
	private $TRAT_IMPLANTE_COCLEAR;

	/**
	* @var int
	*/
	private $TRAT_TERAPIA_AUDITIVA;

	/**
	* @var int
	*/
	private $TERAPIA_AUDITIVA_VERBAL;

	/**
	* @var int
	*/
	private $TARAPIA_AUDITIVA_SENNA;

	/**
	* @var int
	*/
	private $TERAPIA_AUDITIVA_OTRO;

	/**
	* @var string
	*/
	private $TERAPIA_AUDITIVA_OBSERVACIONES;

	

	public function setID_DIAGNOSTICO($ID_DIAGNOSTICO='')
	{
		$this->ID_DIAGNOSTICO = $ID_DIAGNOSTICO;
		return true;
	}

	public function getID_DIAGNOSTICO()
	{
		return $this->ID_DIAGNOSTICO;
	}

	public function setID_CONTROL($ID_CONTROL='')
	{
		$this->ID_CONTROL = $ID_CONTROL;
		return true;
	}

	public function getID_CONTROL()
	{
		return $this->ID_CONTROL;
	}

	public function setOIDO($OIDO='')
	{
		$this->OIDO = $OIDO;
		return true;
	}

	public function getOIDO()
	{
		return $this->OIDO;
	}

	public function setID_GRADO($ID_GRADO='')
	{
		$this->ID_GRADO = $ID_GRADO;
		return true;
	}

	public function getID_GRADO()
	{
		return $this->ID_GRADO;
	}

	public function setALTERACION_NEUROSENSORIAL($ALTERACION_NEUROSENSORIAL='')
	{
		$this->ALTERACION_NEUROSENSORIAL = $ALTERACION_NEUROSENSORIAL;
		return true;
	}

	public function getALTERACION_NEUROSENSORIAL()
	{
		return $this->ALTERACION_NEUROSENSORIAL;
	}

	public function setALTERACION_DE_CONDUCCION($ALTERACION_DE_CONDUCCION='')
	{
		$this->ALTERACION_DE_CONDUCCION = $ALTERACION_DE_CONDUCCION;
		return true;
	}

	public function getALTERACION_DE_CONDUCCION()
	{
		return $this->ALTERACION_DE_CONDUCCION;
	}

	public function setNECESIDAD_DE_TRATAMIENTO($NECESIDAD_DE_TRATAMIENTO='')
	{
		$this->NECESIDAD_DE_TRATAMIENTO = $NECESIDAD_DE_TRATAMIENTO;
		return true;
	}

	public function getNECESIDAD_DE_TRATAMIENTO()
	{
		return $this->NECESIDAD_DE_TRATAMIENTO;
	}

	public function setTRAT_($TRAT_='')
	{
		$this->TRAT_ = $TRAT_;
		return true;
	}

	public function getTRAT_()
	{
		return $this->TRAT_;
	}

	public function setTRAT_IMPLANTE_COCLEAR($TRAT_IMPLANTE_COCLEAR='')
	{
		$this->TRAT_IMPLANTE_COCLEAR = $TRAT_IMPLANTE_COCLEAR;
		return true;
	}

	public function getTRAT_IMPLANTE_COCLEAR()
	{
		return $this->TRAT_IMPLANTE_COCLEAR;
	}

	public function setTRAT_TERAPIA_AUDITIVA($TRAT_TERAPIA_AUDITIVA='')
	{
		$this->TRAT_TERAPIA_AUDITIVA = $TRAT_TERAPIA_AUDITIVA;
		return true;
	}

	public function getTRAT_TERAPIA_AUDITIVA()
	{
		return $this->TRAT_TERAPIA_AUDITIVA;
	}

	public function setTERAPIA_AUDITIVA_VERBAL($TERAPIA_AUDITIVA_VERBAL='')
	{
		$this->TERAPIA_AUDITIVA_VERBAL = $TERAPIA_AUDITIVA_VERBAL;
		return true;
	}

	public function getTERAPIA_AUDITIVA_VERBAL()
	{
		return $this->TERAPIA_AUDITIVA_VERBAL;
	}

	public function setTARAPIA_AUDITIVA_SENNA($TARAPIA_AUDITIVA_SENNA='')
	{
		$this->TARAPIA_AUDITIVA_SENNA = $TARAPIA_AUDITIVA_SENNA;
		return true;
	}

	public function getTARAPIA_AUDITIVA_SENNA()
	{
		return $this->TARAPIA_AUDITIVA_SENNA;
	}

	public function setTERAPIA_AUDITIVA_OTRO($TERAPIA_AUDITIVA_OTRO='')
	{
		$this->TERAPIA_AUDITIVA_OTRO = $TERAPIA_AUDITIVA_OTRO;
		return true;
	}

	public function getTERAPIA_AUDITIVA_OTRO()
	{
		return $this->TERAPIA_AUDITIVA_OTRO;
	}

	public function setTERAPIA_AUDITIVA_OBSERVACIONES($TERAPIA_AUDITIVA_OBSERVACIONES='')
	{
		$this->TERAPIA_AUDITIVA_OBSERVACIONES = $TERAPIA_AUDITIVA_OBSERVACIONES;
		return true;
	}

	public function getTERAPIA_AUDITIVA_OBSERVACIONES()
	{
		return $this->TERAPIA_AUDITIVA_OBSERVACIONES;
	}

} // END class oido_diagnostico