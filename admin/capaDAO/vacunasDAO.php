<?php
 
/******************************************************************************
* Class for neocosur.vacunasDAO
*******************************************************************************/

class vacunasDAO
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
	
	
	public function guarda($vacunas)
	{
		$query ="INSERT INTO vacunas (
		`ID_CONTROL`,
		`DIA_CALENDARIO`,
		`VACUNAS_OPCIONALES`,
		`ROTAVIRUS`,
		`HEPATITIS_A`,
		`NEUMOCOCO`,
		`MENINGITIS_C`,
		`OTRAS`,
		`CUAL_ES`,
		`PALIVIZUMAB`
		)
		VALUES ( ?,?,?,?,?,?,?,?,?,? ) ; "  ;		
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssss",
			$vacunas->ID_CONTROL,
			$vacunas->DIA_CALENDARIO,
			$vacunas->VACUNAS_OPCIONALES,
			$vacunas->ROTAVIRUS,
			$vacunas->HEPATITIS_A,
			$vacunas->NEUMOCOCO,
			$vacunas->MENINGITIS_C,
			$vacunas->OTRAS,
			$vacunas->CUAL_ES,
			$vacunas->PALIVIZUMAB
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	public function actualizar($vacunas)
	{
		$query = "UPDATE vacunas SET 
				`DIA_CALENDARIO` =  ? ,
				`VACUNAS_OPCIONALES` =  ? ,
				`ROTAVIRUS` =  ? ,
				`HEPATITIS_A` =  ? ,
				`NEUMOCOCO` =  ? ,
				`MENINGITIS_C` =  ? ,
				`OTRAS` =  ? ,
				`CUAL_ES` =  ? ,
				`PALIVIZUMAB` =  ? 
				WHERE `ID_CONTROL`= ? ; ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssssss",
			$vacunas->DIA_CALENDARIO,
			$vacunas->VACUNAS_OPCIONALES,
			$vacunas->ROTAVIRUS,
			$vacunas->HEPATITIS_A,
			$vacunas->NEUMOCOCO,
			$vacunas->MENINGITIS_C,
			$vacunas->OTRAS,
			$vacunas->CUAL_ES,
			$vacunas->PALIVIZUMAB,
			$vacunas->ID_CONTROL
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
	 	 $query ="select  * from vacunas where  ID_CONTROL =  ? ";
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