<?php

/******************************************************************************
* Class for neocosur.funcion_auditiva
*******************************************************************************/

class funcion_auditiva
{
	/**
	* @var int
	*/
	private $ID_FUNCION_AUDITIVA;

	/**
	* @var int
	*/
	private $ID_CONTROL;
	private $ID_NEOCOSUR;

	/**
	* @var int
	*/
	private $PESQUISA_ANTES_DEL_ALTA;

	/**
	* @var int
	*/
	private $PEAT_AUTOMATIZADOS;

	/**
	* @var int
	*/
	private $PEAT_ATOMATIZADOS_NORMAL;

	/**
	* @var int
	*/
	private $PEAT_EXTENDIDOS;

	/**
	* @var int
	*/
	private $PEAT_EXTENDIDOS_NORMAL;

	/**
	* @var int
	*/
	private $EMISIONES_OTOACUSTICAS;

	/**
	* @var int
	*/
	private $EMISIONES_OTOACUSTICAS_NORMAL;

	/**
	* @var int
	*/
	private $EVALUACION_AUDITIVA;

	/**
	* @var int
	*/
	private $FECHA_EVALUACION;

	/**
	* @var int
	*/
	
	private $EVALUACION_NORMAL;
	private $POST_AUDIO;
	private $POST_AUDIO_NORMAL;
	private $POST_PEAT_AUTO;
	private $POST_PEAT_AUTO_NORMAL;
	private $POST_PEAT_EXT;
	private $POST_PEAT_EXT_NORMAL;
	private $POST_OIDO_IZQ;
	private $POST_OIDO_IZQ_GRADO;
	private $POST_OIDO_DER;
	private $POST_OIDO_DER_GRADO;
	/**
	* @var int
	*/
	private $CONFIRMACION_DIAGNOSTICO;

	/**
	* @var int
	*/
	private $FECHA_DIAGNOSTICO;

	/**
	* @var int
	*/
	private $CONF_OIDO_IZQ_RESUL;
	private $CONF_OIDO_IZQ_GRADO;
	private $CONF_OIDO_IZQ_NEURO;
	private $CONF_OIDO_IZQ_DE;
	private $CONF_OIDO_IZQ_TRAT;
	private $CONF_OIDO_IZQ_AUDIF;
	private $CONF_OIDO_IZQ_COCLE;
	private $CONF_OIDO_IZQ_TERA;
	private $CONF_OIDO_IZQ_VERB;
	private $CONF_OIDO_IZQ_SENA;
	private $CONF_OIDO_IZQ_OTRO;
	private $CONF_OIDO_IZQ_OBS;
	private $CONF_OIDO_DER_RESUL;
	private $CONF_OIDO_DER_GRADO;
	private $CONF_OIDO_DER_NEURO;
	private $CONF_OIDO_DER_DE;
	private $CONF_OIDO_DER_TRAT;
	private $CONF_OIDO_DER_AUDIF;
	private $CONF_OIDO_DER_COCLE;
	private $CONF_OIDO_DER_TERA;
	private $CONF_OIDO_DER_VERB;
	private $CONF_OIDO_DER_SENA;
	private $CONF_OIDO_DER_OTRO;
	private $CONF_OIDO_DER_OBS;



	
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
	
	public function setID_FUNCION_AUDITIVA($ID_FUNCION_AUDITIVA='')
	{
		$this->ID_FUNCION_AUDITIVA = $ID_FUNCION_AUDITIVA;
		return true;
	}

	public function getID_FUNCION_AUDITIVA()
	{
		return $this->ID_FUNCION_AUDITIVA;
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

	public function setPESQUISA_ANTES_DEL_ALTA($PESQUISA_ANTES_DEL_ALTA='')
	{
		$this->PESQUISA_ANTES_DEL_ALTA = $PESQUISA_ANTES_DEL_ALTA;
		return true;
	}

	public function getPESQUISA_ANTES_DEL_ALTA()
	{
		return $this->PESQUISA_ANTES_DEL_ALTA;
	}

	public function setPEAT_AUTOMATIZADOS($PEAT_AUTOMATIZADOS='')
	{
		$this->PEAT_AUTOMATIZADOS = $PEAT_AUTOMATIZADOS;
		return true;
	}

	public function getPEAT_AUTOMATIZADOS()
	{
		return $this->PEAT_AUTOMATIZADOS;
	}

	public function setPEAT_ATOMATIZADOS_NORMAL($PEAT_ATOMATIZADOS_NORMAL='')
	{
		$this->PEAT_ATOMATIZADOS_NORMAL = $PEAT_ATOMATIZADOS_NORMAL;
		return true;
	}

	public function getPEAT_ATOMATIZADOS_NORMAL()
	{
		return $this->PEAT_ATOMATIZADOS_NORMAL;
	}

	public function setPEAT_EXTENDIDOS($PEAT_EXTENDIDOS='')
	{
		$this->PEAT_EXTENDIDOS = $PEAT_EXTENDIDOS;
		return true;
	}

	public function getPEAT_EXTENDIDOS()
	{
		return $this->PEAT_EXTENDIDOS;
	}

	public function setPEAT_EXTENDIDOS_NORMAL($PEAT_EXTENDIDOS_NORMAL='')
	{
		$this->PEAT_EXTENDIDOS_NORMAL = $PEAT_EXTENDIDOS_NORMAL;
		return true;
	}

	public function getPEAT_EXTENDIDOS_NORMAL()
	{
		return $this->PEAT_EXTENDIDOS_NORMAL;
	}

	public function setEMISIONES_OTOACUSTICAS($EMISIONES_OTOACUSTICAS='')
	{
		$this->EMISIONES_OTOACUSTICAS = $EMISIONES_OTOACUSTICAS;
		return true;
	}

	public function getEMISIONES_OTOACUSTICAS()
	{
		return $this->EMISIONES_OTOACUSTICAS;
	}

	public function setEMISIONES_OTOACUSTICAS_NORMAL($EMISIONES_OTOACUSTICAS_NORMAL='')
	{
		$this->EMISIONES_OTOACUSTICAS_NORMAL = $EMISIONES_OTOACUSTICAS_NORMAL;
		return true;
	}

	public function getEMISIONES_OTOACUSTICAS_NORMAL()
	{
		return $this->EMISIONES_OTOACUSTICAS_NORMAL;
	}

	public function setEVALUACION_AUDITIVA($EVALUACION_AUDITIVA='')
	{
		$this->EVALUACION_AUDITIVA = $EVALUACION_AUDITIVA;
		return true;
	}

	public function getEVALUACION_AUDITIVA()
	{
		return $this->EVALUACION_AUDITIVA;
	}

	public function setFECHA_EVALUACION($FECHA_EVALUACION='')
	{
		$this->FECHA_EVALUACION = $FECHA_EVALUACION;
		return true;
	}

	public function getFECHA_EVALUACION()
	{
		return $this->FECHA_EVALUACION;
	}

	public function setEVALUACION_NORMAL($EVALUACION_NORMAL='')
	{
		$this->EVALUACION_NORMAL = $EVALUACION_NORMAL;
		return true;
	}

	public function getEVALUACION_NORMAL()
	{
		return $this->EVALUACION_NORMAL;
	}

	public function setCONFIRMACION_DIAGNOSTICO($CONFIRMACION_DIAGNOSTICO='')
	{
		$this->CONFIRMACION_DIAGNOSTICO = $CONFIRMACION_DIAGNOSTICO;
		return true;
	}

	public function getCONFIRMACION_DIAGNOSTICO()
	{
		return $this->CONFIRMACION_DIAGNOSTICO;
	}

	public function setFECHA_DIAGNOSTICO($FECHA_DIAGNOSTICO='')
	{
		$this->FECHA_DIAGNOSTICO = $FECHA_DIAGNOSTICO;
		return true;
	}

	public function getFECHA_DIAGNOSTICO()
	{
		return $this->FECHA_DIAGNOSTICO;
	}

	public function setOIDO_IZQUIERDO_RESULTADO($OIDO_IZQUIERDO_RESULTADO='')
	{
		$this->OIDO_IZQUIERDO_RESULTADO = $OIDO_IZQUIERDO_RESULTADO;
		return true;
	}

	public function getOIDO_IZQUIERDO_RESULTADO()
	{
		return $this->OIDO_IZQUIERDO_RESULTADO;
	}

	public function setOIDO_DERECHO_RESULTADO($OIDO_DERECHO_RESULTADO='')
	{
		$this->OIDO_DERECHO_RESULTADO = $OIDO_DERECHO_RESULTADO;
		return true;
	}

	public function getOIDO_DERECHO_RESULTADO()
	{
		return $this->OIDO_DERECHO_RESULTADO;
	}

} // END class funcion_auditiva