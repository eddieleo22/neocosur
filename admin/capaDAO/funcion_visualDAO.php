<?php

/******************************************************************************
* Class for neocosur.funcion_visualDAO
*******************************************************************************/

class funcion_visualDAO
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

	public function Id()
	{
		return $this->id;
	}
	

	public function guarda($funcion_visual)
	{
		$query ="INSERT INTO funcion_visual (
		`ID_CONTROL`,
		`EVA_ALTA`, 
		`ROP_IZQ`,
		`ID_LOCALIZACION_IZQ`,
		`ID_SEVERIDAD_IZQ`,
		`ENF_PLUS_IZQ`,
		`CIRUGIA_ROP_IZQ`,
		`ID_CIRUGIA_ROP_IZQ`, 
		`ROP_DER`,
		`ID_LOCALIZACION_DER`,
		`ID_SEVERIDAD_DER`,
		`ENF_PLUS_DER`,
		`CIRUGIA_ROP_DER`,
		`ID_CIRUGIA_ROP_DER`,
		
		`BEVACIZUMAB`,
		`INSTANCIA_EVAL_40_SEM_EC`,
		`INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL`,
		
		`INSTANCIA_EVAL_40_SEM_ROP_IZQ`,
		`INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ`,
		`ID_CIRUGIA_EVAL_40_SEM_EC_IZQ`,
		`INSTANCIA_EVAL_40_SEM_ROP_DER`,
		`INSTANCIA_EVAL_40_SEM_CIRUGIA_DER`,
		`ID_CIRUGIA_EVAL_40_SEM_EC_DER`,
		
		`REQUIERE_CIRUGIA`,
		`ID_CIRUGIA`,
		`OBSERVACIONES`,
		`CEGUERA_OJO_IZQ`,
		`CEGUERA_OJO_DER`
		) 
		VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ;";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssssssssssssssssssssss",
		$funcion_visual->ID_CONTROL, 
		$funcion_visual->EVA_ALTA,		
		$funcion_visual->ROP_IZQ,
		$funcion_visual->ID_LOCALIZACION_IZQ,
		$funcion_visual->ID_SEVERIDAD_IZQ,
		$funcion_visual->ENF_PLUS_IZQ,
		$funcion_visual->CIRUGIA_ROP_IZQ,
		$funcion_visual->ID_CIRUGIA_ROP_IZQ, 
		$funcion_visual->ROP_DER,
		$funcion_visual->ID_LOCALIZACION_DER,
		$funcion_visual->ID_SEVERIDAD_DER,
		$funcion_visual->ENF_PLUS_DER,
		$funcion_visual->CIRUGIA_ROP_DER,
		$funcion_visual->ID_CIRUGIA_ROP_DER,		
		$funcion_visual->BEVACIZUMAB,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_EC,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_ROP_IZQ,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ,
		$funcion_visual->ID_CIRUGIA_EVAL_40_SEM_EC_IZQ,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_ROP_DER,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_CIRUGIA_DER,
		$funcion_visual->ID_CIRUGIA_EVAL_40_SEM_EC_DER,		
		$funcion_visual->REQUIERE_CIRUGIA,
		$funcion_visual->ID_CIRUGIA,
		$funcion_visual->OBSERVACIONES,
		$funcion_visual->CEGUERA_OJO_IZQ,
		$funcion_visual->CEGUERA_OJO_DER 
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
		
	
	}
	
	
	public function actualizar($funcion_visual)
	{
		 $query = "UPDATE funcion_visual SET 
				`EVA_ALTA` =  ? , 
				`ROP_IZQ` =  ? ,
				`ID_LOCALIZACION_IZQ` =  ? ,
				`ID_SEVERIDAD_IZQ` =  ? ,
				`ENF_PLUS_IZQ` =  ? ,
				`CIRUGIA_ROP_IZQ` =  ? ,
				`ID_CIRUGIA_ROP_IZQ` =  ? ,				
				`ROP_DER` =  ? ,
				`ID_LOCALIZACION_DER` =  ? ,
				`ID_SEVERIDAD_DER` =  ? ,
				`ENF_PLUS_DER` =  ? ,
				`CIRUGIA_ROP_DER` =  ? ,
				`ID_CIRUGIA_ROP_DER` =  ? ,				
				`BEVACIZUMAB` =  ? ,
				`INSTANCIA_EVAL_40_SEM_EC` =  ? ,
				`INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL` =  ? ,				
				`INSTANCIA_EVAL_40_SEM_ROP_IZQ` =  ? ,
				`INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ` =  ? ,
				`ID_CIRUGIA_EVAL_40_SEM_EC_IZQ` =  ? ,				
				`INSTANCIA_EVAL_40_SEM_ROP_DER` =  ? ,
				`INSTANCIA_EVAL_40_SEM_CIRUGIA_DER` =  ? ,
				`ID_CIRUGIA_EVAL_40_SEM_EC_DER` =  ? ,				
				`REQUIERE_CIRUGIA` =  ? ,
				`ID_CIRUGIA` =  ? ,
				`OBSERVACIONES` =  ? ,
				`CEGUERA_OJO_IZQ` =  ? ,
				`CEGUERA_OJO_DER` =  ? 
				WHERE `ID_CONTROL`= ? ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssssssssssssssssssssss", 
		$funcion_visual->EVA_ALTA,		
		$funcion_visual->ROP_IZQ,
		$funcion_visual->ID_LOCALIZACION_IZQ,
		$funcion_visual->ID_SEVERIDAD_IZQ,
		$funcion_visual->ENF_PLUS_IZQ,
		$funcion_visual->CIRUGIA_ROP_IZQ,
		$funcion_visual->ID_CIRUGIA_ROP_IZQ, 
		$funcion_visual->ROP_DER,
		$funcion_visual->ID_LOCALIZACION_DER,
		$funcion_visual->ID_SEVERIDAD_DER,
		$funcion_visual->ENF_PLUS_DER,
		$funcion_visual->CIRUGIA_ROP_DER,
		$funcion_visual->ID_CIRUGIA_ROP_DER,		
		$funcion_visual->BEVACIZUMAB,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_EC,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_ROP_IZQ,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ,
		$funcion_visual->ID_CIRUGIA_EVAL_40_SEM_EC_IZQ,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_ROP_DER,
		$funcion_visual->INSTANCIA_EVAL_40_SEM_CIRUGIA_DER,
		$funcion_visual->ID_CIRUGIA_EVAL_40_SEM_EC_DER,		
		$funcion_visual->REQUIERE_CIRUGIA,
		$funcion_visual->ID_CIRUGIA,
		$funcion_visual->OBSERVACIONES,
		$funcion_visual->CEGUERA_OJO_IZQ,
		$funcion_visual->CEGUERA_OJO_DER ,
		$funcion_visual->ID_CONTROL
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
		 $query = "SELECT * FROM funcion_visual WHERE `ID_CONTROL`= ? ";
		
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