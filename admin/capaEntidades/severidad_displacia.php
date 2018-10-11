<?php

/******************************************************************************
* Class for neocosur.severidad_displacia
*******************************************************************************/

class severidad_displacia
{
	/**
	* @var int
	*/
	private $ID_SEVERIDAD_DISPLACIA;

	/**
	* @var string
	*/
	private $SEVERIDAD_DISPLACIA;

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
		$query ="INSERT INTO severidad_displacia (`ID_SEVERIDAD_DISPLACIA`,`SEVERIDAD_DISPLACIA`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_SEVERIDAD_DISPLACIA(),$dblink) . "','" . mysql_real_escape_string($this->getSEVERIDAD_DISPLACIA(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_SEVERIDAD_DISPLACIA($ID_SEVERIDAD_DISPLACIA='')
	{
		$this->ID_SEVERIDAD_DISPLACIA = $ID_SEVERIDAD_DISPLACIA;
		return true;
	}

	public function getID_SEVERIDAD_DISPLACIA()
	{
		return $this->ID_SEVERIDAD_DISPLACIA;
	}

	public function setSEVERIDAD_DISPLACIA($SEVERIDAD_DISPLACIA='')
	{
		$this->SEVERIDAD_DISPLACIA = $SEVERIDAD_DISPLACIA;
		return true;
	}

	public function getSEVERIDAD_DISPLACIA()
	{
		return $this->SEVERIDAD_DISPLACIA;
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

} // END class severidad_displacia
