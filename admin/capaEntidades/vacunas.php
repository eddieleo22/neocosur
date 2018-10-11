<?php

/******************************************************************************
* Class for neocosur.vacunas
*******************************************************************************/

class vacunas
{
	/**
	* @var int
	*/
	private $ID_VACUNAS;

	/**
	* @var int
	*/
	private $ID_CONTROL;

	/**
	* @var int
	*/
	private $DIA_CALENDARIO;

	/**
	* @var int
	*/
	private $VACUNAS_OPCIONALES;

	/**
	* @var int
	*/
	private $ROTAVIRUS;

	/**
	* @var int
	*/
	private $HEPATITIS_A;

	/**
	* @var int
	*/
	private $NEUMOCOCO;

	/**
	* @var int
	*/
	private $MENINGITIS_C;

	/**
	* @var int
	*/
	private $OTRAS;

	/**
	* @var string
	*/
	private $CUAL_ES;

	/**
	* @var int
	*/
	private $PALIVIZUMAB;

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

	public function setID_VACUNAS($ID_VACUNAS='')
	{
		$this->ID_VACUNAS = $ID_VACUNAS;
		return true;
	}

	public function getID_VACUNAS()
	{
		return $this->ID_VACUNAS;
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

	public function setDIA_CALENDARIO($DIA_CALENDARIO='')
	{
		$this->DIA_CALENDARIO = $DIA_CALENDARIO;
		return true;
	}

	public function getDIA_CALENDARIO()
	{
		return $this->DIA_CALENDARIO;
	}

	public function setVACUNAS_OPCIONALES($VACUNAS_OPCIONALES='')
	{
		$this->VACUNAS_OPCIONALES = $VACUNAS_OPCIONALES;
		return true;
	}

	public function getVACUNAS_OPCIONALES()
	{
		return $this->VACUNAS_OPCIONALES;
	}

	public function setROTAVIRUS($ROTAVIRUS='')
	{
		$this->ROTAVIRUS = $ROTAVIRUS;
		return true;
	}

	public function getROTAVIRUS()
	{
		return $this->ROTAVIRUS;
	}

	public function setHEPATITIS_A($HEPATITIS_A='')
	{
		$this->HEPATITIS_A = $HEPATITIS_A;
		return true;
	}

	public function getHEPATITIS_A()
	{
		return $this->HEPATITIS_A;
	}

	public function setNEUMOCOCO($NEUMOCOCO='')
	{
		$this->NEUMOCOCO = $NEUMOCOCO;
		return true;
	}

	public function getNEUMOCOCO()
	{
		return $this->NEUMOCOCO;
	}

	public function setMENINGITIS_C($MENINGITIS_C='')
	{
		$this->MENINGITIS_C = $MENINGITIS_C;
		return true;
	}

	public function getMENINGITIS_C()
	{
		return $this->MENINGITIS_C;
	}

	public function setOTRAS($OTRAS='')
	{
		$this->OTRAS = $OTRAS;
		return true;
	}

	public function getOTRAS()
	{
		return $this->OTRAS;
	}

	public function setCUAL_ES($CUAL_ES='')
	{
		$this->CUAL_ES = $CUAL_ES;
		return true;
	}

	public function getCUAL_ES()
	{
		return $this->CUAL_ES;
	}

	public function setPALIVIZUMAB($PALIVIZUMAB='')
	{
		$this->PALIVIZUMAB = $PALIVIZUMAB;
		return true;
	}

	public function getPALIVIZUMAB()
	{
		return $this->PALIVIZUMAB;
	}

} // END class vacunas