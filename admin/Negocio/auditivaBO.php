<?php
error_reporting(0);
include '../capaDAO/ConexionDAO.php';
include '../capaEntidades/funcion_auditiva.php'; 
include '../capaDAO/funcion_auditivaDAO.php';
include '../ayuda.php';
 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	session_start();
    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
		|| (isset($_SESSION['token'])=="" ))
		{
			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
		
			extract($_POST);

		$cone = new ConexionDAO();


		$dao =  new funcion_auditivaDAO($cone);
		$auditiva = new funcion_auditiva();
		$idOculto= $cone->test_input($idOculto);	
		$idNeocosur= $cone->test_input($idNeocosur);	
		$auditiva->ID_CONTROL=$cone->test_input($idOculto);	
		$auditiva->ID_NEOCOSUR=$cone->test_input($idNeocosur);	
		//Funcion AUDITIVA 
		$auditiva->PESQUISA_ANTES_DEL_ALTA=$cone->test_input($pesquisa);
		$auditiva->PEAT_AUTOMATIZADOS=$cone->test_input($check_pesquisa_alta_1);
		$auditiva->PEAT_ATOMATIZADOS_NORMAL=$cone->test_input($pesquisa_alta_1);
		$auditiva->PEAT_EXTENDIDOS=$cone->test_input($check_pesquisa_alta_2);
		$auditiva->PEAT_EXTENDIDOS_NORMAL=$cone->test_input($pesquisa_alta_2);
		$auditiva->EMISIONES_OTOACUSTICAS=$cone->test_input($check_pesquisa_alta_3);
		$auditiva->EMISIONES_OTOACUSTICAS_NORMAL=$cone->test_input($pesquisa_alta_3);

		//Evolucion Posterior
		$auditiva->EVALUACION_AUDITIVA=$cone->test_input($evaluacion_auditiva);
		$auditiva->FECHA_EVALUACION=$cone->test_input($fecha);
		$auditiva->EVALUACION_NORMAL=$cone->test_input($evaluacion_auditiva_normal);
		$auditiva->POST_AUDIO=$cone->test_input($audiometria);
		$auditiva->POST_AUDIO_NORMAL=$cone->test_input($audiometria_normal);
		$auditiva->POST_PEAT_AUTO=$cone->test_input($peat_automatizados);
		$auditiva->POST_PEAT_AUTO_NORMAL=$cone->test_input($peat_automatizados_normal);
		$auditiva->POST_PEAT_EXT=$cone->test_input($peat_extendidos);
		$auditiva->POST_PEAT_EXT_NORMAL=$cone->test_input($peat_extendidos_normal);
		$auditiva->POST_OIDO_IZQ=$cone->test_input($oido_izquierdo);
		$auditiva->POST_OIDO_IZQ_GRADO=$cone->test_input($grado_izquierdo);
		$auditiva->POST_OIDO_DER=$cone->test_input($oido_derecho);
		$auditiva->POST_OIDO_DER_GRADO=$cone->test_input($grado_derecho);

		$auditiva->CONFIRMACION_DIAGNOSTICO=$cone->test_input($confirmacion_diagnostico);
		$auditiva->FECHA_DIAGNOSTICO=$cone->test_input($fecha_confirmacion);
		$auditiva->CONF_OIDO_IZQ_RESUL=$cone->test_input($oido_izquierdo_confirmacion);
		$auditiva->CONF_OIDO_IZQ_GRADO=$cone->test_input($grado_izquierdo_confirmacion);
		$auditiva->CONF_OIDO_IZQ_NEURO=$cone->test_input($tipo_alteracion_izquierdo);
		$auditiva->CONF_OIDO_IZQ_DE=$cone->test_input($tipo_alteracion_izq_De);
		$auditiva->CONF_OIDO_IZQ_TRAT=$cone->test_input($tratamiento_izquierdo);
		$auditiva->CONF_OIDO_IZQ_AUDIF=$cone->test_input($cual_izquierdo_audif);
		$auditiva->CONF_OIDO_IZQ_COCLE=$cone->test_input($cual_izquierdo_cocle);
		$auditiva->CONF_OIDO_IZQ_TERA=$cone->test_input($terapia_auditiva_izquierdo_confirmacion);
		$auditiva->CONF_OIDO_IZQ_VERB=$cone->test_input($cual_terapia_izquierda_verb);
		$auditiva->CONF_OIDO_IZQ_SENA=$cone->test_input($cual_terapia_izquierda_sena);
		$auditiva->CONF_OIDO_IZQ_OTRO=$cone->test_input($cual_terapia_izquierda_otro);
		$auditiva->CONF_OIDO_IZQ_OBS=$cone->test_input($observaciones_oido_izquierdo);

		$auditiva->CONF_OIDO_DER_RESUL=$cone->test_input($oido_derecho_confirmacion);
		$auditiva->CONF_OIDO_DER_GRADO=$cone->test_input($grado_derecho_confirmacion);
		$auditiva->CONF_OIDO_DER_NEURO=$cone->test_input($tipo_alteracion_derecho_neuro);
		$auditiva->CONF_OIDO_DER_DE=$cone->test_input($tipo_alteracion_derecho_de);
		$auditiva->CONF_OIDO_DER_TRAT=$cone->test_input($tratamiento_derecho);
		$auditiva->CONF_OIDO_DER_AUDIF=$cone->test_input($cual_derecho_audif);
		$auditiva->CONF_OIDO_DER_COCLE=$cone->test_input($cual_derecho_cocle);
		$auditiva->CONF_OIDO_DER_TERA=$cone->test_input($terapia_auditiva_derecho_confirmacion);
		$auditiva->CONF_OIDO_DER_VERB=$cone->test_input($cual_terapia_derecho_verb);
		$auditiva->CONF_OIDO_DER_SENA=$cone->test_input($cual_terapia_derecho_sena);
		$auditiva->CONF_OIDO_DER_OTRO=$cone->test_input($cual_terapia_derecho_otro);
		$auditiva->CONF_OIDO_DER_OBS=$cone->test_input($observaciones_oido_derecho);





		$datos = $dao->buscarId($idOculto);
		if($datos==null )
		{
			$dao->guarda($auditiva);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=auditiva&message='.$message.'#auditiva");
					</script>';
			
		}
		else
		{
			$dao->actualizar($auditiva);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=auditiva&message='.$message.'#auditiva");
					</script>';
			
		}

}
