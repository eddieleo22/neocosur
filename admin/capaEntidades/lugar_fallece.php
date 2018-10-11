<?php


/******************************************************************************
* Class for neocosur.lugar_fallece
*******************************************************************************/

class lugar_fallece
{
	/**
	* @var int
	*/
	private $ID_LUGAR_FALLECE;

	/**
	* @var string
	*/
	private $LUGAR_FALLECE;

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
		$query ="INSERT INTO lugar_fallece (`ID_LUGAR_FALLECE`,`LUGAR_FALLECE`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_LUGAR_FALLECE(),$dblink) . "','" . mysql_real_escape_string($this->getLUGAR_FALLECE(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_LUGAR_FALLECE($ID_LUGAR_FALLECE='')
	{
		$this->ID_LUGAR_FALLECE = $ID_LUGAR_FALLECE;
		return true;
	}

	public function getID_LUGAR_FALLECE()
	{
		return $this->ID_LUGAR_FALLECE;
	}

	public function setLUGAR_FALLECE($LUGAR_FALLECE='')
	{
		$this->LUGAR_FALLECE = $LUGAR_FALLECE;
		return true;
	}

	public function getLUGAR_FALLECE()
	{
		return $this->LUGAR_FALLECE;
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

} // END class lugar_fallece