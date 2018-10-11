<?php
include 'ConexionDAO.php';
/******************************************************************************
* Class for neocosur.controlDAO
*******************************************************************************/

class controlDAO
{
	private $conexionDao;
	private $id;	
	function __construct()
	{
		$this->conexionDao = new ConexionDAO();			
	}

	public function setId($id='')
	{
		$this->id = $id;
		return true;
	}

	public function getId()
	{
		return $this->id;
	}
	
	public function guarda($control)
	{
		echo $query ="INSERT INTO control (
		`ID_NEOCOSUR`,
		`FECHA_CONTROL`,
		`EDAD_CORREGIDA_AGNOS`,
		`EDAD_CORREGIDA_MESES`,
		`EDAD_CRONOLOGICA_AGNOS`,
		`EDAD_CRONOLOGICA_MESES`,
		`ID_RESPONSABLE`,
		`ID_ESTADO_REGISTRO`
		) 
		VALUES (
		'" . ($control->getID_NEOCOSUR()) . "',
		'" . ($control->getFECHA_CONTROL()) . "',
		'" . ($control->getEDAD_CORREGIDA_AGNOS()) . "',
		'" . ($control->getEDAD_CORREGIDA_MESES()) . "',
		'" . ($control->getEDAD_CRONOLOGICA_AGNOS()) . "',
		'" . ($control->getEDAD_CRONOLOGICA_MESES()) . "',
		'" . ($control->getID_RESPONSABLE()) . "',
		'" . ($control->getID_ESTADO_REGISTRO()) . "');";
		die;
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;		
	}
	
	
	public function actualizar($control)
	{
		  $query = "UPDATE control SET 
				`FECHA_CONTROL` = '" . ($control->getFECHA_CONTROL()) . "',
				`EDAD_CORREGIDA_AGNOS` = '" . ($control->getEDAD_CORREGIDA_AGNOS()) . "',
				`EDAD_CORREGIDA_MESES` = '" . ($control->getEDAD_CORREGIDA_MESES()) . "',
				`EDAD_CRONOLOGICA_AGNOS` = '" . ($control->getEDAD_CRONOLOGICA_AGNOS()) . "',
				`EDAD_CRONOLOGICA_MESES` = '" . ($control->getEDAD_CRONOLOGICA_MESES()) . "',
				`ID_RESPONSABLE` = '" . ($control->getID_RESPONSABLE . "',
				`ID_ESTADO_REGISTRO` = '" . ($control->getID_ESTADO_REGISTRO()) . "'
				WHERE `ID_CONTROL`='{$control->ID_CONTROL}'"; 
				
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	private function buscarIdControl($id)
	{
		$query = "SELECT * FROM control WHERE `ID_CONTROL`=".$id;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	private function buscarIdNeocosur($id)
	{
		$query = "SELECT * FROM control WHERE `ID_NEOCOSUR`=".$id;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
}
