<?php

/******************************************************************************
* Class for neocosur.diagnostico
*******************************************************************************/

class diagnostico
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
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $ID_CALIFICACION_NUTRICIONAL;

	/**
	* @var int
	*/
	private $DESARROLLO_PSICOMOTOR;

	/**
	* @var string
	*/
	private $OBSERVACIONES;

	/**
	* @var int
	*/
	private $INTERCONSULTA;

	/**
	* @var int
	*/
	private $EXAMENES;

	/**
	* @var string
	*/
	private $INDICACIONES;

	

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

	public function setID_NEOCOSUR($ID_NEOCOSUR='')
	{
		$this->ID_NEOCOSUR = $ID_NEOCOSUR;
		return true;
	}

	public function getID_NEOCOSUR()
	{
		return $this->ID_NEOCOSUR;
	}

	public function setID_CALIFICACION_NUTRICIONAL($ID_CALIFICACION_NUTRICIONAL='')
	{
		$this->ID_CALIFICACION_NUTRICIONAL = $ID_CALIFICACION_NUTRICIONAL;
		return true;
	}

	public function getID_CALIFICACION_NUTRICIONAL()
	{
		return $this->ID_CALIFICACION_NUTRICIONAL;
	}

	public function setDESARROLLO_PSICOMOTOR($DESARROLLO_PSICOMOTOR='')
	{
		$this->DESARROLLO_PSICOMOTOR = $DESARROLLO_PSICOMOTOR;
		return true;
	}

	public function getDESARROLLO_PSICOMOTOR()
	{
		return $this->DESARROLLO_PSICOMOTOR;
	}

	public function setOBSERVACIONES($OBSERVACIONES='')
	{
		$this->OBSERVACIONES = $OBSERVACIONES;
		return true;
	}

	public function getOBSERVACIONES()
	{
		return $this->OBSERVACIONES;
	}

	public function setINTERCONSULTA($INTERCONSULTA='')
	{
		$this->INTERCONSULTA = $INTERCONSULTA;
		return true;
	}

	public function getINTERCONSULTA()
	{
		return $this->INTERCONSULTA;
	}

	public function setEXAMENES($EXAMENES='')
	{
		$this->EXAMENES = $EXAMENES;
		return true;
	}

	public function getEXAMENES()
	{
		return $this->EXAMENES;
	}

	public function setINDICACIONES($INDICACIONES='')
	{
		$this->INDICACIONES = $INDICACIONES;
		return true;
	}

	public function getINDICACIONES()
	{
		return $this->INDICACIONES;
	}

} // END class diagnostico
