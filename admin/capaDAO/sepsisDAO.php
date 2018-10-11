<?php

/******************************************************************************
* Class for neocosur.antecedentes_partoDAO
*******************************************************************************/

class sepsisDAO
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
	
	public function guarda($sepsis)
	{
		$query="
			INSERT INTO `sepsis` (
			`id_neocosur`,
			`dias`,
			`id_tipoGermen`,
			`otro`,
			`he_lcr`)
			VALUES 
			( ?,?,?,?,?);";
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssss",
		$sepsis->ID_NEOCOSUR, 
		$sepsis->DIAS, 
		$sepsis->TIPOGERMEN, 
		$sepsis->OTRO, 
		$sepsis->HE_LCR 
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function  buscarId($id)
	{
		
		$query="select 	id_sepsis,id_neocosur,dias,id_tipoGermen,otro,he_lcr,descripcion 
		from sepsis  inner join  sepsis_param on   sepsis.id_tipoGermen=sepsis_param.id_sepsis_param
		
		where id_neocosur = ? ";
		
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$retorno = $sentencia->get_result(); 
		$this->conexionDao->Cerrar();
		return $retorno;
		}
             
		
		
		
	
	
	public function eliminar($id){
		$query="delete from sepsis  where 	id_sepsis = ? ";
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("s",	$id );
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	
	
}