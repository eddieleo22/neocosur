<?php

/******************************************************************************
* Class for neocosur.hospitalizacionDAO
*******************************************************************************/

class hospitalizacionDAO
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
	
	
	public function guarda($hospitalizacion)
	{
		 $query ="INSERT INTO hospitalizacion (
		`ID_CONTROL`,
		`ID_DIAGNOSTICO`,
		`DIAG_O2`,
		`DIAG_NO_INVASIVA`,
		`DIAG_INVASIVA`,
		`DIAG_INVASIVA_ID`,
		`DIAG_O2_DOMICILIO`,
		`DIAG_O2_DOMICILIO_ID`,
		`DIAG_CUAL`,
		`FECHA`,
		`DIA`,
		`EDAD_AGNOS`,
		`EDAD_MESES`
		) 
		VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,? ) ;" ;
				$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssss",
				$hospitalizacion->ID_CONTROL,
				$hospitalizacion->ID_DIAGNOSTICO,
				$hospitalizacion->DIAG_O2,
				$hospitalizacion->DIAG_NO_INVASIVA,
				$hospitalizacion->DIAG_INVASIVA,
				$hospitalizacion->DIAG_INVASIVA_ID,
				$hospitalizacion->DIAG_O2_DOMICILIO,
				$hospitalizacion->DIAG_O2_DOMICILIO_ID,
				$hospitalizacion->DIAG_CUAL,
				$hospitalizacion->FECHA,
				$hospitalizacion->DIA,
				$hospitalizacion->EDAD_AGNOS,
				$hospitalizacion->EDAD_MESES 
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();

	}
	
	public function guardaObser($hospitalizacion)
	{
		 $query ="INSERT INTO hospitalizacion_observa (
		`ID_CONTROL`,
		`observacion`
		) 
		VALUES ( ?,?) ; ";

		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ss",
			$hospitalizacion->ID_CONTROL ,
			$hospitalizacion->OBSERVACIONES
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	public function actualizarObser($hospitalizacion)
	{
		$query = "UPDATE hospitalizacion_observa SET 
				`observacion` = ? 
				WHERE `ID_CONTROL`= ? ";
				
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("si",
		$hospitalizacion->OBSERVACIONES,
		$hospitalizacion->ID_CONTROL
		);
		
		$retorno=$sentencia->execute(); 	
	
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
		  $query = "SELECT  * 
			FROM hospitalizacion 
		
		inner join hospitalizacion_param   on id_hospitalizacion_param=ID_DIAGNOSTICO
		 
		
		
		WHERE `ID_CONTROL`= ? ";

		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$retorno = $sentencia->get_result();
	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function buscarObserId($id)
	{
	 $query = "SELECT * FROM hospitalizacion_observa WHERE `ID_CONTROL`= ? ";
		$this->conexionDao->Abrir();
		
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();

		$this->conexionDao->Cerrar();
		return $row;
	}
	
	
	public function eliminar($id){

		
		 $query =" delete from hospitalizacion  where 	ID_HOSPITALIZACION = ?  ";

		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("s",$id );
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	
	
}