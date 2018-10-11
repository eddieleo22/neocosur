<?php

/******************************************************************************
* Class for neocosur.antecedentes_familiaresDAO
*******************************************************************************/

class antecedentes_familiaresDAO
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
	
	public function guarda($antecedentes_familiares)
	{
	 	$query ="INSERT INTO antecedentes_familiares 
		(
		`ID_CONTROL`,
		`ID_NEOCOSUR`,
		`ID_APORTA_INFO_FAMILIAR`,
		`ID_CUIDADOR_RESPONSABLE`,
		`ID_PAIS_RESIDENCIA`,
		`ID_CIUDAD`,
		`COMUNA`,
		`ID_NIVEL_EDUCACIONAL_MADRE`,
		`ID_OCUPACION_MADRE`,
		`ID_NIVEL_EDUCACIONAL_PADRE`,
		`ID_OCUPACION_PADRE`,
		`NUMERO_NINOS_FAMILIA`,
		`MIGRACION_MADRE`,
		`MIGRACION_MADRE_DESDE`,
		`MIGRACION_PADRE`,
		`MIGRACION_PADRE_DESDE`
		) 
		VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ; ";

		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssssssssss", 
			$antecedentes_familiares->ID_CONTROL,
			$antecedentes_familiares->ID_NEOCOSUR,
			$antecedentes_familiares->ID_APORTA_INFO_FAMILIAR,
			$antecedentes_familiares->ID_CUIDADOR_RESPONSABLE,
			$antecedentes_familiares->ID_PAIS_RESIDENCIA,
			$antecedentes_familiares->ID_CIUDAD,
			$antecedentes_familiares->COMUNA,
			$antecedentes_familiares->ID_NIVEL_EDUCACIONAL_MADRE,
			$antecedentes_familiares->ID_OCUPACION_MADRE,
			$antecedentes_familiares->ID_NIVEL_EDUCACIONAL_PADRE,
			$antecedentes_familiares->ID_OCUPACION_PADRE,
			$antecedentes_familiares->NUMERO_NINOS_FAMILIA,
			$antecedentes_familiares->MIGRACION_MADRE,
			$antecedentes_familiares->MIGRACION_MADRE_DESDE,
			$antecedentes_familiares->MIGRACION_PADRE,
			$antecedentes_familiares->MIGRACION_PADRE_DESDE		
		);
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	

	
	
	public function  buscarId($id)
	{
		 $query = "select  *  from antecedentes_familiares WHERE ID_NEOCOSUR= ? 
				 order by ID_CONTROL desc limit 0,1";
		
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