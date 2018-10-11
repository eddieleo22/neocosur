<?php

/******************************************************************************
* Class for neocosur.funcion_auditivaDAO
*******************************************************************************/

class funcion_auditivaDAO
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
	
	
	public function guarda($funcion_auditiva)
	{
		$query ="INSERT INTO funcion_auditiva (
		`ID_CONTROL`,
		`ID_NEOCOSUR`,
		`PESQUISA_ANTES_DEL_ALTA`,
		`PEAT_AUTOMATIZADOS`,
		`PEAT_ATOMATIZADOS_NORMAL`,
		`PEAT_EXTENDIDOS`,
		`PEAT_EXTENDIDOS_NORMAL`,
		`EMISIONES_OTOACUSTICAS`,
		`EMISIONES_OTOACUSTICAS_NORMAL`,
		`EVALUACION_AUDITIVA`,
		`FECHA_EVALUACION`,
		`EVALUACION_NORMAL`,
		`POST_AUDIO`,
		`POST_AUDIO_NORMAL`,
		`POST_PEAT_AUTO`,
		`POST_PEAT_AUTO_NORMAL`,
		`POST_PEAT_EXT`,
		`POST_PEAT_EXT_NORMAL`,
		`POST_OIDO_IZQ`,
		`POST_OIDO_IZQ_GRADO`,
		`POST_OIDO_DER`,
		`POST_OIDO_DER_GRADO`,		
		`CONFIRMACION_DIAGNOSTICO`,
		`FECHA_DIAGNOSTICO`,
		`CONF_OIDO_IZQ_RESUL`,
		`CONF_OIDO_IZQ_GRADO`,
		`CONF_OIDO_IZQ_NEURO`,
		`CONF_OIDO_IZQ_DE`,
		`CONF_OIDO_IZQ_TRAT`,
		`CONF_OIDO_IZQ_AUDIF`,
		`CONF_OIDO_IZQ_COCLE`,
		`CONF_OIDO_IZQ_TERA`,
		`CONF_OIDO_IZQ_VERB`,
		`CONF_OIDO_IZQ_SENA`,
		`CONF_OIDO_IZQ_OTRO`,
		`CONF_OIDO_IZQ_OBS`,
		`CONF_OIDO_DER_RESUL`,
		`CONF_OIDO_DER_GRADO`,
		`CONF_OIDO_DER_NEURO`,
		`CONF_OIDO_DER_DE`,
		`CONF_OIDO_DER_TRAT`,
		`CONF_OIDO_DER_AUDIF`,
		`CONF_OIDO_DER_COCLE`,
		`CONF_OIDO_DER_TERA`,
		`CONF_OIDO_DER_VERB`,
		`CONF_OIDO_DER_SENA`,
		`CONF_OIDO_DER_OTRO`,
		`CONF_OIDO_DER_OBS`
		) 
		VALUES (
		'" . ($funcion_auditiva->ID_CONTROL) . "',
		'" . ($funcion_auditiva->ID_NEOCOSUR) . "',
		'" . ($funcion_auditiva->PESQUISA_ANTES_DEL_ALTA) . "',
		'" . ($funcion_auditiva->PEAT_AUTOMATIZADOS) . "',
		'" . ($funcion_auditiva->PEAT_ATOMATIZADOS_NORMAL) . "',
		'" . ($funcion_auditiva->PEAT_EXTENDIDOS) . "',
		'" . ($funcion_auditiva->PEAT_EXTENDIDOS_NORMAL) . "',
		'" . ($funcion_auditiva->EMISIONES_OTOACUSTICAS) . "',
		'" . ($funcion_auditiva->EMISIONES_OTOACUSTICAS_NORMAL) . "',
		'" . ($funcion_auditiva->EVALUACION_AUDITIVA) . "',
		'" . ($funcion_auditiva->FECHA_EVALUACION) . "',
		'" . ($funcion_auditiva->EVALUACION_NORMAL) . "',
		'" . ($funcion_auditiva->POST_AUDIO) . "',
		'" . ($funcion_auditiva->POST_AUDIO_NORMAL) . "',
		'" . ($funcion_auditiva->POST_PEAT_AUTO) . "',
		'" . ($funcion_auditiva->POST_PEAT_AUTO_NORMAL) . "',
		'" . ($funcion_auditiva->POST_PEAT_EXT) . "',
		'" . ($funcion_auditiva->POST_PEAT_EXT_NORMAL) . "',
		'" . ($funcion_auditiva->POST_OIDO_IZQ) . "',
		'" . ($funcion_auditiva->POST_OIDO_IZQ_GRADO) . "',
		'" . ($funcion_auditiva->POST_OIDO_DER) . "',
		'" . ($funcion_auditiva->POST_OIDO_DER_GRADO) . "',

		'" . ($funcion_auditiva->CONFIRMACION_DIAGNOSTICO) . "',
		'" . ($funcion_auditiva->FECHA_DIAGNOSTICO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_RESUL) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_GRADO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_NEURO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_DE) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_TRAT) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_AUDIF) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_COCLE) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_TERA) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_VERB) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_SENA) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_OTRO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_IZQ_OBS) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_RESUL) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_GRADO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_NEURO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_DE) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_TRAT) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_AUDIF) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_COCLE) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_TERA) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_VERB) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_SENA) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_OTRO) . "',
		'" . ($funcion_auditiva->CONF_OIDO_DER_OBS) . "');
		
		
		";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->Id);
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function actualizar($funcion_auditiva)
	{
		$query = "UPDATE funcion_auditiva SET 
				`PESQUISA_ANTES_DEL_ALTA` = '" . ($funcion_auditiva->PESQUISA_ANTES_DEL_ALTA) . "',
				`PEAT_AUTOMATIZADOS` = '" . ($funcion_auditiva->PEAT_AUTOMATIZADOS) . "',
				`PEAT_ATOMATIZADOS_NORMAL` = '" . ($funcion_auditiva->PEAT_ATOMATIZADOS_NORMAL) . "',
				`PEAT_EXTENDIDOS` = '" . ($funcion_auditiva->PEAT_EXTENDIDOS) . "',
				`PEAT_EXTENDIDOS_NORMAL` = '" . ($funcion_auditiva->PEAT_EXTENDIDOS_NORMAL) . "',
				`EMISIONES_OTOACUSTICAS` = '" . ($funcion_auditiva->EMISIONES_OTOACUSTICAS) . "',
				`EMISIONES_OTOACUSTICAS_NORMAL` = '" . ($funcion_auditiva->EMISIONES_OTOACUSTICAS_NORMAL) . "',
				
				`EVALUACION_AUDITIVA` = '" . ($funcion_auditiva->EVALUACION_AUDITIVA) . "',
				`FECHA_EVALUACION` = '" . ($funcion_auditiva->FECHA_EVALUACION) . "',
				`EVALUACION_NORMAL` = '" . ($funcion_auditiva->EVALUACION_NORMAL) . "',
				`POST_AUDIO`= '" . ($funcion_auditiva->POST_AUDIO) . "',
				`POST_AUDIO_NORMAL`= '" . ($funcion_auditiva->POST_AUDIO_NORMAL) . "',
				`POST_PEAT_AUTO` = '" . ($funcion_auditiva->POST_PEAT_AUTO) . "',
				`POST_PEAT_AUTO_NORMAL` = '" . ($funcion_auditiva->POST_PEAT_AUTO_NORMAL) . "',
				`POST_PEAT_EXT` = '" . ($funcion_auditiva->POST_PEAT_EXT) . "',
				`POST_PEAT_EXT_NORMAL` = '" . ($funcion_auditiva->POST_PEAT_EXT_NORMAL) . "',
				`POST_OIDO_IZQ` = '" . ($funcion_auditiva->POST_OIDO_IZQ) . "',
				`POST_OIDO_IZQ_GRADO` = '" . ($funcion_auditiva->POST_OIDO_IZQ_GRADO) . "',
				`POST_OIDO_DER` = '" . ($funcion_auditiva->POST_OIDO_DER) . "',
				`POST_OIDO_DER_GRADO` = '" . ($funcion_auditiva->POST_OIDO_DER_GRADO) . "',

				`CONFIRMACION_DIAGNOSTICO` = '" . ($funcion_auditiva->CONFIRMACION_DIAGNOSTICO) . "',
				`FECHA_DIAGNOSTICO` = '" . ($funcion_auditiva->FECHA_DIAGNOSTICO) . "',
				`CONF_OIDO_IZQ_RESUL` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_RESUL) . "',
				`CONF_OIDO_IZQ_GRADO` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_GRADO) . "',
				`CONF_OIDO_IZQ_NEURO` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_NEURO) . "',
				`CONF_OIDO_IZQ_DE` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_DE) . "',
				`CONF_OIDO_IZQ_TRAT` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_TRAT) . "',
				`CONF_OIDO_IZQ_AUDIF` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_AUDIF) . "',
				`CONF_OIDO_IZQ_COCLE` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_COCLE) . "',
				`CONF_OIDO_IZQ_TERA` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_TERA) . "',
				`CONF_OIDO_IZQ_VERB` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_VERB) . "',
				`CONF_OIDO_IZQ_SENA` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_SENA) . "',
				`CONF_OIDO_IZQ_OTRO` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_OTRO) . "',
				`CONF_OIDO_IZQ_OBS` = '" . ($funcion_auditiva->CONF_OIDO_IZQ_OBS) . "',
				`CONF_OIDO_DER_RESUL` = '" . ($funcion_auditiva->CONF_OIDO_DER_RESUL) . "',
				`CONF_OIDO_DER_GRADO` = '" . ($funcion_auditiva->CONF_OIDO_DER_GRADO) . "',
				`CONF_OIDO_DER_NEURO` = '" . ($funcion_auditiva->CONF_OIDO_DER_NEURO) . "',
				`CONF_OIDO_DER_DE` = '" . ($funcion_auditiva->CONF_OIDO_DER_DE) . "',
				`CONF_OIDO_DER_TRAT` = '" . ($funcion_auditiva->CONF_OIDO_DER_TRAT) . "',
				`CONF_OIDO_DER_AUDIF` = '" . ($funcion_auditiva->CONF_OIDO_DER_AUDIF) . "',
				`CONF_OIDO_DER_COCLE` = '" . ($funcion_auditiva->CONF_OIDO_DER_COCLE) . "',
				`CONF_OIDO_DER_TERA` = '" . ($funcion_auditiva->CONF_OIDO_DER_TERA) . "',
				`CONF_OIDO_DER_VERB` = '" . ($funcion_auditiva->CONF_OIDO_DER_VERB) . "',
				`CONF_OIDO_DER_SENA` = '" . ($funcion_auditiva->CONF_OIDO_DER_SENA) . "',
				`CONF_OIDO_DER_OTRO` = '" . ($funcion_auditiva->CONF_OIDO_DER_OTRO) . "',
				`CONF_OIDO_DER_OBS` = '" . ($funcion_auditiva->CONF_OIDO_DER_OBS) . "'
				WHERE `ID_CONTROL`='{$funcion_auditiva->ID_CONTROL}'";
				
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->Id);
		$this->conexionDao->Cerrar();
		return $retorno;

		
	}
	
	
	public function buscarId($id)
	{
		$query = "SELECT * FROM funcion_auditiva WHERE `ID_CONTROL`=".$id;

		$this->conexionDao->Abrir();
		$resultado = $this->conexionDao->select($query);			
		$row = $resultado->fetch_assoc();					
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	
	public function  pesquisa($idN){
		
		$query = "SELECT * FROM funcion_auditiva WHERE `ID_NEOCOSUR`=".$idN;

		$this->conexionDao->Abrir();
		$resultado = $this->conexionDao->select($query);			
		$row = $resultado->fetch_assoc();					
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	
	
	
}