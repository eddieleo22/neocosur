<?php

/******************************************************************************
* Class for neocosur.control
*******************************************************************************/

class control
{
	
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
	private $FECHA_CONTROL;

	/**
	* @var int
	*/
	private $EDAD_CORREGIDA_AGNOS;

	/**
	* @var int
	*/
	private $EDAD_CORREGIDA_MESES;

	/**
	* @var int
	*/
	private $EDAD_CRONOLOGICA_AGNOS;

	/**
	* @var int
	*/
	private $EDAD_CRONOLOGICA_MESES;

	/**
	* @var int
	*/
	private $ID_RESPONSABLE;

	/**
	* @var int
	*/
	private $ID_ESTADO_REGISTRO;
	private $VALIDO;
	private $FECHA_INGRESO_PROGRAMA;
	private $ACTIVO;
	private $nombre_control;
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

} // END class control