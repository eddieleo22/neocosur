<?php

/******************************************************************************
* Class for neocosur.situacion_murte
*******************************************************************************/

class situacion_murte
{
	/**
	* @var int
	*/
	private $ID_SITUACION_MUERTE;

	/**
	* @var string
	*/
	private $SITUACION_MUERTE;

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
		$query ="INSERT INTO situacion_murte (`ID_SITUACION_MUERTE`,`SITUACION_MUERTE`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_SITUACION_MUERTE(),$dblink) . "','" . mysql_real_escape_string($this->getSITUACION_MUERTE(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_SITUACION_MUERTE($ID_SITUACION_MUERTE='')
	{
		$this->ID_SITUACION_MUERTE = $ID_SITUACION_MUERTE;
		return true;
	}

	public function getID_SITUACION_MUERTE()
	{
		return $this->ID_SITUACION_MUERTE;
	}

	public function setSITUACION_MUERTE($SITUACION_MUERTE='')
	{
		$this->SITUACION_MUERTE = $SITUACION_MUERTE;
		return true;
	}

	public function getSITUACION_MUERTE()
	{
		return $this->SITUACION_MUERTE;
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

} // END class situacion_murte