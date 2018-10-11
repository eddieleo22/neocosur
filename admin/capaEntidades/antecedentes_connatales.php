<?php

/******************************************************************************
* Class for neocosur.antecedentes_connatales
*******************************************************************************/

class antecedentes_connatales
{
	/**
	* @var int
	*/
	private $ID_ANTECEDENTES_CONNATALES;

	/**
	* @var int
	*/
	private $ID_CONTROL;

	/**
	* @var int
	*/
	private $ID_PARIDAD;

	/**
	* @var int
	*/
	private $ID_CALIFICACION_ESTADO_NUTRICIONAL;

	/**
	* @var int
	*/
	private $MALFORMACIONES_CONGENITAS;

	/**
	* @var int
	*/
	private $MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO;

	/**
	* @var int
	*/
	private $MALF_CONGENITAS_DEFECTOS_CARDIACOS;

	/**
	* @var int
	*/
	private $MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES;

	/**
	* @var int
	*/
	private $MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS;

	/**
	* @var int
	*/
	private $MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS;

	/**
	* @var int
	*/
	private $MALF_CONGENITAS_OTROS_DEFECTOS;

	/**
	* @var int
	*/
	private $MALF_CONGENITAS_OTRO_CUAL;

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

	public function setID_ANTECEDENTES_CONNATALES($ID_ANTECEDENTES_CONNATALES='')
	{
		$this->ID_ANTECEDENTES_CONNATALES = $ID_ANTECEDENTES_CONNATALES;
		return true;
	}

	public function getID_ANTECEDENTES_CONNATALES()
	{
		return $this->ID_ANTECEDENTES_CONNATALES;
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

	public function setID_PARIDAD($ID_PARIDAD='')
	{
		$this->ID_PARIDAD = $ID_PARIDAD;
		return true;
	}

	public function getID_PARIDAD()
	{
		return $this->ID_PARIDAD;
	}

	public function setID_CALIFICACION_ESTADO_NUTRICIONAL($ID_CALIFICACION_ESTADO_NUTRICIONAL='')
	{
		$this->ID_CALIFICACION_ESTADO_NUTRICIONAL = $ID_CALIFICACION_ESTADO_NUTRICIONAL;
		return true;
	}

	public function getID_CALIFICACION_ESTADO_NUTRICIONAL()
	{
		return $this->ID_CALIFICACION_ESTADO_NUTRICIONAL;
	}

	public function setMALFORMACIONES_CONGENITAS($MALFORMACIONES_CONGENITAS='')
	{
		$this->MALFORMACIONES_CONGENITAS = $MALFORMACIONES_CONGENITAS;
		return true;
	}

	public function getMALFORMACIONES_CONGENITAS()
	{
		return $this->MALFORMACIONES_CONGENITAS;
	}

	public function setMALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO($MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO='')
	{
		$this->MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO = $MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO;
		return true;
	}

	public function getMALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO()
	{
		return $this->MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO;
	}

	public function setMALF_CONGENITAS_DEFECTOS_CARDIACOS($MALF_CONGENITAS_DEFECTOS_CARDIACOS='')
	{
		$this->MALF_CONGENITAS_DEFECTOS_CARDIACOS = $MALF_CONGENITAS_DEFECTOS_CARDIACOS;
		return true;
	}

	public function getMALF_CONGENITAS_DEFECTOS_CARDIACOS()
	{
		return $this->MALF_CONGENITAS_DEFECTOS_CARDIACOS;
	}

	public function setMALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES($MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES='')
	{
		$this->MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES = $MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES;
		return true;
	}

	public function getMALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES()
	{
		return $this->MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES;
	}

	public function setMALF_CONGENITAS_DEFECTOS_GENITOURINARIOS($MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS='')
	{
		$this->MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS = $MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS;
		return true;
	}

	public function getMALF_CONGENITAS_DEFECTOS_GENITOURINARIOS()
	{
		return $this->MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS;
	}

	public function setMALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS($MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS='')
	{
		$this->MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS = $MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS;
		return true;
	}

	public function getMALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS()
	{
		return $this->MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS;
	}

	public function setMALF_CONGENITAS_OTROS_DEFECTOS($MALF_CONGENITAS_OTROS_DEFECTOS='')
	{
		$this->MALF_CONGENITAS_OTROS_DEFECTOS = $MALF_CONGENITAS_OTROS_DEFECTOS;
		return true;
	}

	public function getMALF_CONGENITAS_OTROS_DEFECTOS()
	{
		return $this->MALF_CONGENITAS_OTROS_DEFECTOS;
	}

	public function setMALF_CONGENITAS_OTRO_CUAL($MALF_CONGENITAS_OTRO_CUAL='')
	{
		$this->MALF_CONGENITAS_OTRO_CUAL = $MALF_CONGENITAS_OTRO_CUAL;
		return true;
	}

	public function getMALF_CONGENITAS_OTRO_CUAL()
	{
		return $this->MALF_CONGENITAS_OTRO_CUAL;
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

} // END class antecedentes_connatales