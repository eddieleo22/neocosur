<?php

/******************************************************************************
* Class for neocosur.alimentacion
*******************************************************************************/

class alimentacion
{
	/**
	* @var int
	*/
	private $ID_ALIMENTACION;

	/**
	* @var int
	*/
	private $ID_CONTROL;
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $ID_ALIMENTACION_LACTEA;

	/**
	* @var int
	*/
	private $ID_FORMULA_UTILIZADA;

	/**
	* @var int
	*/
	private $EDAD_INTRODUCCION_SOLIDO_AGNO;

	/**
	* @var int
	*/
	private $EDAD_INTRODUCCION_SOLIDO_MESES;

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
	
	
	
	public function setID_ALIMENTACION($ID_ALIMENTACION='')
	{
		$this->ID_ALIMENTACION = $ID_ALIMENTACION;
		return true;
	}

	public function getID_ALIMENTACION()
	{
		return $this->ID_ALIMENTACION;
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

	public function setID_ALIMENTACION_LACTEA($ID_ALIMENTACION_LACTEA='')
	{
		$this->ID_ALIMENTACION_LACTEA = $ID_ALIMENTACION_LACTEA;
		return true;
	}

	public function getID_ALIMENTACION_LACTEA()
	{
		return $this->ID_ALIMENTACION_LACTEA;
	}

	public function setID_FORMULA_UTILIZADA($ID_FORMULA_UTILIZADA='')
	{
		$this->ID_FORMULA_UTILIZADA = $ID_FORMULA_UTILIZADA;
		return true;
	}

	public function getID_FORMULA_UTILIZADA()
	{
		return $this->ID_FORMULA_UTILIZADA;
	}

	public function setEDAD_INTRODUCCION_SOLIDO_AGNO($EDAD_INTRODUCCION_SOLIDO_AGNO='')
	{
		$this->EDAD_INTRODUCCION_SOLIDO_AGNO = $EDAD_INTRODUCCION_SOLIDO_AGNO;
		return true;
	}

	public function getEDAD_INTRODUCCION_SOLIDO_AGNO()
	{
		return $this->EDAD_INTRODUCCION_SOLIDO_AGNO;
	}

	public function setEDAD_INTRODUCCION_SOLIDO_MESES($EDAD_INTRODUCCION_SOLIDO_MESES='')
	{
		$this->EDAD_INTRODUCCION_SOLIDO_MESES = $EDAD_INTRODUCCION_SOLIDO_MESES;
		return true;
	}

	public function getEDAD_INTRODUCCION_SOLIDO_MESES()
	{
		return $this->EDAD_INTRODUCCION_SOLIDO_MESES;
	}

} // END class alimentacion