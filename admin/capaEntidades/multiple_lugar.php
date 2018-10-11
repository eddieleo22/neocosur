<?php

/******************************************************************************
* Class for neocosur.multiple_lugar
*******************************************************************************/

class multiple_lugar
{
	/**
	* @var int
	* Class Unique ID
	*/
	private $ID_MULTIPLE_LUGAR;

	/**
	* @var string
	*/
	private $MULTIPLE_LUGAR;

	/**
	* @var int
	*/
	private $ACTIVO;

	public function __construct($ID_MULTIPLE_LUGAR='')
	{
		$this->setID_MULTIPLE_LUGAR($ID_MULTIPLE_LUGAR);
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
		$query = "SELECT * FROM multiple_lugar WHERE `ID_MULTIPLE_LUGAR`='{$this->getID_MULTIPLE_LUGAR()}'";

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
		$query = "UPDATE multiple_lugar SET 
						`MULTIPLE_LUGAR` = '" . mysql_real_escape_string($this->getMULTIPLE_LUGAR(),$dblink) . "',
						`ACTIVO` = '" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "' 
						WHERE `ID_MULTIPLE_LUGAR`='{$this->getID_MULTIPLE_LUGAR()}'";

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
		$query ="INSERT INTO multiple_lugar (`MULTIPLE_LUGAR`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getMULTIPLE_LUGAR(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_MULTIPLE_LUGAR($ID_MULTIPLE_LUGAR='')
	{
		$this->ID_MULTIPLE_LUGAR = $ID_MULTIPLE_LUGAR;
		return true;
	}

	public function getID_MULTIPLE_LUGAR()
	{
		return $this->ID_MULTIPLE_LUGAR;
	}

	public function setMULTIPLE_LUGAR($MULTIPLE_LUGAR='')
	{
		$this->MULTIPLE_LUGAR = $MULTIPLE_LUGAR;
		return true;
	}

	public function getMULTIPLE_LUGAR()
	{
		return $this->MULTIPLE_LUGAR;
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

} // END class multiple_lugar
