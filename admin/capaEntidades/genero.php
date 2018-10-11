<?php

/******************************************************************************
* Class for neocosur.genero
*******************************************************************************/

class genero
{
	/**
	* @var int
	*/
	private $ID_GENERO;

	/**
	* @var string
	*/
	private $GENERO;

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
		$query ="INSERT INTO genero (`ID_GENERO`,`GENERO`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_GENERO(),$dblink) . "','" . mysql_real_escape_string($this->getGENERO(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_GENERO($ID_GENERO='')
	{
		$this->ID_GENERO = $ID_GENERO;
		return true;
	}

	public function getID_GENERO()
	{
		return $this->ID_GENERO;
	}

	public function setGENERO($GENERO='')
	{
		$this->GENERO = $GENERO;
		return true;
	}

	public function getGENERO()
	{
		return $this->GENERO;
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

} // END class genero