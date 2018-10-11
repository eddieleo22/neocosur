<?php
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/antropometria_control.php'; 
include '../capaDAO/antropometria_controlDAO.php';
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


			$dao =  new antropometria_controlDAO($cone);
			$antropometria_control = new antropometria_control();
			$antropometria_control->ID_CONTROL=$cone->test_input($idOculto);	
			$antropometria_control->PESO=$cone->test_input($peso);
			$antropometria_control->TALLA=$cone->test_input($talla);
			$antropometria_control->CIRCUNFERENCIA_CRANEO=$cone->test_input($circunferencia);
			$antropometria_control->IMC=$cone->test_input($imc);
			$antropometria_control->OMS=$cone->test_input($estad_nutricional);
			$antropometria_control->TALLA_BAJA=$cone->test_input(c($talla_baja));
			$antropometria_control->MICROCEFALIA=$cone->test_input(c($Microcefalia));
			$antropometria_control->MACROCEFALIA=$cone->test_input(c($Macrocefalia));

			//var_dump($_POST);
			$idOculto= $cone->test_input($idOculto);
			$idNeocosur= $cone->test_input($idNeocosur);
			$datos = $dao->buscarId($idOculto);
			if($datos==null )
			{
				$dao->guarda($antropometria_control);
				echo '<script type="text/javascript">
						window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=antropometria&message='.$message.'#antropometria");
						</script>';
				
			}
			else
			{

				$dao->actualizar($antropometria_control);
				echo '<script type="text/javascript">
						window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=antropometria&message='.$message.'#antropometria");
						</script>';

			}

}
