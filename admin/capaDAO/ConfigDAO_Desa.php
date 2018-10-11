<?php

	class ConfigDAO 
	{
		public $servidor;
		public $bd;
		public $usuario;
		public $password;
		
		public function __construct()
		{
			$this->servidor = "localhost";
			$this->bd = "rcconstr_neocosur_desa";
			$this->usuario = "root";
			$this->password = "";
		}

		/* METODOS MAGICOS */
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
?>