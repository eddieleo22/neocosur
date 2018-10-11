<?php

/******************************************************************************
* Class for neocosur.antecedentes_familiares
*******************************************************************************/

class antecedentes_familiares
{
	/**
	* @var int
	*/
	private $ID_ANTECEDENTES_FAMILIARES;

	/**
	* @var int
	*/
	private $ID_CONTROL;
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $ID_APORTA_INFO_FAMILIAR;

	/**
	* @var int
	*/
	private $ID_CUIDADOR_RESPONSABLE;

	/**
	* @var int
	*/
	private $ID_PAIS_RESIDENCIA;

	/**
	* @var int
	*/
	private $ID_CIUDAD;

	/**
	* @var string
	*/
	private $COMUNA;

	/**
	* @var int
	*/
	private $ID_NIVEL_EDUCACIONAL_MADRE;

	/**
	* @var int
	*/
	private $ID_OCUPACION_MADRE;

	/**
	* @var int
	*/
	private $ID_NIVEL_EDUCACIONAL_PADRE;

	/**
	* @var int
	*/
	private $ID_OCUPACION_PADRE;

	/**
	* @var int
	



	*/
	private $NUMERO_NINOS_FAMILIA;
	private $MIGRACION_MADRE;
	private $MIGRACION_MADRE_DESDE;
	private $MIGRACION_PADRE;
	private $MIGRACION_PADRE_DESDE;

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

} // END class antecedentes_familiares