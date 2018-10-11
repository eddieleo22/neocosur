<?php

/******************************************************************************
* Class for neocosur.hic_grado
*******************************************************************************/

class hic_grado
{
	/**
	* @var int
	*/
	private $ID_HIC_GRADO;

	/**
	* @var string
	*/
	private $HIC_GRADO;

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
		$query ="INSERT INTO hic_grado (`ID_HIC_GRADO`,`HIC_GRADO`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_HIC_GRADO(),$dblink) . "','" . mysql_real_escape_string($this->getHIC_GRADO(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_HIC_GRADO($ID_HIC_GRADO='')
	{
		$this->ID_HIC_GRADO = $ID_HIC_GRADO;
		return true;
	}

	public function getID_HIC_GRADO()
	{
		return $this->ID_HIC_GRADO;
	}

	public function setHIC_GRADO($HIC_GRADO='')
	{
		$this->HIC_GRADO = $HIC_GRADO;
		return true;
	}

	public function getHIC_GRADO()
	{
		return $this->HIC_GRADO;
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

} // END class hic_grado