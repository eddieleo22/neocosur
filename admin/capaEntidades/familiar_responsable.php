<?php

/******************************************************************************
* Class for neocosur.familiar_responsable
*******************************************************************************/

class familiar_responsable
{
	/**
	* @var int
	*/
	private $ID_FAMILIAR_RESPONSABLE;

	/**
	* @var string
	*/
	private $FAMILIAR_RESPONSABLE;

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
		$query ="INSERT INTO familiar_responsable (`ID_FAMILIAR_RESPONSABLE`,`FAMILIAR_RESPONSABLE`,`ACTIVO`) VALUES ('" . mysql_real_escape_string($this->getID_FAMILIAR_RESPONSABLE(),$dblink) . "','" . mysql_real_escape_string($this->getFAMILIAR_RESPONSABLE(),$dblink) . "','" . mysql_real_escape_string($this->getACTIVO(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setID_FAMILIAR_RESPONSABLE($ID_FAMILIAR_RESPONSABLE='')
	{
		$this->ID_FAMILIAR_RESPONSABLE = $ID_FAMILIAR_RESPONSABLE;
		return true;
	}

	public function getID_FAMILIAR_RESPONSABLE()
	{
		return $this->ID_FAMILIAR_RESPONSABLE;
	}

	public function setFAMILIAR_RESPONSABLE($FAMILIAR_RESPONSABLE='')
	{
		$this->FAMILIAR_RESPONSABLE = $FAMILIAR_RESPONSABLE;
		return true;
	}

	public function getFAMILIAR_RESPONSABLE()
	{
		return $this->FAMILIAR_RESPONSABLE;
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

} // END class familiar_responsable