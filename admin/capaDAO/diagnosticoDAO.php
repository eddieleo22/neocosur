<?php
include 'ConexionDAO.php';
/******************************************************************************
* Class for neocosur.diagnosticoDAO
*******************************************************************************/

class diagnosticoDAO
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
	
	
	public function guarda($diagnostico)
	{
		$query ="INSERT INTO diagnostico (
		`ID_DIAGNOSTICO`,
		`ID_CONTROL`,
		`ID_NEOCOSUR`,
		`ID_CALIFICACION_NUTRICIONAL`,
		`DESARROLLO_PSICOMOTOR`,
		`OBSERVACIONES`,
		`INTERCONSULTA`,
		`EXAMENES`,
		`INDICACIONES`
		) 
		VALUES (
		'" . ($diagnostico->getID_DIAGNOSTICO()) . "',
		'" . ($diagnostico->getID_CONTROL()) . "',
		'" . ($diagnostico->getID_NEOCOSUR()) . "',
		'" . ($diagnostico->getID_CALIFICACION_NUTRICIONAL()) . "',
		'" . ($diagnostico->getDESARROLLO_PSICOMOTOR()) . "',
		'" . ($diagnostico->getOBSERVACIONES()) . "',
		'" . ($diagnostico->getINTERCONSULTA()) . "',
		'" . ($diagnostico->getEXAMENES()) . "',
		'" . ($diagnostico->getINDICACIONES()) . "');";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	public function actualizar($diagnostico)
	{
		$query = "UPDATE diagnostico SET 
				`ID_CALIFICACION_NUTRICIONAL` = '" . ($diagnostico->getID_CALIFICACION_NUTRICIONAL()) . "',
				`DESARROLLO_PSICOMOTOR` = '" . ($diagnostico->getDESARROLLO_PSICOMOTOR()) . "',
				`OBSERVACIONES` = '" . ($diagnostico->getOBSERVACIONES()) . "',
				`INTERCONSULTA` = '" . ($diagnostico->getINTERCONSULTA()) . "',
				`EXAMENES` = '" . ($diagnostico->getEXAMENES()) . "',
				`INDICACIONES` = '" . ($diagnostico->getINDICACIONES()) . "'
				WHERE `ID_CONTROL`='{$diagnostico->getID_CONTROL()}'";
				
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	private function buscarIdControl($id)
	{
		$query = "SELECT * FROM diagnostico WHERE `ID_CONTROL`=".$id;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	private function buscarIdNeocosur($id)
	{
		$query = "SELECT * FROM diagnostico WHERE `ID_NEOCOSUR`=".$id;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
}