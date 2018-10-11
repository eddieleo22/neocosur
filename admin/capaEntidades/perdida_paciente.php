<?php

/******************************************************************************
* Class for neocosur.perdida_paciente
*******************************************************************************/

class perdida_paciente
{
	/**
	* @var int
	*/
	private $ID_PERDIDA_PACIENTE;

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
	private $FALLECE_SEGUIMIENTO;

	/**
	* @var int
	*/
	private $ID_LUGAR_FALLECE;

	/**
	* @var int
	*/
	private $FECHA_FALLECE;

	/**
	* @var int
	*/
	private $EDAD_FELLECE_AGNOS;

	/**
	* @var int
	*/
	private $EDAD_FELLECE_MESES;

	/**
	* @var string
	*/
	private $OBSERVACIONES;

	/**
	* @var int
	*/
	private $PERDIDA_PACIENTE;

	/**
	* @var int
	*/
	private $ID_CAUSA_PERDIDA;

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

	public function setID_PERDIDA_PACIENTE($ID_PERDIDA_PACIENTE='')
	{
		$this->ID_PERDIDA_PACIENTE = $ID_PERDIDA_PACIENTE;
		return true;
	}

	public function getID_PERDIDA_PACIENTE()
	{
		return $this->ID_PERDIDA_PACIENTE;
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

	public function setFALLECE_SEGUIMIENTO($FALLECE_SEGUIMIENTO='')
	{
		$this->FALLECE_SEGUIMIENTO = $FALLECE_SEGUIMIENTO;
		return true;
	}

	public function getFALLECE_SEGUIMIENTO()
	{
		return $this->FALLECE_SEGUIMIENTO;
	}

	public function setID_LUGAR_FALLECE($ID_LUGAR_FALLECE='')
	{
		$this->ID_LUGAR_FALLECE = $ID_LUGAR_FALLECE;
		return true;
	}

	public function getID_LUGAR_FALLECE()
	{
		return $this->ID_LUGAR_FALLECE;
	}

	public function setFECHA_FALLECE($FECHA_FALLECE='')
	{
		$this->FECHA_FALLECE = $FECHA_FALLECE;
		return true;
	}

	public function getFECHA_FALLECE()
	{
		return $this->FECHA_FALLECE;
	}

	public function setEDAD_FELLECE_AGNOS($EDAD_FELLECE_AGNOS='')
	{
		$this->EDAD_FELLECE_AGNOS = $EDAD_FELLECE_AGNOS;
		return true;
	}

	public function getEDAD_FELLECE_AGNOS()
	{
		return $this->EDAD_FELLECE_AGNOS;
	}

	public function setEDAD_FELLECE_MESES($EDAD_FELLECE_MESES='')
	{
		$this->EDAD_FELLECE_MESES = $EDAD_FELLECE_MESES;
		return true;
	}

	public function getEDAD_FELLECE_MESES()
	{
		return $this->EDAD_FELLECE_MESES;
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

	public function setPERDIDA_PACIENTE($PERDIDA_PACIENTE='')
	{
		$this->PERDIDA_PACIENTE = $PERDIDA_PACIENTE;
		return true;
	}

	public function getPERDIDA_PACIENTE()
	{
		return $this->PERDIDA_PACIENTE;
	}

	public function setID_CAUSA_PERDIDA($ID_CAUSA_PERDIDA='')
	{
		$this->ID_CAUSA_PERDIDA = $ID_CAUSA_PERDIDA;
		return true;
	}

	public function getID_CAUSA_PERDIDA()
	{
		return $this->ID_CAUSA_PERDIDA;
	}

} // END class perdida_paciente