<?php

/******************************************************************************
* Class for neocosur.responsable_ingreso_datos
*******************************************************************************/

class responsable_ingreso_datos
{
	/**
	* @var int
	*/
	private $ID_RESPONSABLE_INGRESO_DATOS;

	/**
	* @var string
	*/
	private $RESPONSABLE_INGRESO_DATOS;

	/**
	* @var int
	*/
	private $ACTIVO;

	public function Create()
	{
		$dblink = null;

		try
		{
			$dblink = mysql_connect(DB_HOST,DB_USER,DB_PASS);
			mysql_select_db(DB_BASE,$dblink);
		}
		catch(Exception $ex)
		{
			echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
			echo "Error: " . $ex->message;
			exit;
		}
		$query ="INSERT INTO responsable_ingreso_datos (`ID_RESPONSABLE_INGRESO_DATOS`,`RESPONSABLE_INGRESO_DATOS`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_RESPONSABLE_INGRESO_DATOS(),$dblink) . "','" . mysql_real_escape_string($this->getRESPONSABLE_INGRESO_DATOS(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
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

	public function setRESPONSABLE_INGRESO_DATOS($RESPONSABLE_INGRESO_DATOS='')
	{
		$this->RESPONSABLE_INGRESO_DATOS = $RESPONSABLE_INGRESO_DATOS;
		return true;
	}

	public function getRESPONSABLE_INGRESO_DATOS()
	{
		return $this->RESPONSABLE_INGRESO_DATOS;
	}

	public function setACTIVO($ACTIVO='')
	{
		$this->ACTIVO = $ACTIVO;
		return true;
	}

	public function getACTIVO()
	{
		return $this->ACTIVO;
	}

} // END class responsable_ingreso_datos