<?php

/******************************************************************************
* Class for neocosur.funcion_visual
*******************************************************************************/

class funcion_visual
{
	
	private $ID_FUNCION_VISUAL;	
	private $ID_CONTROL;	
	private $EVA_ALTA;
	

	private $ROP_IZQ;	
	private $ID_LOCALIZACION_IZQ;	
	private $ID_SEVERIDAD_IZQ;	
	private $ENF_PLUS_IZQ;	
	private $CIRUGIA_ROP_IZQ;	
	private $ID_CIRUGIA_ROP_IZQ;	 
	private $ROP_DER;	
	private $ID_LOCALIZACION_DER;	
	private $ID_SEVERIDAD_DER;	
	private $ENF_PLUS_DER;	
	private $CIRUGIA_ROP_DER;	
	private $ID_CIRUGIA_ROP_DER;
	
	private $BEVACIZUMAB;	
	private $INSTANCIA_EVAL_40_SEM_EC;	
	private $INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL;	
	private $INSTANCIA_EVAL_40_SEM_ROP_IZQ;	
	private $INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ;
	private $ID_CIRUGIA_EVAL_40_SEM_EC_IZQ;
	private $INSTANCIA_EVAL_40_SEM_ROP_DER;	
	private $INSTANCIA_EVAL_40_SEM_CIRUGIA_DER;
	private $ID_CIRUGIA_EVAL_40_SEM_EC_DER;
	
	private $REQUIERE_CIRUGIA;
	private $ID_CIRUGIA;
	private $OBSERVACIONES;
	private $CEGUERA_OJO_IZQ;	
	private $CEGUERA_OJO_DER;
	
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
	
	
	public function setID_FUNCION_VISUAL($ID_FUNCION_VISUAL='')
	{
		$this->ID_FUNCION_VISUAL = $ID_FUNCION_VISUAL;
		return true;
	}

	public function getID_FUNCION_VISUAL()
	{
		return $this->ID_FUNCION_VISUAL;
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

	public function setOJO($OJO='')
	{
		$this->OJO = $OJO;
		return true;
	}

	public function getOJO()
	{
		return $this->OJO;
	}

	public function setROP($ROP='')
	{
		$this->ROP = $ROP;
		return true;
	}

	public function getROP()
	{
		return $this->ROP;
	}

	public function setID_LOCALIZACION($ID_LOCALIZACION='')
	{
		$this->ID_LOCALIZACION = $ID_LOCALIZACION;
		return true;
	}

	public function getID_LOCALIZACION()
	{
		return $this->ID_LOCALIZACION;
	}

	public function setID_SEVERIDAD($ID_SEVERIDAD='')
	{
		$this->ID_SEVERIDAD = $ID_SEVERIDAD;
		return true;
	}

	public function getID_SEVERIDAD()
	{
		return $this->ID_SEVERIDAD;
	}

	public function setENF_PLUS($ENF_PLUS='')
	{
		$this->ENF_PLUS = $ENF_PLUS;
		return true;
	}

	public function getENF_PLUS()
	{
		return $this->ENF_PLUS;
	}

	public function setCIRUGIA_ROP($CIRUGIA_ROP='')
	{
		$this->CIRUGIA_ROP = $CIRUGIA_ROP;
		return true;
	}

	public function getCIRUGIA_ROP()
	{
		return $this->CIRUGIA_ROP;
	}

	public function setID_CIRUGIA_ROP($ID_CIRUGIA_ROP='')
	{
		$this->ID_CIRUGIA_ROP = $ID_CIRUGIA_ROP;
		return true;
	}

	public function getID_CIRUGIA_ROP()
	{
		return $this->ID_CIRUGIA_ROP;
	}

	public function setBEVACIZUMAB($BEVACIZUMAB='')
	{
		$this->BEVACIZUMAB = $BEVACIZUMAB;
		return true;
	}

	public function getBEVACIZUMAB()
	{
		return $this->BEVACIZUMAB;
	}

	public function setINSTANCIA_EVAL_40_SEM_EC($INSTANCIA_EVAL_40_SEM_EC='')
	{
		$this->INSTANCIA_EVAL_40_SEM_EC = $INSTANCIA_EVAL_40_SEM_EC;
		return true;
	}

	public function getINSTANCIA_EVAL_40_SEM_EC()
	{
		return $this->INSTANCIA_EVAL_40_SEM_EC;
	}

	public function setINSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL($INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL='')
	{
		$this->INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL = $INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL;
		return true;
	}

	public function getINSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL()
	{
		return $this->INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL;
	}

	public function setINSTANCIA_EVAL_40_SEM_ROP_IZQ($INSTANCIA_EVAL_40_SEM_ROP_IZQ='')
	{
		$this->INSTANCIA_EVAL_40_SEM_ROP_IZQ = $INSTANCIA_EVAL_40_SEM_ROP_IZQ;
		return true;
	}

	public function getINSTANCIA_EVAL_40_SEM_ROP_IZQ()
	{
		return $this->INSTANCIA_EVAL_40_SEM_ROP_IZQ;
	}

	public function setINSTANCIA_EVAL_40_SEM_CIRUGIA($INSTANCIA_EVAL_40_SEM_CIRUGIA='')
	{
		$this->INSTANCIA_EVAL_40_SEM_CIRUGIA = $INSTANCIA_EVAL_40_SEM_CIRUGIA;
		return true;
	}

	public function getINSTANCIA_EVAL_40_SEM_CIRUGIA()
	{
		return $this->INSTANCIA_EVAL_40_SEM_CIRUGIA;
	}

	public function setID_CIRUGIA_EVAL_40_SEM_EC($ID_CIRUGIA_EVAL_40_SEM_EC='')
	{
		$this->ID_CIRUGIA_EVAL_40_SEM_EC = $ID_CIRUGIA_EVAL_40_SEM_EC;
		return true;
	}

	public function getID_CIRUGIA_EVAL_40_SEM_EC()
	{
		return $this->ID_CIRUGIA_EVAL_40_SEM_EC;
	}

	public function setREQUIERE_CIRUGIA($REQUIERE_CIRUGIA='')
	{
		$this->REQUIERE_CIRUGIA = $REQUIERE_CIRUGIA;
		return true;
	}

	public function getREQUIERE_CIRUGIA()
	{
		return $this->REQUIERE_CIRUGIA;
	}

	public function setID_CIRUGIA($ID_CIRUGIA='')
	{
		$this->ID_CIRUGIA = $ID_CIRUGIA;
		return true;
	}

	public function getID_CIRUGIA()
	{
		return $this->ID_CIRUGIA;
	}

	public function setOBSERVACIONES($OBSERVACIONES='')
	{
		$this->OBSERVACIONES = $OBSERVACIONES;
		return true;
	}

	public function getOBSERVACIONES()
	{
		return $this->OBSERVACIONES;
	}

	public function setCEGUERA_OJO_IZQ($CEGUERA_OJO_IZQ='')
	{
		$this->CEGUERA_OJO_IZQ = $CEGUERA_OJO_IZQ;
		return true;
	}

	public function getCEGUERA_OJO_IZQ()
	{
		return $this->CEGUERA_OJO_IZQ;
	}

	public function setCEGUERA_OJO_DER($CEGUERA_OJO_DER='')
	{
		$this->CEGUERA_OJO_DER = $CEGUERA_OJO_DER;
		return true;
	}

	public function getCEGUERA_OJO_DER()
	{
		return $this->CEGUERA_OJO_DER;
	}

} // END class funcion_visual