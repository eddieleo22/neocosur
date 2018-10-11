<?php

/******************************************************************************
* Class for neocosur.cirugia_visual
*******************************************************************************/

class cirugia_visual
{
	/**
	* @var int
	*/
	private $ID_CIRUGIA_VISUAL;

	/**
	* @var string
	*/
	private $CIRUGIA;

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
		$query ="INSERT INTO cirugia_visual (`ID_CIRUGIA_VISUAL`,`CIRUGIA`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_CIRUGIA_VISUAL(),$dblink) . "','" . mysql_real_escape_string($this->getCIRUGIA(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_CIRUGIA_VISUAL($ID_CIRUGIA_VISUAL='')
	{
		$this->ID_CIRUGIA_VISUAL = $ID_CIRUGIA_VISUAL;
		return true;
	}

	public function getID_CIRUGIA_VISUAL()
	{
		return $this->ID_CIRUGIA_VISUAL;
	}

	public function setCIRUGIA($CIRUGIA='')
	{
		$this->CIRUGIA = $CIRUGIA;
		return true;
	}

	public function getCIRUGIA()
	{
		return $this->CIRUGIA;
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

} // END class cirugia_visual
