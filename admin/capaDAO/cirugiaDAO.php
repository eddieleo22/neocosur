<?php

/******************************************************************************
* Class for neocosur.antecedentes_partoDAO
*******************************************************************************/

class cirugiaDAO
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
	
	public function guarda($cirugia)
	{
		$query="
			INSERT INTO `cirugia` (
			`id_neocosur`,
			`edad`,
			`detalle`,
			`otro`,
			`activo`)
			VALUES 
			(
			'".$cirugia->ID_NEOCOSUR."', 
			'".$cirugia->EDAD."', 
			'".$cirugia->DETALLE."', 
			'".$cirugia->OTRO."', 
			'1');";
		
		$this->conexionDao->Abrir();
		
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;		
	}
	
	public function  buscarId($id)
	{

		$query="select 	id_cirugia,id_neocosur,edad,detalle,otro,cirugia.activo,descripcion 
		from cirugia 
		inner join cirugia_param on cirugia.detalle=cirugia_param.id_cirugia_param
		
		where id_neocosur =".$id.";";
		
		$this->conexionDao->Abrir();
		
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$retorno = $sentencia->get_result();
		
		$this->conexionDao->Cerrar();
		
		return $retorno;
		}
             
		
		
		
	
	
	public function eliminar($id){
		$query="delete from cirugia  where 	id_cirugia =".$id;
		$this->conexionDao->Abrir();

		$retorno = $this->conexionDao->insertUpdateDelete($query);			
		

		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	
	
}