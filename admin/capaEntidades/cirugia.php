<?php

/******************************************************************************
* Class for neocosur.cirugia
*******************************************************************************/

class cirugia
{
	/**
	* @var int
	*/
	private $ID_CIRUGIA;

	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $DETALLE;

	/**
	* @var int
	*/
	private $EDAD;

	/**
	* @var string
	*/
	private $OTRO;

	/**
	* @var int
	*/
	private $ACTIVO;

	 function __construct()
	 	{
	 		

	 	}
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
} // END class cirugia