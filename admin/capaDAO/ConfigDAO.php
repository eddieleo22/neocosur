<?php

	class ConfigDAO 
	{
		private $servidor;
		private $bd;
		private $usuario;
		private $password;
		
		public function __construct()
		{
			
			$this->servidor = "localhost";
			$this->bd = "neocosur";
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

        public function test_input($data) {
 		 	$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  		  return $data;
	   }   

		
	}
?>