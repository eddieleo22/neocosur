<?php

/******************************************************************************
* Class for neocosur.antropometria
*******************************************************************************/

class antropometria
{
	/**
	* @var int
	*/
	private $ID_ANTROPOMETRIA;

	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $EDAD_ALTA_DIAS;

	/**
	* @var int
	*/
	private $PESO_7_DIAS;

	/**
	* @var int
	*/
	private $PESO_28_DIAS;

	/**
	* @var int
	*/
	private $PESO_36_SEM;

	/**
	* @var int
	*/
	private $PESO_ALTA_DIAS;

	/**
	* @var int
	*/
	private $TALLA_7_DIAS;

	/**
	* @var int
	*/
	private $TALLA_28_DIAS;

	/**
	* @var int
	*/
	private $TALLA_36_SEM;

	/**
	* @var int
	*/
	private $TALLA_ALTA_DIAS;

	/**
	* @var int
	*/
	private $CIRC_CRANEO_7_DIAS;

	/**
	* @var int
	*/
	private $CIRC_CRANEO_28_DIAS;

	/**
	* @var int
	*/
	private $CIRC_CRANEO_36_SEM;

	/**
	* @var int
	*/
	private $CIRC_CRANEO_ALTA_DIAS;
        
        /**
			crea la instancia del objeto y partir de eso puedes acceder a los atributos
		*/
        public function __construct() {
            
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

	

} // END class antropometria