<?php
include 'ConexionDAO.php';
/******************************************************************************
* Class for neocosur.oido_diagnosticoDAO
*******************************************************************************/

class oido_diagnosticoDAO
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
	
	public function guarda($oido_diagnostico)
	{
		$query ="INSERT INTO oido_diagnostico (
		`ID_CONTROL`,
		`OIDO`,
		`ID_GRADO`,
		`ALTERACION_NEUROSENSORIAL`,
		`ALTERACION_DE_CONDUCCION`,
		`NECESIDAD_DE_TRATAMIENTO`,
		`TRAT_`,
		`TRAT_IMPLANTE_COCLEAR`,
		`TRAT_TERAPIA_AUDITIVA`,
		`TERAPIA_AUDITIVA_VERBAL`,
		`TARAPIA_AUDITIVA_SENNA`,
		`TERAPIA_AUDITIVA_OTRO`,
		`TERAPIA_AUDITIVA_OBSERVACIONES`
		) 
		VALUES (
		'" . ($oido_diagnostico->getID_CONTROL()) . "',
		'" . ($oido_diagnostico->getOIDO()) . "',
		'" . ($oido_diagnostico->getID_GRADO()) . "',
		'" . ($oido_diagnostico->getALTERACION_NEUROSENSORIAL()) . "',
		'" . ($oido_diagnostico->getALTERACION_DE_CONDUCCION()) . "',
		'" . ($oido_diagnostico->getNECESIDAD_DE_TRATAMIENTO()) . "',
		'" . ($oido_diagnostico->getTRAT_()) . "',
		'" . ($oido_diagnostico->getTRAT_IMPLANTE_COCLEAR()) . "',
		'" . ($oido_diagnostico->getTRAT_TERAPIA_AUDITIVA()) . "',
		'" . ($oido_diagnostico->getTERAPIA_AUDITIVA_VERBAL()) . "',
		'" . ($oido_diagnostico->getTARAPIA_AUDITIVA_SENNA()) . "',
		'" . ($oido_diagnostico->getTERAPIA_AUDITIVA_OTRO()) . "',
		'" . ($oido_diagnostico->getTERAPIA_AUDITIVA_OBSERVACIONES()) . "');";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function actualizar($oido_diagnostico)
	{
		$query = "UPDATE oido_diagnostico SET 
				`OIDO` = '" . ($oido_diagnostico->getOIDO()) . "',
				`ID_GRADO` = '" . ($oido_diagnostico->getID_GRADO()) . "',
				`ALTERACION_NEUROSENSORIAL` = '" . ($oido_diagnostico->getALTERACION_NEUROSENSORIAL()) . "',
				`ALTERACION_DE_CONDUCCION` = '" . ($oido_diagnostico->getALTERACION_DE_CONDUCCION()) . "',
				`NECESIDAD_DE_TRATAMIENTO` = '" . ($oido_diagnostico->getNECESIDAD_DE_TRATAMIENTO()) . "',
				`TRAT_` = '" . ($oido_diagnostico->getTRAT_()) . "',
				`TRAT_IMPLANTE_COCLEAR` = '" . ($oido_diagnostico->getTRAT_IMPLANTE_COCLEAR()) . "',
				`TRAT_TERAPIA_AUDITIVA` = '" . ($oido_diagnostico->getTRAT_TERAPIA_AUDITIVA()) . "',
				`TERAPIA_AUDITIVA_VERBAL` = '" . ($oido_diagnostico->getTERAPIA_AUDITIVA_VERBAL()) . "',
				`TARAPIA_AUDITIVA_SENNA` = '" . ($oido_diagnostico->getTARAPIA_AUDITIVA_SENNA()) . "',
				`TERAPIA_AUDITIVA_OTRO` = '" . ($oido_diagnostico->getTERAPIA_AUDITIVA_OTRO()) . "',
				`TERAPIA_AUDITIVA_OBSERVACIONES` = '" . ($oido_diagnostico->getTERAPIA_AUDITIVA_OBSERVACIONES()) . "'
				WHERE `ID_CONTROL`='{$oido_diagnostico->getID_CONTROL()}'";
				
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	private function buscarId($id)
	{
		$query = "SELECT * FROM oido_diagnostico WHERE `ID_CONTROL`=".$id;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
}