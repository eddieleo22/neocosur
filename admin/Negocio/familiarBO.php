<?php
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/antecedentes_familiares.php'; 
include '../capaDAO/antecedentes_familiaresDAO.php';
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

	$dao =  new antecedentes_familiaresDAO($cone);
	$antecedentes_familiares = new antecedentes_familiares();	

	$antecedentes_familiares->ID_CONTROL =$cone->test_input($idOculto);
	$antecedentes_familiares->ID_NEOCOSUR =$cone->test_input($idNeocosur);
	$antecedentes_familiares->ID_APORTA_INFO_FAMILIAR= $cone->test_input($aporta_informacion);
	$antecedentes_familiares->ID_CUIDADOR_RESPONSABLE= $cone->test_input($cuidador_responsable);
	$antecedentes_familiares->ID_PAIS_RESIDENCIA= $cone->test_input($pais_residencia);
	$antecedentes_familiares->ID_CIUDAD= $cone->test_input($ciudad);
	$antecedentes_familiares->COMUNA= $cone->test_input($comuna);
	$antecedentes_familiares->ID_NIVEL_EDUCACIONAL_MADRE= $cone->test_input($nivel_madre);
	$antecedentes_familiares->ID_OCUPACION_MADRE= $cone->test_input($ocupacion_madre);
	$antecedentes_familiares->ID_NIVEL_EDUCACIONAL_PADRE=$cone->test_input($nivel_padre);
	$antecedentes_familiares->ID_OCUPACION_PADRE= $cone->test_input($ocupacion_padre);
	$antecedentes_familiares->NUMERO_NINOS_FAMILIA= $cone->test_input($cant_ninos);
	$antecedentes_familiares->MIGRACION_MADRE= $cone->test_input($migracion_madre);
	$antecedentes_familiares->MIGRACION_MADRE_DESDE= $cone->test_input($migracion_desde_madre);
	$antecedentes_familiares->MIGRACION_PADRE= $cone->test_input($migracion_padre);
	$antecedentes_familiares->MIGRACION_PADRE_DESDE= $cone->test_input($migracion_desde_padre);

	$idOculto= $cone->test_input($idOculto);
	$idNeocosur= $cone->test_input($idNeocosur);
	$datos = $dao->buscarId($idOculto);
		if($datos==null )
		{
			$dao->guarda($antecedentes_familiares);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=familiares&message='.$message.'#familiares");
					</script>';

		}
		else
		{

			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=familiares&message='.$message.'#familiares");
					</script>';

		}

}
