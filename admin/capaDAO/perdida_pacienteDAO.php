<?php

/******************************************************************************
* Class for neocosur.perdida_pacienteDAO
*******************************************************************************/

class perdida_pacienteDAO
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
	
	
	public function guarda($perdida_paciente)
	{
		  $query ="INSERT INTO perdida_paciente (
		`ID_CONTROL`, 
		`FALLECE_SEGUIMIENTO`,
		`ID_LUGAR_FALLECE`,
		`FECHA_FALLECE`,
		`EDAD_FELLECE_AGNOS`,
		`EDAD_FELLECE_MESES`,
		`OBSERVACIONES`,
		`PERDIDA_PACIENTE`,
		`ID_CAUSA_PERDIDA`
		) 
		VALUES (?,?,?,?,?,?,?,?,? ) ;"; 
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssss",
				$perdida_paciente->ID_CONTROL, 
				$perdida_paciente->FALLECE_SEGUIMIENTO,
				$perdida_paciente->ID_LUGAR_FALLECE,
				$perdida_paciente->FECHA_FALLECE,
				$perdida_paciente->EDAD_FELLECE_AGNOS,
				$perdida_paciente->EDAD_FELLECE_MESES,
				$perdida_paciente->OBSERVACIONES,
				$perdida_paciente->ID_PERDIDA_PACIENTE ,
				$perdida_paciente->ID_CAUSA_PERDIDA 
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	public function actualizar($perdida_paciente)
	{
		$query = "UPDATE perdida_paciente SET 
				`FALLECE_SEGUIMIENTO` = ? ,
				`ID_LUGAR_FALLECE` = ? ,
				`FECHA_FALLECE` = ? ,
				`EDAD_FELLECE_AGNOS` = ? ,
				`EDAD_FELLECE_MESES` = ? ,
				`OBSERVACIONES` = ? ,
				`PERDIDA_PACIENTE` = ? ,
				`ID_CAUSA_PERDIDA` = ? 
				WHERE `ID_CONTROL`=? ;";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssss", 
				$perdida_paciente->FALLECE_SEGUIMIENTO,
				$perdida_paciente->ID_LUGAR_FALLECE,
				$perdida_paciente->FECHA_FALLECE,
				$perdida_paciente->EDAD_FELLECE_AGNOS,
				$perdida_paciente->EDAD_FELLECE_MESES,
				$perdida_paciente->OBSERVACIONES,
				$perdida_paciente->ID_PERDIDA_PACIENTE ,
				$perdida_paciente->ID_CAUSA_PERDIDA ,
				$perdida_paciente->ID_CONTROL
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	
	
	public function buscarId($id)
	{
		$query = "SELECT * FROM perdida_paciente WHERE `ID_CONTROL`= ? ";

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