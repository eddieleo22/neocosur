<?php

/******************************************************************************
* Class for neocosur.paridad
*******************************************************************************/

class paridad
{
	/**
	* @var int
	* Class Unique ID
	*/
	private $ID_PARIDAD;

	/**
	* @var int
	*/
	private $ID_NEOCOSUR;

	/**
	* @var string
	*/
	private $PARIDAD;

	/**
	* @var int
	*/
	private $ACTIVO;

	public function __construct($ID_PARIDAD='')
	{
		$this->setID_PARIDAD($ID_PARIDAD);
		$this->Load();
	}

	private function Load()
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
		$query = "SELECT * FROM paridad WHERE `ID_PARIDAD`='{$this->getID_PARIDAD()}'";

		$result = mysql_query($query,$dblink);

		while($row = mysql_fetch_assoc($result) )
			foreach($row as $key => $value)
			{
				$column_name = str_replace('-','_',$key);
				$this->{"set$column_name"}($value);

			}
		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function Save()
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
		$query = "UPDATE paridad SET 
						`ID_NEOCOSUR` = '" . mysql_real_escape_string($this->getID_NEOCOSUR(),$dblink) . "',
						`PARIDAD` = '" . mysql_real_escape_string($this->getPARIDAD(),$dblink) . "',
						`ACTIVO` = '" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "' 
						WHERE `ID_PARIDAD`='{$this->getID_PARIDAD()}'";

		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

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
		$query ="INSERT INTO paridad (`ID_NEOCOSUR`,`PARIDAD`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_NEOCOSUR(),$dblink) . "','" . mysql_real_escape_string($this->getPARIDAD(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_PARIDAD($ID_PARIDAD='')
	{
		$this->ID_PARIDAD = $ID_PARIDAD;
		return true;
	}

	public function getID_PARIDAD()
	{
		return $this->ID_PARIDAD;
	}

	public function setID_NEOCOSUR($ID_NEOCOSUR='')
	{
		$this->ID_NEOCOSUR = $ID_NEOCOSUR;
		return true;
	}

	public function getID_NEOCOSUR()
	{
		return $this->ID_NEOCOSUR;
	}

	public function setPARIDAD($PARIDAD='')
	{
		$this->PARIDAD = $PARIDAD;
		return true;
	}

	public function getPARIDAD()
	{
		return $this->PARIDAD;
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

} // END class paridad