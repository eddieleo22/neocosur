<?php
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/antecedentes_connatales.php'; 
include '../capaDAO/antecedentes_connatalesDAO.php';
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

	extract($_POST);

	$dao =  new antecedentes_connatalesDAO($cone);
	$antecedentes_connatales = new antecedentes_connatales();	
	$idOculto=$cone->test_input($idOculto);
	$idNeocosur=$cone->test_input($idNeocosur);
	$antecedentes_connatales->ID_CONTROL =$cone->test_input($idOculto);
	$antecedentes_connatales->ID_PARIDAD= $cone->test_input($paridad);
	$antecedentes_connatales->ID_CALIFICACION_ESTADO_NUTRICIONAL= $cone->test_input($nutricional);
	$antecedentes_connatales->MALFORMACIONES_CONGENITAS= $cone->test_input($malformacion);
	$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO= $cone->test_input(c($central));
	$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_CARDIACOS= $cone->test_input(c($cardi));
	$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES= $cone->test_input(c($gastro));
	$antecedentes_connatales->MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS= $cone->test_input(c($geni));
	$antecedentes_connatales->MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS= $cone->test_input(c($cromo));
	$antecedentes_connatales->MALF_CONGENITAS_OTROS_DEFECTOS= $cone->test_input(c($otros_conna));
	$antecedentes_connatales->MALF_CONGENITAS_OTRO_CUAL= $cone->test_input($cual_otro_conna);
	$antecedentes_connatales->OBSERVACIONES = $cone->test_input($obs_malformaciones);


	$datos = $dao->buscarId($idOculto);
		if($datos==null )
		{
			$dao->guarda($antecedentes_connatales);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=connatales&message='.$message.'#connatales");
					</script>';
		}
		else
		{
			//$dao->actualizar($antecedentes_connatales);

			 echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=connatales&message='.$message.'#connatales");
					</script>';
			
		}

}
