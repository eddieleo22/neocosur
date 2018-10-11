<?php

/******************************************************************************
* Class for neocosur.severidad_ojo
*******************************************************************************/

class severidad_ojo
{
	/**
	* @var int
	*/
	private $ID_SEVERIDAD;

	/**
	* @var string
	*/
	private $SEVERIDAD;

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
		$query ="INSERT INTO severidad_ojo (`ID_SEVERIDAD`,`SEVERIDAD`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_SEVERIDAD(),$dblink) . "','" . mysql_real_escape_string($this->getSEVERIDAD(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
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

	public function setSEVERIDAD($SEVERIDAD='')
	{
		$this->SEVERIDAD = $SEVERIDAD;
		return true;
	}

	public function getSEVERIDAD()
	{
		return $this->SEVERIDAD;
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

} // END class severidad_ojo
