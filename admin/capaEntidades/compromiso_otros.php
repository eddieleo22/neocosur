<?php

/******************************************************************************
* Class for neocosur.compromiso_otros
*******************************************************************************/

class compromiso_otros
{
	/**
	* @var int
	*/
	private $ID_COMPROMISO;

	/**
	* @var int
	*/
	private $ID_CONTROL;

	/**
	* @var int
	*/
	private $DIURETICOS;

	/**
	* @var int
	*/
	private $FECHA_INICIO;

	/**
	* @var int
	*/
	private $FECHA_SUSPENSION;

	/**
	* @var int
	*/
	private $O2;
	private $FECHA_SUSPENSION_OX;

	/**
	* @var int
	*/
	private $BRONCODILATADORES;

	/**
	* @var int
	*/
	private $CORTICOIDES_INHALATORIOS;

	/**
	* @var int
	*/
	private $OSTOMIA;

	/**
	* @var int
	*/
	private $ID_TIPO_OSTOMIA;

	/**
	* @var int
	*/
	private $RECONSTRUCCION_TRANSITO;

	/**
	* @var int
	*/
	private $FECHA_RECONSTRUCCION_TRANSITO;

	/**
	* @var int
	*/
	private $PROFILAXIS_ANTIBIOTICA;

	/**
	* @var int
	*/
	private $PROFILAXIS_FECHA_INICIO;

	/**
	* @var int
	*/
	private $PROFILAXIS_FECHA_SUSPENSION;

	/**
	* @var int
	*/
	private $ESTUDIO_IMAGENES;

	/**
	* @var int
	*/
	private $ESTUDIO_ECO_RENAL;

	/**
	* @var int
	*/
	private $ESTUDIO_ECO_RENAL_ALTERACION;

	/**
	* @var int
	*/
	private $ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP;

	/**
	* @var int
	*/
	private $CINTIGRAFIA;

	/**
	* @var int
	*/
	private $CINTIGRAFIA_ALTERACION;

	/**
	* @var int
	*/
	private $CINTIGRAFIA_ALTERACION_DESCRIP;

	/**
	* @var int
	*/
	private $URETROCISTOGRAFIA;

	/**
	* @var int
	*/
	private $URETROCISTOGRAFIA_ALTERACION;

	/**
	* @var int
	*/
	private $URETROCISTOGRAFIA_ALTERACION_DESCRIP;

	/**
	* @var int
	*/
	private $CONTROL_PRESION_ARTERIAL;

	/**
	* @var int
	*/
	private $ALTERACION_ALGUN_EVENTO;
	private $NEURO_HIC_GRADO;
	private $NEURO_HIC_GRADO_CUAL;
	private $NEURO_LEUCOMALACIA;
	private $NEURO_HIDROCEFALIA;
	private $NEURO_HIDROCEFALIA_VALVULA;

	/**
	* @var int
	*/
	private $CONVULSIONES_POST_ALTA;

	/**
	* @var int
	*/
	private $REQUIERE_TRATAMIENTO;

	/**
	* @var int
	*/
	private $FECHA_SUSPENSION_TRAT;

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

	public function setID_COMPROMISO($ID_COMPROMISO='')
	{
		$this->ID_COMPROMISO = $ID_COMPROMISO;
		return true;
	}

	public function getID_COMPROMISO()
	{
		return $this->ID_COMPROMISO;
	}

	public function setID_CONTROL($ID_CONTROL='')
	{
		$this->ID_CONTROL = $ID_CONTROL;
		return true;
	}

	public function getID_CONTROL()
	{
		return $this->ID_CONTROL;
	}

	public function setDIURETICOS($DIURETICOS='')
	{
		$this->DIURETICOS = $DIURETICOS;
		return true;
	}

	public function getDIURETICOS()
	{
		return $this->DIURETICOS;
	}

	public function setFECHA_INICIO($FECHA_INICIO='')
	{
		$this->FECHA_INICIO = $FECHA_INICIO;
		return true;
	}

	public function getFECHA_INICIO()
	{
		return $this->FECHA_INICIO;
	}

	public function setFECHA_SUSPENSION($FECHA_SUSPENSION='')
	{
		$this->FECHA_SUSPENSION = $FECHA_SUSPENSION;
		return true;
	}

	public function getFECHA_SUSPENSION()
	{
		return $this->FECHA_SUSPENSION;
	}

	public function setO2($O2='')
	{
		$this->O2 = $O2;
		return true;
	}

	public function getO2()
	{
		return $this->O2;
	}

	public function setBRONCODILATADORES($BRONCODILATADORES='')
	{
		$this->BRONCODILATADORES = $BRONCODILATADORES;
		return true;
	}

	public function getBRONCODILATADORES()
	{
		return $this->BRONCODILATADORES;
	}

	public function setCORTICOIDES_INHALATORIOS($CORTICOIDES_INHALATORIOS='')
	{
		$this->CORTICOIDES_INHALATORIOS = $CORTICOIDES_INHALATORIOS;
		return true;
	}

	public function getCORTICOIDES_INHALATORIOS()
	{
		return $this->CORTICOIDES_INHALATORIOS;
	}

	public function setOSTOMIA($OSTOMIA='')
	{
		$this->OSTOMIA = $OSTOMIA;
		return true;
	}

	public function getOSTOMIA()
	{
		return $this->OSTOMIA;
	}

	public function setID_TIPO_OSTOMIA($ID_TIPO_OSTOMIA='')
	{
		$this->ID_TIPO_OSTOMIA = $ID_TIPO_OSTOMIA;
		return true;
	}

	public function getID_TIPO_OSTOMIA()
	{
		return $this->ID_TIPO_OSTOMIA;
	}

	public function setRECONSTRUCCION_TRANSITO($RECONSTRUCCION_TRANSITO='')
	{
		$this->RECONSTRUCCION_TRANSITO = $RECONSTRUCCION_TRANSITO;
		return true;
	}

	public function getRECONSTRUCCION_TRANSITO()
	{
		return $this->RECONSTRUCCION_TRANSITO;
	}

	public function setFECHA_RECONSTRUCCION_TRANSITO($FECHA_RECONSTRUCCION_TRANSITO='')
	{
		$this->FECHA_RECONSTRUCCION_TRANSITO = $FECHA_RECONSTRUCCION_TRANSITO;
		return true;
	}

	public function getFECHA_RECONSTRUCCION_TRANSITO()
	{
		return $this->FECHA_RECONSTRUCCION_TRANSITO;
	}

	public function setPROFILAXIS_ANTIBIOTICA($PROFILAXIS_ANTIBIOTICA='')
	{
		$this->PROFILAXIS_ANTIBIOTICA = $PROFILAXIS_ANTIBIOTICA;
		return true;
	}

	public function getPROFILAXIS_ANTIBIOTICA()
	{
		return $this->PROFILAXIS_ANTIBIOTICA;
	}

	public function setPROFILAXIS_FECHA_INICIO($PROFILAXIS_FECHA_INICIO='')
	{
		$this->PROFILAXIS_FECHA_INICIO = $PROFILAXIS_FECHA_INICIO;
		return true;
	}

	public function getPROFILAXIS_FECHA_INICIO()
	{
		return $this->PROFILAXIS_FECHA_INICIO;
	}

	public function setPROFILAXIS_FECHA_SUSPENSION($PROFILAXIS_FECHA_SUSPENSION='')
	{
		$this->PROFILAXIS_FECHA_SUSPENSION = $PROFILAXIS_FECHA_SUSPENSION;
		return true;
	}

	public function getPROFILAXIS_FECHA_SUSPENSION()
	{
		return $this->PROFILAXIS_FECHA_SUSPENSION;
	}

	public function setESTUDIO_IMAGENES($ESTUDIO_IMAGENES='')
	{
		$this->ESTUDIO_IMAGENES = $ESTUDIO_IMAGENES;
		return true;
	}

	public function getESTUDIO_IMAGENES()
	{
		return $this->ESTUDIO_IMAGENES;
	}

	public function setESTUDIO_ECO_RENAL($ESTUDIO_ECO_RENAL='')
	{
		$this->ESTUDIO_ECO_RENAL = $ESTUDIO_ECO_RENAL;
		return true;
	}

	public function getESTUDIO_ECO_RENAL()
	{
		return $this->ESTUDIO_ECO_RENAL;
	}

	public function setESTUDIO_ECO_RENAL_ALTERACION($ESTUDIO_ECO_RENAL_ALTERACION='')
	{
		$this->ESTUDIO_ECO_RENAL_ALTERACION = $ESTUDIO_ECO_RENAL_ALTERACION;
		return true;
	}

	public function getESTUDIO_ECO_RENAL_ALTERACION()
	{
		return $this->ESTUDIO_ECO_RENAL_ALTERACION;
	}

	public function setESTUDIO_ECO_RENAL_ALTERACION_DESCRIP($ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP='')
	{
		$this->ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP = $ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP;
		return true;
	}

	public function getESTUDIO_ECO_RENAL_ALTERACION_DESCRIP()
	{
		return $this->ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP;
	}

	public function setCINTIGRAFIA($CINTIGRAFIA='')
	{
		$this->CINTIGRAFIA = $CINTIGRAFIA;
		return true;
	}

	public function getCINTIGRAFIA()
	{
		return $this->CINTIGRAFIA;
	}

	public function setCINTIGRAFIA_ALTERACION($CINTIGRAFIA_ALTERACION='')
	{
		$this->CINTIGRAFIA_ALTERACION = $CINTIGRAFIA_ALTERACION;
		return true;
	}

	public function getCINTIGRAFIA_ALTERACION()
	{
		return $this->CINTIGRAFIA_ALTERACION;
	}

	public function setCINTIGRAFIA_ALTERACION_DESCRIP($CINTIGRAFIA_ALTERACION_DESCRIP='')
	{
		$this->CINTIGRAFIA_ALTERACION_DESCRIP = $CINTIGRAFIA_ALTERACION_DESCRIP;
		return true;
	}

	public function getCINTIGRAFIA_ALTERACION_DESCRIP()
	{
		return $this->CINTIGRAFIA_ALTERACION_DESCRIP;
	}

	public function setURETROCISTOGRAFIA($URETROCISTOGRAFIA='')
	{
		$this->URETROCISTOGRAFIA = $URETROCISTOGRAFIA;
		return true;
	}

	public function getURETROCISTOGRAFIA()
	{
		return $this->URETROCISTOGRAFIA;
	}

	public function setURETROCISTOGRAFIA_ALTERACION($URETROCISTOGRAFIA_ALTERACION='')
	{
		$this->URETROCISTOGRAFIA_ALTERACION = $URETROCISTOGRAFIA_ALTERACION;
		return true;
	}

	public function getURETROCISTOGRAFIA_ALTERACION()
	{
		return $this->URETROCISTOGRAFIA_ALTERACION;
	}

	public function setURETROCISTOGRAFIA_ALTERACION_DESCRIP($URETROCISTOGRAFIA_ALTERACION_DESCRIP='')
	{
		$this->URETROCISTOGRAFIA_ALTERACION_DESCRIP = $URETROCISTOGRAFIA_ALTERACION_DESCRIP;
		return true;
	}

	public function getURETROCISTOGRAFIA_ALTERACION_DESCRIP()
	{
		return $this->URETROCISTOGRAFIA_ALTERACION_DESCRIP;
	}

	public function setCONTROL_PRESION_ARTERIAL($CONTROL_PRESION_ARTERIAL='')
	{
		$this->CONTROL_PRESION_ARTERIAL = $CONTROL_PRESION_ARTERIAL;
		return true;
	}

	public function getCONTROL_PRESION_ARTERIAL()
	{
		return $this->CONTROL_PRESION_ARTERIAL;
	}

	public function setALTERACION_ALGUN_EVENTO($ALTERACION_ALGUN_EVENTO='')
	{
		$this->ALTERACION_ALGUN_EVENTO = $ALTERACION_ALGUN_EVENTO;
		return true;
	}

	public function getALTERACION_ALGUN_EVENTO()
	{
		return $this->ALTERACION_ALGUN_EVENTO;
	}

	public function setCONVULSIONES_POST_ALTA($CONVULSIONES_POST_ALTA='')
	{
		$this->CONVULSIONES_POST_ALTA = $CONVULSIONES_POST_ALTA;
		return true;
	}

	public function getCONVULSIONES_POST_ALTA()
	{
		return $this->CONVULSIONES_POST_ALTA;
	}

	public function setREQUIERE_TRATAMIENTO($REQUIERE_TRATAMIENTO='')
	{
		$this->REQUIERE_TRATAMIENTO = $REQUIERE_TRATAMIENTO;
		return true;
	}

	public function getREQUIERE_TRATAMIENTO()
	{
		return $this->REQUIERE_TRATAMIENTO;
	}

	public function setFECHA_SUSPENSION_TRAT($FECHA_SUSPENSION_TRAT='')
	{
		$this->FECHA_SUSPENSION_TRAT = $FECHA_SUSPENSION_TRAT;
		return true;
	}

	public function getFECHA_SUSPENSION_TRAT()
	{
		return $this->FECHA_SUSPENSION_TRAT;
	}

} // END class compromiso_otros