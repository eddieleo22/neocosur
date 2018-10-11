<?php

/******************************************************************************
* Class for neocosur.compromiso_otrosDAO
*******************************************************************************/

class compromiso_otrosDAO
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


	public function guarda($compromiso_otros)
	{
		$query ="INSERT INTO compromiso_otros (
		`ID_CONTROL`,
		`DIURETICOS`,
		`FECHA_INICIO`,
		`FECHA_SUSPENSION`,
		`O2`,
		`FECHA_SUSPENSION_OX`,
		`BRONCODILATADORES`,
		`CORTICOIDES_INHALATORIOS`,
		`OSTOMIA`,
		`ID_TIPO_OSTOMIA`,
		`RECONSTRUCCION_TRANSITO`,
		`FECHA_RECONSTRUCCION_TRANSITO`,
		`PROFILAXIS_ANTIBIOTICA`,
		`PROFILAXIS_FECHA_INICIO`,
		`PROFILAXIS_FECHA_SUSPENSION`,
		`ESTUDIO_IMAGENES`,
		`ESTUDIO_ECO_RENAL`,
		`ESTUDIO_ECO_RENAL_ALTERACION`,
		`ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP`,
		`CINTIGRAFIA`,
		`CINTIGRAFIA_ALTERACION`,
		`CINTIGRAFIA_ALTERACION_DESCRIP`,
		`URETROCISTOGRAFIA`,
		`URETROCISTOGRAFIA_ALTERACION`,
		`URETROCISTOGRAFIA_ALTERACION_DESCRIP`,
		`CONTROL_PRESION_ARTERIAL`,
		`ALTERACION_ALGUN_EVENTO`,
		NEURO_HIC_GRADO,
		NEURO_HIC_GRADO_CUAL,
		NEURO_LEUCOMALACIA,
		NEURO_HIDROCEFALIA,	
		NEURO_HIDROCEFALIA_VALVULA,
		`CONVULSIONES_POST_ALTA`,
		`REQUIERE_TRATAMIENTO`,
		`FECHA_SUSPENSION_TRAT`
		) 
		VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ; ";

		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssssssssssssssssss",
		$compromiso_otros->getID_CONTROL(),
		$compromiso_otros->getDIURETICOS(),
		$compromiso_otros->getFECHA_INICIO(),
		$compromiso_otros->getFECHA_SUSPENSION(),
		$compromiso_otros->getO2(),
		$compromiso_otros->FECHA_SUSPENSION_OX,
		$compromiso_otros->getBRONCODILATADORES(),
		$compromiso_otros->getCORTICOIDES_INHALATORIOS(),
		$compromiso_otros->getOSTOMIA(),
		$compromiso_otros->getID_TIPO_OSTOMIA(),
		$compromiso_otros->getRECONSTRUCCION_TRANSITO(),
		$compromiso_otros->getFECHA_RECONSTRUCCION_TRANSITO(),
		$compromiso_otros->getPROFILAXIS_ANTIBIOTICA(),
		$compromiso_otros->getPROFILAXIS_FECHA_INICIO(),
		$compromiso_otros->getPROFILAXIS_FECHA_SUSPENSION(),
		$compromiso_otros->getESTUDIO_IMAGENES(),
		$compromiso_otros->getESTUDIO_ECO_RENAL(),
		$compromiso_otros->getESTUDIO_ECO_RENAL_ALTERACION(),
		$compromiso_otros->getESTUDIO_ECO_RENAL_ALTERACION_DESCRIP(),
		$compromiso_otros->getCINTIGRAFIA(),
		$compromiso_otros->getCINTIGRAFIA_ALTERACION(),
		$compromiso_otros->getCINTIGRAFIA_ALTERACION_DESCRIP(),
		$compromiso_otros->getURETROCISTOGRAFIA(),
		$compromiso_otros->getURETROCISTOGRAFIA_ALTERACION(),
		$compromiso_otros->getURETROCISTOGRAFIA_ALTERACION_DESCRIP(),
		$compromiso_otros->getCONTROL_PRESION_ARTERIAL(),
		$compromiso_otros->getALTERACION_ALGUN_EVENTO(),
		$compromiso_otros->NEURO_HIC_GRADO,
		$compromiso_otros->NEURO_HIC_GRADO_CUAL,
		$compromiso_otros->NEURO_LEUCOMALACIA,
		$compromiso_otros->NEURO_HIDROCEFALIA,
		$compromiso_otros->NEURO_HIDROCEFALIA_VALVULA,		
		$compromiso_otros->getCONVULSIONES_POST_ALTA(),
		$compromiso_otros->getREQUIERE_TRATAMIENTO(),
		$compromiso_otros->getFECHA_SUSPENSION_TRAT()
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function actualizar($compromiso_otros)
	{
		$query = "UPDATE compromiso_otros SET 
				`DIURETICOS` = ? ,
				`FECHA_INICIO` = ? ,
				`FECHA_SUSPENSION` = ? ,
				`O2` = ? ,
				`FECHA_SUSPENSION_OX` = ? ,
				`BRONCODILATADORES` = ? ,
				`CORTICOIDES_INHALATORIOS` = ? ,
				`OSTOMIA` = ? ,
				`ID_TIPO_OSTOMIA` = ? ,
				`RECONSTRUCCION_TRANSITO` = ? ,
				`FECHA_RECONSTRUCCION_TRANSITO` = ? ,
				`PROFILAXIS_ANTIBIOTICA` = ? ,
				`PROFILAXIS_FECHA_INICIO` = ? ,
				`PROFILAXIS_FECHA_SUSPENSION` = ? ,
				`ESTUDIO_IMAGENES` = ? ,
				`ESTUDIO_ECO_RENAL` = ? ,
				`ESTUDIO_ECO_RENAL_ALTERACION` = ? ,
				`ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP` = ? ,
				`CINTIGRAFIA` = ? ,
				`CINTIGRAFIA_ALTERACION` = ? ,
				`CINTIGRAFIA_ALTERACION_DESCRIP` = ? ,
				`URETROCISTOGRAFIA` = ? ,
				`URETROCISTOGRAFIA_ALTERACION` = ? ,
				`URETROCISTOGRAFIA_ALTERACION_DESCRIP` = ? ,
				`CONTROL_PRESION_ARTERIAL` = ? ,
				`ALTERACION_ALGUN_EVENTO` = ? ,
				`NEURO_HIC_GRADO` = ? ,
				`NEURO_HIC_GRADO_CUAL` = ? ,
				`NEURO_LEUCOMALACIA` = ? ,
				`NEURO_HIDROCEFALIA` = ? ,
				`NEURO_HIDROCEFALIA_VALVULA` = ? ,
				`CONVULSIONES_POST_ALTA` = ? ,
				`REQUIERE_TRATAMIENTO` = ? ,
				`FECHA_SUSPENSION_TRAT` = ? 
				WHERE `ID_CONTROL`= ? ";
		
				$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssssssssssssssssssssssssssss",
		$compromiso_otros->getDIURETICOS(),
		$compromiso_otros->getFECHA_INICIO(),
		$compromiso_otros->getFECHA_SUSPENSION(),
		$compromiso_otros->getO2(),
		$compromiso_otros->FECHA_SUSPENSION_OX,
		$compromiso_otros->getBRONCODILATADORES(),
		$compromiso_otros->getCORTICOIDES_INHALATORIOS(),
		$compromiso_otros->getOSTOMIA(),
		$compromiso_otros->getID_TIPO_OSTOMIA(),
		$compromiso_otros->getRECONSTRUCCION_TRANSITO(),
		$compromiso_otros->getFECHA_RECONSTRUCCION_TRANSITO(),
		$compromiso_otros->getPROFILAXIS_ANTIBIOTICA(),
		$compromiso_otros->getPROFILAXIS_FECHA_INICIO(),
		$compromiso_otros->getPROFILAXIS_FECHA_SUSPENSION(),
		$compromiso_otros->getESTUDIO_IMAGENES(),
		$compromiso_otros->getESTUDIO_ECO_RENAL(),
		$compromiso_otros->getESTUDIO_ECO_RENAL_ALTERACION(),
		$compromiso_otros->getESTUDIO_ECO_RENAL_ALTERACION_DESCRIP(),
		$compromiso_otros->getCINTIGRAFIA(),
		$compromiso_otros->getCINTIGRAFIA_ALTERACION(),
		$compromiso_otros->getCINTIGRAFIA_ALTERACION_DESCRIP(),
		$compromiso_otros->getURETROCISTOGRAFIA(),
		$compromiso_otros->getURETROCISTOGRAFIA_ALTERACION(),
		$compromiso_otros->getURETROCISTOGRAFIA_ALTERACION_DESCRIP(),
		$compromiso_otros->getCONTROL_PRESION_ARTERIAL(),
		$compromiso_otros->getALTERACION_ALGUN_EVENTO(),
		$compromiso_otros->NEURO_HIC_GRADO,
		$compromiso_otros->NEURO_HIC_GRADO_CUAL,
		$compromiso_otros->NEURO_LEUCOMALACIA,
		$compromiso_otros->NEURO_HIDROCEFALIA,
		$compromiso_otros->NEURO_HIDROCEFALIA_VALVULA,		
		$compromiso_otros->getCONVULSIONES_POST_ALTA(),
		$compromiso_otros->getREQUIERE_TRATAMIENTO(),
		$compromiso_otros->getFECHA_SUSPENSION_TRAT(),
		$compromiso_otros->getID_CONTROL()
		);
		
		$retorno=$sentencia->execute(); 	
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	public function buscarId($id)
	{
		$query = "SELECT * FROM compromiso_otros WHERE `ID_CONTROL`=".$id;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function ostomia ($idNeocosur){
		$query = "
			select 
					OSTOMIA,
					ID_TIPO_OSTOMIA,
					RECONSTRUCCION_TRANSITO,
					FECHA_RECONSTRUCCION_TRANSITO
		from compromiso_otros
			where 
						ID_CONTROL in (
						select  ID_CONTROL from control 
						where ID_NEOCOSUR =".$idNeocosur."
         				)
                        order by OSTOMIA desc limit 1
					";

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function oxigeno($id)
	{
		$query = "select 	
		OXIGENO_36_SEMANAS as 'o36',
		OXIGENO_DOMICILIARIO as 'oxi'
		from ingreso i 
			inner join informacion_alta inf on inf.ID_NEOCOSUR=i.ID_NEOCOSUR
			inner join patologias_neonatales neo on neo.ID_NEOCOSUR=i.ID_NEOCOSUR
			where i.ID_NEOCOSUR= ? ; ";

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