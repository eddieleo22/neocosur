<?php

error_reporting(0);

include '../capaDAO/ConexionDAO.php';

include '../capaEntidades/compromiso_otros.php';

include '../capaDAO/compromiso_otrosDAO.php';

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

		$dao =  new compromiso_otrosDAO($cone);

		$compromiso = new compromiso_otros();

		$compromiso->ID_CONTROL=$cone->test_input($idControl);	

		//compromiso_otros

		$compromiso->DIURETICOS=$cone->test_input($diureticos);

		$compromiso->FECHA_INICIO=$cone->test_input($fech_inicio);

		$compromiso->FECHA_SUSPENSION=$cone->test_input($fech_suspension);

		$compromiso->O2=$cone->test_input($o2);
		$compromiso->FECHA_SUSPENSION_OX=$cone->test_input($fecha_suspension_ox);

		$compromiso->BRONCODILATADORES=$cone->test_input($broncodilatadores);

		$compromiso->CORTICOIDES_INHALATORIOS=$cone->test_input($corticoides);

		$compromiso->OSTOMIA=$cone->test_input($ostomia);

		$compromiso->ID_TIPO_OSTOMIA=$cone->test_input($ostomia_cual);

		$compromiso->RECONSTRUCCION_TRANSITO=$cone->test_input($reconstitucion);

		$compromiso->FECHA_RECONSTRUCCION_TRANSITO=$cone->test_input($fech_reconstitucion);

		$compromiso->PROFILAXIS_ANTIBIOTICA=$cone->test_input($profilaxis_antibiotica);

		$compromiso->PROFILAXIS_FECHA_INICIO=$cone->test_input($profilaxis_fech_inicio);

		$compromiso->PROFILAXIS_FECHA_SUSPENSION=$cone->test_input($profilaxis_fech_suspension);

		$compromiso->ESTUDIO_IMAGENES=$cone->test_input($estudio_imagenes);

		$compromiso->ESTUDIO_ECO_RENAL=$cone->test_input($eco_renal);

		$compromiso->ESTUDIO_ECO_RENAL_ALTERACION=$cone->test_input($estudio_eco_renal_alteracion);

		$compromiso->ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP=$cone->test_input($describa_eco_renal);

		$compromiso->CINTIGRAFIA=$cone->test_input($cintigrafia);

		$compromiso->CINTIGRAFIA_ALTERACION=$cone->test_input($cintigrafia_alteracion);

		$compromiso->CINTIGRAFIA_ALTERACION_DESCRIP=$cone->test_input($describa_cintigrafia);

		$compromiso->URETROCISTOGRAFIA=$cone->test_input($uretrocistografia);

		$compromiso->URETROCISTOGRAFIA_ALTERACION=$cone->test_input($uretrocistografia_alteracion);

		$compromiso->URETROCISTOGRAFIA_ALTERACION_DESCRIP=$cone->test_input($describa_uretrocistografia);

		$compromiso->CONTROL_PRESION_ARTERIAL=$cone->test_input($presion);

		$compromiso->ALTERACION_ALGUN_EVENTO=$cone->test_input($alteracion_algun_evento);
		$compromiso->NEURO_HIC_GRADO=$cone->test_input($hic_grado);
		$compromiso->NEURO_HIC_GRADO_CUAL=$cone->test_input($hic_grado_cual);
		$compromiso->NEURO_LEUCOMALACIA=$cone->test_input($leucomalacia);
		$compromiso->NEURO_HIDROCEFALIA=$cone->test_input($hidrocefalia);
		$compromiso->NEURO_HIDROCEFALIA_VALVULA=$cone->test_input($valvula);

		$compromiso->CONVULSIONES_POST_ALTA=$cone->test_input($convulsiones);

		$compromiso->REQUIERE_TRATAMIENTO=$cone->test_input($tratamiento);

		$compromiso->FECHA_SUSPENSION_TRAT=$cone->test_input($fech_tratamiento);





		$idControl= $cone->test_input($idControl);
		$idNeocosur= $cone->test_input($idNeocosur);
		$datos = $dao->buscarId($idControl);



			if($datos==null )

			{

				$dao->guarda($compromiso);

				echo '<script type="text/javascript">

						window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idControl.'&url=compromiso&message='.$message.'#compromiso");

						</script>';



			}

			else

			{

				$dao->actualizar($compromiso);

				echo '<script type="text/javascript">

						window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idControl.'&url=compromiso&message='.$message.'#compromiso");

						</script>';

			}

}

