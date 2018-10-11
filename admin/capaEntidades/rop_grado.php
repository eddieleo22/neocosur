<?php

/******************************************************************************
* Class for neocosur.rop_grado
*******************************************************************************/

class rop_grado
{
	/**
	* @var int
	*/
	private $ID_GRADO_ROP;

	/**
	* @var string
	*/
	private $GRADO_ROP;

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
		$query ="INSERT INTO rop_grado (`ID_GRADO_ROP`,`GRADO_ROP`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_GRADO_ROP(),$dblink) . "','" . mysql_real_escape_string($this->getGRADO_ROP(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_GRADO_ROP($ID_GRADO_ROP='')
	{
		$this->ID_GRADO_ROP = $ID_GRADO_ROP;
		return true;
	}

	public function getID_GRADO_ROP()
	{
		return $this->ID_GRADO_ROP;
	}

	public function setGRADO_ROP($GRADO_ROP='')
	{
		$this->GRADO_ROP = $GRADO_ROP;
		return true;
	}

	public function getGRADO_ROP()
	{
		return $this->GRADO_ROP;
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

} // END class rop_grado