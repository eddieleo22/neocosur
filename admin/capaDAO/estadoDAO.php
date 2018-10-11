<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class estadoDAO
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

	public function getId()
	{
		return $this->id;
	}
	
 
public function guarda($estado)
	{
		$query ="INSERT INTO estado_ficha (
		`ESTADO_FICHA`,
		`nombreEstado`,
                `ID_NEOCOSUR`
		) 
		VALUES (
		'" . ($estado->ESTADO_FICHA) . "',
		'" . ($estado->nombreEstado) . "',
                '" . ($estado->ID_NEOCOSUR). "');";

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	     
	public function actualizar($estado)
	{
		$query = "UPDATE estado_ficha SET 
				`ESTADO_FICHA` = '" . ($estado->getESTADO_FICHA()) . "',
				`nombreEstado` = '" . ($estado->nombreEstado) . "'
				WHERE `ID_NEOCOSUR`='{$estado->getID_NEOCOSUR()}'";
				
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);		 
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	


	public function buscarId($id)
	{
            
		 $query = "SELECT * FROM estado_ficha WHERE `ID_NEOCOSUR`=".$id;
            
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	
	
	
}