<?php

/******************************************************************************
* Class for neocosur.hospitalizacion
*******************************************************************************/

class hospitalizacion
{
	/**
	* @var int
	*/
	private $ID_HOSPITALIZACION;
	

	/**
	* @var int
	*/
	private $ID_CONTROL;

	/**
	* @var int
	*/
	private $ID_DIAGNOSTICO;
	private $DIAG_O2;
	private $DIAG_NO_INVASIVA;
	private $DIAG_INVASIVA; 
	private $DIAG_INVASIVA_ID;
	private $DIAG_O2_DOMICILIO;
	private $DIAG_O2_DOMICILIO_ID;
	private $DIAG_CUAL;
	/**
	* @var int
	*/
	private $FECHA;

	/**
	* @var int
	*/
	private $DIA;

	/**
	* @var int
	*/
	private $EDAD_AGNOS;

	/**
	* @var int
	*/
	private $EDAD_MESES;

	/**
	* @var string
	*/
	private $OBSERVACIONES;

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

	public function setID_HOSPITALIZACION($ID_HOSPITALIZACION='')
	{
		$this->ID_HOSPITALIZACION = $ID_HOSPITALIZACION;
		return true;
	}

	public function getID_HOSPITALIZACION()
	{
		return $this->ID_HOSPITALIZACION;
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

	public function setID_DIAGNOSTICO($ID_DIAGNOSTICO='')
	{
		$this->ID_DIAGNOSTICO = $ID_DIAGNOSTICO;
		return true;
	}

	public function getID_DIAGNOSTICO()
	{
		return $this->ID_DIAGNOSTICO;
	}

	public function setFECHA($FECHA='')
	{
		$this->FECHA = $FECHA;
		return true;
	}

	public function getFECHA()
	{
		return $this->FECHA;
	}

	public function setDIA($DIA='')
	{
		$this->DIA = $DIA;
		return true;
	}

	public function getDIA()
	{
		return $this->DIA;
	}

	public function setEDAD_AGNOS($EDAD_AGNOS='')
	{
		$this->EDAD_AGNOS = $EDAD_AGNOS;
		return true;
	}

	public function getEDAD_AGNOS()
	{
		return $this->EDAD_AGNOS;
	}

	public function setEDAD_MESES($EDAD_MESES='')
	{
		$this->EDAD_MESES = $EDAD_MESES;
		return true;
	}

	public function getEDAD_MESES()
	{
		return $this->EDAD_MESES;
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

} // END class hospitalizacion