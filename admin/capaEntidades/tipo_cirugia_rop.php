<?php

/******************************************************************************
* Class for neocosur.tipo_cirugia_rop
*******************************************************************************/

class tipo_cirugia_rop
{
	/**
	* @var int
	*/
	private $ID_TIPO_CIRUGIA_ROP;

	/**
	* @var string
	*/
	private $TIPO_CIRUGIA_ROP;

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
		$query ="INSERT INTO tipo_cirugia_rop (`ID_TIPO_CIRUGIA_ROP`,`TIPO_CIRUGIA_ROP`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_TIPO_CIRUGIA_ROP(),$dblink) . "','" . mysql_real_escape_string($this->getTIPO_CIRUGIA_ROP(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_TIPO_CIRUGIA_ROP($ID_TIPO_CIRUGIA_ROP='')
	{
		$this->ID_TIPO_CIRUGIA_ROP = $ID_TIPO_CIRUGIA_ROP;
		return true;
	}

	public function getID_TIPO_CIRUGIA_ROP()
	{
		return $this->ID_TIPO_CIRUGIA_ROP;
	}

	public function setTIPO_CIRUGIA_ROP($TIPO_CIRUGIA_ROP='')
	{
		$this->TIPO_CIRUGIA_ROP = $TIPO_CIRUGIA_ROP;
		return true;
	}

	public function getTIPO_CIRUGIA_ROP()
	{
		return $this->TIPO_CIRUGIA_ROP;
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

} // END class tipo_cirugia_rop
