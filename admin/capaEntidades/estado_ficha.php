<?php

/******************************************************************************
* Class for neocosur.estado_ficha
*******************************************************************************/

class estado_ficha
{
	/**
	* @var int
	*/
	private $ID_ESTADO_FICHA;

	/**
	* @var string
	*/
	private $ESTADO_FICHA;

	/**
	* @var int
	*/
	private $nombreEstado;
        
        /**
	* @var int
	*/
	private $ID_NEOCOSUR;

	
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

	public function setID_ESTADO_FICHA($ID_ESTADO_FICHA='')
	{
		$this->ID_ESTADO_FICHA = $ID_ESTADO_FICHA;
		return true;
	}

	public function getID_ESTADO_FICHA()
	{
		return $this->ID_ESTADO_FICHA;
	}

	public function setESTADO_FICHA($ESTADO_FICHA='')
	{
		$this->ESTADO_FICHA = $ESTADO_FICHA;
		return true;
	}

	public function getESTADO_FICHA()
	{
		return $this->ESTADO_FICHA;
	}

	public function setnombreEstado($nombreEstado='')
	{
		$this->nombreEstado = $nombreEstado;
		return true;
	}

	public function getnombreEstado()
	{
		return $this->nombreEstado;
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

} // END class estado_ficha