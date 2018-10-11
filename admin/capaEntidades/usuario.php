<?php

/******************************************************************************
* Class for neocosur.ingreso
*******************************************************************************/

class usuario
{
	
	private $us_id_user;
	private $us_id_perfil;
	private $us_id_centro;
	private $us_nombres;
	private $us_ape_paterno;
	private $us_ape_materno;
	private $us_usuario;
	private $us_email;
	private $us_password;
	private $us_salt;
	private $us_fecha_crea;
	private $us_fecha_modi;
	private $us_activo;
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
}