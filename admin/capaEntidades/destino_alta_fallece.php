<?php

/******************************************************************************
* Class for neocosur.destino_alta_fallece
*******************************************************************************/

class destino_alta_fallece
{
	/**
	* @var int
	*/
	private $ID_DESTINO;

	/**
	* @var string
	*/
	private $DESTINO;

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
		$query ="INSERT INTO destino_alta_fallece (`ID_DESTINO`,`DESTINO`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_DESTINO(),$dblink) . "','" . mysql_real_escape_string($this->getDESTINO(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_DESTINO($ID_DESTINO='')
	{
		$this->ID_DESTINO = $ID_DESTINO;
		return true;
	}

	public function getID_DESTINO()
	{
		return $this->ID_DESTINO;
	}

	public function setDESTINO($DESTINO='')
	{
		$this->DESTINO = $DESTINO;
		return true;
	}

	public function getDESTINO()
	{
		return $this->DESTINO;
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

} // END class destino_alta_fallece
