<?php

/******************************************************************************
* Class for neocosur.sepsis_tardia
*******************************************************************************/

class sepsis_tardia
{
	/**
	* @var int
	*/
	private $ID_SEPSIS;

	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $ID_PARAMETRO_SEPSIS;

	/**
	* @var int
	*/
	private $EDAD_SEPSIS;

	/**
	* @var string
	*/
	private $OTRO_SEPSIS;

	/**
	* @var string
	*/
	private $TIPO;

	

	public function setID_SEPSIS($ID_SEPSIS='')
	{
		$this->ID_SEPSIS = $ID_SEPSIS;
		return true;
	}

	public function getID_SEPSIS()
	{
		return $this->ID_SEPSIS;
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

	public function setID_PARAMETRO_SEPSIS($ID_PARAMETRO_SEPSIS='')
	{
		$this->ID_PARAMETRO_SEPSIS = $ID_PARAMETRO_SEPSIS;
		return true;
	}

	public function getID_PARAMETRO_SEPSIS()
	{
		return $this->ID_PARAMETRO_SEPSIS;
	}

	public function setEDAD_SEPSIS($EDAD_SEPSIS='')
	{
		$this->EDAD_SEPSIS = $EDAD_SEPSIS;
		return true;
	}

	public function getEDAD_SEPSIS()
	{
		return $this->EDAD_SEPSIS;
	}

	public function setOTRO_SEPSIS($OTRO_SEPSIS='')
	{
		$this->OTRO_SEPSIS = $OTRO_SEPSIS;
		return true;
	}

	public function getOTRO_SEPSIS()
	{
		return $this->OTRO_SEPSIS;
	}

	public function setTIPO($TIPO='')
	{
		$this->TIPO = $TIPO;
		return true;
	}

	public function getTIPO()
	{
		return $this->TIPO;
	}

} // END class sepsis_tardia