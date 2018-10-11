<?php

/******************************************************************************
* Class for neocosur.pais
*******************************************************************************/

class pais
{
	/**
	* @var int
	*/
	private $ID_PAIS;

	/**
	* @var string
	*/
	private $PAIS;

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
		$query ="INSERT INTO pais (`ID_PAIS`,`PAIS`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_PAIS(),$dblink) . "','" . mysql_real_escape_string($this->getPAIS(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_PAIS($ID_PAIS='')
	{
		$this->ID_PAIS = $ID_PAIS;
		return true;
	}

	public function getID_PAIS()
	{
		return $this->ID_PAIS;
	}

	public function setPAIS($PAIS='')
	{
		$this->PAIS = $PAIS;
		return true;
	}

	public function getPAIS()
	{
		return $this->PAIS;
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

} // END class pais
