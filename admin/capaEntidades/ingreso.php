<?php

/******************************************************************************
* Class for neocosur.ingreso
*******************************************************************************/

class ingreso
{
	
	private $ID_NEOCOSUR;
	private $ID_CENTRO;
	private $NOMBRES;
	private $APELLIDO_PATERNO;
	private $APELLIDO_MATERNO;
	private $FECHA_NACIMIENTO;
	private $NUMERO_FICHA_MEDICA;
        private $ID_GENERO;
        private $ID_PRESENTACION;
        private $ID_TIPO_PARTO;
        private $PESO_NACIMIENTO;
        private $TALLA_NACIMIENTO;
        private $CIRC_CRANEO_NACIMIENTO;
        private $APGAR_1;
        private $APGAR_5;
		private $ID_RESPONSABLE_INGRESO_DATOS;
		private $ID_ESTADO_FICHA;
		private $FALLECE_SALA_PARTO;
		private $EDAD_GESTACIONAL;
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
        
        /*function __construct($NOMBRES, $APELLIDO_PATERNO, $APELLIDO_MATERNO, $FECHA_NACIMIENTO,
                $NUMERO_FICHA_MEDICA, $ID_GENERO, $ID_PRESENTACION, $ID_TIPO_PARTO,
                $PESO_NACIMIENTO,$TALLA_NACIMIENTO,$CIRC_CRANEO_NACIMIENTO,$APGAR_1,
                $APGAR_5,$ID_RESPONSABLE_INGRESO_DATOS,$ID_ESTADO_FICHA,$FALLECE_SALA_PARTO) {
            
            $this->NOMBRES = $NOMBRES;
            $this->APELLIDO_PATERNO = $APELLIDO_PATERNO;
            $this->APELLIDO_MATERNO = $APELLIDO_MATERNO;
            $this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;
            $this->NUMERO_FICHA_MEDICA = $NUMERO_FICHA_MEDICA;
            $this->ID_GENERO = $ID_GENERO;
            $this->ID_PRESENTACION = $ID_PRESENTACION;
            $this->ID_TIPO_PARTO = $ID_TIPO_PARTO;            
            $this->PESO_NACIMIENTO = $PESO_NACIMIENTO;
            $this->TALLA_NACIMIENTO = $TALLA_NACIMIENTO;
            $this->CIRC_CRANEO_NACIMIENTO = $CIRC_CRANEO_NACIMIENTO;
            $this->APGAR_1 = $APGAR_1;
            $this->APGAR_5 = $APGAR_5;            
            $this->ID_RESPONSABLE_INGRESO_DATOS = $ID_RESPONSABLE_INGRESO_DATOS;
            $this->ID_ESTADO_FICHA = $ID_ESTADO_FICHA;
            $this->FALLECE_SALA_PARTO = $FALLECE_SALA_PARTO;
        }*/

        	public function setID_NEOCOSUR($ID_NEOCOSUR='')
	{
		$this->ID_NEOCOSUR = $ID_NEOCOSUR;
		return true;
	}

	public function getID_NEOCOSUR()
	{
		return $this->ID_NEOCOSUR;
	}

	public function setNOMBRES($NOMBRES='')
	{
		$this->NOMBRES = $NOMBRES;
		return true;
	}

	public function getNOMBRES()
	{
		return $this->NOMBRES;
	}

	public function setAPELLIDO_PATERNO($APELLIDO_PATERNO='')
	{
		$this->APELLIDO_PATERNO = $APELLIDO_PATERNO;
		return true;
	}

	public function getAPELLIDO_PATERNO()
	{
		return $this->APELLIDO_PATERNO;
	}

	public function setAPELLIDO_MATERNO($APELLIDO_MATERNO='')
	{
		$this->APELLIDO_MATERNO = $APELLIDO_MATERNO;
		return true;
	}

	public function getAPELLIDO_MATERNO()
	{
		return $this->APELLIDO_MATERNO;
	}

	public function setFECHA_NACIMIENTO($FECHA_NACIMIENTO='')
	{
		$this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;
		return true;
	}

	public function getFECHA_NACIMIENTO()
	{
		return $this->FECHA_NACIMIENTO;
	}

	public function setNUMERO_FICHA_MEDICA($NUMERO_FICHA_MEDICA='')
	{
		$this->NUMERO_FICHA_MEDICA = $NUMERO_FICHA_MEDICA;
		return true;
	}

	public function getNUMERO_FICHA_MEDICA()
	{
		return $this->NUMERO_FICHA_MEDICA;
	}

	 


	public function setID_RESPONSABLE_INGRESO_DATOS($ID_RESPONSABLE_INGRESO_DATOS='')
	{
		$this->ID_RESPONSABLE_INGRESO_DATOS = $ID_RESPONSABLE_INGRESO_DATOS;
		return true;
	}

	public function getID_RESPONSABLE_INGRESO_DATOS()
	{
		return $this->ID_RESPONSABLE_INGRESO_DATOS;
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

	public function setFALLECE_SALA_PARTO($FALLECE_SALA_PARTO='')
	{
		$this->FALLECE_SALA_PARTO = $FALLECE_SALA_PARTO;
		return true;
	}

	public function getFALLECE_SALA_PARTO()
	{
		return $this->FALLECE_SALA_PARTO;
	}
        
        
        public function setID_GENERO($ID_GENERO='')
	{
		$this->ID_GENERO = $ID_GENERO;
		return true;
	}

	public function getID_GENERO()
	{
		return $this->ID_GENERO;
	}
        
        
        public function setID_PRESENTACION($ID_PRESENTACION='')
	{
		$this->ID_PRESENTACION = $ID_PRESENTACION;
		return true;
	}

	public function getID_PRESENTACION()
	{
		return $this->ID_PRESENTACION;
	}
        
        public function setID_TIPO_PARTO($ID_TIPO_PARTO='')
	{
		$this->ID_TIPO_PARTO = $ID_TIPO_PARTO;
		return true;
	}

	public function getID_TIPO_PARTO()
	{
		return $this->ID_TIPO_PARTO;
	}
        
        public function setPESO_NACIMIENTO($PESO_NACIMIENTO='')
	{
		$this->PESO_NACIMIENTO = $PESO_NACIMIENTO;
		return true;
	}

	public function getPESO_NACIMIENTO()
	{
		return $this->PESO_NACIMIENTO;
	}
        
        public function setTALLA_NACIMIENTO($TALLA_NACIMIENTO='')
	{
		$this->TALLA_NACIMIENTO = $TALLA_NACIMIENTO;
		return true;
	}

	public function getTALLA_NACIMIENTO()
	{
		return $this->TALLA_NACIMIENTO;
	}
        
        public function setCIRC_CRANEO_NACIMIENTO($CIRC_CRANEO_NACIMIENTO='')
	{
		$this->CIRC_CRANEO_NACIMIENTO = $CIRC_CRANEO_NACIMIENTO;
		return true;
	}

	public function getCIRC_CRANEO_NACIMIENTO()
	{
		return $this->CIRC_CRANEO_NACIMIENTO;
	}
        
        public function setAPGAR_1($APGAR_1='')
	{
		$this->APGAR_1 = $APGAR_1;
		return true;
	}

	public function getAPGAR_1()
	{
		return $this->APGAR_1;
	}
        
        public function setAPGAR_5($APGAR_5='')
	{
		$this->APGAR_5 = $APGAR_5;
		return true;
	}

	public function getAPGAR_5()
	{
		return $this->APGAR_5;
	}
      
        
        

} // END class ingreso