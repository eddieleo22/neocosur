<?php

/******************************************************************************
* Class for neocosur.antropometria_controlDAO
*******************************************************************************/

class antropometria_controlDAO
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

	public function guarda($antropometria_control)
	{
		$query ="INSERT INTO antropometria_control (
		`ID_CONTROL`,
		`PESO`,
		`TALLA`,
		`CIRCUNFERENCIA_CRANEO`,
		`IMC`,
		`OMS`,
		`TALLA_BAJA`,
		`MICROCEFALIA`,
		`MACROCEFALIA`
		) 
		VALUES ( ?,?,?,?,?,?,?,?,?) ;";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssss", 
			$antropometria_control->ID_CONTROL,
			$antropometria_control->PESO,
			$antropometria_control->TALLA,
			$antropometria_control->CIRCUNFERENCIA_CRANEO,
			$antropometria_control->IMC,
			$antropometria_control->OMS,
			$antropometria_control->TALLA_BAJA,
			$antropometria_control->MICROCEFALIA,
			$antropometria_control->MACROCEFALIA 	
		);
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function actualizar($antropometria_control)
	{
		$query = "UPDATE antropometria_control SET 
				`PESO` =  ? ,
				`TALLA` =  ? ,
				`CIRCUNFERENCIA_CRANEO` =  ? ,
				`IMC` =  ? ,
				`OMS` = ? ,
				`TALLA_BAJA` =  ? ,
				`MICROCEFALIA` =  ? ,
				`MACROCEFALIA` =  ? 
				WHERE `ID_CONTROL`= ? ;";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssss", 
			$antropometria_control->PESO,
			$antropometria_control->TALLA,
			$antropometria_control->CIRCUNFERENCIA_CRANEO,
			$antropometria_control->IMC,
			$antropometria_control->OMS,
			$antropometria_control->TALLA_BAJA,
			$antropometria_control->MICROCEFALIA,
			$antropometria_control->MACROCEFALIA,
			$antropometria_control->ID_CONTROL		
		);
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	
	public function buscarId($id)
	{
		$query = "SELECT * FROM antropometria_control WHERE `ID_CONTROL`= ?  " ;

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