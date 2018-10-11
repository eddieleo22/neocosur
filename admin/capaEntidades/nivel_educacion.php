<?php

/******************************************************************************
* Class for neocosur.nivel_educacion
*******************************************************************************/

class nivel_educacion
{
	/**
	* @var int
	* Class Unique ID
	*/
	private $ID_NIVEL_EDUCACION;

	/**
	* @var string
	*/
	private $NIVEL;

	/**
	* @var int
	*/
	private $ACTIVO;

	public function __construct($ID_NIVEL_EDUCACION='')
	{
		$this->setID_NIVEL_EDUCACION($ID_NIVEL_EDUCACION);
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
		$query = "SELECT * FROM nivel_educacion WHERE `ID_NIVEL_EDUCACION`='{$this->getID_NIVEL_EDUCACION()}'";

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
		$query = "UPDATE nivel_educacion SET 
						`NIVEL` = '" . mysql_real_escape_string($this->getNIVEL(),$dblink) . "',
						`ACTIVO` = '" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "' 
						WHERE `ID_NIVEL_EDUCACION`='{$this->getID_NIVEL_EDUCACION()}'";

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
		$query ="INSERT INTO nivel_educacion (`NIVEL`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getNIVEL(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_NIVEL_EDUCACION($ID_NIVEL_EDUCACION='')
	{
		$this->ID_NIVEL_EDUCACION = $ID_NIVEL_EDUCACION;
		return true;
	}

	public function getID_NIVEL_EDUCACION()
	{
		return $this->ID_NIVEL_EDUCACION;
	}

	public function setNIVEL($NIVEL='')
	{
		$this->NIVEL = $NIVEL;
		return true;
	}

	public function getNIVEL()
	{
		return $this->NIVEL;
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

} // END class nivel_educacion