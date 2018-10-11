<?php

/******************************************************************************
* Class for neocosur.sepsis
*******************************************************************************/

class sepsis
{
	private $ID_NEOCOSUR;
	/**
	* @var int
	*/
	private $ID_SEPSIS;


	/**
	* @var int
	*/
	private $DIAS;

	/**
	* @var int
	*/
	private $TIPOGERMEN;

	/**
	* @var string
	*/
	private $OTRO;

	/**
	* @var int
	*/
	private $HE_LCR;

	
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



} // END class sepsis