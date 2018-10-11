<?php

/******************************************************************************
* Class for neocosur.dosis_surfactante
*******************************************************************************/

class dosis_surfactante
{
	/**
	* @var int
	*/
	private $ID_DOSIS;

	/**
	* @var string
	*/
	private $DOSIS;

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
		$query ="INSERT INTO dosis_surfactante (`ID_DOSIS`,`DOSIS`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_DOSIS(),$dblink) . "','" . mysql_real_escape_string($this->getDOSIS(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_DOSIS($ID_DOSIS='')
	{
		$this->ID_DOSIS = $ID_DOSIS;
		return true;
	}

	public function getID_DOSIS()
	{
		return $this->ID_DOSIS;
	}

	public function setDOSIS($DOSIS='')
	{
		$this->DOSIS = $DOSIS;
		return true;
	}

	public function getDOSIS()
	{
		return $this->DOSIS;
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

} // END class dosis_surfactante
