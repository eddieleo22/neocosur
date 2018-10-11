<?php

/******************************************************************************
* Class for neocosur.tipo_parto
*******************************************************************************/

class tipo_parto
{
	/**
	* @var int
	*/
	private $ID_TIPO_PARTO;

	/**
	* @var string
	*/
	private $TIPO_PARTO;

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
		$query ="INSERT INTO tipo_parto (`ID_TIPO_PARTO`,`TIPO_PARTO`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_TIPO_PARTO(),$dblink) . "','" . mysql_real_escape_string($this->getTIPO_PARTO(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_TIPO_PARTO($ID_TIPO_PARTO='')
	{
		$this->ID_TIPO_PARTO = $ID_TIPO_PARTO;
		return true;
	}

	public function getID_TIPO_PARTO()
	{
		return $this->ID_TIPO_PARTO;
	}

	public function setTIPO_PARTO($TIPO_PARTO='')
	{
		$this->TIPO_PARTO = $TIPO_PARTO;
		return true;
	}

	public function getTIPO_PARTO()
	{
		return $this->TIPO_PARTO;
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

} // END class tipo_parto