<?php

/******************************************************************************
* Class for neocosur.estado_nutricional_intrauterino
*******************************************************************************/

class estado_nutricional_intrauterino
{
	/**
	* @var int
	*/
	private $ID_ESTADO_NUTRICIONAL_INTRAUTERINO;

	/**
	* @var string
	*/
	private $ESTADO_NUTRICIONAL_INTRAUTERINO;

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
		$query ="INSERT INTO estado_nutricional_intrauterino (`ID_ESTADO_NUTRICIONAL_INTRAUTERINO`,`ESTADO_NUTRICIONAL_INTRAUTERINO`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_ESTADO_NUTRICIONAL_INTRAUTERINO(),$dblink) . "','" . mysql_real_escape_string($this->getESTADO_NUTRICIONAL_INTRAUTERINO(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_ESTADO_NUTRICIONAL_INTRAUTERINO($ID_ESTADO_NUTRICIONAL_INTRAUTERINO='')
	{
		$this->ID_ESTADO_NUTRICIONAL_INTRAUTERINO = $ID_ESTADO_NUTRICIONAL_INTRAUTERINO;
		return true;
	}

	public function getID_ESTADO_NUTRICIONAL_INTRAUTERINO()
	{
		return $this->ID_ESTADO_NUTRICIONAL_INTRAUTERINO;
	}

	public function setESTADO_NUTRICIONAL_INTRAUTERINO($ESTADO_NUTRICIONAL_INTRAUTERINO='')
	{
		$this->ESTADO_NUTRICIONAL_INTRAUTERINO = $ESTADO_NUTRICIONAL_INTRAUTERINO;
		return true;
	}

	public function getESTADO_NUTRICIONAL_INTRAUTERINO()
	{
		return $this->ESTADO_NUTRICIONAL_INTRAUTERINO;
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

} // END class estado_nutricional_intrauterino