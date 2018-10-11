<?php

/******************************************************************************
* Class for neocosur.antecedentes_connatalesDAO
*******************************************************************************/

class antecedentes_connatalesDAO
{
	private $conexionDao;
	private $id;	
	function __construct($cone)
	{
		$this->conexionDao =$cone ;			
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
	
	
	public function guarda($antecedentes_connatales)
	{
		$query ="INSERT INTO antecedentes_connatales 
		(
		`ID_CONTROL`,
		`ID_PARIDAD`,
		`ID_CALIFICACION_ESTADO_NUTRICIONAL`,
		`MALFORMACIONES_CONGENITAS`,
		`MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO`,
		`MALF_CONGENITAS_DEFECTOS_CARDIACOS`,
		`MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES`,
		`MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS`,
		`MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS`,
		`MALF_CONGENITAS_OTROS_DEFECTOS`,
		`MALF_CONGENITAS_OTRO_CUAL`,
		`OBSERVACIONES`
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssssss",
		$antecedentes_connatales->ID_CONTROL,
		$antecedentes_connatales->ID_PARIDAD,
		$antecedentes_connatales->ID_CALIFICACION_ESTADO_NUTRICIONAL,
		$antecedentes_connatales->MALFORMACIONES_CONGENITAS,
		$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO,
		$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_CARDIACOS,
		$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES,
		$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS,
		$antecedentes_connatales->MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS,
		$antecedentes_connatales->MALF_CONGENITAS_OTROS_DEFECTOS,
		$antecedentes_connatales->MALF_CONGENITAS_OTRO_CUAL,
		$antecedentes_connatales->OBSERVACIONES
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	
	

	
	
	public function  buscarId($id)
	{
			
	
	
		$query = "SELECT ac.* FROM `antecedentes_connatales`  as  ac
					inner join control c on c.ID_CONTROL = ac.ID_CONTROL
					where 
						c.ID_CONTROL in (
						select  ID_CONTROL from control 
						where ID_NEOCOSUR = ? 
         				)
					order by c.ID_CONTROL desc limit 0,1 ;";
		
		$this->conexionDao->Abrir();
		
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();
		
					
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function existeConnatales($idNeocosur){
	$query = "SELECT count(*) as cantidad FROM `antecedentes_connatales`  as  ac
					inner join control c on c.ID_CONTROL = ac.ID_CONTROL
					where c.ID_NEOCOSUR= ? 
					order by c.ID_CONTROL desc limit 0,1 ;";
		
		$this->conexionDao->Abrir();
		
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $idNeocosur );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();
		
				
		$this->conexionDao->Cerrar();
		return $row;
			
	}
	
	
	
	
}