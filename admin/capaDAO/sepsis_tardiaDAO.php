<?php
include 'ConexionDAO.php';
/******************************************************************************
* Class for neocosur.sepsis_tardiaDAO
*******************************************************************************/

class sepsis_tardiaDAO
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
	
	
	public function guarda($sepsis_tardia)
	{
		$query ="INSERT INTO sepsis_tardia (
		`ID_NEOCOSUR`,
		`ID_PARAMETRO_SEPSIS`,
		`EDAD_SEPSIS`,
		`OTRO_SEPSIS`,
		`TIPO`
		) 
		VALUES ( ?,?,?,?,? ); ";
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssss",
		$sepsis_tardia->getID_NEOCOSUR(),
		$sepsis_tardia->getID_PARAMETRO_SEPSIS(),
		$sepsis_tardia->getEDAD_SEPSIS(),
		$sepsis_tardia->getOTRO_SEPSIS(),
		$sepsis_tardia->getTIPO() 
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	
	public function actualizar($sepsis_tardia)
	{
		$query = "UPDATE sepsis_tardia SET 
				`ID_PARAMETRO_SEPSIS` = ? ,
				`EDAD_SEPSIS` = ? ,
				`OTRO_SEPSIS` = ? ,
				`TIPO` = ? 
				WHERE `ID_NEOCOSUR`= ? ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssss",
		$sepsis_tardia->getID_PARAMETRO_SEPSIS(),
		$sepsis_tardia->getEDAD_SEPSIS(),
		$sepsis_tardia->getOTRO_SEPSIS(),
		$sepsis_tardia->getTIPO() ,		
		$sepsis_tardia->getID_NEOCOSUR()
		);		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;		
	}
	
	
	private function buscarId($id)
	{
		$query = "SELECT * FROM sepsis_tardia WHERE `ID_NEOCOSUR`= ? ";

		$$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$retorno = $sentencia->get_result(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
}