<?php
/******************************************************************************
* Class for neocosur.presentacion
*******************************************************************************/

class presentacion
{
	/**
	* @var int
	*/
	private $ID_PRESENTACION;

	/**
	* @var string
	*/
	private $PRESENTACION;

	/**
	* @var int
	*/
	private $ACTIVO;

	

	public function setID_PRESENTACION($ID_PRESENTACION='')
	{
		$presentacion->ID_PRESENTACION = $ID_PRESENTACION;
		return true;
	}

	public function getID_PRESENTACION()
	{
		return $presentacion->ID_PRESENTACION;
	}

	public function setPRESENTACION($PRESENTACION='')
	{
		$presentacion->PRESENTACION = $PRESENTACION;
		return true;
	}

	public function getPRESENTACION()
	{
		return $presentacion->PRESENTACION;
	}

	public function setACTIVO($ACTIVO='')
	{
		$presentacion->ACTIVO = $ACTIVO;
		return true;
	}

	public function getACTIVO()
	{
		return $presentacion->ACTIVO;
	}

} 