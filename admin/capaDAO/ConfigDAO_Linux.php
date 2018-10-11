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
			$this->bd = "neocosur";
			$this->usuario = "prueba";
			$this->password = "123456";
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