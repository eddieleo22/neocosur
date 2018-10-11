<?php

/******************************************************************************
* Class for neocosur.alimentacionDAO
*******************************************************************************/

class alimentacionDAO
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
	
	
	public function guarda($alimentacion)
	{		
		$query ="INSERT INTO alimentacion (
		`ID_CONTROL`,
		`ID_ALIMENTACION_LACTEA`,
		`ID_FORMULA_UTILIZADA`,
		`EDAD_INTRODUCCION_SOLIDO_AGNO`,
		`EDAD_INTRODUCCION_SOLIDO_MESES`
		)
		VALUES(
		'" . ($alimentacion->ID_CONTROL) ."',
		'" . ($alimentacion->ID_ALIMENTACION_LACTEA) .	"',
		'" . ($alimentacion->ID_FORMULA_UTILIZADA) .	"',
		'" . ($alimentacion->EDAD_INTRODUCCION_SOLIDO_AGNO) .	"',
		'" . ($alimentacion->EDAD_INTRODUCCION_SOLIDO_MESES) . "');";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);
		$this->setId($this->conexionDao->Id);
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	

	public function actualizar($alimentacion)
	{		
		$query = "UPDATE alimentacion SET 
				`ID_ALIMENTACION_LACTEA` = '" . ($alimentacion->ID_ALIMENTACION_LACTEA) . "',
				`ID_FORMULA_UTILIZADA` = '" . ($alimentacion->ID_FORMULA_UTILIZADA) . "',
				`EDAD_INTRODUCCION_SOLIDO_AGNO` = '" . ($alimentacion->EDAD_INTRODUCCION_SOLIDO_AGNO) . "',
				`EDAD_INTRODUCCION_SOLIDO_MESES` = '" . ($alimentacion->EDAD_INTRODUCCION_SOLIDO_MESES) . "' 
				WHERE `ID_CONTROL`='{$alimentacion->ID_CONTROL}'";

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->Id);
		$this->conexionDao->Cerrar();
		return $retorno;  	
	}
       
        
	public function  buscarId($id)
	{
		 $query = "select  *  from alimentacion WHERE ID_CONTROL=".$id;
		
		$this->conexionDao->Abrir();
		$resultado = $this->conexionDao->select($query);			
		$row = $resultado->fetch_assoc();					
		$this->conexionDao->Cerrar();
		return $row;
	}
        

}




