<?php

/******************************************************************************
* Class for neocosur.antropometriaDAO
*******************************************************************************/

class antropometriaDAO
{
	public $conexionDao;
	public $id;	
	function __construct($cone)
	{
		$this->conexionDao = $cone;			
	}

	public function setId($id='')
	{
		$this->id = $id;
		return true;
	}

	public function Id()
	{
		return $this->id;
	}
	
	
	public function guarda($antropometria)
	{
		$query ="INSERT INTO antropometria (
		`ID_NEOCOSUR`,
		`EDAD_ALTA_DIAS`,
		`PESO_7_DIAS`,
		`PESO_28_DIAS`,
		`PESO_36_SEM`,
		`PESO_ALTA_DIAS`,
		`TALLA_7_DIAS`,
		`TALLA_28_DIAS`,
		`TALLA_36_SEM`,
		`TALLA_ALTA_DIAS`,
		`CIRC_CRANEO_7_DIAS`,
		`CIRC_CRANEO_28_DIAS`,
		`CIRC_CRANEO_36_SEM`,
		`CIRC_CRANEO_ALTA_DIAS`
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,? ) ";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssssssss", 
		$antropometria->ID_NEOCOSUR,
		$antropometria->EDAD_ALTA_DIAS,
		$antropometria->PESO_7_DIAS,
		$antropometria->PESO_28_DIAS,
		$antropometria->PESO_36_SEM,
		$antropometria->PESO_ALTA_DIAS,
		$antropometria->TALLA_7_DIAS,
		$antropometria->TALLA_28_DIAS,
		$antropometria->TALLA_36_SEM,
		$antropometria->TALLA_ALTA_DIAS,
		$antropometria->CIRC_CRANEO_7_DIAS,
		$antropometria->CIRC_CRANEO_28_DIAS,
		$antropometria->CIRC_CRANEO_36_SEM,
		$antropometria->CIRC_CRANEO_ALTA_DIAS
		);

 
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function actualizar($antropometria)
	{
		$query = "UPDATE antropometria SET 
				`EDAD_ALTA_DIAS` =  ? ,
				`PESO_7_DIAS` =  ? ,
				`PESO_28_DIAS` =  ? ,
				`PESO_36_SEM` =  ? ,
				`PESO_ALTA_DIAS` =  ? ,
				`TALLA_7_DIAS` =  ? ,
				`TALLA_28_DIAS` =  ? ,
				`TALLA_36_SEM` =  ? ,
				`TALLA_ALTA_DIAS` =  ? ,
				`CIRC_CRANEO_7_DIAS` =  ? ,
				`CIRC_CRANEO_28_DIAS` =  ? ,
				`CIRC_CRANEO_36_SEM` =  ? ,
				`CIRC_CRANEO_ALTA_DIAS` = ? 
				WHERE `ID_NEOCOSUR`=? ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssssssss", 
		$antropometria->EDAD_ALTA_DIAS,
		$antropometria->PESO_7_DIAS,
		$antropometria->PESO_28_DIAS,
		$antropometria->PESO_36_SEM,
		$antropometria->PESO_ALTA_DIAS,
		$antropometria->TALLA_7_DIAS,
		$antropometria->TALLA_28_DIAS,
		$antropometria->TALLA_36_SEM,
		$antropometria->TALLA_ALTA_DIAS,
		$antropometria->CIRC_CRANEO_7_DIAS,
		$antropometria->CIRC_CRANEO_28_DIAS,
		$antropometria->CIRC_CRANEO_36_SEM,
		$antropometria->CIRC_CRANEO_ALTA_DIAS,
		$antropometria->ID_NEOCOSUR
		);

		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function actualizarAlta($dias,$idNeocosur)
	{	
		$query = "UPDATE antropometria SET 
				`EDAD_ALTA_DIAS` =  ?  
				WHERE `ID_NEOCOSUR`=? ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ss",  
		$dias,$idNeocosur);

		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}

	
	public function buscarId($id)
	{
		$query = "SELECT * FROM antropometria WHERE `ID_NEOCOSUR`= ? ; ";

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