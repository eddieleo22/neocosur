<?php

/******************************************************************************
* Class for neocosur.antropometria_control
*******************************************************************************/

class antropometria_control
{
	/**
	* @var int
	*/
	private $ID_ANTROPOMETRIA;

	/**
	* @var int
	*/
	private $ID_CONTROL;

	/**
	* @var int
	*/
	private $PESO;

	/**
	* @var int
	*/
	private $TALLA;

	/**
	* @var int
	*/
	private $CIRCUNFERENCIA_CRANEO;

	/**
	* @var int
	*/
	private $IMC;
	/**
	* @var int
	*/
	private $OMS;
	

	/**
	* @var int
	*/
	private $TALLA_BAJA;

	/**
	* @var int
	*/
	private $MICROCEFALIA;

	/**
	* @var int
	*/
	private $MACROCEFALIA;

	

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

} // END class antropometria_control