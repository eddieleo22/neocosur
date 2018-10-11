<?php

/******************************************************************************
* Class for neocosur.localizacion_ojo
*******************************************************************************/

class localizacion_ojo
{
	/**
	* @var int
	*/
	private $ID_LOCALIZACION;

	/**
	* @var string
	*/
	private $LOCALIZACION;

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
		$query ="INSERT INTO localizacion_ojo (`ID_LOCALIZACION`,`LOCALIZACION`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_LOCALIZACION(),$dblink) . "','" . mysql_real_escape_string($this->getLOCALIZACION(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
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

	public function setLOCALIZACION($LOCALIZACION='')
	{
		$this->LOCALIZACION = $LOCALIZACION;
		return true;
	}

	public function getLOCALIZACION()
	{
		return $this->LOCALIZACION;
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

} // END class localizacion_ojo
