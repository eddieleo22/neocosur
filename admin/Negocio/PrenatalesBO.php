<?php
error_reporting(0);
include '../capaEntidades/antecedentes_prenatales.php';
include '../capaDAO/antecedentes_prenatalesDAO.php';
include '../capaDAO/ConexionDAO.php';
include '../ayuda.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	session_start();

    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] != $_POST['csrf'])
		|| (isset($_SESSION['token'])==""  ))
		{

			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
		
	extract($_POST);

	$cone = new ConexionDAO();

	$dao = new antecedentes_prenatalesDAO($cone);

	$idOculto=$cone->test_input($idOculto);
	$arr = $dao->buscarId($idOculto);

	$idPre = $arr["ID_NEOCOSUR"];

	$antecedentes_prenatales = new antecedentes_prenatales();

	$antecedentes_prenatales->EDAD_MATERNA=	$cone->test_input($edad_maternal);
	$antecedentes_prenatales->ANIO_ESCOLARIDAD= $cone->test_input( $escolaridad);
	$antecedentes_prenatales->ID_NIVEL_EDUCACION=$cone->test_input($nivel_educacional);
	$antecedentes_prenatales->CONTROL_EMBARAZO=$cone->test_input($control_embarazo);
	$antecedentes_prenatales->GEST_PRIMER_CONTROL=$cone->test_input($gest_primer_control);
	$antecedentes_prenatales->DIABETES=$cone->test_input($diabetes);
	$antecedentes_prenatales->DIABETES_GESTACIONAL=$cone->test_input($diabetes_gestacional);
	$antecedentes_prenatales->ID_PARIDAD=$cone->test_input($paridad);
	$antecedentes_prenatales->TABAQUISMO=$cone->test_input($tabaquismo);
	$antecedentes_prenatales->HIPERTENSION_ARTERIAL=$cone->test_input($ht_art);
	$antecedentes_prenatales->HIPERTENSION_EMBARAZO=$cone->test_input($ht_embarazo);
	$antecedentes_prenatales->HIPERTENSION_MEDICAMENTOS=$cone->test_input($medicamentos);
	$antecedentes_prenatales->MULTIPLE=$cone->test_input($multiple);
	$antecedentes_prenatales->ID_MULTIPLE_LUGAR=$cone->test_input($lugar);
	$antecedentes_prenatales->RETARDO_CREC_INTRA_UTERINO=$cone->test_input($rciu);
	$antecedentes_prenatales->ANTIBIOTICO_PRENATAL= $cone->test_input($antibiotico);
	$antecedentes_prenatales->RUPTURA_PRE_MEMBRANA_DIAS=$cone->test_input($rpm_dias);
	$antecedentes_prenatales->RUPTURA_PRE_MEMBRANA_HORAS=$cone->test_input($rpm_hrs);
	$antecedentes_prenatales->CORTICOIDE_PRENATAL=$cone->test_input($cort_prenatal);
	$antecedentes_prenatales->CORTICOIDE_PRENATAL_CURSO_INCOMPLETO=$cone->test_input($completo);
	$antecedentes_prenatales->CORTICOIDE_PRENATAL_UN_CURSO=$cone->test_input($curso);
	$antecedentes_prenatales->CORIOAMNIONITIS=$cone->test_input($corioamnionitis);
	$antecedentes_prenatales->SULFATO_MG=$cone->test_input($sulfato);
	$antecedentes_prenatales->SULFATO_MG_NEURO=$cone->test_input($sulfato_uso_como);
	$antecedentes_prenatales->ALTERACION_DOPLER_FETAL=$cone->test_input($doppler);
	$antecedentes_prenatales->FLUJO_REVERSO_VENA_UMBILICAL=$cone->test_input(c($flujo_reverso));
	$antecedentes_prenatales->DUCTUS_VENOSO_ALTERADO=$cone->test_input(c($ductus_venoso));
	$antecedentes_prenatales->DILATACION_CEREBRAL_MEDIA=$cone->test_input(c($dila_media));
	$antecedentes_prenatales->OTRA_ALTERACION=$cone->test_input(c($otra_altera));
	$antecedentes_prenatales->OBSERVACIONES_PRENATALES=$cone->test_input($obs_doppler);

		if ($idPre==''){
		$antecedentes_prenatales->ID_NEOCOSUR=$cone->test_input($idOculto);
			$dao->guarda($antecedentes_prenatales); 
					echo '<script type="text/javascript">
					window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=prenatales#prenatales");
					</script>'; 
		}
		else {
			  
			 $antecedentes_prenatales->ID_NEOCOSUR=$idOculto;

			$dao->actualizar($antecedentes_prenatales); 
			echo '<script type="text/javascript">
					window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=prenatales#prenatales");
					</script>'; 
			
		}
	
}
