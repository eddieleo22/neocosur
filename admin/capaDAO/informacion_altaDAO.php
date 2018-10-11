<?php

/******************************************************************************
* Class for neocosur.informacion_altaDAO
*******************************************************************************/

class informacion_altaDAO
{
	private $conexionDao;
	private $id;	
	function __construct($cone)
	{
		$this->conexionDao = $cone;			
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
	public function guardaIngreso($informacion_alta)
	{
		
		
		$query ="INSERT INTO informacion_alta (
		`ID_NEOCOSUR`,
		ID_DESTINO)
		VALUES (
		'" . ($informacion_alta->getID_NEOCOSUR()) . "',
		'0'); ";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
		
	public function guarda($informacion_alta)
	{
		

		$query ="INSERT INTO informacion_alta (
		`ID_NEOCOSUR`,
		`FECCHA_ALTA_FALLECE`,
		`ID_DESTINO`,
		`OXIGENO_DOMICILIARIO`,
		`FALLECE_MENOR_DIA_HORAS`,
		`AUTOPSIA`,
		`RESULTADO_AUTOPSIA`,
		`ID_SITUACION_MUERTE`,
		`OBSERVACIONES_`,
		`CAUSA_PROBABLE_MALFORMACIONES`,
		`CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA`,
		`CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO`,
		`CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA`,
		`CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA`,
		`CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA`,
		`CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO`,
		`CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA`,
		`CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL`,
		`CAUSA_PROBABLE_SITUACION_MUERTE_OTRA`,
		`CAUSA_PROBABLE_SITUACION_MURTE_CAUSA`,
		`OBSERVACIONES_CAUSA_PROBABLE_MUERTE`
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ) ";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssss",
		$informacion_alta->getID_NEOCOSUR(),
		$informacion_alta->getFECCHA_ALTA_FALLECE(),
		$informacion_alta->getID_DESTINO(),
		$informacion_alta->getOXIGENO_DOMICILIARIO(),
		$informacion_alta->getFALLECE_MENOR_DIA_HORAS(),
		$informacion_alta->AUTOPSIA,
		$informacion_alta->getRESULTADO_AUTOPSIA(),
		$informacion_alta->getID_SITUACION_MUERTE(),
		$informacion_alta->getOBSERVACIONES_(),
		$informacion_alta->CAUSA_PROBABLE_MALFORMACIONES,
		$informacion_alta->getCAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA(),
		$informacion_alta->getCAUSA_PROBABLE_PARO_CARDIORESPIRATORIO(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_CARDIACA(),
		$informacion_alta->getCAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL(),
		$informacion_alta->getCAUSA_PROBABLE_SITUACION_MUERTE_OTRA(),
		$informacion_alta->getCAUSA_PROBABLE_SITUACION_MURTE_CAUSA(),
		$informacion_alta->getOBSERVACIONES_CAUSA_PROBABLE_MUERTE()
		);
 
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	//
	
	public function actualizar($informacion_alta)
	{
		$query = "UPDATE informacion_alta SET 
				`FECCHA_ALTA_FALLECE` = ? ,
				`ID_DESTINO` =  ? ,
				`OXIGENO_DOMICILIARIO` =  ? ,
				`FALLECE_MENOR_DIA_HORAS` =  ? ,
				`AUTOPSIA` =  ? ,
				`RESULTADO_AUTOPSIA` =  ? ,
				`ID_SITUACION_MUERTE` =  ? ,
				`OBSERVACIONES_` =  ? ,
				`CAUSA_PROBABLE_MALFORMACIONES` =  ? ,
				`CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA` =  ? ,
				`CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO` =  ? ,
				`CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA` =  ? ,
				`CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA` =  ? ,
				`CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA` =  ? ,
				`CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO` =  ? ,
				`CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA` =  ? ,
				`CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL` =  ? ,
				`CAUSA_PROBABLE_SITUACION_MUERTE_OTRA` =  ? ,
				`CAUSA_PROBABLE_SITUACION_MURTE_CAUSA` =  ? ,
				`OBSERVACIONES_CAUSA_PROBABLE_MUERTE` =  ? 
				WHERE `ID_NEOCOSUR`=  ?  ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssss",
		$informacion_alta->getFECCHA_ALTA_FALLECE(),
		$informacion_alta->getID_DESTINO(),
		$informacion_alta->getOXIGENO_DOMICILIARIO(),
		$informacion_alta->getFALLECE_MENOR_DIA_HORAS(),
		$informacion_alta->AUTOPSIA,
		$informacion_alta->getRESULTADO_AUTOPSIA(),
		$informacion_alta->getID_SITUACION_MUERTE(),
		$informacion_alta->getOBSERVACIONES_(),
		$informacion_alta->CAUSA_PROBABLE_MALFORMACIONES,
		$informacion_alta->getCAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA(),
		$informacion_alta->getCAUSA_PROBABLE_PARO_CARDIORESPIRATORIO(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_CARDIACA(),
		$informacion_alta->getCAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA(),
		$informacion_alta->getCAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL(),
		$informacion_alta->getCAUSA_PROBABLE_SITUACION_MUERTE_OTRA(),
		$informacion_alta->getCAUSA_PROBABLE_SITUACION_MURTE_CAUSA(),
		$informacion_alta->getOBSERVACIONES_CAUSA_PROBABLE_MUERTE(),
		$informacion_alta->getID_NEOCOSUR()
		);
 
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
		 $query = "SELECT * FROM informacion_alta WHERE `ID_NEOCOSUR`= ? ";

		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();

		$this->conexionDao->Cerrar();
		return $row;
	}
	
}