<?php

error_reporting(0);

include '../capaDAO/ConexionDAO.php';

include '../capaEntidades/evaluacion_neurodesarrollo.php';

include '../capaDAO/evaluacion_neurodesarrolloDAO.php';

/*
include '../capaEntidades/class.inputfilter.php';

$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);*/
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

	$dao =  new evaluacion_neurodesarrolloDAO($cone);

	$evaluacion = new evaluacion_neurodesarrollo();
	$idOculto = $cone->test_input($idOculto);	
	$evaluacion->ID_CONTROL=$cone->test_input($idOculto);	

	//evaluacion_neurodesarrollo

	$evaluacion->HIC_40_SEMANA							=$cone->test_input($hic_40semanas);
	$evaluacion->ID_HIC_40_GRADO						=$cone->test_input($hic_40semanas_grado);
	$evaluacion->LPV_40SEMANAS							=$cone->test_input($lpv_40semanas);
	$evaluacion->ROP_40_SEMANAS							=$cone->test_input($rop_40semanas);
	$evaluacion->ROP_40_SEMANAS_GRADO					=$cone->test_input($rop_40semanas_grado);
	$evaluacion->BERA_40SEMANAS							=$cone->test_input($bera_40semanas);

	//SITUACION  NEURODESARROLLO DOS AÑOS
	$evaluacion->NEUROLOGICA_2_VISION					=$cone->test_input($vision_neurologo_2anios);
	$evaluacion->NEUROLOGICA_2_VISION_CEGUERA			=$cone->test_input($vision_neurologo_2anios_Ceguera);
	$evaluacion->NEUROLOGICA_2_VISION_ESTRABISMO		=$cone->test_input($evision_neurologo_2anios_strabismo);
	$evaluacion->NEUROLOGICA_2_VISION_REFRACCION		=$cone->test_input($vision_neurologo_2anios_refraccion);
	$evaluacion->NEUROLOGICA_2_AUDICION					=$cone->test_input($audicion_neurologo_2anios);
	$evaluacion->NEUROLOGICA_2_AUDICION_NO				=$cone->test_input($audiocion_neurologo_2anios_no);

	$evaluacion->NEUROLOGICA_2_MOTORA					=$cone->test_input($motora_neurologo_2anios);

	$evaluacion->NEUROLOGICA_2_PARALISIS				=$cone->test_input($paralisis_neurologo_2anios);
	$evaluacion->NEUROLOGICA_2_PARALISIS_SI				=$cone->test_input($paralisis_neurologo_2anios_si);
	$evaluacion->NEUROLOGICA_2_COGNITIVA				=$cone->test_input($cognitiva_neurologo_2anios);
	$evaluacion->NEUROLOGICA_2_OTROS					=$cone->test_input($otros_neurologo_2anios);
	$evaluacion->NEUROLOGICA_2_OTROS_CONVULSIVO			=$cone->test_input($otro_neurologo_2anios_convulsivo);
	$evaluacion->NEUROLOGICA_2_OTROS_HIDROCEFALIA		=$cone->test_input($otro_neurologo_2anios_hidrocefalia);

	$evaluacion->PSICOMOTOR_2_EXAMEN					=$cone->test_input($examen_psicomotor_2anios);

	$evaluacion->PSICOMOTOR_2_EX_HIPO					=$cone->test_input($hipo_motora_psicomotor_2anios);
	$evaluacion->PSICOMOTOR_2_EX_HIPER					=$cone->test_input($hiper_motora_psicomotor_2anios);
	$evaluacion->PSICOMOTOR_2_EX_FOCA					=$cone->test_input($foca_motora_psicomotor_2anios);
	$evaluacion->PSICOMOTOR_2_EXA_HEMI					=$cone->test_input($hemi_motora_psicomotor_2anios);

	$evaluacion->PSICOMOTOR_2_AUDITIVA_SEN				=$cone->test_input($auditiva_sen_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_SEN_HIPO			=$cone->test_input($hipoacusia_sen_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_SEN_VISUAL		=$cone->test_input($visual_sen_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA		=$cone->test_input($cirugia_sen_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA_DESCI=$cone->test_input($cirugia_descripcion_sen_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA		=$cone->test_input($lenguaje_retra_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA_SI	=$cone->test_input($lenguaje_si_retra_2_tipo2_anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_OTRO_CEFALIA		=$cone->test_input($cefalia_otro_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_OTRO_SINDRO		=$cone->test_input($sindro_otro_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_OTRO_ALTERA		=$cone->test_input($altera_otro_2anios);
	$evaluacion->PSICOMOTOR_2_AUDITIVA_NEURO			=$cone->test_input($neurorehabilitacion_2anios);


	$evaluacion->PSICOMOTOR_A2ANIOS_MESES				=$cone->test_input($meses_a2a_psicomotor);  
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_CUAL			=$cone->test_input($cual_eedp_a2a); 
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_FECHA			=$cone->test_input($fech_eedp_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_ANIOS			=$cone->test_input($anios_eedp_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_MESES			=$cone->test_input($meses_eedp_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_PUNTAJE		=$cone->test_input($puntaje_eedp_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_NORMAL			=$cone->test_input($normal_eedp_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EEDP_OBSERVACION	=$cone->test_input($observacion_eedp_a2a);

	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_CUAL			=$cone->test_input($cual_eais_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_FECHA			=$cone->test_input($fech_eais_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_ANIOS			=$cone->test_input($anios_eais_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_MESES			=$cone->test_input($meses_eais_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_PUNTAJE		=$cone->test_input($puntaje_eais_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_NORMAL			=$cone->test_input($normal_eais_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_EAIS_OBSERVACION	=$cone->test_input($observacion_eais_a2a);


	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_CUAL			=$cone->test_input($cual_cat_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_FECHA			=$cone->test_input($fech_cat_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_ANIOS			=$cone->test_input($anios_cat_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_MESES			=$cone->test_input($meses_cat_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_PUNTAJE			=$cone->test_input($puntaje_cat_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_NORMAL			=$cone->test_input($normal_cat_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_CAT_OBSERVACION		=$cone->test_input($observacion_cat_a2a);



	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_CUAL			=$cone->test_input($cual_asq_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_FECHA			=$cone->test_input($fech_asq_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_ANIOS			=$cone->test_input($anios_asq_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_MESES			=$cone->test_input($meses_asq_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_PUNTAJE			=$cone->test_input($puntaje_asq_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_NORMAL			=$cone->test_input($normal_asq_a2a);
	$evaluacion->PSICOMOTOR_A2ANIOS_ASQ_OBSERVACION		=$cone->test_input($observacion_asq_a2a);


	$evaluacion->PSICOMOTOR_2A7ANIOS_TEPSI				=$cone->test_input($tepsi_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_TEP_NORMAL			=$cone->test_input($tepsi_normal_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_TEP_FECHA			=$cone->test_input($tepsi_fecha_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_TEP_ANIOS			=$cone->test_input($tepsi_anios_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_TEP_MESES			=$cone->test_input($tepsi_meses_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_TEP_PUNTAJE		=$cone->test_input($tepsi_puntaje_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE				=$cone->test_input($bayley_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VERSION		=$cone->test_input($bayley_version_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA	=$cone->test_input($bayley_version_fech_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS	=$cone->test_input($bayley_version_anios_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES	=$cone->test_input($bayley_version_meses_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_MENTAL	=$cone->test_input($bayley_version_Mental_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA	=$cone->test_input($bayley_version_motora_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_CONDUCTA	=$cone->test_input($bayley_version_conducta_2a7anios);


	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL	=$cone->test_input($bayley_version_normal_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA_3	=$cone->test_input($bayley_version_3_fech_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS_3	=$cone->test_input($bayley_version_3_anios_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES_3	=$cone->test_input($bayley_version_3_meses_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA_3	=$cone->test_input($bayley_version_3_motora_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_COGNI_3	=$cone->test_input($bayley_version_3_cognitiva_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_LENG_3	=$cone->test_input($bayley_version_3_lenguaje_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_SOCIO_3	=$cone->test_input($bayley_version_3_socio_7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_COMPOR_3	=$cone->test_input($bayley_version_3_comportamiento_2a7anios);
	$evaluacion->PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL_3	=$cone->test_input($bayley_version_3_normal_2a7anios);

	$evaluacion->PSICOMOTOR_A3ANIOS_RET_LENG			=$cone->test_input($retraso_lenguaje_a3anios);
	$evaluacion->PSICOMOTOR_A3ANIOS_RET_LENG_TIPO		=$cone->test_input($retraso_lenguaje_tipo_a3anios);
	$evaluacion->PSICOMOTOR_A3ANIOS_RET_LENG_REHAB		=$cone->test_input($retraso_lenguaje_rehab_a3anios);
	$evaluacion->PSICOMOTOR_3ANIOS_RET_EXPRESIVO		=$cone->test_input($retraso_expresivo_3anios);
	$evaluacion->PSICOMOTOR_3ANIOS_RET_EXPRESIVO_REHAB	=$cone->test_input($retraso_expresivo_rehab_3anios);

	$evaluacion->PSICOMOTOR_2A4ANIOS_COEFICIENTE		=$cone->test_input($coeficiente_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_FECHA_1		=$cone->test_input($coeficiente_fech_1_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_ANIOS_1		=$cone->test_input($coeficiente_anios_1_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_MESES_1		=$cone->test_input($coeficiente_meses_1_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_VERB_1			=$cone->test_input($coeficiente_verbal_1_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_MANIPU_1		=$cone->test_input($coeficiente_manipulativa_1_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_TOTAL_1		=$cone->test_input($coeficiente_total_1_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_FECHA_2		=$cone->test_input($coeficiente_fech_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_ANIOS_2		=$cone->test_input($coeficiente_anios_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_MESES_2		=$cone->test_input($coeficiente_meses_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_VERB_2			=$cone->test_input($coeficiente_verbal_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_MANIPU_2		=$cone->test_input($coeficiente_manipulativa_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_PROCESA_2		=$cone->test_input($coeficiente_procesamiento_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_COE_LENGUAJE_2		=$cone->test_input($coeficiente_lenguaje_2_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_OTRO_MSCA			=$cone->test_input($msca_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_OTRO_SCQ			=$cone->test_input($scq_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_OTRO_MCHAT			=$cone->test_input($mchat_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_OTRO_VABS			=$cone->test_input($vabs_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_OTRO_GMFCS			=$cone->test_input($gmfcs_2a4anios);
	$evaluacion->PSICOMOTOR_2A4ANIOS_OTRO_OBSERV		=$cone->test_input($otras_observaciones_2a4anios);

	$evaluacion->NEURODESAROLLO_2ANIOS_MOTORA			=$cone->test_input($motora_neurodesarollo_2anios);
	$evaluacion->NEURODESAROLLO_2ANIOS_MOTORA_NIVEL		=$cone->test_input($motora_nivel_neurodesarollo_2anios);
	$evaluacion->NEURODESAROLLO_2ANIOS_PARALISIS		=$cone->test_input($paralisis_neurodesarollo_2anios);
	$evaluacion->NEURODESAROLLO_2ANIOS_PARALISIS_CUAL	=$cone->test_input($paralisis_cual_neurodesarollo_2anios);
	$evaluacion->NEURODESAROLLO_2ANIOS_OTROS_TRANSTORNOS=$cone->test_input($otros_transtornos_conductual_neurodesarollo_2anios);
	$evaluacion->NEURODESAROLLO_2ANIOS_OTROS_LENGUAJE	=$cone->test_input($otros_transtornos_lenguaje_neurodesarollo_2anios);
	$evaluacion->NEURODESAROLLO_2ANIOS_OTROS_APRENDIZAJE=$cone->test_input($otros_transtornos_aprendizaje_neurodesarollo_2anios);



	$idOculto = $cone->test_input($idOculto);	
	$idNeocosur = $cone->test_input($idNeocosur);	
	$datos = $dao->buscarId($idOculto);



		if($datos==null )
		{

			$dao->guarda($evaluacion);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=evaluacion&message='.$message.'#evaluacion");
					</script>';

			

		}
		else

		{

			$dao->actualizar($evaluacion);
			
			echo '<script type="text/javascript">

					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=evaluacion&message='.$message.'#evaluacion");

					</script>';

		}

}

